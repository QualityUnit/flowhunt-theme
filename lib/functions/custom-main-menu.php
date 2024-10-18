<?php

function wp_modify_header( $menu_objects, $args ) {

	if ( 'header_navigation' === $args->theme_location ) {
		foreach ( $menu_objects as $menu_object ) {
			$menu_id    = ( $menu_object->object === 'page' ) ? $menu_object->object_id : $menu_object->ID;
			$title      = $menu_object->title;
			$url        = $menu_object->url;
			$classes    = implode( ' ', $menu_object->classes );
			$submenu_id = null;

			if ( str_contains( $classes, 'topPost' ) ) {
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
		}   
	}

}
add_filter( 'wp_nav_menu_objects', 'wp_modify_header', 10, 2 );

function wp_get_menu_array( $current_menu ) {
	$menu_name  = $current_menu;
	$locations  = get_nav_menu_locations();
	$menu       = wp_get_nav_menu_object( $locations[ $menu_name ] );
	$array_menu = wp_get_nav_menu_items( $menu->term_id ); 
	$menu       = array();
	foreach ( $array_menu as $m ) {
		if ( empty( $m->menu_item_parent ) ) {
			$menu[ $m->ID ]             = array();
			$menu[ $m->ID ]['ID']       = $m->ID;
			$menu[ $m->ID ]['title']    = $m->title;
			$menu[ $m->ID ]['url']      = $m->url;
			$menu[ $m->ID ]['classes']  = implode( ' ', $m->classes );
			$menu[ $m->ID ]['children'] = array();
		}
	}
	$submenu = array();
	foreach ( $array_menu as $m ) {
		if ( $m->menu_item_parent ) {
			$submenu[ $m->ID ]                                  = array();
			$submenu[ $m->ID ]['ID']                            = $m->ID;
			$submenu[ $m->ID ]['title']                         = $m->title;
			$submenu[ $m->ID ]['url']                           = $m->url;
			$submenu[ $m->ID ]['classes']                       = implode( ' ', $m->classes );
			$menu[ $m->menu_item_parent ]['children'][ $m->ID ] = $submenu[ $m->ID ];
		}
	}
	return $menu;
}
