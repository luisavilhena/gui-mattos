<?php
 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'cocrianca' );
 
function img_text() {
	Block::make( 'Imagem com dois textos' )
		->add_fields( array(
			Field::make('image', 'img', 'Imagem'),
			Field::make('text', 'title_1', 'Título 1'),
			Field::make('textarea', 'description_1', 'Descrição 1'),
			Field::make('text', 'title_2', 'Título 2'),
			Field::make('textarea', 'description_2', 'Descrição 2'),
		) )
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
			<div class="img-text">
				<img class="img-text__img" src="<?php echo wp_get_attachment_image_src($block['img'],'image_desktop_full_no_crop')[0]; ?>">
				<div class="img-text__text">
					<div>
						<h3><?php echo $block['title_1'] ?></h3>
						<p> <?php echo $block['description_1'] ?></p>
					</div>
					<div>
						<h3><?php echo $block['title_2'] ?></h3>
						<p> <?php echo $block['description_2'] ?></p>
					</div>

				</div>
			</div>
			<?php
 
			// return ob_get_flush();
		} );
}
add_action( 'carbon_fields_register_fields', 'img_text' );