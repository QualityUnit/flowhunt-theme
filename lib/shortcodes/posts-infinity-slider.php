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
		'posts_per_page' => 8, // Limit to 12 posts
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

	$query = new WP_Query( $args );
	$posts = array();

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();

			// Default image path
			$default_image_url = get_template_directory_uri() . '/assets/images/flows-templates-post-thumbnail.svg?ver=' . THEME_VERSION;

			// Get the SVG color meta value
			$thumbnail_color = get_post_meta( get_the_ID(), 'svg_color', true );
			if ( empty( $thumbnail_color ) ) {
				$thumbnail_color = '#d1d5db';
			}
			$svg_code = get_colored_svg( $thumbnail_color );

			// Initialize the featured_image variable
			$featured_image = '';

			// Custom image logic based on post type or taxonomy
			if ( 'features' === $atts['post_type'] && has_term( '', 'features-categories' ) ) {
				// Use SVG code for 'features' post type with specific taxonomy
				$featured_image = $svg_code;
			} else {
				// Use default image URL for other post types
				$featured_image = '<img src="' . esc_url( $default_image_url ) . '" alt="' . esc_attr( get_the_title() ) . '" />';
			}

			$posts[] = array(
				'title' => get_the_title(),
				'excerpt' => wp_trim_words( get_the_excerpt(), $atts['word_limit'], '...' ),
				'permalink' => get_permalink(),
				'featured_image' => $featured_image,
			);

		}
	}

	wp_reset_postdata();

	$first_half = array_slice( $posts, 0, 4 );
	$second_half = array_slice( $posts, 4 );

	ob_start();
	if ( ! empty( $posts ) ) :
		?>
		<div class="posts-infinity-slider" data-slider="first" data-speed="slow">
			<div class="posts-infinity-slider__items">
				<?php foreach ( $first_half as $post ) : ?>
					<a class="posts-infinity-slider__item" href="<?= esc_url( $post['permalink'] ); ?>">
						<div class="posts-infinity-slider__item__image">
							<?= $post['featured_image']; // phpcs:ignore ?>
						</div>
						<div class="posts-infinity-slider__item__content">
							<h3><?= esc_html( $post['title'] ); ?></h3>
							<p><?= esc_html( $post['excerpt'] ); ?></p>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="posts-infinity-slider" data-slider="second" data-direction="right" data-speed="slow">
			<div class="posts-infinity-slider__items">
				<?php foreach ( $second_half as $post ) : ?>
					<a class="posts-infinity-slider__item" href="<?= esc_url( $post['permalink'] ); ?>">
						<div class="posts-infinity-slider__item__image">
							<?= $post['featured_image']; // phpcs:ignore ?>
						</div>
						<div class="posts-infinity-slider__item__content">
							<h3><?= esc_html( $post['title'] ); ?></h3>
							<p><?= esc_html( $post['excerpt'] ); ?></p>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
		<script>
			document.addEventListener('DOMContentLoaded', () => {
				const postsInfinitySliders = document.querySelectorAll(".posts-infinity-slider");

				if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
					addAnimation();
				}

				function addAnimation() {
					postsInfinitySliders.forEach((slider) => {
						// Check if the animation has already been added
						if (slider.getAttribute("data-animated") !== "true") {
							slider.setAttribute("data-animated", "true");

							const scrollerInner = slider.querySelector(".posts-infinity-slider__items");
							if (!scrollerInner) return;

							const scrollerContent = Array.from(scrollerInner.children);

							scrollerContent.forEach((item) => {
								const duplicatedItem = item.cloneNode(true);
								duplicatedItem.setAttribute("aria-hidden", true);
								scrollerInner.appendChild(duplicatedItem);
							});
						}
					});
				}
			});
		</script>

		<?php
	endif;

	set_custom_source( 'shortcodes/PostsInfinitySlider', 'css' );

	return ob_get_clean();
}
add_shortcode( 'posts-infinity-slider', 'posts_infinity_slider' );
