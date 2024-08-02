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
		'src' => get_template_directory_uri() . '/assets/images/features-post-header-bg.png?ver=' . THEME_VERSION,
		'alt' => get_the_title(),
	),
	'logo'  => ! get_post_meta( get_the_ID(), 'main', true ) ? $page_header_logo : null,
	'title' => get_the_title(),
	'text'  => get_the_excerpt(),
	'toc'   => true,
);
$current_id       = apply_filters( 'wpml_object_id', $post->ID, 'features' );
$categories       = get_the_terms( $current_id, 'features-categories' );
$categories_url   = get_post_type_archive_link( 'features' );
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
?>

<div class="Post Post--sidebar-right" itemscope itemtype="http://schema.org/TechArticle">
	<meta itemprop="url" content="<?= esc_url( get_permalink() ); ?>">
	<span itemprop="publisher" itemscope itemtype="http://schema.org/Organization"><meta itemprop="name" content="LiveAgent"></span>

	<?php 
	// get_template_part( 'lib/custom-blocks/compact-header', null, $page_header_args ); 
	?>

	<div class="Post__container">
		
		<div class="Post__content">
			<div class="Content" itemprop="articleBody">
				<?php the_content(); ?>

				<div class="Post__content--Related urlslab-skip-keywords">
					<div class="Post__content--Related__title h4"><?php _e( 'Related', 'ms' ); ?></div>
					<?php
					$query_related_posts = new WP_Query(
						array(
							'posts_per_page' => 4,
							'orderby'        => array( 'random', 'name' ),
						)
					);
					if ( $query_related_posts->have_posts() ) :
						while ( $query_related_posts->have_posts() ) :
							$query_related_posts->the_post();
							?>
							<div class="BlogPost__articles__article">
								<div class="BlogPost__articles__article__thumbnail">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php the_post_thumbnail( 'person_thumbnail', array( 'alt' => get_the_title() ) ); ?>
									</a>
								</div>
								<p class="BlogPost__articles__article__title"><a href="<?php the_permalink(); ?>"
																																 title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
		<?php require_once get_template_directory() . '/lib/components/post-sidebar.php'; ?>
	</div>
</div>
