<?php

function success_stories( $atts ) {
	$atts = shortcode_atts(
		array(
			'posts' => '5',
			'tag' => 'default',
		),
		$atts,
		'success-stories'
	);

	$access_post_type_for_elementor = array( 'services', 'solutions' );
	$current_post_type = get_post_type();

	ob_start();
	?>

	<ul class="SuccessStoriesGrid <?= ( is_page() || is_page_template( 'front-page.php' ) || is_page_template( 'page.php' ) || in_array( $current_post_type, $access_post_type_for_elementor ) ) ? 'SuccessStoriesGrid__elementor' : null; ?>">
	<?php
	$args = array(
		'post_type'      => 'success-stories',
		'posts_per_page' => $atts['posts'],
	);

	if ( isset( $atts['tag'] ) ) {
		$args['meta_query'] = array(
			array(
				'key'     => 'success-stories_tag',
				'value'   => $atts['tag'],
				'compare' => 'LIKE',
			),
		);
	}

	$query_clients_posts = new WP_Query( $args );

	if ( $query_clients_posts->have_posts() ) :
		while ( $query_clients_posts->have_posts() ) :
			$query_clients_posts->the_post();
			?>

		<li class="SuccessStoriesGrid__item">
			<p class="SuccessStoriesGrid__text"><?= esc_html( get_the_excerpt() ); ?></p>
			<div class="SuccessStoriesGrid__info flex flex-align-center">
				<div class="SuccessStoriesGrid__person flex flex-align-center">
					<?= get_post_custom_values( 'ss-person_image' ) ? wp_get_attachment_image( get_post_custom_values( 'ss-person_image' )[0], 'logo_thumbnail', false, array( 'class' => 'SuccessStoriesGrid__personImage' ) ) : null; ?>
					<div class="SuccessStoriesGrid__personInfo">
						<strong><?= esc_html( get_post_custom_values( 'ss-person_name' )[0] ); ?></strong>
						<p><?= esc_html( get_post_custom_values( 'ss-person_position-company' )[0] ); ?></p>
					</div>
				</div>
				<a class="SuccessStoriesGrid__companyLogo" href="<?= esc_url( get_post_custom_values( 'success-stories_success-stories-website' ) ? get_post_custom_values( 'success-stories_success-stories-website' )[0] : null ); ?>" target="_blank">
					<?= get_post_custom_values( 'success-stories_image' ) ? wp_get_attachment_image( get_post_custom_values( 'success-stories_image' )[0], 'logo', false, array( 'class' => 'SuccessStoriesGrid__logo' ) ) : null; ?>
				</a>
			</div>
		</li>

	<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
	</ul>

	<?php
	return ob_get_clean();
}
add_shortcode( 'success-stories', 'success_stories' );
