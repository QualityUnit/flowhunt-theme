const tables = document.querySelectorAll( 'table' );
const pricingTableHeaderTitle = document.querySelector( '.ComparePlans__sectiontitle' );
const pricingTableHeader = document.querySelector( '.ComparePlans--header' );
const hostname = window.location.hostname;
const isLocal = hostname?.toString().indexOf( 'local' );

// Setting tables header class when sticky to hide icons
if ( pricingTableHeader ) {
	const headerObserver = new IntersectionObserver(
		( [ entry ] ) => {
			if ( entry.isIntersecting ) {
				pricingTableHeader.classList.remove( 'is-sticky' );
				return;
			}
			if ( entry.boundingClientRect.top < 0 ) {
				pricingTableHeader.classList.add( 'is-sticky' );
			}
		},
		{ rootMargin: '-92px 0px 0px 0px' }
	);

	headerObserver.observe( pricingTableHeaderTitle );
}

if ( tables.length ) {
	const hasTooltip = new RegExp( /(.+?)<i>(.+?)<\/i>/gi );

	tables.forEach( ( table ) => {
		const articleTable = table.closest( '.Content' );
		const trHead = table.querySelectorAll( 'thead tr' );
		const trMain = table.querySelectorAll( 'tbody tr, tfoot tr' );
		const colspanRows = table.querySelectorAll( 'tbody tr td[colspan]:first-child' );

		if ( colspanRows?.length ) {
			table.classList.add( 'hasColspanGroups' );
		}

		//Sets check or crossover for Y or N vals
		for ( let i = 0; i <= trMain.length; i++ ) {
			let headers = trHead[ 0 ].querySelectorAll( 'th' );
			if ( ! headers?.length ) {
				headers = trMain[ 0 ].querySelectorAll( 'td' ); // if no thead, use first row of tbody as a header values
			}
			const vals = trMain[ i ] && trMain[ i ].querySelectorAll( 'td, th' );
			const allCells = trMain[ i ] && trMain[ i ].querySelectorAll( 'td, th' );

			if ( allCells?.length ) {
				allCells.forEach( ( cell ) => {
					const text = cell.innerHTML;

					if ( hasTooltip.test( text ) ) {
						const infoIcon = `<svg class="icon icon-info-circle">
							<use xlink:href="/app/themes/flowhunt${ isLocal ? '-theme' : '' }/assets/images/icons.svg#info-circle"></use>
							</svg>`;
						cell.classList.add( 'hasTooltip' );
						cell.innerHTML = text.replaceAll( hasTooltip, `$1<div class="ComparePlans__tooltip">${ infoIcon }<span class="ComparePlans__tooltip__text">$2</span></div>` );
					}
				} );
			}

			if ( vals?.length > 1 ) {
				const yesRegex = new RegExp( '^(\\s*)(Y|n)(\\s*)\n?' );
				const noRegex = new RegExp( '^(\\s*)(N|n)(\\s*)\n?' );
				vals.forEach( ( val, index ) => {
					if ( yesRegex.test( val.firstChild.textContent ) ) {
						val.firstChild.textContent = '';
						val.classList.add( 'icn-after-check' );
						val.insertAdjacentHTML( 'afterbegin', `
							${ articleTable ? "<span class='iconWrapper'>" : '' }
							<svg class="icon icon-check">
								<use xlink:href="/app/themes/flowhunt${ isLocal ? '-theme' : '' }/assets/images/icons.svg#check-narrow"></use>
							</svg>
							${ articleTable ? '</span>' : '' }
							`
						);
						val.childNodes.forEach( ( node, nodeIndex ) => nodeIndex !== 0 ? node.textContent : '' );
					}
					if ( noRegex.test( val.firstChild.textContent ) ) {
						val.firstChild.textContent = '';
						val.classList.add( 'icn-after-close' );
						val.insertAdjacentHTML( 'afterbegin', `
							${ articleTable ? "<span class='iconWrapper'>" : '' }
							<svg class="icon icon-close">
								<use xlink:href="/app/themes/flowhunt${ isLocal ? '-theme' : '' }/assets/images/icons.svg#close"></use>
							</svg>
							${ articleTable ? '</span>' : '' }
							`
						);
					}
					if ( headers[ index ]?.innerHTML && ! table.classList.contains( 'no-header' ) ) {
						val.insertAdjacentHTML( 'afterbegin', `<div class="tablet--only MobileHeader">${ headers[ index ].innerHTML }</div>` );
					}

					if ( headers[ index ]?.innerHTML && ! table.classList.contains( 'no-header' ) && headers[ index ]?.textContent.toLowerCase() === 'flowhunt' ) {
						headers[ index ].classList.add( 'flowhunt' );
						val.classList.add( 'flowhunt' );
					}

					if ( ! headers[ index ]?.innerHTML && ! table.classList.contains( 'no-header' ) ) {
						val.classList.add( 'MobileHeader__top' );
					}
				} );
			}
		}

		// Adds Class to odd tr with td[colspan] + tr for background
		for ( let i = 0; i <= colspanRows.length; i++ ) {
			if ( i % 2 === 1 ) {
				const isOddGroup = colspanRows[ i ]?.closest( 'tr' );
				if ( isOddGroup ) {
					isOddGroup.classList.add( 'oddGroup' );
					isOddGroup.nextElementSibling.classList.add( 'oddGroup' );
				}
			}
		}
	} );
}
