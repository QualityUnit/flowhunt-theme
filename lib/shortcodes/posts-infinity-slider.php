<?php

function posts_infinity_slider( $atts ) {
	$atts = shortcode_atts(
		array(
			'post_type' => 'post', // default post type
			'taxonomy'  => '', // default taxonomy
			'term'      => '', // default term
			'word_limit' => 12, // default word limit for excerpt
		),
		$atts,
		'posts_infinity_slider'
	);

	$args = array(
		'post_type' => $atts['post_type'],
		'posts_per_page' => 12, // Limit to 12 posts
		'orderby' => 'date',
		'order' => 'DESC',
	);

	if ( ! empty( $atts['taxonomy'] ) && ! empty( $atts['term'] ) ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => $atts['taxonomy'],
				'field'    => 'slug',
				'terms'    => $atts['term'],
			),
		);
	}

	$query = new WP_QUERY( $args );
	$posts = array();

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$posts[] = array(
				'title' => get_the_title(),
				'excerpt' => wp_trim_words( get_the_excerpt(), $atts['word_limit'], '...' ),
				'permalink' => get_permalink(),
				'featured_image' => get_template_directory_uri() . '/assets/images/flows-templates-post-thumbnail.svg?ver=' . THEME_VERSION,
			);
		}
	}
	wp_reset_postdata();

	ob_start();
	if ( ! empty( $posts ) ) :
		?>
		<div class="posts-moving-wrapper">
			<div class="posts-moving-rows">
				<?php foreach ( array_merge( $posts, $posts ) as $index => $post ) : // Duplicate posts for seamless scrolling ?>
					<a href="<?= esc_url( $post['permalink'] ); ?>" class="posts-moving-rows__card <?= $index < 6 || ( $index >= 12 && $index < 18 ) ? 'first-row' : 'second-row'; ?>">
						<div class="posts-moving-rows__image">
							<img src="<?= esc_url( $post['featured_image'] ); ?>" alt="<?= esc_attr( $post['title'] ); ?>">
						</div>
						<div class="posts-moving-rows__content">
							<h3 class="posts-moving-rows__title"><?= esc_html( $post['title'] ); ?></h3>
							<p class="posts-moving-rows__desc"><?= esc_html( $post['excerpt'] ); ?></p>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
		<?php
	endif;

	set_custom_source( 'shortcodes/PostsInfinitySlider', 'css' );

	return ob_get_clean();
}
add_shortcode( 'posts-infinity-slider', 'posts_infinity_slider' );


