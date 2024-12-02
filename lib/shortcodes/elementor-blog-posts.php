<?php


function elementor_blog_posts( $atts ) {
	// set_custom_source( 'sidebar_toc', 'js' );
	set_custom_source( 'filter', 'js' );
	set_custom_source( 'components/ElementorBlogPosts', 'css' );

	$atts = shortcode_atts(
		array(
			'posts' => '5',
		),
		$atts,
		'elementor_blog_posts'
	);

	$categories = get_categories(); 
	ob_start();
	?>
<div class="Elementor__Blog">
  <ul class="list Elementor__Blog__items">
	<?php  

	foreach ( $categories as $category ) {
		if ( $category->count > 1 ) {
			$query_args = array(
				'posts_per_page' => $atts['posts'],
				'post_status'    => 'publish',
				'orderby'        => array( 'date', 'rand' ),
				'cat'            => $category->cat_ID,
			);
  
			/* Query Other Posts */
			$show_other_posts = new WP_Query( $query_args );
  
			while ( $show_other_posts->have_posts() ) :
				$show_other_posts->the_post();
	
				$category   = '';
				$categories = get_the_category();

				if ( ! empty( $categories ) ) {
					foreach ( $categories as $category_item ) {
						$category .= $category_item->slug;
						$category .= ' ';
					}
				}
				?>
	<li data-category="<?= esc_attr( $category ); ?>" class="Elementor__Blog__item" itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting"
				<?php
				post_class( 'Elementor__Blog__item' ); 
				?>
		>
		<a class="Elementor__Blog__item--thumbnailWrap" href="<?= esc_url( get_the_permalink() ); ?>">
			<div class="Elementor__Blog__item--thumbnail">
				<meta itemprop="image" content="<?= esc_url( get_the_post_thumbnail_url( '' ) ); ?>"></meta>
				<img style="opacity: 0; transition: opacity 0.2s;" data-src="<?= esc_url( get_the_post_thumbnail_url() ); ?>" alt="<?= esc_attr( get_the_title() ); ?>" />
			</div>
		</a>
	  <div class="Elementor__Blog__item--content">
			<div class="Elementor__Blog__item--meta">
				<div class="Elementor__Blog__item--meta__categories">
						<?php
						/* translators: %s: don't modify */
						$cats = get_the_taxonomies( 0, array( 'template' => __( '<span class="hidden">%s:</span><span>%l</span>' ) ) )['category'];
						$cats = str_replace( ',', '', $cats );
						$cats = str_replace( 'and', '', $cats );
						$cats = preg_replace( '/\<a(.+?)\<\/a>/', '<span$1</span>', $cats );
						echo wp_kses_post( $cats );
						?>
				</div>
				<span class="icn-calendar-date flex flex-align-center" itemprop="datePublished" content="<?= esc_attr( get_the_time( 'Y-m-d' ) ); ?>">
					<?php
					the_time( 'F j, Y' );
					?>
				</span>
			</div>
			<a href="<?= esc_url( get_the_permalink() ); ?>">
				<h3 class="Elementor__Blog__item--title" itemprop="name">
						<?php the_title(); ?>
				</h3>
			</a>
	  </div>
	</li>
			<?php endwhile; ?>
			<?php
		}
	}
		wp_reset_postdata();
	?>
  </ul>
</div>

		<?php
		return ob_get_clean();
}
		add_shortcode( 'elementor_blog_posts', 'elementor_blog_posts' );
