<?php

add_action(
	'init',
	function () {
		$labels = array(
			'name'          => _x( 'Features Categories', 'Taxonomy General Name', 'flowhunt' ),
			'singular_name' => _x( 'Features Category', 'Taxonomy Singular Name', 'flowhunt' ),
			'menu_name'     => __( 'Categories', 'flowhunt' ),
		);
		$args   = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => false,
			'show_in_rest'      => true,
			'show_in_graphql'     => true,
			'graphql_single_name' => 'featureCategory',
			'graphql_plural_name' => 'featureCategories',
		);
		register_taxonomy( 'features-categories', array( 'features' ), $args );
	},
	0
);
