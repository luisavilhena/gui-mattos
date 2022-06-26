<?php

 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'studio_viridiana' );
 
function images_columns() {
	Block::make( 'Colunas com imagens' )
		->add_fields( array(
			Field::make('complex', 'imgs', 'Imagens')
			  ->add_fields(array(
			    Field::make('image', 'img', 'Imagem'),
			  ))
			  ->set_layout('tabbed-vertical')
		) )
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
 
			<div class="image-columns">
				<?php foreach ($block['imgs'] as $imgs) : ?>
					<img data-featherlight="<?php echo wp_get_attachment_image_src($imgs['img'],'ap_image_desktop_full_no_crop')[0]; ?>" class="image-columns__item__img" src="<?php echo wp_get_attachment_image_src($imgs['img'], 'vertical')[0]; ?>">
				<?php endforeach;  ?>
			</div>
			<?php
 
			// return ob_get_flush();
		} );
}
add_action( 'carbon_fields_register_fields', 'images_columns' );