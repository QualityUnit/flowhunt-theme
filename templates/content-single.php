<?php
global $post;
$page_header_args = array(
	'image'      => array(
		'src' => get_the_post_thumbnail_url( $post, 'big_image' ),
		'alt' => get_the_title(),
	),
	'title'      => get_the_title(),
	'text'       => do_shortcode( '[urlslab-generator id="2" input="{{page_url}}"]' ),
	'date'       => true,
	'toc'        => true,
	'imageUnder' => true,
);
$categories       = get_the_terms( $post->ID, 'category' );
if ( isset( $categories ) ) {
	$page_header_tags = array();
	foreach ( $categories as $category ) {
		$page_header_tags[0]['list'][] = array(
			'href'  => get_category_link( $category->term_id ),
			'title' => $category->name,
		);
	}
	if ( isset( $page_header_tags[0]['list'] ) ) {
		$page_header_args['tags'] = $page_header_tags;
	}
}

$related_args = array(
	'categories' => $categories,
);
?>
<div class="Post Post--sidebar-right" itemscope itemtype="http://schema.org/BlogPosting">
	<meta itemprop="url" content="<?= esc_url( get_permalink() ); ?>">
	<span itemprop="publisher" itemscope itemtype="http://schema.org/Organization"><meta itemprop="name" content="LiveAgent"></span>
	<?php get_template_part( 'lib/custom-blocks/compact-header', null, $page_header_args ); ?>

	<div class="Post__container mb-10">
		<div class="BlogPost__content Post__content">
			<div class="Content" itemprop="articleBody">
				<?php if ( ! empty( $page_header_args['image']['url'] ) ) { ?>
					<div class="Content__hero">
						<?php
						$image = $page_header_args['image'];
						?>
						<?php if ( isset( $image['src'] ) ) { ?>
								<img
									src="<?= esc_url( $image['src'] ); ?>"
									alt="<?= esc_attr( $image['alt'] ); ?>"
									class="Content__hero__img"
								>
						<?php } ?>
					</div>
				<?php } ?>

				<?php the_content(); ?>

				<div class="BlogPost__author-box" itemprop="author" itemscope itemtype="http://schema.org/Person">
					<div class="BlogPost__author-box__avatar">
						<meta itemprop="image" content="<?= esc_url( get_avatar_url( get_the_author_meta( 'ID' ), 220, 'gravatar_default', get_the_author() ) ); ?>"></meta>
						<?= get_avatar( get_the_author_meta( 'ID' ), 220, 'gravatar_default', get_the_author() ); ?>
					</div>

					<div class="BlogPost__author-box__content">
						<p class="BlogPost__author-box__content__name" itemprop="name"><?php the_author(); ?></p>
						<p class="BlogPost__author-box__content__description" itemprop="description"><?php the_author_meta( 'description' ); ?></p>
					</div>
				</div>

				<?php echo do_shortcode( '[urlslab-faq]' ); ?>

				<?php urlslab_display_related_resources(); ?>
			</div>
		</div>
		<?php require_once get_template_directory() . '/lib/components/post-sidebar.php'; ?>
	</div>
</div>
