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

				<div class="Post__content__resources">
					<div class="Post__sidebar__title h4"><?php _e( 'Related Articles', 'ms' ); ?></div>

					<div class="SimilarSources">
						<?php echo do_shortcode( '[urlslab-related-resources related-count="4" show-image="true" show-summary="true"]' ); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="Post__sidebar urlslab-skip-keywords">
			<div class="Post__sidebar__inn">
				<?php if ( sidebar_toc() !== false ) { ?>
					<div class="SidebarTOC Post__SidebarTOC">
						<ul class="SidebarTOC__content">
							<?= wp_kses_post( sidebar_toc() ); ?>
						</ul>
					</div>
				<?php } ?>
				<div class="Signup__sidebar-wrapper">
					<h4>
						<?=
						esc_html( 'Try Flowhunt today', 'flowhunt' );
						?>
					</h4>
					<p>
						<?=
						esc_html( 'Handle all support channels in one solution', 'flowhunt' );
						?>
					</p>
					<a class="Button Button--full pt-s pb-s" href="<?= esc_url( '#0' ); ?>" target="_blank"><?= esc_html( 'Get started for FREE', 'flowhunt' ); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
