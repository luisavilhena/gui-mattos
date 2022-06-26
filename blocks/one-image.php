<?php
 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'studio_viridiana' );
 
function one_image() {
	Block::make( 'Coluna com uma imagem maior' )
		->add_fields( array(
			Field::make('image', 'img', 'Imagem'),
		) )
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
 
			<div class="one-image">
				<img class="one-image__item"data-featherlight="<?php echo wp_get_attachment_image_src($block['img'],'aap_image_desktop_full_no_crop')[0]; ?>" src="<?php echo wp_get_attachment_image_src($block['img'],'vertical-larger')[0]; ?>">
			</div>
			<?php
 
			// return ob_get_flush();
		} );
}
add_action( 'carbon_fields_register_fields', 'one_image' );