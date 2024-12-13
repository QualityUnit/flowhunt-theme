// Used to copy code blocks from flow templates etc

const codeblocks = document.querySelectorAll( '.Content .CodeBlock, .Content div[style*="background-color"]' );

codeblocks.forEach( ( codeBlock ) => {
	const codeText = codeBlock?.outerText;
	codeBlock.insertAdjacentHTML( 'afterbegin', `<button class="Button Button--outline--white pos-absolute"><span>Copy
</span><svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
<path d="M3.7501 3.1501C3.42215 3.1501 3.1501 3.42215 3.1501 3.7501L3.1501 11.2488C3.1505 11.3548 3.17881 11.4588 3.23217 11.5504C3.28568 11.6422 3.36249 11.7183 3.45483 11.771C3.88665 12.0171 4.03714 12.5668 3.79097 12.9986C3.5448 13.4304 2.99518 13.5809 2.56336 13.3347C2.19572 13.1251 1.88992 12.8222 1.67688 12.4565C1.46385 12.0909 1.35112 11.6755 1.3501 11.2523L1.3501 11.2501L1.3501 3.7501C1.3501 2.42804 2.42804 1.3501 3.7501 1.3501L11.2501 1.3501C11.7 1.3501 12.1071 1.47049 12.456 1.72379C12.7855 1.96293 13.0032 2.27783 13.1617 2.56269C13.4032 2.9971 13.2469 3.54509 12.8125 3.78666C12.3781 4.02823 11.8301 3.87191 11.5885 3.4375C11.4904 3.26112 11.427 3.20101 11.3987 3.18047C11.3875 3.17236 11.3776 3.16728 11.3633 3.16289C11.3475 3.15805 11.313 3.1501 11.2501 3.1501L3.7501 3.1501ZM7.25035 6.1501C6.95854 6.1501 6.67869 6.26602 6.47235 6.47235C6.26602 6.67869 6.1501 6.95854 6.1501 7.25035L6.1501 13.7498C6.1501 13.8943 6.17856 14.0374 6.23385 14.1709C6.28914 14.3044 6.37019 14.4257 6.47235 14.5278C6.57452 14.63 6.69581 14.7111 6.8293 14.7663C6.96279 14.8216 7.10586 14.8501 7.25035 14.8501H13.7498C13.8943 14.8501 14.0374 14.8216 14.1709 14.7663C14.3044 14.7111 14.4257 14.63 14.5278 14.5278C14.63 14.4257 14.7111 14.3044 14.7663 14.1709C14.8216 14.0374 14.8501 13.8943 14.8501 13.7498V7.25035C14.8501 7.10586 14.8216 6.96279 14.7663 6.8293C14.7111 6.69581 14.63 6.57452 14.5278 6.47235C14.4257 6.37019 14.3044 6.28914 14.1709 6.23385C14.0374 6.17856 13.8943 6.1501 13.7498 6.1501L7.25035 6.1501ZM5.19956 5.19956C5.74346 4.65566 6.48115 4.3501 7.25035 4.3501L13.7498 4.3501C14.1307 4.3501 14.5078 4.42511 14.8597 4.57087C15.2116 4.71662 15.5313 4.93025 15.8006 5.19956C16.0699 5.46887 16.2836 5.78859 16.4293 6.14047C16.5751 6.49235 16.6501 6.86948 16.6501 7.25035V13.7498C16.6501 14.1307 16.5751 14.5078 16.4293 14.8597C16.2836 15.2116 16.0699 15.5313 15.8006 15.8006C15.5313 16.0699 15.2116 16.2836 14.8597 16.4293C14.5078 16.5751 14.1307 16.6501 13.7498 16.6501H7.25035C6.86948 16.6501 6.49235 16.5751 6.14047 16.4293C5.78859 16.2836 5.46887 16.0699 5.19956 15.8006C4.93025 15.5313 4.71662 15.2116 4.57087 14.8597C4.42511 14.5078 4.3501 14.1307 4.3501 13.7498L4.3501 7.25035C4.3501 6.48115 4.65566 5.74346 5.19956 5.19956Z" />
</svg></button>` );

	const thisCopy = codeBlock.querySelector( 'button' );

	thisCopy.addEventListener( 'click', () => {
		const textArea = document.createElement( 'textarea' );
		textArea.value = codeText;
		document.body.appendChild( textArea );
		textArea.select();

		document.execCommand( 'copy' );
		document.body.removeChild( textArea );

		thisCopy.querySelector( 'span' ).textContent = 'Copied!';

		setTimeout( () => {
			thisCopy.querySelector(
				'span'
			).textContent = 'Copy';
		}, 2000 );
	} );
} );
