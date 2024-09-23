<?php
global $post;
$page_header_args = array(
	'image' => array(
		'src' => get_the_post_thumbnail_url( $post, 'person_thumbnail' ),
		'alt' => get_the_title(),
	),
	'title' => get_the_title(),
	'text'  => '', // do_shortcode( '[urlslab-generator id="4"]' ) that was in the original code
	'date'  => true,
	'toc'   => true,
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

	<div class="wrapper Post__container">
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
						<p class="BlogPost__author-box__content__position"><?php the_author_meta( 'position' ); ?></p>
						<p class="BlogPost__author-box__content__description" itemprop="description"><?php the_author_meta( 'description' ); ?></p>
						<div class="BlogPost__author-box__content__social">
							<?php if ( (bool) get_the_author_meta( 'instagram' ) ) { ?>
								<a href="<?php the_author_meta( 'instagram' ); ?>" target="_blank" itemprop="sameAs">
									<i class="fontello-instagram-brands"></i>
								</a>
							<?php } ?>
							<?php if ( (bool) get_the_author_meta( 'facebook' ) ) { ?>
								<a href="<?php the_author_meta( 'facebook' ); ?>" target="_blank" itemprop="sameAs">
									<i class="fontello-facebook-f-brands"></i>
								</a>
							<?php } ?>
							<?php if ( (bool) get_the_author_meta( 'linkedin' ) ) { ?>
								<a href="<?php the_author_meta( 'linkedin' ); ?>" target="_blank" itemprop="sameAs">
									<i class="fontello-linkedin-in-brands"></i>
								</a>
							<?php } ?>
							<?php if ( (bool) get_the_author_meta( 'twitter' ) ) { ?>
								<a href="https://twitter.com/<?php the_author_meta( 'twitter' ); ?>" target="_blank" itemprop="sameAs">
									<i class="fontello-twitter-brands"></i>
								</a>
							<?php } ?>
						</div>
					</div>
				</div>

				<?php get_template_part( 'lib/components/related-articles', null, $related_args ); ?>
			</div>
		</div>
		<?php require_once get_template_directory() . '/lib/components/post-sidebar.php'; ?>
	</div>
</div>
