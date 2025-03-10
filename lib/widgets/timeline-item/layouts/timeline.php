<?php
function timelineitem( $attr, $content ) {
	$image_path = get_template_directory_uri() . '/lib/widgets/timeline-item/images/chevron-right.svg';
	return '
		<div class="block-timeline-item">
			<div class="block-timeline-item__header">
				<div class="block-timeline-item__header__img">
					<img src="' . $image_path . '" alt="' . esc_attr( 'timeline__item' ) . '">
				</div>
				<div class="block-timeline-item__header__time">
					' . esc_html( $attr['time'] ) . '
				</div>
			</div>
			<div class="block-timeline-item__content">
					' . $attr['content'] . esc_html( $content ) . '
			</div>
		</div>';
}
