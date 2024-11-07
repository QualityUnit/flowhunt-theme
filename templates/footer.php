<?php
	wp_enqueue_style( 'footer', get_template_directory_uri() . '/assets/dist/layouts/Footer' . isrtl() . wpenv() . '.css', false, THEME_VERSION );

if ( empty( preg_grep( '/^(login|trial|free-account|demo|request-for-proposal)$/', get_body_class() ) ) ) {
	?>

<div class="block-improve-section wrapper-md">
	<?php
	echo do_shortcode( '[blockImprove]' );
	?>
</div>

<footer class="Footer urlslab-skip-all">
  <div class="wrapper-md">
	<div class="Footer__newsletter">
	  <div class="Footer__newsletter--text">
		<h4><?php _e( 'Join our newsletter', 'flowhunt' ); ?></h4>
		<p class="small no-margin"><?php _e( 'Get exclusive access to the latest tips, trends, and deals for free.', 'flowhunt' ); ?></p>
	  </div>
	  <?php require_once get_template_directory() . '/templates/newsletter-form.php'; ?>
	</div>
	<div class="Footer__main">
	  <div class="Footer__main--intro">
		<div class="Logo">
		  <a href="<?= esc_url( home_url( '/' ) ); ?>">
			<img alt="URLsLab" loading="lazy" width="139" height="34" src="<?= esc_url( get_template_directory_uri() . '/assets/images/flowhunt-logo.svg' ); ?>" />
		  </a>
		</div>
		<p class="small Footer__motto"><?php _e( 'Build your custom chatbot in minutes with FlowHunt.', 'flowhunt' ); ?></p>
		<!-- <div class="Footer__social">
		  <a href="" class="Footer__social--item">
			<FacebookIcon />
		  </a>
		  <a href="" class="Footer__social--item">
			<YouTubeIcon />
		  </a>
		</div> -->
	  </div>
	  <div class="Footer__main--links">
		<?php
		if ( has_nav_menu( 'footer_navigation' ) ) :
			wp_nav_menu(
				array(
					'theme_location' => 'footer_navigation',
					'menu_class'     => 'Footer__navigation',
				)
			);
	endif;
		?>
	  </div>
	</div>
	<div class="Footer__bottom">
	  <p class="Footer__bottom--copyright"><?php _e( '© 2004-', 'ms' ); ?><?= esc_html( gmdate( 'Y' ) ); ?> <?php _e( 'Quality Unit, LLC. All rights reserved.', 'ms' ); ?></p>
	  <ul class="Footer__bottom--menu">
		<?php
		if ( has_nav_menu( 'footer_bottom_navigation' ) ) :
			wp_nav_menu(
				array(
					'theme_location' => 'footer_bottom_navigation',
					'menu_class'     => 'nav',
				)
			);
			endif;
		?>
	  </ul>
	</div>
  </div>
</footer>

<?php } ?>

<div class="Medovnicky urlslab-skip-all">
	<div class="wrapper">
		<p><?php _e( 'Our website uses cookies. By continuing we assume your permission to deploy cookies as detailed in our', 'flowhunt' ); ?> <a href="<?php _e( '/privacy-policy/', 'flowhunt' ); ?>"><?php _e( 'privacy and cookies policy', 'ms' ); ?></a><?php _e( '.', 'flowhunt' ); ?></p>

		<div class="Medovnicky__buttons">
			<a href="#" class="Medovnicky__button Medovnicky__button--no Medovnicky__button--more Button Button--medium Button--outline">
				<span><?php _e( 'Decline', 'flowhunt' ); ?></span>
			</a>
			<a href="#" class="Medovnicky__button Medovnicky__button--yes Button Button--medium  Button--white">
				<span><?php _e( 'Accept', 'flowhunt' ); ?></span>
			</a>
		</div>
	</div>
</div>
