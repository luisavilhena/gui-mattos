<?php

 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'studio_viridiana' );
 
function cards_list() {
	Block::make( 'Lista de cards' )
		->add_fields( array(
			Field::make('complex', 'imgs', 'Imagens')
			  ->add_fields(array(
			    Field::make('image', 'img', 'Imagem'),
			    Field::make('text', 'title', 'Título'),
				Field::make('text', 'date', 'Data'),
			    Field::make('text', 'subtitle', 'Subtítulo'),
			    Field::make('text', 'link', 'Link'),
			  ))
			  ->set_layout('tabbed-vertical')
		) )
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
 
			<div class="cards-list">
				<?php foreach ($block['imgs'] as $imgs) : ?>
					<a class="cards-list__item" <?php if($imgs['link']) : ?> target="_blank" href="<?php echo $imgs['link']?>"<?php endif; ?>>
						<div class="cards-list__item-img">
							<img data-featherlight="<?php echo wp_get_attachment_image_src($imgs['img'],'ap_image_desktop_full_no_crop')[0]; ?>" class="image-columns__item__img" src="<?php echo wp_get_attachment_image_src($imgs['img'], 'horizontal')[0]; ?>">
							<span></span>
						</div>
						<div class="cards-list__item-text">
							<div>
								<h2><?php echo $imgs['title']?></h2>
								<p><?php echo $imgs['date']?></p>
							</div>
							<p><?php echo $imgs['subtitle']?></p>
						</div>
					</a>
				<?php endforeach;  ?>
			</div>
			<?php
 
			// return ob_get_flush();
		} );
}
add_action( 'carbon_fields_register_fields', 'cards_list' );