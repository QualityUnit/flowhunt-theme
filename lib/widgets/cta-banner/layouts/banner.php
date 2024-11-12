<?php
function banner( $attr ) {
		return '
			<div class="block-cta">
				<div class="block-cta__wrapper">
					<div class="block-cta__content">
						<h2 class="title">' . esc_html( $attr['title'] ) . '</h2>
						<p class="subtitle">' . esc_html( $attr['content'] ) . '</p>
						<div className="block-cta__buttons">
							<a href="https://app.flowhunt.io/" target="_blank" class="Button Button--full Button--medium"><span>' . esc_html( $attr['buttonTry'] ) . '</span></a>
							<a href="https://calendly.com/liveagentsession/flowhunt-chatbot-demo" target="_blank" class="Button Button--outline Button--medium"><span>' . esc_html( $attr['buttonExpert'] ) . '</span></a>
						</div>
					</div>
				</div>
			</div>
		';
}
