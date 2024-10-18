<?php
add_filter( 'simple_register_metaboxes', 'flow_templates_metaboxes' );

function flow_templates_metaboxes( $metaboxes ) {

	$metaboxes[] = array(
		'id'        => 'flow-templates',
		'name'      => 'Attributes',
		'post_type' => array( 'flow-templates' ),
		'fields'    => array(
			array(
				'id'    => 'icon',
				'label' => 'Label',
				'type'  => 'image',
			),
			array(
				'id'          => 'chatbot',
				'label'       => 'Header Chatbot',
				'description' => 'Shows embedded chatbot in header',
				'type'        => 'textarea',
				'rows'        => '10',
			),
			array(
				'id'                => 'main',
				'label'             => 'Main article',
				'type'              => 'checkbox',
				'short_description' => 'Yes',
			),
			array(
				'id'                => 'chatbot',
				'label'             => 'ChatBot article',
				'type'              => 'checkbox',
				'short_description' => 'Yes',
			),
		),
	);

	return $metaboxes;
}

add_action(
	'graphql_register_types',
	function () {
		$checkbox_config = array(
			'type'        => 'Boolean',
			'description' => 'Is Main article',
			'resolve'     => function ( $post ) {
				$checkbox = get_post_meta( $post->ID, 'main', true );
				return ! empty( $checkbox ) ? $checkbox : '';
			},
		);

		register_graphql_field( 'flow-templates', 'main', $checkbox_config );
	}
);
