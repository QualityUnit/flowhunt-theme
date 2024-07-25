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
				<?php
				if ( has_nav_menu( 'header_navigation' ) ) :
					wp_nav_menu(
						array(
							'theme_location' => 'header_navigation',
							'menu_class'     => 'nav',
						)
					);
				endif;
				?>
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
