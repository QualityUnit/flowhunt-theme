<?php // @codingStandardsIgnoreLine
set_custom_source( 'layouts/Archive' );
set_custom_source( 'components/Index' );
require_once get_template_directory() . '/lib/components/searchfield.php';

$post_type_category = 'glossary-categories';
$page_header_title  = __( 'AI Glossary', 'flowhunt' );
$page_header_text   = __( 'FlowHunt lets you create all sorts of specialized chatbots and AI tools, all in one place—no more jumping between multiple websites. Browse the ever-expanding library of Flow templates to get a head start.' );
// $page_header_text  = __( 'If you`re new to website optimization or SEO, you may find yourself facing many unfamiliar terms and concepts . We`ve put together a comprehensive glossary to help you understand these key terms more easily.', 'flowhunt' );
if ( is_tax( $post_type_category ) ) :
	$page_header_title = single_term_title( '', false );
	// $page_header_text  = term_description();
endif;

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

$page_header_args = array(
	'type'            => 'lvl-1',
	'image'           => array(
		'src' => get_template_directory_uri() . '/assets/images/compact-header-glossary.png?ver=' . THEME_VERSION,
		'alt' => $page_header_title,
	),
	'title'           => $page_header_title,
	'text'            => $page_header_text,
	'morecontent_url' => '/templates/glossary-index.php',
);

?>
<div id="archive" class="Archive" itemscope itemtype="https://schema.org/DefinedTermSet">
	<?php get_template_part( 'lib/custom-blocks/compact-header', null, $page_header_args ); ?>

	<div class="wrapper-md Index__list mb-10">
		<?php
		foreach ( $index as $index_item ) {
			?>
		<div id="item-<?= esc_attr( $index_item ); ?>" data-searchGroup class="Index__list--group">
			<h2 class="Index__list--groupTitle"><?= esc_html( $index_item ); ?></h2>
			<ul>
			<?php
			foreach ( $glossaryposts as $glossarypost ) {
						$postid          = $glossarypost->ID;
						$posttitle       = $glossarypost->post_title;
						$first_character = substr( $posttitle, 0, 1 );

				if ( $first_character === $index_item ) {
					?>
				<li class="Index__list--item" data-search style="display: inline-block" itemscope="" itemtype="https://schema.org/DefinedTerm"><a href="<?= esc_url( get_permalink( $postid ) ); ?>" itemprop="url"><span itemprop="name" ><?= esc_html( $posttitle ); ?></span></a></li>
					<?php
				}
			}
			?>
				</ul>
		</div>
		<?php } ?>
	</div>
</div>

<script>
	const searchField = document.querySelector( 'input[type=search]' );
	const searchGroups = document.querySelectorAll( '[data-searchGroup]' );

	searchField.addEventListener( 'input', ( ) => {
		const searchText = searchField.value.toLowerCase();

		searchGroups.forEach( ( group ) => {
			const searchItems = group.querySelectorAll( '[data-search]' );
			let searchItemsHidden;

			searchItems.forEach( ( item ) => {
				const itemText = item.innerText.toLowerCase();

				if ( ! itemText.includes( searchText ) ) {
					item.classList.add( 'hidden' );
					searchItemsHidden = group.querySelectorAll( '[data-search].hidden' );
					return false;
				}
				item.classList.remove( 'hidden' );
				searchItemsHidden = group.querySelectorAll( '[data-search].hidden' );
			} );

			if ( searchItems.length === searchItemsHidden.length ) {
				group.classList.add( 'hidden' );
				return false;
			}

			group.classList.remove( 'hidden' );
		} );
	} );
</script>
