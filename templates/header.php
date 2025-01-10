<header class="Header urlslab-skip-all">
	<div class="wrapper-md">
		<div class="Logo">
			<a href="<?= esc_url( home_url( '/' ) ); ?>">
				<img alt="URLsLab" loading="lazy" width="139" height="34" src="<?= esc_url( get_template_directory_uri() . '/assets/images/flowhunt-logo.svg' ); ?>" />
			</a>
		</div>
		<div class="Header__items">
			<div class="hamburger" id="hamburger-button">
				<span class="line"></span>
				<span class="line"></span>
				<span class="line"></span>
			</div>

			<nav class="Header__navigation">
				<ul class="nav">
					<?php
					print_r( wp_get_nav_menu_object( '4625' ) );
					// 	if ( has_nav_menu( 'header_navigation' ) ) :
					// 		wp_nav_menu(
					// 			array(
					// 				'theme_location' => 'header_navigation',
					// 				'menu_class'     => 'nav',
					// 			)
					// 		);
					// endif;
					?>
				<?php
				$menu_items = wp_get_menu_array( 'header_navigation' );
				foreach ( $menu_items as $item ) :
					?>
					<li class="menu-item" data-id="<?= esc_attr( $item['ID'] ); ?>">
						<a href="<?= esc_url( $item['url'] ); ?>" title="<?= esc_attr( $item['title'] ); ?>"><?= esc_html( $item['title'] ); ?></a>
					  <?php if ( ! empty( $item['children'] ) ) : ?>
					  <ul class=" <?= esc_attr( $item['classes'] ); ?>">
							<?php
								print_r( wp_get_nav_menu_items( $item['ID'] ) );
							foreach ( $item['children'] as $child ) : 
								if ( str_contains( $child['classes'], 'topPost' ) ) {
									$sticky_post_args = array(
										'posts_per_page' => 1,
										'post__in'       => get_option( 'sticky_posts' ),
										'orderby'        => 'date',
									);
									$the_query        = new WP_Query( $sticky_post_args );

									while ( $the_query->have_posts() ) :
										$the_query->the_post();
										?>
										<li class="submenu__right">
											Top blog post
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
															<?php the_post_thumbnail( 'box_archive_thumbnail' ); ?>
												<h3><?php the_title(); ?></h3>
												<p><?= esc_html( wp_trim_words( get_the_excerpt(), 10, '…' ) ); ?></p>
											</a>
										</li>
															<?php
									endwhile;
									wp_reset_postdata();
								} else {
									?>

									<li data-id="<?= esc_attr( $child['ID'] ); ?>">
										<a href="<?= esc_url( $child['url'] ); ?>" title="<?= esc_attr( $child['title'] ); ?>"><?= esc_html( $child['title'] ); ?></a>
									</li>

									<?php 
								}
					endforeach;
							?>
					  </ul>
					  <?php endif; ?>
					</li>
				  <?php endforeach; ?>
						</ul>

				<div class="Header__buttons">
					<ul class="Header__buttons__login">
						<li class="Header__buttons__login__item">
							<a href="https://app.flowhunt.io/sign-in" id="loginBtn" class="Button Button--medium Button--white Button--login"><span><?php _e( 'Log in', 'flowhunt' ); ?></span></a>
						</li>
					</ul>
					<a class="Button Button--full Button--medium" href="https://calendly.com/liveagentsession/flowhunt-chatbot-demo" target="_blank"><span><?php _e( 'Demo', 'flowhunt' ); ?></span></a>
				</div>
			</nav>
		</div>
		<div class="Header__mobile__menu__overlay"></div>
	</div>
</header>

<script>
	document.addEventListener('DOMContentLoaded', () => {
		const loginBtn = document.querySelector('#loginBtn');
		const loginForm = document.querySelector('#loginForm');

		if (loginBtn && loginForm) {
			loginBtn.addEventListener('click', (event) => {
				event.stopPropagation();
				const loginShown = loginForm.style.display;

				if (loginShown === 'none' || loginShown === '') {
					loginForm.style.display = 'block';
				} else {
					loginForm.style.display = 'none';
				}
			});

			document.querySelector('body').addEventListener('click', (event) => {
				if (event.target.id !== 'loginForm' && event.target.id !== 'loginBtn') {
					loginForm.style.display = 'none';
				}
			});
		}
	});
</script>
