<?php
set_custom_source( 'pages/blog', 'css' );
set_source( false, 'components/BlogTopPost' );
set_custom_source( 'blogLazyLoad', 'js', array( 'app_js' ) );

$page_header_title = single_term_title( '', false );
$page_header_args  = array(
	'type'  => 'lvl-1',
	'title' => $page_header_title,
	'text'  => ! empty( term_description() ) ? term_description() : 'Explore the features and components for building AI tools and chatbots. Designed with modularity and flexibility at heart, FlowHunt is ready to support all your automation needs.',
);
if ( has_nav_menu( 'blog_filter_navigation' ) ) :
	$menu_locations          = get_nav_menu_locations();
	$menu_id                 = $menu_locations['blog_filter_navigation'];
	$archive_nav             = wp_get_nav_menu_items( $menu_id );
	$filter_items            = array(
		array(
			'type'  => 'link',
			'name'  => 'category',
			'title' => __( 'Category', 'ms' ),
		),
	);
	$filter_items_categories = array();
	foreach ( $archive_nav as $item ) :
		$current = get_queried_object_id() == $item->object_id;
		$active  = false;
		if ( $current ) :
			$filter_items[0]['active'] = $item->title;
			$active                    = true;
		endif;
		$filter_items_categories[] = array(
			'href'   => $item->url,
			'title'  => $item->title,
			'active' => $active,
		);
	endforeach;
	$filter_items[0]['items']   = $filter_items_categories;
	$page_header_args['filter'] = $filter_items;
