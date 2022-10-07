<?php
 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'studio_viridiana' );
 
function carousel_history() {
	Block::make( 'Carrossel com história' )
		->add_fields( array(
			Field::make('complex', 'carousel', 'Carrossel com história')
			  ->add_fields(array(
			    Field::make('image', 'img', 'Image'),
			    Field::make('text', 'text', 'Título'),
			    Field::make('text', 'subtitle', 'Subtítulo'),
			  ))
			  ->set_layout('tabbed-vertical')
		) )
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
 
			<div class="carousel">
				<div id="carousel-img">
					<?php foreach ($block['carousel'] as $carousel) : ?>
						<?php if ($carousel['img']) : ?>
					<div class="item" style ="position: relative; background-image: url('<?php echo wp_get_attachment_image_src($carousel['img'],'image_desktop_full_no_crop')[0]; ?>');">
						<div class="carousel-text">
							<h1>
								<?php echo $carousel['text']; ?>
							</h1>
							<p>
								<?php echo $carousel['subtitle']; ?>
							</p>
						</div>
					</div>
						<?php endif; ?>
					<?php endforeach;  ?>					
				</div>
			</div>

			<?php
 
			// return ob_get_flush();
		} );
}
add_action( 'carbon_fields_register_fields', 'carousel_history' );