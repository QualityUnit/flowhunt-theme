<?php

function block_improve( $atts ) {
	$atts = shortcode_atts(
		array(
			'headline'    => __( 'Ready to build your own AI?', 'flowhunt' ),
			'subHeadline' => __( 'Chatbots and AI tools under one roof. Connect intuitive blocks to turn your ideas into automated Flows.', 'flowhunt' ),
			'buttonTextOne'  => __( 'Try it out', 'flowhunt' ),
			'buttonLinkOne'    => __( 'https://app.flowhunt.io/sign-in', 'flowhunt' ),
			'buttonTextTwo'  => __( 'Book a demo', 'flowhunt' ),
			'buttonLinkTwo'    => __( 'https://calendly.com/liveagentsession/flowhunt-chatbot-demo', 'flowhunt' ),
		),
		$atts,
		'block_improve'
	);

	ob_start();
	?>

	<div class="block-improve">
		<div class="block-improve__wrapper">
			<div class="block-improve__content">
				<h2><?= esc_html( $atts['headline'] ); ?></h2>
				<p><?= esc_html( $atts['subHeadline'] ); ?></p>
				<div class="block-improve__buttons">
					<a class="Button Button--white Button--medium" href="<?= esc_url( $atts['buttonLinkOne'] ); ?>" target="_blank">
						<span><?= esc_html( $atts['buttonTextOne'] ); ?></span>
					</a>
					<a class="Button Button--outline Button--medium" href="<?= esc_url( $atts['buttonLinkTwo'] ); ?>" target="_blank">
						<span><?= esc_html( $atts['buttonTextTwo'] ); ?></span>
					</a>
				</div>
			</div>
			<div class="block-improve__img">
				<img src="<?= esc_url( get_template_directory_uri() . '/assets/images/block-improve-right-img.png' ); ?>" alt="<?= esc_attr( 'Experience next-level SEO plugin', 'flowhunt' ); ?>">
			</div>
		</div>
	</div>

	<?php

	set_custom_source( 'components/BlockImprove' );

	return ob_get_clean();
}
add_shortcode( 'blockImprove', 'block_improve' );
