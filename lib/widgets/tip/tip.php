<?php
/**
 * Plugin Name:       Tip
 * Description:       Tip for Gutenberg.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            QualityUnit
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       tip
 */

function tip_block_init() {
	$path = get_template_directory() . '/lib/widgets/tip/';
	require_once $path . 'layouts/tip.php';

	function tip_editor_assets() {
		$path_uri = get_template_directory_uri() . '/lib/widgets/tip/';
		$js_data  = array(
			'url' => $path_uri . 'images',
		);

		$version = THEME_VERSION;

		wp_enqueue_script(
			'qu_tip_block_editor_script',
			$path_uri . 'build/index.js',
			array( 'wp-element', 'wp-data' ),
			$version,
			true
		);

		wp_add_inline_script(
			'qu_tip_block_editor_script',
			'const images = ' . wp_json_encode( $js_data ),
			'before'
		);

		wp_enqueue_style(
			'qu_tip_block_editor_style',
			$path_uri . 'build/index.css',
			array( 'wp-edit-blocks' ),
			$version,
			false
		);

		wp_enqueue_style(
			'qu_tip_block_frontend_style',
			$path_uri . 'build/index.css',
			array(),
			$version,
			false
		);
	}

	add_action( 'enqueue_block_editor_assets', 'tip_editor_assets' );

	function tip_assets() {
		$path_uri = get_template_directory_uri() . '/lib/widgets/tip/';
		$version  = THEME_VERSION;

		if ( is_singular() ) {
			$id = get_the_ID();
			if ( has_block( 'qu/tip', $id ) ) {

				wp_enqueue_style(
					'qu_tip_block_frontend_style',
					$path_uri . 'build/index.css',
					array(),
					$version,
					false
				);
			}
		}
	}

	add_action( 'enqueue_block_assets', 'tip_assets' );

	function render_tip( $attr ) {
		return tip( $attr );
	}

	register_block_type(
		'qu/tip',
		array(
			'qu_tip_editor_script' => 'qu_tip_block_editor_script',
			'qu_tip_editor_style'  => 'qu_tip_block_editor_style',
			'qu_tip_style'         => 'qu_tip_block_frontend_style',
			'render_callback'            => 'render_tip',
			'attributes'                 => array(
				'content'         => array(
					'type'    => 'string',
					'default' => 'Content of tip',
				),
			),
		)
	);
}

add_action( 'init', 'tip_block_init' );
