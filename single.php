<?php

get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

<main id="blog-single" class="structure-container">
	<div class="structure-container__all-content structure-container__side">
		<img class="blog-single__img" src="<?php the_post_thumbnail_url("horizontal-b") ?>">
		<div class="blog-single__header">
			<h2><?php the_title(); ?></h2>
			<div><?php the_excerpt();?></div>
		</div>
	</div>
	<div class="structure-container__content structure-container__side ">
		<div class="blog_content">
			<?php the_content(); ?>
			<h3>CONTEÚDOS RELACIONADOS</h3>
		<div class="cards-list">
			<?php 
				$get_posts_blog = get_posts([
					'taxonomy' => 'post',
					'order'  => 'desc',
					'posts_per_page' => 5,
				]);
				$latest_cpt = get_posts("post_type=post&numberposts=1");
				$Id= $latest_cpt[0]->ID;
				foreach ($get_posts_blog as $key => $value) {
					$postId = $value->ID;
					$url=get_permalink($value->ID);
					$tags=get_the_tags($value->ID);
					$thumbnail= get_the_post_thumbnail($value->ID, 'horizontal-c');
					$title=$value->post_title;
					$description=get_the_excerpt($value->ID);
					if($Id == $postId){

					} else {
						echo '
						<a class="cards-list__item cards-list__item--special" href="'.$url.'">
							<div class="image-columns__item__img">'.
								$thumbnail.'
							</div>
							<div class="cards-list__item-text">';
							if($tags){
								foreach($tags as $tag) {
									echo 
									'<h5>'.
									$tag->name . ' </h5>'; 
								}
							}
							echo '
								<h4>'.$title .'</h4>
								<h4>'.$description.'</h4>
							</div>
						</a>';
					}
				}
			?>
		</div>
	</div>

</main>
<?php endwhile; ?>

<?php
get_footer();