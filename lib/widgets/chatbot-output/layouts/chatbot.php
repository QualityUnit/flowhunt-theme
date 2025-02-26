<?php
function chatbot( $attr ) {
	return '
			<div class="block-chatbot">
				<div class="block-chatbot__header">
					<div class="title">' . esc_html( $attr['title'] ) . '</div>
					<div class="info">
						<div class="info__time-read">' . esc_html( $attr['timeReading'] ) . '</div>
						<div class="info__count-words">' . esc_html( $attr['countWords'] ) . '</div>
						<div class="info__points-readability">' . esc_html( $attr['pointReadabilityGradeLevel'] ) . ' ( ' . esc_html( $attr['pointReadabilityScore'] ) . ' ' . esc_html( 'points' ) . ' )
							<div class="tooltip">
								<div class="tooltip__text">
									<span>' . esc_html( 'Flesch-Kincaid Grade Level: ' ) . esc_html( $attr['pointReadabilityGradeLevel'] ) . '</span>
									<span>' . esc_html( 'Flesch-Kincaid Score: ' ) . esc_html( $attr['pointReadabilityScore'] ) . '</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="block-chatbot__content">' . esc_html( $attr['content'] ) . '</div>
			</div>
		';
}
