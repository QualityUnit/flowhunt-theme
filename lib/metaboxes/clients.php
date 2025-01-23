<?php

$metabox = array(
	'id'         => 'clients',
	'capability' => 'edit_posts',
	'name'       => 'Client',
	'post_type'  => array( 'clients' ),
	'priority'   => 'high',
	'args'       => array(
		array(
			'id'          => 'link',
			'label'       => 'Company Website',
			'description' => '',
			'type'        => 'text',
		),
		array(
			'label'        => 'Tag',
			'id'           => 'tag',
			'type'         => 'multiselect',
			'args'      => array(
				'default'      => 'Default',
				'training'  => 'AI Training',
			),
		),
	),
);

new trueMetaBox( $metabox );
