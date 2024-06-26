<?php

add_action(
	'init',
	function () {
		$labels  = array(
			'name'           => _x( 'Pricing tables', 'Post Type General Name', 'flowhunt' ),
			'singular_name'  => _x( 'Pricing table', 'Post Type Singular Name', 'flowhunt' ),
			'menu_name'      => __( 'Pricing tables', 'flowhunt' ),
			'name_admin_bar' => __( 'Pricing table', 'flowhunt' ),
		);
		$rewrite = array(
			'slug'       => 'pricing-table',
			'with_front' => false,
			'pages'      => false,
			'feeds'      => false,
		);
		$args    = array(
			'label'               => __( 'Pricing', 'flowhunt' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'revisions' ),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 50,
			'menu_icon'           => 'dashicons-editor-table',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => false,
			'rewrite'             => $rewrite,
			'capability_type'     => 'post',
			'show_in_rest'        => true,
			'show_in_graphql'     => true,
			'graphql_single_name' => 'pricing_table',
			'graphql_plural_name' => 'pricing_tables',
		);
		register_post_type( 'pricing_tables', $args );
	},
	0
);
