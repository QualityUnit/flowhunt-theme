<?php
add_filter( 'simple_register_metaboxes', 'flow_templates_metaboxes' );

function flow_templates_metaboxes( $metaboxes ) {

	$metaboxes[] = array(
		'id'        => 'flow_templates',
		'name'      => 'Flow Templates',
		'post_type' => array( 'flow-templates' ),
		'fields'    => array(
			array(
				'id'    => 'svg_color',
				'placeholder' => '#000',
				'description' => 'Each post has the same SVG. You just need to change the color. Use the HEX value. Default is #000 - Black.',
				'label' => 'SVG thumbnail color',
				'type'  => 'text',
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
