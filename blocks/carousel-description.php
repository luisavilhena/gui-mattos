<?php
 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'studio_viridiana' );
 
function carousel_description() {
	Block::make( 'Carrossel com descrição' )
		->add_fields( array(
			Field::make('rich_text', 'text', 'Texto'),
			Field::make('complex', 'carousel', 'Carousel')
			  ->add_fields(array(
			    Field::make('image', 'img', 'Image'),
			  ))
			    ->set_layout('tabbed-vertical')
		) )
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
 
			<div class="carousel-description">
				<div class="carousel-description__item">
				<?php foreach ($block['carousel'] as $carousel) : ?>
					<img data-featherlight="<?php echo wp_get_attachment_image_src($carousel['img'],'ap_image_desktop_full_no_crop')[0]; ?>" src="<?php echo wp_get_attachment_image_src($carousel['img'],'horizontal-b')[0];?>">
				<?php endforeach;  ?>
				</div>
				<div class="carousel-description__text">
					<?php echo $block['text'] ?>
				</div>
			</div>
			<?php
 
			// return ob_get_flush();
		} );
}
add_action( 'carbon_fields_register_fields', 'carousel_description' );