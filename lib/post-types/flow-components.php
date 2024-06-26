<?php

add_action(
	'init',
	function () {
		$labels  = array(
			'name'           => _x( 'Flow components', 'Post Type General Name', 'flowhunt' ),
			'singular_name'  => _x( 'Flow component', 'Post Type Singular Name', 'flowhunt' ),
			'menu_name'      => __( 'Flow components', 'flowhunt' ),
			'name_admin_bar' => __( 'Flow components', 'flowhunt' ),
		);
		$rewrite = array(
			'slug'       => 'flow-components',
			'with_front' => true,
			'pages'      => true,
			'feeds'      => false,
		);
		$args    = array(
			'label'               => __( 'Flow components', 'flowhunt' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 30,
			'menu_icon'           => 'dashicons-book',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'post',
			'show_in_rest'        => true,
			'show_in_graphql'     => true,
			'graphql_single_name' => 'flow_component',
			'graphql_plural_name' => 'flow_components',
		);
		register_post_type( 'flow-components', $args );
	},
	0
);
