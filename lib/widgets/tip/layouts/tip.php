<?php
function tip( $attr ) {
	$image_path = get_template_directory_uri() . '/lib/widgets/tip/images/tip.svg';
	return '
			<div class="block-tip">
				<div class="block-tip__content">
					<div class="block-tip__content__img">
						<img src="' . $image_path . '" alt="' . esc_attr( 'tip' ) . '">
					</div>
					<div class="block-tip__content__text">
							' . esc_html( $attr['content'] ) . '
					</div>
				</div>
			</div>
		';
}
