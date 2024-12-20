<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

	<link rel="apple-touch-icon" sizes="180x180" href="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/favicon/favicon-16x16.png">
	<link rel="mask-icon" href="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/favicon/safari-pinned-tab.svg" color="#000000">

	<?php
	if ( ! is_page() ) {
		?>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500;700&display=swap" rel="stylesheet">
		<?php
	}
	?>
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?>">
	<meta name="application-name" content="<?php bloginfo( 'name' ); ?>">
	<meta name="msapplication-TileColor" content="#da532c" />
	<meta name="theme-color" content="#ffffff" />

	<?php
	global $css;
	function add_inline_styles() {
		ob_start();
		$css = file_get_contents( get_template_directory() . '/assets/dist/layouts/Header' . isrtl() . wpenv() . '.css' );
		ob_get_clean();

		// return the stored style
		if ( '' != $css ) {
			echo '<style id="inline-css" type="text/css">' . $css . '</style>'; // @codingStandardsIgnoreLine
		}
	};

	add_inline_styles();
	wp_head();
	?>

	<?php get_template_part( 'lib/pagesources' ); ?>
</head>
