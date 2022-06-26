<?php
 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'studio_viridiana' );
 
function social_media() {
	Block::make( 'Social Media' )
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
			<div class="social-media">
				<div class="social-media__description">
					<?php echo carbon_get_theme_option('description');  ?>	
				</div>
				<div class="social-media__social">
					<a target="_blank" href="tel:<?php echo carbon_get_theme_option('phone'); ?>">
						<span>phone</span><?php echo carbon_get_theme_option('phone'); ?>
					</a>
					<a target="_blank" href="https://www.instagram.com/<?php echo carbon_get_theme_option('instagram'); ?>">
						<span>instagram</span> @<?php echo carbon_get_theme_option('instagram'); ?>
					</a>
					<a target="_blank" href="mailto:<?php echo carbon_get_theme_option('email'); ?>">
						<span>e-mail</span> <?php echo carbon_get_theme_option('email'); ?></a>
				</div>
			</div> 

			<?php
 
			// return ob_get_flush();
		} );
}
add_action( 'carbon_fields_register_fields', 'social_media' );
