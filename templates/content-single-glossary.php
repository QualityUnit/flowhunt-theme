<?php // @codingStandardsIgnoreLine
$page_header_logo = array(
	'src' => get_template_directory_uri() . '/assets/images/icon-book.svg?ver=' . THEME_VERSION,
	'alt' => __( 'Glossary', 'flowhunt' ),
);
if ( has_post_thumbnail() ) {
	$page_header_logo['src'] = get_the_post_thumbnail_url( $post, 'logo_thumbnail' );
}
$page_header_args = array(
	'image' => array(
		'src' => get_template_directory_uri() . '/assets/images/compact-header-glossary.png?ver=' . THEME_VERSION,
		'alt' => get_the_title(),
	),
	'logo'  => $page_header_logo,
	'title' => get_the_title(),
	'text'  => do_shortcode( '[urlslab-generator id="2" input="{{page_url}}"]' ),
	'toc'   => true,
);
$current_id       = apply_filters( 'wpml_object_id', $post->ID, 'glossary' );
$categories       = get_the_terms( $current_id, 'glossary-categories' );

$related_args = array(
	'post_type'  => 'glossary',
	'categories' => $categories,
);
?>
<div class="Post Post--sidebar-right" itemscope itemtype="http://schema.org/TechArticle">
	<meta itemprop="url" content="<?= esc_url( get_permalink() ); ?>">
	<meta itemprop="author" itemscope itemtype="http://schema.org/Person" content="<?= esc_attr( get_the_author_meta( 'display_name' ) ); ?>">
	<meta  itemprop="dateModified" content="<?= esc_attr( get_the_modified_time( 'F j, Y' ) ); ?>">
	<meta  itemprop="headline" content="<?= esc_attr( get_the_title() ); ?>">
	<meta  itemprop="image" content="<?= esc_attr( get_template_directory_uri() . '/assets/images/icon-book.svg?ver=' . THEME_VERSION ); ?>">
	<span itemprop="publisher" itemscope itemtype="http://schema.org/Organization"><meta itemprop="name" content="URLsLab"></span>
	<?php get_template_part( 'lib/custom-blocks/compact-header', null, $page_header_args ); ?>

	<div class="wrapper Post__container">

		<div class="Post__content">

			<div class="Content" itemprop="articleBody">

				<?php if ( ! empty( $page_header_args['image']['url'] ) ) { ?>
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

				<?php echo do_shortcode( '[urlslab-faq]' ); ?>
				<?php urlslab_display_related_resources(); ?>

			</div>
		</div>
		<?php require_once get_template_directory() . '/lib/components/post-sidebar.php'; ?>
	</div>
</div>
