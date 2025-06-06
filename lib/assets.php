<?php

/**
* Styles
**/

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'elementor-custom' );

		$access_post_type_for_elementor = array( 'services', 'solutions' );
		$current_post_type = get_post_type();

		if ( is_singular( 'post' ) && ! in_array( $current_post_type, $access_post_type_for_elementor ) ) {
			wp_enqueue_style( 'blog-layout', get_template_directory_uri() . '/assets/dist/pages/blog' . isrtl() . wpenv() . '.css', false, THEME_VERSION );
		}

		if ( is_page() || is_page_template( 'front-page.php' ) || is_page_template( 'page.php' ) || in_array( $current_post_type, $access_post_type_for_elementor ) ) {
			wp_enqueue_style( 'elementor-layout', get_template_directory_uri() . '/assets/dist/Elementor' . isrtl() . wpenv() . '.css', false, THEME_VERSION );
		}

		if ( ! is_page() && ! in_array( $current_post_type, $access_post_type_for_elementor ) ) {
			wp_enqueue_style( 'app', get_template_directory_uri() . '/assets/dist/app' . isrtl() . wpenv() . '.css', false, THEME_VERSION );
		}

		if ( ! empty( preg_grep( '/^(demo)$/', get_body_class() ) ) ) {
			wp_enqueue_style( 'app', get_template_directory_uri() . '/assets/dist/pages/Demo' . isrtl() . wpenv() . '.css', false, THEME_VERSION );
		}
	},
	100
);

//Loads greensock lib with scrolltrigger module

function theme_gsap_script() {
		wp_enqueue_script( 'gsap-js', get_template_directory_uri() . '/assets/dist/gsap' . wpenv() . '.js', array(), THEME_VERSION, true );
		wp_enqueue_script( 'gsapSt-js', get_template_directory_uri() . '/assets/dist/gsap-scrolltrigger' . wpenv() . '.js', array( 'gsap-js' ), THEME_VERSION, true );
}

// add_action( 'wp_enqueue_scripts', 'theme_gsap_script' ); // Comment out if GSAP is required
/**
 * Scripts
 */

add_action(
	'wp_footer',
	function () {
		wp_enqueue_script( 'jquery' );

		wp_enqueue_script( 'popper_js', get_template_directory_uri() . '/assets/dist/popper' . wpenv() . '.js', array( 'wp-i18n' ), THEME_VERSION, true );
		wp_enqueue_script( 'app_js', get_template_directory_uri() . '/assets/dist/app' . wpenv() . '.js', false, THEME_VERSION, true );
	}
);
