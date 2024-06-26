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
			esc_html( ! empty( $atts['bannerTitle'] ) ? $atts['bannerTitle'] : __( 'Unleash the power of AI for your website', 'flowhunt' ) );
			?>
		</h4>
	  <p>
			<?=
			esc_html( ! empty( $atts['bannerSubtitle'] ) ? $atts['bannerSubtitle'] : __( 'Get started today and download the URLsLab Wordpress plugin', 'flowhunt' ) );
			?>
		</p>
	  <a class="Button Button--full pt-s pb-s" href="<?= esc_url( '#0' ); ?>" target="_blank"><?= esc_html( 'Download the plugin', 'flowhunt' ); ?></a>
	</div>
	<img
	  class="SidebarBanner__image"
	  src="<?= esc_url( get_template_directory_uri() . '/assets/images/flowhunt-sidebar-img.png' ); ?>"
	  alt="Experience next-level SEO plugin"
	/>
  </div>

	<?php
	set_custom_source( 'components/SidebarBanner' );
	set_custom_source( 'layouts/Guide' );

	return ob_get_clean();
}

add_shortcode( 'sidebarBanner', 'sidebar_banner' );
