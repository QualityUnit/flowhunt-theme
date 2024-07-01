<?php

function block_improve( $atts ) {
	$atts = shortcode_atts(
		array(
			'headline'    => __( 'Lorem ipsum dolor sit amet', 'flowhunt' ),
			'subHeadline' => __( 'Lorem ipsum dolor sit amet consectetur adipiscing elit ligula sollicitudin, justo feugiat mauris', 'flowhunt' ),
			'buttonText'  => __( 'Lorem ipsum dolor sit', 'flowhunt' ),
			'buttonLink'    => __( 'Lorem ipsum', 'flowhunt' ),
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
				<a class="Button Button--full icn-download" href="<?= esc_url( $atts['buttonLink'] ); ?>" target="_blank">
					<?= esc_html( $atts['buttonText'] ); ?>
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