endif;
?>
<div id="blog" class="Blog pos-relative" itemscope itemtype="http://schema.org/Blog">
	<?php get_template_part( 'lib/custom-blocks/compact-header', null, $page_header_args ); ?>

	<div class="Blog__container wrapper-md">
		<div class="blog__top__post">
			<?php
			if ( ! is_author() ) {
				$current_category = get_queried_object();
				$show_top_args    = array(
					'posts_per_page'      => 1,
					'ignore_sticky_posts' => 1,
					'post__in'            => get_option( 'sticky_posts' ),
					'orderby'             => 'date',
					'no_found_rows'       => true,
				);

				if ( $current_category instanceof WP_Term ) {
					$show_top_args['cat'] = $current_category->term_id;
				}

				$show_top_posts = new WP_Query( $show_top_args );

				while ( $show_top_posts->have_posts() ) :
					$show_top_posts->the_post();
					?>
					<div class="blog__top__post__item" itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="blog__top__post__inn slide__inn" itemprop="url">
							<div class="blog__top__post__inn--main">
								<div class="blog__top__post__image">
									
									<meta itemprop="image" content="<?= esc_url( get_the_post_thumbnail_url( '' ) ); ?>"></meta>
									<img data-src="<?= esc_url( get_the_post_thumbnail_url( '', 'box_archive_thumbnail' ) ); ?>" alt="<?= esc_attr( get_the_title() ); ?>" />
								</div>
								<div class="blog__top__post__content Blog__item__content">
									<div class="Blog__item__meta">
										<div class="Blog__item__meta__categories">
											<?php
											/* translators: %s: don't modify */
											$cats = get_the_taxonomies( 0, array( 'template' => __( '<span class="hidden">%s:</span><span>%l</span>' ) ) )['category'];
											$cats = str_replace( 'and', '', $cats );
											$cats = preg_replace( '/\<a(.+?)\<\/a>/', '<span$1</span>', $cats );
											echo wp_kses_post( $cats );
											?>
										</div>

										<div class="Blog__item__meta__date">
											<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 17 17" fill="none">
												<path d="M6.00036 1.7002C6.44219 1.7002 6.80036 2.05837 6.80036 2.5002V3.03353L10.5337 3.03353V2.5002C10.5337 2.05837 10.8919 1.7002 11.3337 1.7002C11.7755 1.7002 12.1337 2.05837 12.1337 2.5002V3.03353H12.667C13.2328 3.03353 13.7754 3.25829 14.1755 3.65837C14.5756 4.05844 14.8004 4.60107 14.8004 5.16686V13.1669C14.8004 13.7327 14.5756 14.2753 14.1755 14.6754C13.7754 15.0754 13.2328 15.3002 12.667 15.3002H4.66702C4.10123 15.3002 3.55861 15.0754 3.15853 14.6754C2.75845 14.2753 2.53369 13.7327 2.53369 13.1669L2.53369 5.16686C2.53369 4.60107 2.75845 4.05845 3.15853 3.65837C3.55861 3.25829 4.10123 3.03353 4.66702 3.03353H5.20036V2.5002C5.20036 2.05837 5.55853 1.7002 6.00036 1.7002ZM5.20036 4.63353H4.66702C4.52558 4.63353 4.38992 4.68972 4.2899 4.78974C4.18988 4.88976 4.13369 5.02541 4.13369 5.16686V7.03353L13.2004 7.03353V5.16686C13.2004 5.02541 13.1442 4.88976 13.0441 4.78974C12.9441 4.68972 12.8085 4.63353 12.667 4.63353H12.1337V5.16686C12.1337 5.60869 11.7755 5.96686 11.3337 5.96686C10.8919 5.96686 10.5337 5.60869 10.5337 5.16686V4.63353H6.80036V5.16686C6.80036 5.60869 6.44219 5.96686 6.00036 5.96686C5.55853 5.96686 5.20036 5.60869 5.20036 5.16686V4.63353ZM13.2004 8.63353H4.13369L4.13369 13.1669C4.13369 13.3083 4.18988 13.444 4.2899 13.544C4.38992 13.644 4.52558 13.7002 4.66702 13.7002H12.667C12.8085 13.7002 12.9441 13.644 13.0441 13.544C13.1442 13.444 13.2004 13.3083 13.2004 13.1669V8.63353ZM7.20036 10.5002C7.20036 10.0584 7.55853 9.7002 8.00036 9.7002H8.66702C9.10885 9.7002 9.46702 10.0584 9.46702 10.5002V12.5002C9.46702 12.942 9.10885 13.3002 8.66702 13.3002C8.2252 13.3002 7.86702 12.942 7.86702 12.5002V11.2891C7.48866 11.2257 7.20036 10.8966 7.20036 10.5002Z" />
											</svg>
											<span itemprop="datePublished" content="<?= esc_attr( get_the_time( 'Y-m-d' ) ); ?>">
									<?php
									the_time( 'F j, Y' );
									?>
									</span>
										</div>
									</div>
									<h3 class="blog__top__post__title Blog__slider__title" itemprop="name">
										<?php the_title(); ?>
									</h3>
									<p itemprop="abstract"><?= esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?>
										<span class="learn-more">
									<?php _e( 'Learn More', 'ms' ); ?>
									<svg width="15" height="13" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.514 0 7.37 1.146l4.525 4.542H0v1.625h11.895L7.37 11.854 8.514 13 15 6.5 8.514 0Z" />
										</svg>
								</span>
									</p>
								</div>
							</div>
							<svg width="100%" height="100%" preserveAspectRatio="xMidYMax meet" class="blog__top__post__inn--mask" viewBox="0 0 1120 336"
									 xmlns="http://www.w3.org/2000/svg" xml:space="preserve">
						<path
							d="M64 76.998c0-8.836 7.163-16 16-16h1088c8.84 0 16 7.17 16 16.006v104.994c0 8.837-7.63 15.744-15.23 20.26-9.38 5.58-15.77 15.932-15.77 26.74 0 10.808 6.39 21.16 15.77 26.74 7.6 4.516 15.23 11.423 15.23 20.26v104.994c0 8.836-7.16 16.006-16 16.006H80c-8.837 0-16-7.163-16-16v-105c0-8.837 7.629-15.744 15.225-20.26C88.611 250.158 95 239.806 95 228.998c0-10.808-6.389-21.16-15.775-26.74C71.629 197.742 64 190.835 64 181.998v-105Z"
							style="fill:#fff" transform="translate(-64 -60.998)" /></svg>
						</a>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php } ?>
		</div>
		<ul class="Blog__items Archive__columns list">
			<?php
			global $wp_query;

			/* Gets currenty category ID */
			$categories = get_the_category();

			// Get category ID
			if ( isset( $categories[1] ) ) {
				$category_id = $categories[1]->cat_ID;
			}

			$this_category = get_queried_object();
			$sticky_posts  = get_option( 'sticky_posts' );

			// Get posts in current category
			$category_posts = array();
			if ( $this_category instanceof WP_Term ) {
				$category_posts = get_posts(
					array(
						'category' => $this_category->term_id,
						'fields'   => 'ids',
					)
				);
			}

			// Get sticky posts in current category
			$category_sticky_posts = array_intersect( $sticky_posts, $category_posts );

			// Sort sticky posts by date
			rsort( $category_sticky_posts );

			// Get newest sticky post
			$newest_sticky_post = array_shift( $category_sticky_posts );

			// Query args
			$query_args = array(
				'posts_per_page' => 9,
				'post_status'    => 'publish',
				'orderby'        => 'date',
				'no_found_rows'  => true,
			);

			// If author page, query posts by author
			if ( is_author() ) {
				$user_id              = get_the_author_meta( 'ID' );
				$query_args['author'] = $user_id;

			} else {

				// If category page, query posts by category
				$query_args['ignore_sticky_posts'] = true;
				if ( $newest_sticky_post ) {
					$query_args['post__not_in'] = array( $newest_sticky_post );
				}
			}
			// If category has parent, query posts by parent category
			if ( ( $this_category && isset( $this_category->parent ) ) && 0 != $this_category->parent ) {
				$query_args['cat'] = $this_category->term_id;
			}

			/* Query Other Posts */
			$show_other_posts = new WP_Query( $query_args );
			$original_query   = $wp_query;
			$wp_query       = $show_other_posts; // @codingStandardsIgnoreLine

			// Loop through posts
			while ( $show_other_posts->have_posts() ) :
				$show_other_posts->the_post();

				// if post is sticky in current category, skip it
				if ( in_array( get_the_ID(), $category_sticky_posts ) ) {
					continue;
				}
				?>
				<li itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting" <?php post_class( 'Blog__item' ); ?>>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" itemprop="url">
						<div class="Blog__item__thumbnail">
							<meta itemprop="image" content="<?= esc_url( get_the_post_thumbnail_url( '' ) ); ?>"></meta>
							<img style="opacity: 0; transition: opacity 0.2s;" data-src="<?= esc_url( get_the_post_thumbnail_url() ); ?>" alt="<?= esc_attr( get_the_title() ); ?>" />
						</div>
						<div class="Blog__item__content">
							<div class="Blog__item__meta">
								<div class="Blog__item__meta__categories">
									<?php
									/* translators: %s: don't modify */
									$cats = get_the_taxonomies( 0, array( 'template' => __( '<span class="hidden">%s:</span><span>%l</span>' ) ) )['category'];
									$cats = str_replace( ',', '', $cats );
									$cats = str_replace( 'and', '', $cats );
									$cats = preg_replace( '/\<a(.+?)\<\/a>/', '<span$1</span>', $cats );
									echo wp_kses_post( $cats );
									?>
								</div>

								<div class="Blog__item__meta__date">
									<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 17 17" fill="none">
												<path d="M6.00036 1.7002C6.44219 1.7002 6.80036 2.05837 6.80036 2.5002V3.03353L10.5337 3.03353V2.5002C10.5337 2.05837 10.8919 1.7002 11.3337 1.7002C11.7755 1.7002 12.1337 2.05837 12.1337 2.5002V3.03353H12.667C13.2328 3.03353 13.7754 3.25829 14.1755 3.65837C14.5756 4.05844 14.8004 4.60107 14.8004 5.16686V13.1669C14.8004 13.7327 14.5756 14.2753 14.1755 14.6754C13.7754 15.0754 13.2328 15.3002 12.667 15.3002H4.66702C4.10123 15.3002 3.55861 15.0754 3.15853 14.6754C2.75845 14.2753 2.53369 13.7327 2.53369 13.1669L2.53369 5.16686C2.53369 4.60107 2.75845 4.05845 3.15853 3.65837C3.55861 3.25829 4.10123 3.03353 4.66702 3.03353H5.20036V2.5002C5.20036 2.05837 5.55853 1.7002 6.00036 1.7002ZM5.20036 4.63353H4.66702C4.52558 4.63353 4.38992 4.68972 4.2899 4.78974C4.18988 4.88976 4.13369 5.02541 4.13369 5.16686V7.03353L13.2004 7.03353V5.16686C13.2004 5.02541 13.1442 4.88976 13.0441 4.78974C12.9441 4.68972 12.8085 4.63353 12.667 4.63353H12.1337V5.16686C12.1337 5.60869 11.7755 5.96686 11.3337 5.96686C10.8919 5.96686 10.5337 5.60869 10.5337 5.16686V4.63353H6.80036V5.16686C6.80036 5.60869 6.44219 5.96686 6.00036 5.96686C5.55853 5.96686 5.20036 5.60869 5.20036 5.16686V4.63353ZM13.2004 8.63353H4.13369L4.13369 13.1669C4.13369 13.3083 4.18988 13.444 4.2899 13.544C4.38992 13.644 4.52558 13.7002 4.66702 13.7002H12.667C12.8085 13.7002 12.9441 13.644 13.0441 13.544C13.1442 13.444 13.2004 13.3083 13.2004 13.1669V8.63353ZM7.20036 10.5002C7.20036 10.0584 7.55853 9.7002 8.00036 9.7002H8.66702C9.10885 9.7002 9.46702 10.0584 9.46702 10.5002V12.5002C9.46702 12.942 9.10885 13.3002 8.66702 13.3002C8.2252 13.3002 7.86702 12.942 7.86702 12.5002V11.2891C7.48866 11.2257 7.20036 10.8966 7.20036 10.5002Z" />
											</svg>
									<span itemprop="datePublished" content="<?= esc_attr( get_the_time( 'Y-m-d' ) ); ?>">
									<?php
									the_time( 'F j, Y' );
									?>
									</span>
								</div>
							</div>

							<h3 class="Blog__item__title" itemprop="name">
								<?php the_title(); ?>
							</h3>
							<p itemprop="abstract">
								<?= esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?>

								<span class="learn-more">
									<?php _e( 'Learn More', 'ms' ); ?>
									<svg width="15" height="13" xmlns="http://www.w3.org/2000/svg">
										<path d="M8.514 0 7.37 1.146l4.525 4.542H0v1.625h11.895L7.37 11.854 8.514 13 15 6.5 8.514 0Z" />
										</svg>
								</span>
							</p>
						</div>
					</a>
				</li>
			<?php endwhile; ?>
			<?php
			$wp_query = $original_query; // @codingStandardsIgnoreLine
			wp_reset_postdata();
			?>
		</ul>
		<div class="Blog__items__loading invisible"><?php _e( 'Loading', 'ms' ); ?><span>.</span><span>.</span><span>.</span></div>
	</div>
</div>
