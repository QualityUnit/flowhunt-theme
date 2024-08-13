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
			$default_image_url = get_template_directory_uri() . '/assets/images/default-icon-features.svg?ver=' . THEME_VERSION;

			$thumbnail_icon = get_post_meta( get_the_ID(), 'icon', true );

			$posts[] = array(
				'title' => get_the_title(),
				'excerpt' => wp_trim_words( get_the_excerpt(), $atts['word_limit'], '...' ),
				'permalink' => get_permalink(),
				'featured_image' => $thumbnail_icon,
				'featured_image_default' => $default_image_url,
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
				<?php
				foreach ( $first_half as $post ) :
					?>
					<a class="posts-infinity-slider__item" href="<?= esc_url( $post['permalink'] ); ?>">
						<div class="posts-infinity-slider__item__image">
							<?php if ( empty( $post['featured_image'] ) ) : ?>
								<img src="<?= esc_url( $post['featured_image_default'] ); ?>" alt="<?= esc_attr( $post['title'] ); ?>">
							<?php else : ?>
								<?= wp_get_attachment_image( $post['featured_image'], 'full' ); ?>
							<?php endif; ?>
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
				<?php
				foreach ( $second_half as $post ) :
					?>
					<a class="posts-infinity-slider__item" href="<?= esc_url( $post['permalink'] ); ?>">
						<div class="posts-infinity-slider__item__image">
							<?php if ( empty( $post['featured_image'] ) ) : ?>
								<img src="<?= esc_url( $post['featured_image_default'] ); ?>" alt="<?= esc_attr( $post['title'] ); ?>">
							<?php else : ?>
								<?= wp_get_attachment_image( $post['featured_image'], 'full' ); ?>
							<?php endif; ?>
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
