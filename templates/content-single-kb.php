<?php // @codingStandardsIgnoreLine
	set_source( 'kb', 'layouts/Documentation', 'css' );
?>

<div class="Post Post--sidebar-right documentation" itemscope itemtype="http://schema.org/TechArticle">
	<meta itemprop="url" content="<?= esc_url( get_permalink() ); ?>">
	<meta itemprop="author" itemscope itemtype="http://schema.org/Person" content="<?= esc_attr( get_the_author_meta( 'display_name' ) ); ?>">
	<meta  itemprop="dateModified" content="<?= esc_attr( get_the_modified_time( 'F j, Y' ) ); ?>">
	<meta  itemprop="headline" content="<?= esc_attr( get_the_title() ); ?>">
	<meta  itemprop="image" content="<?= esc_attr( get_template_directory_uri() . '/assets/images/icon-book.svg?ver=' . THEME_VERSION ); ?>">
	<span itemprop="publisher" itemscope itemtype="http://schema.org/Organization"><meta itemprop="name" content="Quality Unit"></span>

	<div class="wrapper Post__container">
		<div class="Post__content">
			<div class="Content" itemprop="text" >
				<h2 itemprop="name"><?php the_title(); ?></h2>
				<?php the_content(); ?>
				<?php echo do_shortcode( '[urlslab-faq]' ); ?>
			</div>
		</div>
		<?php require_once get_template_directory() . '/lib/components/post-sidebar.php'; ?>
	</div>
</div>
