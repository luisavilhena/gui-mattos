<?php
 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'studio_viridiana' );
 
function text_topics() {
	Block::make( 'Texto e tópicos' )
		->add_fields( array(
			Field::make( 'text', 'title', 'Título' ),
			Field::make( 'rich_text', 'text', 'Descrição' ),
			Field::make('complex', 'topics', 'Tópicos')
			  ->add_fields(array(
			    Field::make('text', 'title', 'Título do tópico'),
			    Field::make('text', 'description', 'Texto do tópico'),
			  ))
			  ->set_layout('tabbed-vertical')
		) )
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
				<?php if ($block['text']) : ?>
				<div class="text-topics">
					<div class="text-topics__header">
						<h2><?php echo  $block['title']; ?></h2>
						<div class="rich_text">
							<?php echo  $block['text']; ?>
						</div>
					</div>
					<div class="text-topics__body">
						<?php foreach ($block['topics'] as $topics) : ?>
							<div class="text-topics__body-topic">
								<h3>
									<?php echo  $topics['title']; ?>
								</h3>
								<p>
									<?php echo  $topics['description']; ?>
								</p>
							</div>
						<?php endforeach;  ?>
					</div>
				</div>
			<?php endif; ?>
 
			<?php
 
			// return ob_get_flush();
		} );
}
add_action( 'carbon_fields_register_fields', 'text_topics' );