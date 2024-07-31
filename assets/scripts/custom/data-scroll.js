/* global gsap */

const scrollByOne = document.querySelectorAll( '[data-scroll="one"]' );

if ( scrollByOne.length > 0 ) {
	scrollByOne.forEach( ( scroller ) => {
		const images = gsap.utils.toArray( '.e-child > .elementor-widget-image', scroller );
		const details = gsap.utils.toArray( '.e-child > .e-child:has(.elementor-widget-heading)', scroller );

		const timeline = gsap.timeline( {
			scrollTrigger: {
				trigger: scroller,
				toggleActions: 'restart pause reverse pause',
				start: 'center center',
				end: `+=${ ( images.length - 1 ) * 100 }%`,
				pin: true,
				scrub: true,
			},
		} );

		images.forEach( ( img, i ) => {
			if ( images[ i + 1 ] ) {
				timeline.to( img, { opacity: 0 }, '+=0.5' )
					.to( images[ i + 1 ], { opacity: 1 }, '<' )
					.to( details, { yPercent: -( 100 * ( i + 1 ) ), ease: 'none' }, '<' );
			}
		} );
		timeline.to( {}, {}, '+=0.5' );
	} );
}

const scrollByPoint = document.querySelectorAll( '[data-scroll="all"]' );

if ( scrollByPoint.length > 0 ) {
	scrollByPoint.forEach( ( scroller ) => {
		const images = gsap.utils.toArray( scroller.querySelectorAll( '.e-child > .elementor-widget-image' ) );
		const videos = gsap.utils.toArray( scroller.querySelectorAll( '.e-child > .elementor-widget-video' ) );
		const details = gsap.utils.toArray( scroller.querySelectorAll( '.details > .e-child:has(.elementor-widget-heading)' ) );

		const progress = 0;

		const restartVideo = ( video ) => {
			video.pause();
			video.currentTime = 0;
		};

		const timelineDetails = gsap.timeline( {
			scrollTrigger: {
				toggleActions: 'restart pause restart pause',
				start: 'center center',
				end: `+=${ ( details.length ) * 100 }%`,
				pin: true,
				scrub: 1,
			},
		} );

		ScrollTrigger.create( {
			trigger: scroller,
			toggleActions: 'restart pause restart pause',
			start: 'center center',
			end: `+=${ ( details.length ) * 100 }%`,
			pin: true,
			scrub: 1,
			onUpdate: ( self ) => console.log( self.animation ),
		} );

		details.forEach( ( detail, i ) => {
			const detailPara = detail.querySelector( '.elementor-widget-heading + .elementor-widget-text-editor' );
			detailPara.insertAdjacentHTML( 'afterbegin', '<div class="progress"></div>' );
			const detailParaProgress = detailPara.querySelector( '.progress' );

			timelineDetails.to( detailParaProgress, { height: `${ 0 }%` } ).add( () => {
				if ( i > 0 ) {
					details[ i - 1 ].classList.remove( 'active' );
					videos[ i - 1 ].style.zIndex = 1;
					restartVideo( videos[ i - 1 ].querySelector( 'video' ) );
				}
				videos[ i ].style.zIndex = videos.length + i;
				videos[ i ].querySelector( 'video' ).play();
				detail.classList.add( 'active' );

				if ( details[ i + 1 ] && videos[ i + 1 ] ) {
					details[ i + 1 ].classList.remove( 'active' );
					videos[ i + 1 ].style.zIndex = 1;
					restartVideo( videos[ i + 1 ].querySelector( 'video' ) );
				}
			}, '<' ).to( detailParaProgress, { height: `${ 100 }%` }, '<' );
		} );

		images.forEach( ( img, i ) => {
			if ( images[ i + 1 ] ) {
				timelineDetails.to( img, { opacity: 0 }, '+=0.5' )
					.to( images[ i + 1 ], { opacity: 1 }, '<' );
			}
		} );
		timelineDetails.to( {}, {}, '<' );
	} );
}

