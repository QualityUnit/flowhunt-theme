<?php // @codingStandardsIgnoreLine
set_custom_source( 'layouts/Archive' );
set_custom_source( 'filter', 'js' );

$post_type_category = 'features-categories';
$categories         = array_unique( get_categories( array( 'taxonomy' => $post_type_category ) ), SORT_REGULAR );
if ( is_tax( $post_type_category ) ) :
	$page_header_title       = single_cat_title();
	$page_header_description = the_archive_description();
else :
	$page_header_title       = __( 'Features', 'flowhunt' );
	$page_header_description = __( 'Explore the features and components for building AI tools and chatbots. Designed with modularity and flexibility at heart, FlowHunt is ready to support all your automation needs.', 'flowhunt' );
endif;
$filter_items_categories = array(
	array(
		'checked' => true,
		'value'   => '',
		'title'   => __( 'Any', 'flowhunt' ),
	),
);
foreach ( $categories as $category ) :
	$filter_items_categories[] = array(
		'value' => $category->slug,
		'title' => $category->name,
	);
endforeach;
$filter_items     = array(
	array(
		'type'  => 'radio',
		'name'  => 'category',
		'title' => __( 'Category', 'flowhunt' ),
		'items' => $filter_items_categories,
	),
);
$page_header_args = array(
	'type'        => 'lvl-1',
	'is_infinity' => true,  // set true if header image is infinity to right
	'image'       => array(
		'src' => get_template_directory_uri() . '/assets/images/compact-header-features-img.png?ver=' . THEME_VERSION,
		'alt' => $page_header_title,
	),
	'title'       => $page_header_title,
	'text'        => $page_header_description,
	'filter'      => $filter_items,
	'search'      => array(
		'type' => $post_type_category,
	),
);
?>

<div class="Posts Features" itemScope itemType="http://schema.org/Collection">
	<?php get_template_part( 'lib/custom-blocks/compact-header', null, $page_header_args ); ?>

	<div class="wrapper-md">
		<ul class="Posts__items Archive__columns list">
			<?php
			while ( have_posts() ) :
				the_post();

				$category = '';


				$categories           = get_the_terms( 0, $post_type_category ); // post categories
				$post_item_icon       = get_post_meta( get_the_ID(), 'icon', true ); // post icon
				$post_item_pillar_img = get_the_post_thumbnail_url( get_the_ID() ); // pillar article image

				$its_main = get_post_meta( get_the_ID(), 'main', true ); // if it's pillar article

				if ( ! empty( $categories ) ) {
					foreach ( $categories as $category_item ) {
						$category .= $category_item->slug;
						$category .= ' ';
					}
				}
				?>

				<li class="Posts__item
					<?= $its_main ? 'main pillar full' : 'col-3'; ?>
					<?= esc_attr( $category ); ?> " data-category="<?= esc_attr( $category ); ?>" data-href="<?php the_permalink(); ?>">
					<a href="<?php the_permalink(); ?>" class="Posts__item--inn flex flex-align-center">
						<div class="Posts__item--header"
							<?php if ( ! $its_main ) : ?>
							<?php endif; ?>>
							<?php if ( $its_main ) : ?>
								<div class="Posts__item--image" style="background: url('<?= esc_url( $post_item_pillar_img ); ?>') left bottom no-repeat; background-size: cover;">
								</div>
							<?php else : ?>
								<div class="Posts__item--icon">
									<?= wp_get_attachment_image( $post_item_icon, 'full' ); ?>
								</div>
								<ul class="Posts__item--categories">
									<?php
									if ( ! empty( $categories ) ) {
										foreach ( $categories as $category_item ) {
											$category_name = $category_item->name;
											?>
											<li class="Posts__item--category category"><?= esc_html( $category_name ); ?></li>
											<?php
										}
									}
									?>
								</ul>
							<?php endif; ?>
						</div>

						<div class="Posts__item--content">
							<?php if ( $its_main ) { ?>
								<div class="Posts__item--header">
									<div class="Posts__item--icon">
										<?= wp_get_attachment_image( $post_item_icon, 'full' ); ?>
									</div>
								</div>
							<?php } ?>
							<h4 data-title><?php the_title(); ?></h4>
							<div class="Posts__item--excerpt" data-excerpt>
								<?= esc_html( wp_trim_words( get_the_excerpt(), 16 ) ); ?>
							</div>
						</div>
					</a>
				</li>

				<?php
				$category = '';
				?>

			<?php endwhile; ?>
		</ul>
	</div>

	<div class="block-improve-section wrapper-md">
		<?php
		echo do_shortcode( '[blockImprove]' );
		?>
	</div>


</div>
