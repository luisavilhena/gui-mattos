<?php

 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'studio_viridiana' );
 
function img_block() {
	Block::make( 'Bloco de img com texto no hover' )
		->add_fields( array(
			    Field::make('image', 'img', 'Imagem'),
			    Field::make('text', 'title', 'Título'),
				Field::make('text', 'date', 'Data'),
			    Field::make('text', 'link', 'Link'),
			  ))
			  ->set_layout('tabbed-vertical')
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
 
			<div class=img-block">
					<a class=img-block__item" <?php if($block['link']) : ?>href=""<?php endif; ?>>
						<div class=img-block__item-img">
							<img class="image-columns__item__img" src="<?php echo wp_get_attachment_image_src($block['img'], 'ap_image_desktop_full_no_crop')[0]; ?>">
							<span></span>
						</div>
						<div class=img-block__item-text">
							<div>
								<h2><?php echo $block['title']?></h2>
								<p><?php echo $block['date']?></p>
							</div>
						</div>
					</a>
			</div>
			<?php
 
			// return ob_get_flush();
		} );
}
add_action( 'carbon_fields_register_fields', 'img_block' );