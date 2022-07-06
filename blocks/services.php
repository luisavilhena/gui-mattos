<?php

 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'studio_viridiana' );
 
function services() {
	Block::make( 'Serviços' )
		->add_fields( array(
			Field::make('text', 'title', 'Título'),
			Field::make('textarea', 'text', 'Texto'),
			Field::make('text', 'btn', 'Texto do botão'),
			Field::make('text', 'link', 'Link do botão'),
			Field::make('complex', 'imgs', 'Imagens')
			  ->add_fields(array(
			    Field::make('image', 'img', 'Imagem'),
			    Field::make('text', 'text', 'Texto da imagem'),
			  ))
			  ->set_layout('tabbed-vertical')
		) )
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
			<div class="structure-container">
				<div class="structure-container__content structure-container__side">
					<div class="services">
						<div class="services-text">
							<h2><?php echo $block['title']?></h2>
							<p><?php echo $block['text']?></p>
							<a class="button" href="<?php echo $block['link']?>">
								<h3>
									<?php echo $block['btn']?>
								</h3>
							</a>
							
						</div>
						<div class="services-img">
							<?php foreach ($block['imgs'] as $imgs) : ?>
								<?php if(count($block['imgs']) == 1 ) :?>
								<div class="services-img__img__only">
									<img data-featherlight="<?php echo wp_get_attachment_image_src($imgs['img'],'ap_image_desktop_full_no_crop')[0]; ?>" class="image-columns__item__img" src="<?php echo wp_get_attachment_image_src($imgs['img'], 'horizontal-plus')[0]; ?>">
									<p><?php echo $imgs['text']?></p>
								</div>
								<?php else: ?> 
								<div class="services-img__img">
									<img data-featherlight="<?php echo wp_get_attachment_image_src($imgs['img'],'ap_image_desktop_full_no_crop')[0]; ?>" class="image-columns__item__img" src="<?php echo wp_get_attachment_image_src($imgs['img'], 'quarter')[0]; ?>">
									<p><?php echo $imgs['text']?></p>
								</div>
								<?php endif; ?> 
							<?php endforeach;  ?>
							
						</div>
					</div>
				</div>
			</div>

			<?php
 
			// return ob_get_flush();
		} );
}
add_action( 'carbon_fields_register_fields', 'services' );