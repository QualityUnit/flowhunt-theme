<?php
add_filter( 'simple_register_metaboxes', 'tools_metaboxes' );

function tools_metaboxes( $metaboxes ) {

	$metaboxes[] = array(
		'id'        => 'tools',
		'name'      => 'Attributes',
		'post_type' => array( 'tools' ),
		'fields'    => array(
			array(
				'id'    => 'icon',
				'label' => 'Icon',
				'type'  => 'image',
			),
			array(
				'id'          => 'headerchatbot',
				'label'       => 'Header Chatbot',
				'description' => 'Shows embedded chatbot in header',
				'type'        => 'textarea',
				'rows'        => '10',
			),
		),
	);

	return $metaboxes;
}
