<?php
	use QualityUnit\Wrapper;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<?php get_template_part( 'templates/head' ); ?>
	<body <?php body_class(); ?>>
		<svg width="100" height="100" version="1.1" xmlns="http://www.w3.org/2000/svg" style="position: absolute;">
			<defs>
				<linearGradient id="iconGradient">
					<stop offset="0%" stop-color="#0497dc" />
					<stop offset="100%" stop-color="#465ce0" />
				</linearGradient>
			</defs>
		</svg>
		<div id="app">
			<?php
				do_action( 'get_header' );
				get_template_part( 'templates/header' );
			?>

			<?php require Wrapper\template_path(); ?>

			<?php
				do_action( 'get_footer' );
				get_template_part( 'templates/footer' );
			?>

			<div id="papPlaceholder"></div>
		</div>

		<?php 
		wp_footer();
		require_once 'base-scripts.php';
		?>

	</body>
</html>
