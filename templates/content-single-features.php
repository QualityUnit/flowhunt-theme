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
		'src' => get_template_directory_uri() . '/assets/images/compact-header-features-img.png?ver=' . THEME_VERSION,
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
	get_template_part( 'lib/custom-blocks/compact-header', null, $page_header_args );
	?>

	<div class="Post__container">

		<div class="Post__content">
			<div class="Content" itemprop="articleBody">
				<?php the_content(); ?>

				<div class="Related__Articles urlslab-skip-keywords">
					<div class="Related__Articles--title h2"><?php _e( 'Related', 'flowhunt' ); ?> <?= esc_html( $categories[0]->name ); ?></div>
					<?php
					$query_related_posts = new WP_Query(
						array(
							'posts_per_page' => 4,
							'post_type'      => array( 'features' ),
							'orderby'        => array( 'random', 'name' ),
							'tax_query'      => array(
								array(
									'taxonomy' => 'features-categories',
									'field'    => 'slug',
									'terms'    => $categories[0]->slug,
								),
							),
						)
					);
					if ( $query_related_posts->have_posts() ) :
						while ( $query_related_posts->have_posts() ) :
							$query_related_posts->the_post();
							?>
								<a class="Related__Articles--Article" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<div class="Related__Articles--Article__thumbnail">
											<?php the_post_thumbnail( 'person_thumbnail', array( 'alt' => get_the_title() ) ); ?>
									</div>
									<div class="Related__Articles--Article__content">
										<h5 class="Related__Articles--Article__title">
											<?php the_title(); ?>
										</h5>
										<p><?= esc_html( wp_trim_words( get_the_excerpt(), 30, '…' ) ); ?></p>
									</div>
									<svg class='icon icon-arrow'><use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#arrow-right' ); ?>"></use></svg>
								</a>
						<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
		<?php require_once get_template_directory() . '/lib/components/post-sidebar.php'; ?>
	</div>
</div>
