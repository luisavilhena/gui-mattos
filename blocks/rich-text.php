<?php
 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'studio_viridiana' );
 
function rich_text() {
	Block::make( 'Bloco de texto centralizado' )
		->add_fields( array(
			Field::make( 'rich_text', 'text', 'Description' ),

		) )
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
				<?php if ($block['text']) : ?>
				<div class="structure-block">
					<div class="structure-block__center rich-text">
						<?php echo  $block['text']; ?>
					</div>
				</div>
			<?php endif; ?>
 
			<?php
 
			// return ob_get_flush();
		} );
}
add_action( 'carbon_fields_register_fields', 'rich_text' );