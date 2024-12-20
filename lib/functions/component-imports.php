<?php

function components_imports( $content ) {
	$blocks = array(
		'HorizontalTabs'                => 'components/HorizontalTabs',
		'Block__red'                    => 'components/BlockRed',
		'Block__meet'                   => 'components/BlockMeet',
		'Block__illustration'           => 'components/BlockIllustration',
		'Block__background'             => 'components/BlockBackground',
		'BlockLinks'                    => 'components/BlockLinks',
		'BlockSimple'                   => 'components/BlockSimple',
		'BlockVideo'                    => 'components/BlockVideo',
		'ImageSwitcher'                 => 'components/ImageSwitcher',
		'SuccessStoriesGrid'            => 'components/SuccessStoriesGrid',
		'Modules'                       => 'components/BlockModules',
		'FormIcons'                     => 'components/FormIcons',
		'urlslab-block-tableofcontents' => 'components/UrlslabTOC',
	);

	// Array value in form of array, first is script name, second is dependency id
	$scripts = array(
		'/\<div.+class="FilterMenu.+/' => array( 'filterMenu' ),
		'[data-lightbox="gallery"]'    => array( 'splide' ),
		'[data-lightbox="youtube"]'    => array( 'splide' ),
		'/data-lightbox="gallery/'     => array( 'custom_lightbox', 'splide' ),
		// '/data-scroll/'                => array( 'data-scroll', 'gsap-js' ),
		// '/data-lightbox="youtube/'         => array( 'custom_lightbox_youtube', 'splide' ),
		// '/class=.+Block--video/'           => array( 'custom_lightbox_youtube', 'splide' ),
		// '/class=.+GutenbergVideo/'         => array( 'custom_lightbox_youtube', 'splide' ),
		'/\<table.+/'                  => array( 'responsiveTable' ),
	);

	if ( ! $content ) {
		return $content;
	}

	$dom = new DOMDocument();
	libxml_use_internal_errors( true );
	$dom->loadHTML( mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' ) );
	libxml_clear_errors();
	$xpath = new DOMXPath( $dom );
	
	foreach ( $blocks as $class => $csspath ) {
		$id           = strtolower( $class );
		$found_blocks = $xpath->query( './/*[contains(@class, "' . $class . '")]' );
	
		if ( isset( $found_blocks[0] ) || ( isset( $_GET['action'] ) && ( 'edit' === $_GET['action'] ) ) || isset( $_GET['elementor-preview'] ) ) {
			wp_enqueue_style( $id, get_template_directory_uri() . '/assets/dist/' . $csspath . isrtl() . wpenv() . '.css', false, THEME_VERSION );
		}
	}

	foreach ( $scripts as $selector => $runscript ) {
		$found_blocks = preg_match( $selector, $content );
		if ( $found_blocks || ( isset( $_GET['action'] ) && ( 'edit' === $_GET['action'] ) ) || isset( $_GET['elementor-preview'] ) ) {
			set_custom_source( $runscript[0], 'js', isset( $runscript[1] ) );
		}
	}

	$dom->removeChild( $dom->doctype );
	$content = $dom->saveHtml();
	$content = str_replace( '<html><body>', '', $content );
	$content = str_replace( '</body></html>', '', $content );
	return $content;
}

add_filter( 'the_content', 'components_imports' );
add_action( 'admin_enqueue_scripts', 'components_imports' );
