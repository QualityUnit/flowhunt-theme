<?php

add_action(
	'init',
	function () {
		$labels = array(
			'name'          => _x( 'Flow Templates Categories', 'Taxonomy General Name', 'flowhunt' ),
			'singular_name' => _x( 'Flow Template Category', 'Taxonomy Singular Name', 'flowhunt' ),
			'menu_name'     => __( 'Categories', 'flowhunt' ),
		);
		$args   = array(
			'labels'              => $labels,
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_admin_column'   => true,
			'show_in_nav_menus'   => true,
			'show_tagcloud'       => false,
			'show_in_rest'        => true,
			'show_in_graphql'     => true,
			'graphql_single_name' => 'templateCategory',
			'graphql_plural_name' => 'templatesCategory',
		);
		register_taxonomy( 'flow-templates-categories', array( 'flow-templates' ), $args );
	},
	0
);
