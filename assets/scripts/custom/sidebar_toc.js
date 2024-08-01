const query = document.querySelector.bind( document );
const queryAll = document.querySelectorAll.bind( document );

const headerFaq = query( '.Content h2#faq' );
const tocFaq = query( '.SidebarTOC__item a[href*=faq]' );
const sidebarTOC = query( '.SidebarTOC' );
const signupSidebar = query( '.Signup__sidebar' );

if (
	headerFaq !== null &&
	tocFaq === null &&
	window.innerWidth > 1380 &&
	sidebarTOC !== null
) {
	const faqItem =
		'<li class="SidebarTOC__item SidebarTOC__item--h2"><a href="#faq">FAQ</a></li>';
	document
		.querySelector( '.SidebarTOC__content' )
		.insertAdjacentHTML( 'beforeend', faqItem );
}

const headerItems = ( () => {
	if ( queryAll( '.SidebarTOC__item--h3' ).length > 0 ) {
		return queryAll( '.Content > h2[id], .Content > h3[id]' );
	}
	return queryAll( '.Content > h2[id]' );
} )();

const tocItems = queryAll( '.SidebarTOC__item a' );
const treshold = 96; // about height of regular <p> paragraph to delay the highlight of toc item
const headerHeight = query( '.Header' ).clientHeight + treshold;
const scrollSidebarsElement = queryAll( '[data-scrollsidebars]' );

const mql = window.matchMedia( '(min-width: 1380px)' );

function tocRemoveActive() {
	tocItems.forEach( ( element ) => {
		element.classList.remove( 'active' );
	} );
}

function loadImg( element ) {
	if ( element.tagName === 'IMG' && element.parentElement.tagName === 'PICTURE' && ! element.hasAttribute( 'laprocessing' ) ) {
		element.setAttribute( 'laprocessing', 'y' );
		element.parentElement.childNodes.forEach( ( childNode ) => {
			loadImg( childNode );
		} );
		element.removeAttribute( 'laprocessing' );
	}

	if ( element.hasAttribute( 'data-srcset' ) ) {
		element.setAttribute( 'srcset', element.getAttribute( 'data-srcset' ).replace( /&/g, '&amp;' ).replace( /</g, '&lt;' ).replace( />/g, '&gt;' ) );
		element.removeAttribute( 'data-srcset' );
	}

	if ( element.hasAttribute( 'data-src' ) ) {
		element.setAttribute( 'src', element.getAttribute( 'data-src' ).replace( /&/g, '&amp;' ).replace( /</g, '&lt;' ).replace( />/g, '&gt;' ) );
		element.removeAttribute( 'data-src' );
	}
	element.style.opacity = '1';
}

function activateSidebars() {
	let isScrolling;
	if ( sidebarTOC !== null ) {
		window.addEventListener( 'load', () => {
			if ( queryAll( '[data-src]:not(script)' ) !== null ) {
				const unloaded = document.querySelectorAll( '[data-src]:not(script)' );
				unloaded.forEach( ( elem ) => {
					const el = elem;
					loadImg( el );
				} );
			}
		} );

		tocItems.forEach( ( element, index ) => {
			const el = element;
			el.dataset.number = index;

			el.addEventListener( 'click', ( ) => {
				tocRemoveActive();
				el.classList.add( 'active' );

				setTimeout( () => {
					window.scrollBy( 0, -treshold );
				}, 1000 );
			} );
		} );
	}

	window.addEventListener(
		'scroll',
		() => {
			window.clearTimeout( isScrolling );

			if ( sidebarTOC !== null ) {
				headerItems.forEach( ( element ) => {
					if ( element.getBoundingClientRect().top > 0 && element.getBoundingClientRect().top <= headerHeight ) {
						const elemHref = element.getAttribute( 'id' );
						const activateItem = query(
							`.SidebarTOC a[href*=${ elemHref }`
						);

						tocRemoveActive();
						activateItem.classList.add( 'active' );
						sidebarTOC.scrollTo( 0, activateItem.offsetTop );
					}
				} );

				scrollSidebarsElement.forEach( ( scrollOutElem ) => {
					if (
						scrollOutElem.getBoundingClientRect().top - 217 <
						window.innerHeight
					) {
						sidebarTOC.classList.add( 'scrolled' );
						if ( signupSidebar ) {
							signupSidebar.classList.add( 'scrolled' );
						}
					}
				} );
			}
		},
		false
	);
}

// Handles case when user visits with required screen/window size
if ( mql.matches ) {
	activateSidebars();
}

// Handles case when user changes orientation of device from portrait > landscape, ie. iPad Pro
mql.addEventListener( 'change', ( event ) => {
	if ( event.matches ) {
		activateSidebars();
	}
} );
