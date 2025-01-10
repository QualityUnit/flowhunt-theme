<?php

function menu_block( $child ) {

	if ( str_contains( $child['classes'], 'topPost' ) ) {
		$sticky_post_args = array(
			'posts_per_page' => 1,
			'post__in'       => get_option( 'sticky_posts' ),
			'orderby'        => 'date',
			'order'          => 'desc',
		);
		$the_query        = new WP_Query( $sticky_post_args );

		while ( $the_query->have_posts() ) :
			$the_query->the_post();
			?>
			<li class="submenu__right">
				<?php echo( ! empty( $child['top_title'] ) ? esc_html( $child['top_title'] ) : esc_html( __( 'Top blog post', 'flowhunt' ) ) ); ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
						<?php the_post_thumbnail( 'box_archive_thumbnail' ); ?>
					<h3 class="menu-item__title"><?php the_title(); ?></h3>
					<p class="menu-item__description"><?= esc_html( wp_trim_words( get_the_excerpt(), 10, '…' ) ); ?></p>
				</a>
			</li>
								<?php
		endwhile;
		wp_reset_postdata();
	} else {
		?>

	<li data-id="<?= esc_attr( $child['ID'] ); ?>">
		<a class="flex" href="<?= esc_url( $child['url'] ); ?>" title="<?= esc_attr( $child['title'] ); ?>">
		<?php
		if ( ! empty( $child['icon'] ) ) {
			?>
		<svg class="menu-item__icon">
			<use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#' . $child['icon'] ); ?>"></use>
		</svg>
				<?php } ?>
		<div class="menu-item__data">
			<h3 class="menu-item__title"><?= esc_html( $child['title'] ); ?></h3>
			<p class="menu-item__description"><?= esc_html( $child['description'] ); ?></p>
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
	foreach ( $array_menu as $m ) {
		if ( empty( $m->menu_item_parent ) ) {
			$menu[ $m->ID ]                = array();
			$menu[ $m->ID ]['ID']          = $m->ID;
			$menu[ $m->ID ]['title']       = $m->title;
			$menu[ $m->ID ]['top_title']   = $m->attr_title;
			$menu[ $m->ID ]['url']         = $m->url;
			$menu[ $m->ID ]['description'] = $m->description;
			$menu[ $m->ID ]['classes']     = implode( ' ', $m->classes );
			$menu[ $m->ID ]['children']    = array();
		}
	}
	$submenu = array();
	foreach ( $array_menu as $m ) {
		if ( $m->menu_item_parent ) {
			$icn                              = 'icn-';
			$icon                             = array_filter( //Find first occurence of icn- string in sub menu item classes
				$m->classes,
				function( $var ) use ( $icn ) {
					return preg_match( "/\b$icn\b/i", $var );
				} 
			);
			$submenu[ $m->ID ]                = array();
			$submenu[ $m->ID ]['ID']          = $m->ID;
			$submenu[ $m->ID ]['title']       = $m->title;
			$submenu[ $m->ID ]['top_title']   = $m->attr_title;
			$submenu[ $m->ID ]['url']         = $m->url;
			$submenu[ $m->ID ]['description'] = $m->description;
			$submenu[ $m->ID ]['classes']     = implode( ' ', $m->classes );
			$submenu[ $m->ID ]['icon']        = ! empty( $icon ) ? str_replace( 'icn-', '', $icon[0] ) : '';
			$menu[ $m->menu_item_parent ]['children'][ $m->ID ] = $submenu[ $m->ID ];
		}
	}
	foreach ( $menu as $item ) :
		?>
	<li class="menu-item" data-id="<?= esc_attr( $item['ID'] ); ?>">
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
