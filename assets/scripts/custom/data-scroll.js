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

		const media = images.length ? images : videos;

		const timelineDetails = gsap.timeline( {
			scrollTrigger: {
				toggleActions: 'restart pause restart pause',
				start: 'center center',
				end: `+=${ ( details.length ) * 100 }%`,
				pin: true,
				scrub: 1,
			},
		} );

		const timelineMedia = gsap.timeline( {
			scrollTrigger: {
				trigger: scroller,
				toggleActions: 'restart pause restart pause',
				start: 'center center',
				end: `+=${ ( media.length ) * 100 }%`,
				pin: true,
				scrub: 1,
			},
		} );

		const restartVideo = ( video ) => {
			video.pause();
			video.currentTime = 0;
		};

		details.forEach( ( detail ) => {
			timelineDetails.to( detail, {
				onStart: () => {
					detail.classList.add( 'active' );
				},
				onComplete: () => detail.classList.remove( 'active' ),
			} );
		} );

		media.forEach( ( medium, i ) => {

			timelineMedia.to( medium, {
				onStart: () => {
					medium.style.zIndex = media.length + i;
					medium.querySelector( 'video' ).play();
				},
				onComplete: () => {
					medium.style.zIndex = 1;
					restartVideo( media[ i ].querySelector( 'video' ) );
				},
			} );
		} );
	} );
}

