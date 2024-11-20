window.addEventListener( 'load', () => {
	const activators = document.querySelectorAll( '[data-target]' );
	const closers = document.querySelectorAll( `[data-close-target]` );

	const hideVisible = ( target ) => {
		let activatorElements = document.querySelectorAll( `[data-target]:not([data-target^="switcher"])` );
		let closeTargets = document.querySelectorAll( `[data-targetId]:not([data-targetId^="switcher"])` );

		if ( target && target.includes( 'switcher' ) ) {
			activatorElements = document.querySelectorAll( `[data-target]:not([data-target="${ target }"])` );
			closeTargets = document.querySelectorAll( `[data-targetId]:not([data-targetId="${ target }"]` );
		}

		activatorElements.forEach( ( activatorElem ) => {
			if ( activatorElem && activatorElem.classList.contains( 'active' ) ) {
				setTimeout( () => {
					activatorElem.classList.remove( 'active' );
				}, 10 );
			}
		} );
		closeTargets.forEach( ( targetElement ) => {
			let hidedelay = targetElement.dataset.hideDelay;
			if ( ! hidedelay ) {
				hidedelay = 10;
			}
			targetElement.classList.remove( 'visible' );
			targetElement.addEventListener( 'transitionend', () => {
				if ( targetElement && ! targetElement.classList.contains( 'visible' ) ) {
					setTimeout( () => {
						targetElement.classList.add( 'hidden' );
					}, hidedelay );
				}
			} );
		} );
	};

	if ( activators.length > 0 ) {
		activators.forEach( ( elem ) => {
			const activator = elem;

			activator.addEventListener( 'click', ( event ) => {
				event.stopPropagation();
				const thisActivator = activator;
				const thisTarget = document.querySelectorAll(
					`[data-targetId="${ thisActivator.dataset.target }"]`
				);

				if ( ! thisActivator.classList.contains( 'active' ) ) {
					thisTarget.forEach( ( target ) => {
						target.classList.remove( 'hidden' );
						setTimeout( () => {
							thisActivator.classList.add( 'active' );
							target.classList.add( 'visible' );
						}, 10 );
					} );
				}
				hideVisible( thisActivator.dataset.target );
			} );
		} );
	}

	if ( closers.length > 0 ) {
		// closers.item( 0 ).parentElement.style.height = `${ closers.item( 0 ).getBoundingClientRect().height }px`;
		closers.forEach( ( closeBtn ) => {
			closeBtn.addEventListener( 'click', () => {
				const target = closeBtn.dataset.closeTarget;
				hideVisible( target );
			} );
		} );
	}
} );

