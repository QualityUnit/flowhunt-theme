<?php

function clients( $atts ) {
	$atts = shortcode_atts(
		array(
			'posts' => '5',
			'tag' => 'default',
		),
		$atts,
		'clients'
	);

	ob_start();
	?>

	<div class="Clients">
	<?php
	$args = array(
		'post_type'      => 'clients',
		'posts_per_page' => $atts['posts'],
	);

	if ( isset( $atts['tag'] ) ) {
		$args['meta_query'] = array(
			array(
				'key'     => 'clients_tag',
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

	<div class="Clients__item">
			<a href="<?= esc_url( get_post_custom_values( 'link' ) ? get_post_custom_values( 'link' )[0] : '' ); ?>" target="_blank"><?php the_post_thumbnail( 'logo', array( 'class' => 'urlslab-skip-lazy' ) ); ?></a>
		</div>

	<?php endwhile; ?>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
	</div>

	<?php
	set_source( false, 'shortcodes/Clients' );
	return ob_get_clean();
}
add_shortcode( 'clients', 'clients' );
