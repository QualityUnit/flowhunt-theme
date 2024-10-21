<?php
$index         = array();
$glossaryposts = get_posts(
	array(
		'post_type'   => 'glossary',
		'post_status' => 'publish',
		'numberposts' => -1,
		'order'       => 'ASC',
		'orderby'     => 'title',
	)
);

foreach ( $glossaryposts as $glossarypost ) {
	$posttitle       = $glossarypost->post_title;
	$first_character = substr( $posttitle, 0, 1 );
	if ( ! in_array( $first_character, $index ) ) {
		$index[] = $first_character;
	}
}
?>

<div class='Index'>
  <div class='wrapper flex-tablet flex-align-center'>
    <?= searchfield( __( 'Search glossary', 'flowhunt' ) ); // @codingStandardsIgnoreLine ?>
	<ul class="Index__top">
	<?php foreach ( $index as $index_item ) { ?>
	  <li class="Index__top--item"  style="display: inline-block"><a href="#item-<?= esc_attr( $index_item ); ?>" title="<?= esc_attr( $index_item ); ?>"><?= esc_html( $index_item ); ?></a></li>
	<?php } ?>
	</ul>
  </div>
</div>
