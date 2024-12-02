<?php

$metabox = array(
	'id'         => 'success-stories',
	'capability' => 'edit_posts',
	'name'       => 'Details',
	'post_type'  => array( 'success-stories' ),
	'priority'   => 'high',
	'args'       => array(
		array(
			'id'          => 'image',
			'label'       => 'Company Logo',
			'description' => '',
			'type'        => 'image',
		),
		array(
			'id'          => 'website',
			'label'       => 'Company Website',
			'description' => '',
			'type'        => 'text',
		),
	),
);

$author = array(
	'id'         => 'ss-person',
	'capability' => 'edit_posts',
	'name'       => 'Company Person',
	'post_type'  => array( 'success-stories' ),
	'priority'   => 'high',
	'args'       => array(
		array(
			'id'          => 'image',
			'label'       => 'Photo',
			'description' => '',
			'type'        => 'image',
		),
		array(
			'id'          => 'name',
			'label'       => 'Name',
			'description' => '',
			'type'        => 'text',
		),
		array(
			'id'          => 'position-company',
			'label'       => 'Position, company',
			'description' => '',
			'type'        => 'text',
		),
	),
);

new trueMetaBox( $author );
new trueMetaBox( $metabox );
