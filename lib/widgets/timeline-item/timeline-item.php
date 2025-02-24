<?php

/**
 * Plugin Name:       Timeline Item
 * Description:       Timeline Item for Gutenberg.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            QualityUnit
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       timelineitem
 */

function timelineitem_block_init() {
	$path = get_template_directory() . '/lib/widgets/timeline-item/';
	require_once $path . 'layouts/timeline.php';

	function timelineitem_editor_assets() {
		$path_uri = get_template_directory_uri() . '/lib/widgets/timeline-item/';

		$version = THEME_VERSION;

		wp_enqueue_script(
			'qu_timelineitem_block_editor_script',
			$path_uri . 'build/index.js',
			array( 'wp-element', 'wp-data' ),
			$version,
			true
		);

		wp_enqueue_style(
			'qu_timelineitem_block_editor_style',
			$path_uri . 'build/index.css',
			array( 'wp-edit-blocks' ),
			$version,
			false
		);

		wp_enqueue_style(
			'qu_timelineitem_block_frontend_style',
			$path_uri . 'build/index.css',
			array(),
			$version,
			false
		);
	}

	add_action( 'enqueue_block_editor_assets', 'timelineitem_editor_assets' );

	function timelineitem_assets() {
		$path_uri = get_template_directory_uri() . '/lib/widgets/timeline-item/';
		$version  = THEME_VERSION;

		if ( is_singular() ) {
			$id = get_the_ID();
			if ( has_block( 'qu/timelineitem', $id ) ) {

				wp_enqueue_style(
					'qu_timelineitem_block_frontend_style',
					$path_uri . 'build/index.css',
					array(),
					$version,
					false
				);
			}
		}
	}

	add_action( 'enqueue_block_assets', 'timelineitem_assets' );

	function render_timelineitem( $attr, $content ) {
		return timelineitem( $attr, $content );
	}

	register_block_type(
		'qu/timelineitem',
		array(
			'qu_timelineitem_editor_script' => 'qu_timelineitem_block_editor_script',
			'qu_timelineitem_editor_style'  => 'qu_timelineitem_block_editor_style',
			'qu_timelineitem_style'         => 'qu_timelineitem_block_frontend_style',
			'render_callback'               => 'render_timelineitem',
			'attributes'                 => array(
				'content'         => array(
					'type'    => 'string',
					'default' => 'Content of timeline',
				),
				'time'         => array(
					'type'    => 'string',
					'default' => '0:06',
				),
			),
		)
	);
}

add_action( 'init', 'timelineitem_block_init' );
