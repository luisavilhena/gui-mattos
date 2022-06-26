<?php
 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'studio_viridiana' );
 
function banner() {
	Block::make( 'Banner' )
		->add_fields( array(
			Field::make('image', 'img', 'Imagem'),
			Field::make('text', 'link', 'Link'),
			Field::make('text', 'text', 'Texto'),

		) )
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
 
			<div id="banner">
				<div class="banner_img" style="
				background-image:url('<?php echo wp_get_attachment_image_src($block['img'],'image_desktop_full_no_crop')[0]; ?>
					')">				
				</div>
				<div class="banner_button">
					<a href="<?php echo $block['link']; ?>" class="button-bg">
						<h3>
							<?php echo $block['text']; ?>
						</h3>
					</a>
				</div>
			</div>
			<?php
 
			// return ob_get_flush();
		} );
}
add_action( 'carbon_fields_register_fields', 'banner' );