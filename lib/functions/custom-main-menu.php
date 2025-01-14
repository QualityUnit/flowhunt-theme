<?php

/* This creates custom main menu to show Top blog post and menu with custom image for ie. Tour video.

	Each menu item that has submenu (ie. Solutions > menu) has to have .submenu class and either col-2 or col-3 class
	to show items side by side.

	To have Top Blog Post showing up, additional class for submenu subitem has to be added – .topBlog
	Same for Custom Image (like Products > Tour) – class customImage to subitem as well as name of the image from /assets/images
	ie. menu_tour-card_png

	Please notice that filename+extension has to be in class in form of filename_(subscore)[ext], ie ending _jpg or _png

	Classes, Title attribute etc. can be showed up in WP Menu via Screen Options menu at the top of the WP dashboard.
*/

function menu_block( $child ) {

	if ( str_contains( $child['classes'], 'topPost' ) ) {
		$sticky_post_args = array(
			'posts_per_page' => 1,
			'post__in'       => get_option( 'sticky_posts' ),
			'orderby'        => 'date',
			'order'          => 'desc',
		);
		$the_query        = new WP_Query( $sticky_post_args );

		$current_url = preg_replace( '/\/blog\/([^\/]+)\//', '$1', $_SERVER['REQUEST_URI'] ); // @codingStandardsIgnoreLine

		while ( $the_query->have_posts() ) :
			$the_query->the_post();

			$active = get_post_field( 'post_name', get_post() ) == $current_url ? 'active' : '';
			?>
			<li class="submenu__right topPost <?= esc_attr( $active ); ?>">
				<span class="section_title"><?= ! empty( $child['top_title'] ) ? esc_html( $child['top_title'] ) : esc_html( __( 'Top blog post', 'flowhunt' ) ); ?></span>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
					<div class="submenu-item__image"><?php the_post_thumbnail( 'box_archive_thumbnail' ); ?></div>
					<div class="submenu-item__data">
						<h3 class="submenu-item__title"><?php the_title(); ?></h3>
						<p class="submenu-item__description"><?= esc_html( wp_trim_words( get_the_excerpt(), 10, '…' ) ); ?></p>
						<p class="submenu-item__learn-more"><?php _e( 'Learn more', 'flowhunt' ); ?><svg class="icon icon-chevron-right"><use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#chevron-right' ); ?>"></use></svg></p>
					</div>
				</a>
			</li>
								<?php
		endwhile;
		wp_reset_postdata();
	} elseif ( str_contains( $child['classes'], 'customImage' ) ) {
		?>
		<li class="submenu__right customImage <?= esc_attr( $child['active'] ); ?>">
			<span class="section_title"><?= ! empty( $child['top_title'] ) ? esc_html( $child['top_title'] ) : esc_html( $child['title'] ); ?></span>
			<a href="<?= esc_url( $child['url'] ); ?>" title="<?= esc_attr( $child['title'] ); ?>">
				<div class="submenu-item__image"><img src="<?= esc_url( get_template_directory_uri() . '/assets/images/' . $child['image'] ); ?>" alt="<?= esc_attr( $child['title'] ); ?>" /></div>
				<h3 class="submenu-item__title"><?= esc_html( $child['title'] ); ?><span class="icon-wrapper"><svg class="icon icon-chevron-right"><use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#chevron-right' ); ?>"></use></svg></span></h3>
				<p class="submenu-item__description"><?= esc_html( $child['description'] ); ?></p>
			</a>
		</li>
			<?php
	} else {
		?>

	<li class="submenu-item <?= esc_attr( $child['active'] ); ?>">
		<a class="flex" href="<?= esc_url( $child['url'] ); ?>" title="<?= esc_attr( $child['title'] ); ?>">
		<?php
		if ( ! empty( $child['icon'] ) ) {
			?>
			<svg class="submenu-item__icon">
				<use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#' . $child['icon'] ); ?>"></use>
			</svg>
					<?php } ?>
			<div class="submenu-item__data">
				<h3 class="submenu-item__title"><?= esc_html( $child['title'] ); ?></h3>
				<p class="submenu-item__description"><?= esc_html( $child['description'] ); ?></p>
				<p class="submenu-item__learn-more"><?php _e( 'Learn More', 'flowhunt' ); ?><svg class="icon icon-arrow-out"><use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#arrow-out' ); ?>"></use></svg></p>
			</div>
		</a>
	</li>

		<?php 
	}
}


