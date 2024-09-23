<?php // @codingStandardsIgnoreLine


$current_lang    = apply_filters( 'wpml_current_language', null );
$header_category = get_en_category( 'features', $post->ID );
do_action( 'wpml_switch_language', $current_lang );
$la_pricing_url   = __( '/pricing/', 'flowhunt' );
$page_header_logo = array(
	'src' => get_template_directory_uri() . '/assets/images/icon-custom-post_type.svg' . THEME_VERSION,
	'alt' => __( 'Integration', 'flowhunt' ),
);
if ( has_post_thumbnail() ) {
	$page_header_logo['src'] = get_the_post_thumbnail_url( $post, 'logo_thumbnail' );
}
$page_header_args = array(
	'image' => array(
		'src' => get_the_post_thumbnail_url( $post, 'person_thumbnail' ),
		'alt' => get_the_title(),
	),
	'logo'  => ! get_post_meta( get_the_ID(), 'main', true ) ? $page_header_logo : null,
	'title' => get_the_title(),
	'text'  => get_the_excerpt(),
	'toc'   => true,
);
$current_id       = apply_filters( 'wpml_object_id', $post->ID, 'tools' );
$categories       = get_the_terms( $current_id, 'tools-categories' );
$categories_url   = get_post_type_archive_link( 'tools' );
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
	'post_type'  => 'tools',
	'categories' => $categories,
);
?>

<div class="Post Post--sidebar-right" itemscope itemtype="http://schema.org/TechArticle">
	<meta itemprop="url" content="<?= esc_url( get_permalink() ); ?>">
	<span itemprop="publisher" itemscope itemtype="http://schema.org/Organization"><meta itemprop="name" content="LiveAgent"></span>

	<?php
	get_template_part( 'lib/custom-blocks/compact-header', null, $page_header_args );
	?>

	<div class="Post__container">

		<div class="Post__content">
			<div class="Content" itemprop="articleBody">

				<?php if ( ! empty( $page_header_args['image']['src'] ) ) { ?>
					<div class="Content__hero">
						<?php
						$image = $page_header_args['image'];
						?>
						<?php if ( isset( $image['src'] ) ) { ?>
							<img
								src="<?= esc_url( $image['src'] ); ?>"
								alt="<?= esc_attr( $image['alt'] ); ?>"
								class="Content__hero__img"
							>
						<?php } ?>
					</div>
				<?php } ?>


				<?php the_content(); ?>

				<?php get_template_part( 'lib/components/related-articles', null, $related_args ); ?>
			</div>
		</div>
		<?php require_once get_template_directory() . '/lib/components/post-sidebar.php'; ?>
	</div>
</div>
