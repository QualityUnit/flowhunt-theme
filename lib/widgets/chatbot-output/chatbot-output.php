<?php
/**
 * Plugin Name:       Chatbot Output
 * Description:       Chatbot Output for Gutenberg.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            QualityUnit
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       chatbotoutput
 */

function chatbotoutput_block_init() {
	$path = get_template_directory() . '/lib/widgets/chatbot-output/';
	require_once $path . 'layouts/chatbot.php';

	function chatbotoutput_editor_assets() {
		$path_uri = get_template_directory_uri() . '/lib/widgets/chatbot-output/';
		$js_data  = array(
			'url' => $path_uri . 'images',
		);

		$version = THEME_VERSION;

		wp_enqueue_script(
			'qu_chatbotoutput_block_editor_script',
			$path_uri . 'build/index.js',
			array( 'wp-element', 'wp-data' ),
			$version,
			true
		);

		wp_add_inline_script(
			'qu_chatbotoutput_block_editor_script',
			'const images = ' . wp_json_encode( $js_data ),
			'before'
		);

		wp_enqueue_style(
			'qu_chatbotoutput_block_editor_style',
			$path_uri . 'build/index.css',
			array( 'wp-edit-blocks' ),
			$version,
			false
		);

		wp_enqueue_style(
			'qu_chatbotoutput_block_frontend_style',
			$path_uri . 'build/index.css',
			array(),
			$version,
			false
		);
	}

	add_action( 'enqueue_block_editor_assets', 'chatbotoutput_editor_assets' );

	function chatbotoutput_assets() {
		$path_uri = get_template_directory_uri() . '/lib/widgets/chatbot-output/';
		$version  = THEME_VERSION;

		if ( is_singular() ) {
			$id = get_the_ID();
			if ( has_block( 'qu/chatbotoutput', $id ) ) {

				wp_enqueue_style(
					'qu_chatbotoutput_block_frontend_style',
					$path_uri . 'build/index.css',
					array(),
					$version,
					false
				);
			}
		}
	}

	add_action( 'enqueue_block_assets', 'chatbotoutput_assets' );

	function render_chatbotoutput( $attr ) {
		return chatbot( $attr );
	}

	register_block_type(
		'qu/chatbotoutput',
		array(
			'qu_chatbotoutput_editor_script' => 'qu_chatbotoutput_block_editor_script',
			'qu_chatbotoutput_editor_style'  => 'qu_chatbotoutput_block_editor_style',
			'qu_chatbotoutput_style'         => 'qu_chatbotoutput_block_frontend_style',
			'render_callback'            => 'render_chatbotoutput',
			'attributes'                 => array(
				'title'           => array(
					'type'    => 'string',
					'default' => 'Chatbot Output',
				),
				'content'         => array(
					'type'    => 'string',
					'default' => 'Content of chatbot',
				),
				'timeReading'       => array(
					'type'    => 'string',
					'default' => '37 seconds',
				),
				'countWords'    => array(
					'type'    => 'string',
					'default' => '576 words',
				),
				'pointReadabilityGradeLevel'    => array(
					'type'    => 'string',
					'default' => '13.7',
				),
				'pointReadabilityScore'    => array(
					'type'    => 'string',
					'default' => '37.2',
				),
			),
		)
	);
}

add_action( 'init', 'chatbotoutput_block_init' );
