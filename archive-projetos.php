<?php



get_header(); ?>

<?php 
$args = array( 'post_type' => 'projetos', 'posts_per_page' => -1 );
$the_query = new WP_Query( $args ); 
?>
	<div class="structure-container">
		<div class="structure-container__content structure-container__side">
			<div class="cards-list">
				 <?php $terms = get_terms(array(
				 		'taxonomy'=>'projeto',
				 		'hide_empty' => 'false'
				 )) ?>
			    <?php foreach ( $terms as $term ) : ?>
			        <a href="?getby=cat&cat=<?= esc_attr( $term->slug ) ?>">
			             <?php echo $term->name ?>
			        </a>
			    <?php endforeach; ?>
			    <?php echo do_shortcode('[caf_filter id="269"]'); ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<a class="cards-list__item cards-list__item--special" href="<?php the_permalink(); ?>">
						<div class="image-columns__item__img">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="cards-list__item-text">
							<h5><?php the_excerpt();?></h5>
							<h4><?php the_title();?></h4>
						</div>
					</a>
				<?php endwhile; ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>