<?php
	set_custom_source( 'components/RelatedArticles', 'css' );

$maxposts = 4;

if ( isset( $args ) ) {
	if ( ! empty( $args['post_type'] ) ) {
		$posttype = $args['post_type'];
	}
	if ( ! empty( $args['maxposts'] ) ) {
		$maxposts = $args['maxposts'];
	}
	if ( ! empty( $args['categories'] ) ) {
		$categories = $args['categories'];
	}
}

	$query = array(
		'posts_per_page' => $maxposts,
		'post_type'      => array( $posttype ),
		'orderby'        => array( 'random', 'name' ),
		'tax_query'      => array(
			array(
				'taxonomy' => $posttype . '-categories',
				'field'    => 'slug',
				'terms'    => $categories[0]->slug,
			),
		),
	);

	if ( ! empty(
		$args['post_type']
	) && ! empty( $args['categories'] ) ) {
		?>

<div class="Related__Articles urlslab-skip-keywords">

  <div class="Related__Articles--title h2"><?php _e( 'Related articles in', 'flowhunt' ); ?> <?= isset( $categories[0] ) ? esc_html( $categories[0]->name ) : esc_html( __( 'articles', 'flowhunt' ) ); ?></div>
		<?php
		$query_related_posts = new WP_Query( $query );
		if ( $query_related_posts->have_posts() ) :
			while ( $query_related_posts->have_posts() ) :
				$query_related_posts->the_post();

				// Default image path
				$default_image_url = get_template_directory_uri() . '/assets/images/default-icon-features.svg?ver=' . THEME_VERSION;

				$related_articel_icon = get_post_meta( get_the_ID(), 'icon', true );

				?>
		<a class="Related__Articles--Article" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		  <div class="Related__Articles--Article__thumbnail">
				<?php if ( $related_articel_icon ) : ?>
					<?= wp_get_attachment_image( $related_articel_icon, 'full' ); ?>
				<?php else : ?>
				<img src="<?= esc_url( $default_image_url ); ?>" alt="<?php the_title(); ?>">
				<?php endif; ?>
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
<?php } ?>
