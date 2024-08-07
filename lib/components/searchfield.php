<?php 
function searchfield( $placeholder = 'Search...' ) {
	ob_start();
	?>
<div class="compact-header__search">
	<div class="searchField">
		<svg class="searchField__icon icon-search">
			<use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#search' ); ?>"></use>
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
