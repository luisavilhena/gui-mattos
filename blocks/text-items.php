<?php
 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'studio_viridiana' );
 
function text_items() {
	Block::make( 'Itens de textos' )
		->add_fields( array(
			Field::make( 'complex', 'text', 'Títulos' )
			->add_fields(array(
				Field::make( 'text', 'text_1', 'Título 1' ),
				Field::make( 'text', 'text_2', 'Título 2' )
			))
			->set_layout('tabbed-vertical')
		))
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
				<div class="text-items">
					<?php foreach ($block['text'] as $text) : ?>
						<div class="text-items__item">
							<h4><?php echo $text['text_1']; ?></h4>
							<h4><?php echo $text['text_2']; ?></h4>
						</div>
					<?php endforeach;  ?>	
				</div> 
			<?php
 
			// return ob_get_flush();
		} );
}
add_action( 'carbon_fields_register_fields', 'text_items' );