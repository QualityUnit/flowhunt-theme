<?php
/**
 * Plugin Name:       Timeline
 * Description:       Timeline for Gutenberg.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            QualityUnit
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       timeline
 */

function timeline_block_init() {
	$path = get_template_directory() . '/lib/widgets/timeline/';
	require_once $path . 'layouts/timeline.php';

	function timeline_editor_assets() {
		$path_uri = get_template_directory_uri() . '/lib/widgets/timeline/';

		$version = THEME_VERSION;

		wp_enqueue_script(
			'qu_timeline_block_editor_script',
			$path_uri . 'build/index.js',
			array( 'wp-element', 'wp-data' ),
			$version,
			true
		);

		wp_enqueue_style(
			'qu_timeline_block_editor_style',
			$path_uri . 'build/index.css',
			array( 'wp-edit-blocks' ),
			$version,
			false
		);

		wp_enqueue_style(
			'qu_timeline_block_frontend_style',
			$path_uri . 'build/index.css',
			array(),
			$version,
			false
		);
	}

	add_action( 'enqueue_block_editor_assets', 'timeline_editor_assets' );

	function timeline_assets() {
		$path_uri = get_template_directory_uri() . '/lib/widgets/timeline/';
		$version  = THEME_VERSION;

		if ( is_singular() ) {
			$id = get_the_ID();
			if ( has_block( 'qu/timeline', $id ) ) {

				wp_enqueue_style(
					'qu_timeline_block_frontend_style',
					$path_uri . 'build/index.css',
					array(),
					$version,
					false
				);
			}
		}
	}

	add_action( 'enqueue_block_assets', 'timeline_assets' );

	function render_timeline(  $attr, $content ) {
		return timeline(  $attr, $content );
	}

	register_block_type(
		'qu/timeline',
		array(
			'qu_timeline_editor_script' => 'qu_timeline_block_editor_script',
			'qu_timeline_editor_style'  => 'qu_timeline_block_editor_style',
			'qu_timeline_style'         => 'qu_timeline_block_frontend_style',
			'render_callback'            => 'render_timeline',
		)
	);
}

add_action( 'init', 'timeline_block_init' );
