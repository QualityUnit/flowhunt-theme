<?php 
function searchfield( $placeholder = 'Search...' ) {
	ob_start();
	?>
<div class="compact-header__search">
	<div class="searchField">
		<svg class="searchField__icon icon-search" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" clip-rule="evenodd" d="M4.71833 1.02016C5.54739 0.676749 6.43597 0.5 7.33333 0.5C8.2307 0.5 9.11928 0.676749 9.94834 1.02016C10.7774 1.36356 11.5307 1.8669 12.1652 2.50144C12.7998 3.13597 13.3031 3.88927 13.6465 4.71833C13.9899 5.54739 14.1667 6.43597 14.1667 7.33333C14.1667 8.2307 13.9899 9.11928 13.6465 9.94834C13.4315 10.4675 13.1537 10.9569 12.8203 11.4061L17.2071 15.7929C17.5976 16.1834 17.5976 16.8166 17.2071 17.2071C16.8166 17.5976 16.1834 17.5976 15.7929 17.2071L11.4061 12.8203C10.9569 13.1537 10.4675 13.4315 9.94834 13.6465C9.11928 13.9899 8.2307 14.1667 7.33333 14.1667C6.43597 14.1667 5.54739 13.9899 4.71833 13.6465C3.88927 13.3031 3.13597 12.7998 2.50144 12.1652C1.8669 11.5307 1.36356 10.7774 1.02016 9.94834C0.676749 9.11928 0.5 8.2307 0.5 7.33333C0.5 6.43597 0.676749 5.54739 1.02016 4.71833C1.36356 3.88927 1.8669 3.13597 2.50144 2.50144C3.13597 1.8669 3.88927 1.36356 4.71833 1.02016ZM7.33333 2.5C6.69861 2.5 6.0701 2.62502 5.4837 2.86792C4.89729 3.11081 4.36447 3.46683 3.91565 3.91565C3.46683 4.36447 3.11081 4.89729 2.86792 5.4837C2.62502 6.0701 2.5 6.69861 2.5 7.33333C2.5 7.96806 2.62502 8.59656 2.86792 9.18297C3.11081 9.76938 3.46683 10.3022 3.91565 10.751C4.36447 11.1998 4.89729 11.5559 5.4837 11.7988C6.0701 12.0416 6.69861 12.1667 7.33333 12.1667C7.96806 12.1667 8.59656 12.0416 9.18297 11.7988C9.76938 11.5559 10.3022 11.1998 10.751 10.751C11.1998 10.3022 11.5559 9.76938 11.7988 9.18297C12.0416 8.59656 12.1667 7.96806 12.1667 7.33333C12.1667 6.69861 12.0416 6.0701 11.7988 5.4837C11.5559 4.89729 11.1998 4.36447 10.751 3.91565C10.3022 3.46683 9.76938 3.11081 9.18297 2.86792C8.59656 2.62502 7.96806 2.5 7.33333 2.5Z" />
		</svg>
		<input
			class="search searchfield-input input input__text"
			type="search"
			value=""
			placeholder="<?= esc_attr( $placeholder ); ?>"
		/>
		<span class="search-reset">
			<svg class="search-reset__icon icon-close">
				<use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#close' ); ?>"></use>
			</svg>
		</span>
	</div>
</div>
	<?php
	return ob_get_clean();
}
?>