function wp_get_menu_array( $current_menu ) {
	$menu_name  = $current_menu;
	$locations  = get_nav_menu_locations();
	$menu       = wp_get_nav_menu_object( $locations[ $menu_name ] );
	$array_menu = wp_get_nav_menu_items( $menu->term_id ); 
	$menu       = array();
	// print_r( $array_menu );
	foreach ( $array_menu as $m ) {
		$active = ( parse_url( $m->url, PHP_URL_PATH ) == $_SERVER['REQUEST_URI'] ) ? 'active' : ''; // @codingStandardsIgnoreLine
		if ( empty( $m->menu_item_parent ) ) {
			$menu[ $m->ID ]                = array();
			$menu[ $m->ID ]['ID']          = $m->ID;
			$menu[ $m->ID ]['title']       = $m->title;
			$menu[ $m->ID ]['top_title']   = $m->attr_title;
			$menu[ $m->ID ]['url']         = $m->url;
			$menu[ $m->ID ]['description'] = $m->description;
			$menu[ $m->ID ]['classes']     = implode( ' ', $m->classes );
			$menu[ $m->ID ]['active']      = $active;
			$menu[ $m->ID ]['children']    = array();
		}
	}
	$submenu = array();
	foreach ( $array_menu as $m ) {
		$active = ( parse_url( $m->url, PHP_URL_PATH ) == $_SERVER['REQUEST_URI'] ) ? 'active' : ''; // @codingStandardsIgnoreLine

		if ( $m->menu_item_parent ) {
			$ext = '(jpg|png|webp|gif|svg)';
			preg_match( "/\b(icn-[^\s]+\b)/i", implode( ' ', $m->classes ), $icon_matches );
			preg_match( "/\b([^\s]+_" . $ext . ")\b/i", implode( ' ', $m->classes ), $image_matches );

			$icon  = ! empty( $icon_matches ) ? str_replace( 'icn-', '', $icon_matches[1] ) : '';
			$image = ! empty( $image_matches ) ? preg_replace( '/(.+?)_(jpg|png|webp|gif|svg)/i', '$1.$2', $image_matches[1] ) : '';
			
			$submenu[ $m->ID ]                                  = array();
			$submenu[ $m->ID ]['ID']                            = $m->ID;
			$submenu[ $m->ID ]['title']                         = $m->title;
			$submenu[ $m->ID ]['top_title']                     = $m->attr_title;
			$submenu[ $m->ID ]['url']                           = $m->url;
			$submenu[ $m->ID ]['description']                   = $m->description;
			$submenu[ $m->ID ]['classes']                       = implode( ' ', $m->classes );
			$submenu[ $m->ID ]['active']                        = $active;
			$submenu[ $m->ID ]['icon']                          = $icon;
			$submenu[ $m->ID ]['image']                         = $image;
			$menu[ $m->menu_item_parent ]['children'][ $m->ID ] = $submenu[ $m->ID ];
		}
	}
	foreach ( $menu as $item ) :
		?>
	<li class="menu-item 
		<?=
		esc_attr( ! empty( $item['children'] ) ? 'menu-item-has-children' : '' );
		esc_attr( $item['active'] );
		?>
	" data-id="<?= esc_attr( $item['ID'] ); ?>">
		<a href="<?= esc_url( $item['url'] ); ?>" title="<?= esc_attr( $item['title'] ); ?>"><?= esc_html( $item['title'] ); ?></a>
		<?php if ( ! empty( $item['children'] ) ) : ?>
		<ul class=" <?= esc_attr( $item['classes'] ); ?>" data-title="<?= esc_attr( ! empty( $item['top_title'] ) ? $item['top_title'] : $item['title'] ); ?>">
			<?php
			foreach ( $item['children'] as $child ) : 
				menu_block( $child );
			endforeach;
			?>
		</ul>
		<?php endif; ?>
	</li>
			<?php
	endforeach;
}
