<?php
 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'studio_viridiana' );
 
function carousel_description() {
	Block::make( 'Carrossel com descrição' )
		->add_fields( array(
			Field::make('rich_text', 'text', 'Texto'),
			Field::make('rich_text', 'text_2', 'Texto coluna 2'),
			Field::make('complex', 'carousel', 'Carousel')
			  ->add_fields(array(
			    Field::make('image', 'img', 'Image'),
			    Field::make('text', 'subtitle', 'Legenda'),
			  ))
			    ->set_layout('tabbed-vertical')
		) )
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
 
			<div class="carousel-mini">
				<div class="carousel-mini__item">
				<?php foreach ($block['carousel'] as $carousel) : ?>
					<div>
					<img data-featherlight="<?php echo wp_get_attachment_image_src($carousel['img'],'ap_image_desktop_full_no_crop')[0]; ?>" src="<?php echo wp_get_attachment_image_src($carousel['img'],'horizontal-b')[0];?>">
						<?php if($carousel['subtitle']) : ?>
							<figcaption><p><?php echo $carousel['subtitle'] ?></p></figcaption>
						<?php endif ?>
				</div>
				<?php endforeach;  ?>
				</div>
				<div class="carousel-mini__nav">
					<?php foreach ($block['carousel'] as $carousel) : ?>
						<img src="<?php echo wp_get_attachment_image_src($carousel['img'],'horizontal')[0];?>">
						<?php endforeach;  ?>
				</div>
				<div class="carousel-mini__text">
					<div><?php echo $block['text'] ?></div>
					<div><?php echo $block['text_2'] ?></div>
				</div>
			</div>
			<?php
 
			// return ob_get_flush();
		} );
}
add_action( 'carbon_fields_register_fields', 'carousel_description' );