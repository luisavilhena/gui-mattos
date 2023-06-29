<?php
 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'studio_viridiana' );
 
function carousel_mini() {
	Block::make( 'Carrossel com miniatura' )
		->add_fields( array(
			Field::make('rich_text', 'text_1', 'Texto 1'),
			Field::make('rich_text', 'text_2', 'Texto 2'),
			Field::make('complex', 'carousel', 'Carousel')
			  ->add_fields(array(
			    Field::make('image', 'img', 'Image'),
			  ))
			    ->set_layout('tabbed-vertical')
		) )
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
 
			<div class="carousel-mini">
				<div class="carousel-mini__item">
				<?php foreach ($block['carousel'] as $carousel) : ?>
					<img data-featherlight="<?php echo wp_get_attachment_image_src($carousel['img'],'ap_image_desktop_full_no_crop')[0]; ?>" src="<?php echo wp_get_attachment_image_src($carousel['img'],'horizontal-b')[0];?>">
				<?php endforeach;  ?>
				</div>
				<div class="carousel-mini__nav">
					<?php foreach ($block['carousel'] as $carousel) : ?>
						<img src="<?php echo wp_get_attachment_image_src($carousel['img'],'horizontal-b')[0];?>">
					<?php endforeach;  ?>
				</div>
				<div class="carousel-mini__text">
					<div><?php echo $block['text_1'] ?></div>
					<div><?php echo $block['text_2'] ?></div>
				</div>
			</div>
			<?php
 
			// return ob_get_flush();
		} );
}
add_action( 'carbon_fields_register_fields', 'carousel_mini' );