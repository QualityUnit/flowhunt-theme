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
			$clients_link = get_post_meta( get_the_ID(), 'clients_link', true );
			?>

			<div class="Clients__item">
				<?php if ( ! empty( $clients_link ) ) : ?>
					<a href="<?php echo esc_url( $clients_link ); ?>" target="_blank" title="<?php the_title(); ?>">
						<?php the_post_thumbnail( 'logo', array( 'class' => 'urlslab-skip-lazy' ) ); ?>
					</a>
				<?php else : ?>
					<?php the_post_thumbnail( 'logo', array( 'class' => 'urlslab-skip-lazy' ) ); ?>
				<?php endif; ?>
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
