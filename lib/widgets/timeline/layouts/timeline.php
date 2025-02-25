<?php
function timeline( $attr, $content ) {
	return '
			<div class="block-timeline">
				<div class="block-timeline__content">
				' . esc_html( $content ) . '
				</div>
			</div>
		';
}
