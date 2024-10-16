<?php

function wp_modify_header( $menu_objects, $args ) {

	if ( 'header_navigation' === $args->theme_location ) {
		foreach ( $menu_objects as $menu_object ) {
			$menu_id = ( $menu_object->object === 'page' ) ? $menu_object->object_id : $menu_object->ID;
			$title   = $menu_object->title;
			$url     = $menu_object->url;
			$classes = implode( ' ', $menu_object->classes );
			if ( str_contains( $classes, 'topPost' ) ) {
				$submenu_id       = $menu_object->ID;
				$sticky_post_args = array(
					'posts_per_page' => 1,
					'post__in'       => get_option( 'sticky_posts' ),
					'orderby'        => 'date',
				);
				$the_query        = new WP_Query( $sticky_post_args );

				while ( $the_query->have_posts() ) :
					$the_query->the_post();
					?>
					<li class="topPost">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
							<?php the_post_thumbnail( 'box_archive_thumbnail' ); ?>
							<?php the_title(); ?>
						</a>
					</li>
					<?php
					// $latest_post = get_the_ID();
				endwhile;
				wp_reset_postdata();
			}
			if ( $url !== '#' && ! str_contains( $classes, 'topPost' ) && ! str_contains( $classes, 'video' ) ) {
				?>
	
			<li class="<?= esc_attr( $classes ); ?>">
			<a href="<?= esc_url( $url ); ?>" >
				<?= esc_html( $title ); ?>
			</a>
			</li>
				<?php
			} elseif ( ! str_contains( $classes, 'topPost' ) && ! str_contains( $classes, 'video' ) ) {
				?>
				<li class="<?= esc_attr( $classes ); ?>">
						<?= esc_html( $title ); ?>
				</li>
				<?php

			}
		}   
	}

}
add_filter( 'wp_nav_menu_objects', 'wp_modify_header', 10, 2 );
