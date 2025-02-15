<div class="Post__sidebar urlslab-skip-keywords">
  <div class="Post__sidebar__inn">
	<?php if ( sidebar_toc() !== false ) { ?>
	  <div class="SidebarTOC Post__sidebar--TOC">
		<ul class="SidebarTOC__content">
		  <?= wp_kses_post( sidebar_toc() ); ?>
		</ul>
	  </div>
	<?php } ?>
	<div class="Post__sidebar--Signup" >
	  <h4>
		<?=
		esc_html( 'Try Flowhunt today', 'flowhunt' );
		?>
	  </h4>
	  <p>
		<?=
		esc_html( 'Start building your own AI solutions', 'flowhunt' );
		?>
	  </p>
	  <a class="Button Button--full pt-s pb-s" href="<?= esc_url( '#0' ); ?>" target="_blank"><span><?= esc_html( 'Schedule a demo', 'flowhunt' ); ?></span></a>
	</div>
	<div class="Post__sidebar--Share flex flex-align-center">
		<span><?php _e( 'Share this article on', 'flowhunt' ); ?></span>
		<div class="Post__sidebar--Share__item">
			<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" target="_blank" itemprop="sameAs"
				title="<?php _e( 'Share on', 'ms' ); ?> <?php _e( 'LinkedIn', 'ms' ); ?>">
				<svg class='icon icon-linkedin'><use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#social-linkedin' ); ?>"></use></svg>
			</a>
		</div>
		<div class="Post__sidebar--Share__item">
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" itemprop="sameAs"
				title="<?php _e( 'Share on', 'ms' ); ?> <?php _e( 'Facebook', 'ms' ); ?>">
				<svg class='icon icon-facebook'><use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#social-facebook' ); ?>"></use></svg>
			</a>
		</div>
		<div class="Post__sidebar--Share__item">
			<a href="https://twitter.com/share?url=<?php the_permalink(); ?>" target="_blank" itemprop="sameAs"
				title="<?php _e( 'Share on', 'ms' ); ?> <?php _e( 'X', 'ms' ); ?>">
				<svg class='icon icon-x'><use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#social-x' ); ?>"></use></svg>
			</a>
		</div>
	</div>
  </div>
</div>
