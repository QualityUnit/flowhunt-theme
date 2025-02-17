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
				<?= esc_html( 'Try Flowhunt today', 'flowhunt' ); ?>
			</h4>
			<p>
				<?= esc_html( 'Start building your own AI solutions', 'flowhunt' ); ?>
			</p>
			<a class="Button Button--full pt-s pb-s" href="<?= esc_url( 'https://calendly.com/liveagentsession/flowhunt-chatbot-demo' ); ?>" target="_blank">
				<span><?= esc_html( 'Schedule a demo', 'flowhunt' ); ?></span>
			</a>
		</div>
		<div class="Post__sidebar--Share flex flex-align-center">
			<span><?php _e( 'Share this article on', 'flowhunt' ); ?></span>
			<div class="Post__sidebar--Share__item">
				<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= esc_url( get_permalink() ); ?>" target="_blank" itemprop="sameAs"
					 title="<?= esc_attr__( 'Share on', 'ms' ); ?> <?= esc_attr__( 'LinkedIn', 'ms' ); ?>">
					<svg class='icon icon-linkedin'><use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#social-linkedin' ); ?>"></use></svg>
				</a>
			</div>
			<div class="Post__sidebar--Share__item">
				<a href="https://www.facebook.com/sharer/sharer.php?u=<?= esc_url( get_permalink() ); ?>" target="_blank" itemprop="sameAs"
					 title="<?= esc_attr__( 'Share on', 'ms' ); ?> <?= esc_attr__( 'Facebook', 'ms' ); ?>">
					<svg class='icon icon-facebook'><use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#social-facebook' ); ?>"></use></svg>
				</a>
			</div>
			<div class="Post__sidebar--Share__item">
				<a href="https://twitter.com/share?url=<?= esc_url( get_permalink() ); ?>" target="_blank" itemprop="sameAs"
					 title="<?= esc_attr__( 'Share on', 'ms' ); ?> <?= esc_attr__( 'X', 'ms' ); ?>">
					<svg class='icon icon-x'><use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#social-x' ); ?>"></use></svg>
				</a>
			</div>
		</div>
	</div>
</div>
