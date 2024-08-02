<?php
function banner( $attr ) {
		return '
			<div class="block-improve">
				<div class="block-improve__wrapper">
					<div class="block-improve__content">
						<h2>' . esc_html( $attr['title'] ) . '</h2>
						<p>' . esc_html( $attr['content'] ) . '</p>
						<div className="block-improve__buttons">
							<a href="https://wordpress.org/plugins/urlslab/" target="_blank" class="Button Button--white Button--medium">' . esc_html( $attr['button'] ) . '</a>
						</div>
					</div>
					<div class="block-improve__img">
						<img src="' . get_template_directory_uri() . '/assets/images/block-improve-right-img.png" class="ImproveBanner__image" alt="' . esc_attr( $attr['title'] ) . '" />
					</div>
				</div>
			</div>
		';
}
