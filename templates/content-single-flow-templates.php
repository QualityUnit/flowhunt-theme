<?php // @codingStandardsIgnoreLine
$current_lang    = apply_filters( 'wpml_current_language', null );
$header_category = get_en_category( 'flow-templates', $post->ID );
do_action( 'wpml_switch_language', $current_lang );
$la_pricing_url   = __( '/pricing/', 'flowhunt' );
$page_header_logo = array(
	'src' => get_template_directory_uri() . '/assets/images/icon-custom-post_type.svg' . THEME_VERSION,
	'alt' => __( 'Templates', 'flowhunt' ),
);
if ( has_post_thumbnail() ) {
	$page_header_logo['src'] = get_the_post_thumbnail_url( $post, 'logo_thumbnail' );
}
$page_header_args = array(
	'is_infinity'    => true,  // set true if header image is infinity to right
	'image'          => array(
		'src' => get_template_directory_uri() . '/assets/images/compact-header-templates-img.png?ver=' . THEME_VERSION,
		'alt' => get_the_title(),
	),
	'logo'           => ! get_post_meta( get_the_ID(), 'main', true ) ? $page_header_logo : null,
	'title'          => get_the_title(),
	'text'           => get_the_excerpt(),
	'toc'            => true,
	'header_chatbot' => get_post_meta( get_the_ID(), 'chatbot', true ),
);
$current_id       = apply_filters( 'wpml_object_id', $post->ID, 'flow-templates' );
$categories       = get_the_terms( $current_id, 'flow-templates-categories' );
$categories_url   = get_post_type_archive_link( 'flow-templates' );
if ( $categories && $categories_url ) {
	$new_tags = array(
		'title' => __( 'Categories', 'flowhunt' ),
	);
	foreach ( $categories as $category ) {
		$new_tags['list'][] = array(
			'href'  => $categories_url . '#' . $category->slug,
			'title' => $category->name,
		);
	}
	if ( isset( $new_tags['list'] ) ) {
		$page_header_args['tags'][] = $new_tags;
	}
}

$related_args = array(
	'post_type'  => 'flow-templates',
	'categories' => $categories,
);
?>

<div class="Post Post--sidebar-right" itemscope itemtype="http://schema.org/TechArticle">
	<meta itemprop="url" content="<?= esc_url( get_permalink() ); ?>">
	<span itemprop="publisher" itemscope itemtype="http://schema.org/Organization"><meta itemprop="name" content="LiveAgent"></span>


	<?php get_template_part( 'lib/custom-blocks/compact-header', null, $page_header_args ); ?>

	<?php
	print_r( get_post_meta( get_the_ID(), 'chatbot', true ) );
	?>

	<div class="wrapper Post__container">
		<div class="Post__content">
			<div class="Content" itemprop="articleBody">
				<?php the_content(); ?>

				<?php get_template_part( 'lib/components/related-articles', null, $related_args ); ?>
			</div>
		</div>
		<?php require_once get_template_directory() . '/lib/components/post-sidebar.php'; ?>
	</div>
</div>
