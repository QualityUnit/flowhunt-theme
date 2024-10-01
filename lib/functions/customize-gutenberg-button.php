<?php

function customize_gutenberg_button( $block_content, $block ) {
	if ( 'core/button' === $block['blockName'] ) {
		// Added custom class
		$block_content = str_replace( 'wp-block-button__link', 'wp-block-button__link Button Button--full Button--medium', $block_content );

		// Wrap text in <span>
		$block_content = preg_replace( '/<a (.*?)>(.*?)<\/a>/', '<a $1><span>$2</span></a>', $block_content );
	}
	return $block_content;
}
add_filter( 'render_block', 'customize_gutenberg_button', 10, 2 );
