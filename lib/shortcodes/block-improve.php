<?php

function block_improve( $atts ) {
	$atts = shortcode_atts(
		array(
			'headline'    => '',
			'subheadline' => '',
			'question-1'  => '',
			'answer-1'    => '',
			'question-2'  => '',
			'answer-2'    => '',
			'question-3'  => '',
			'answer-3'    => '',
		),
		$atts,
		'block_improve'
	);

	ob_start();
	?>

	<div class="block-improve">
		<div class="block-improve__wrapper">
			<div class="block-improve__content">
				<h2><?= esc_html( 'Run a website of your dreams', 'flowhunt' ); ?></h2>
				<p><?= esc_html( 'Want a website you can pour your heart into? Download the URLsLab WordPress plugin and let’s get started!', 'flowhunt' ); ?></p>
				<a class="Button Button--full icn-download" href="<?= esc_url( 'https://wordpress.org/plugins/urlslab/', 'flowhunt' ); ?>" target="_blank">
					<?= esc_html( 'Get the plugin', 'flowhunt' ); ?>
				</a>
			</div>
			<div class="block-improve__img">
				<img src="<?= esc_url( get_template_directory_uri() . '/assets/images/improve-banner-right-img.png' ); ?>" alt="<?= esc_attr( 'Experience next-level SEO plugin', 'flowhunt' ); ?>">
			</div>
		</div>
	</div>

	<?php

	set_custom_source( 'components/BlockImprove' );

	return ob_get_clean();

}
add_shortcode( 'blockImprove', 'block_improve' );
