<?php

function sidebar_banner( $atts ) {
	$atts = shortcode_atts(
		array(
			'bannerTitle'    => '',
			'bannerSubtitle' => '',
		),
		$atts,
		'sidebarBanner'
	);

	ob_start();
	?>
   <div class="SidebarBanner">
		<div class="SidebarBanner__inn">
			<h4>
				<?=
				esc_html(
					! empty( $atts['bannerTitle'] ) ? $atts['bannerTitle'] : __(
						'Try Flowhunt today',
						'flowhunt' 
					) 
				);
				?>
			</h4>
			<p>
				<?=
				esc_html(
					! empty( $atts['bannerSubtitle'] ) ? $atts['bannerSubtitle'] : __(
						'Handle all support channels in one solution',
						'flowhunt' 
					) 
				);
				?>
			</p>
			<a class="Button Button--full pt-s pb-s" href="<?= esc_url( '#0' ); ?>" target="_blank"><?= esc_html( 'Get started for FREE', 'flowhunt' ); ?></a>
		</div>
  </div>

	<?php
	set_custom_source( 'components/SidebarBanner' );
	set_custom_source( 'layouts/Guide' );

	return ob_get_clean();
}

add_shortcode( 'sidebarBanner', 'sidebar_banner' );
