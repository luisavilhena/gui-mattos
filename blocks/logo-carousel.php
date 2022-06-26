<?php
 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'studio_viridiana' );
 
function logo_carousel() {
	Block::make( 'Carrossel de logo' )
		->add_fields( array(
			Field::make('complex', 'carousel', 'Carousel')
			  ->add_fields(array(
			    Field::make('image', 'img', 'Image'),
			    Field::make('text', 'text', 'Título'),
			  ))
			  ->set_layout('tabbed-vertical')
			  ->set_header_template( '
			    <% if (text) { %>
			        <%- text %>
			    <% } %>
			' )
		) )
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
 
			<div id="logo-carousel">
				<div class="logo-carousel-img">
					<?php foreach ($block['carousel'] as $carousel) : ?>
						<img class="logo-carousel-img__item" src="<?php echo wp_get_attachment_image_src($carousel['img'],'image_desktop_full_no_crop')[0]; ?>">
					<?php endforeach;  ?>					
				</div>
			</div>

			<?php
 
			// return ob_get_flush();
		} );
}
add_action( 'carbon_fields_register_fields', 'logo_carousel' );