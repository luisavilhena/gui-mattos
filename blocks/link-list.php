<?php

 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'cocrianca' );
 
function link_list() {
	Block::make( 'Lista de links' )
		->add_fields( array(
			Field::make('complex', 'links', 'Imagens')
			  ->add_fields(array(
			    Field::make('text', 'title', 'Título'),
			    Field::make('text', 'link', 'Link'),
			  ))
			  ->set_layout('tabbed-vertical')
		) )
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
 
			<div class="link-list">
				<?php foreach ($block['links'] as $links) : ?>
					<a target="_blank" class="link-list__item" href="<?php  echo($links['link'])?>">
							<h2><?php echo $links['title']?></h2>
					</a>
				<?php endforeach;  ?>
			</div>
			<?php
 
			// return ob_get_flush();
		} );
}
add_action( 'carbon_fields_register_fields', 'link_list' );