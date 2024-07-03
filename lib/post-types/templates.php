<?php

add_action(
	'init',
	function () {
		$labels  = array(
			'name'           => _x( 'Templates', 'Post Type General Name', 'flowhunt' ),
			'singular_name'  => _x( 'Template', 'Post Type Singular Name', 'flowhunt' ),
			'menu_name'      => __( 'Templates', 'flowhunt' ),
			'name_admin_bar' => __( 'Templates', 'flowhunt' ),
		);
		$rewrite = array(
			'slug'       => 'templates',
			'with_front' => true,
			'pages'      => true,
			'feeds'      => false,
		);
		$args    = array(
			'label'               => __( 'Templates', 'flowhunt' ),
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
			'graphql_single_name' => 'template',
			'graphql_plural_name' => 'templates',
		);
		register_post_type( 'templates', $args );
	},
	0
);
