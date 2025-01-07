<?php
/**
 * Plugin Name:       CTA Banner
 * Description:       CTA Banner for Gutenberg.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            QualityUnit
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ctabanner
*/

function ctabanner_block_init() {
	$path = get_template_directory() . '/lib/widgets/cta-banner/';
	require_once $path . 'layouts/banner.php';

	function ctabanner_editor_assets() {
		$path_uri = get_template_directory_uri() . '/lib/widgets/cta-banner/';
		$js_data  = array(
			'url' => $path_uri . 'images',
		);

		$version = THEME_VERSION;

		wp_enqueue_script(
			'qu_ctabanner_block_editor_script',
			$path_uri . 'build/index.js',
			array( 'wp-element', 'wp-data' ),
			$version,
			true
		);

		wp_add_inline_script(
			'qu_ctabanner_block_editor_script',
			'const images = ' . wp_json_encode( $js_data ),
			'before'
		);

		wp_enqueue_style(
			'qu_ctabanner_block_editor_style',
			$path_uri . 'build/index.css',
			array( 'wp-edit-blocks' ),
			$version,
			false
		);

		wp_enqueue_style(
			'qu_ctabanner_block_frontend_style',
			$path_uri . 'build/index.css',
			array(),
			$version,
			false
		);
	}

	add_action( 'enqueue_block_editor_assets', 'ctabanner_editor_assets' );

	function ctabanner_assets() {
		$path_uri = get_template_directory_uri() . '/lib/widgets/cta-banner/';
		$version  = THEME_VERSION;

		if ( is_singular() ) {
			$id = get_the_ID();
			if ( has_block( 'qu/ctabanner', $id ) ) {

				wp_enqueue_style(
					'qu_ctabanner_block_frontend_style',
					$path_uri . 'build/index.css',
					array(),
					$version,
					false
				);
			}
		}
	}

	add_action( 'enqueue_block_assets', 'ctabanner_assets' );

	function render_ctabanner( $attr ) {
			return banner( $attr );
	}

	register_block_type(
		'qu/ctabanner',
		array(
			'qu_ctabanner_editor_script' => 'qu_ctabanner_block_editor_script',
			'qu_ctabanner_editor_style'  => 'qu_ctabanner_block_editor_style',
			'qu_ctabanner_style'         => 'qu_ctabanner_block_frontend_style',
			'render_callback'            => 'render_ctabanner',
			'attributes'                 => array(
				'title'           => array(
					'type'    => 'string',
					'default' => 'Get started with your first flow',
				),
				'content'         => array(
					'type'    => 'string',
					'default' => 'Flowhunt has a team of AI flow engineers ready to help you with AI Automation.',
				),
				'buttonTry'       => array(
					'type'    => 'string',
					'default' => 'Try Flowhunt',
				),
				'buttonTryUrl'    => array(
					'type'    => 'string',
					'default' => 'https://app.flowhunt.io/',
				),
				'buttonExpert'    => array(
					'type'    => 'string',
					'default' => 'Talk to an Expert',
				),
				'buttonExpertUrl' => array(
					'type'    => 'string',
					'default' => 'https://calendly.com/liveagentsession/flowhunt-chatbot-demo',
				),
			),
		)
	);
}

add_action( 'init', 'ctabanner_block_init' );
