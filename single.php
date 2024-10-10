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
			<div id="resultado-posts" class="project-list relacionados">
				
				<?php 
				$categories = get_the_category();

				$category_ids = wp_list_pluck($categories, 'term_id');
				if (count($category_ids) > 1) {
					
					$get_posts_blog = get_posts([
						'post_type'      => 'post',
						'order'          => 'DESC',
						'posts_per_page' => 5,
						'post__not_in'   => [get_the_ID()],
						'tax_query'      => [
							[
								'taxonomy' => 'category',
								'field'    => 'term_id',
								'terms'    => $category_ids,
								'operator' => 'IN',
							],
						],
					]);
					if (count($get_posts_blog) < 5) {
						$recent_posts = get_posts([
							'post_type'      => 'post',
							'order'          => 'DESC',
							'posts_per_page' => 4,
							'post__not_in'   => array_merge([get_the_ID()], wp_list_pluck($get_posts_blog, 'ID')), // Exclui o post atual e os já encontrados
						]);
	
						// Adiciona os posts recentes ao array
						$get_posts_blog = array_merge($get_posts_blog, $recent_posts);
					}
		
				} else {
				$get_posts_blog = get_posts([
					'taxonomy' => 'post',
					'order'  => 'desc',
					'posts_per_page' => 5,
					
				]);
				}
				$latest_cpt = get_posts("post_type=post&numberposts=1");
				$Id= $latest_cpt[0]->ID;
				foreach ($get_posts_blog as $key => $value) {
					$postId = $value->ID;
					$url=get_permalink($value->ID);
					$tags=get_the_tags($value->ID);
					$thumbnail= get_the_post_thumbnail($value->ID, 'horizontal');
					$title=$value->post_title;
					$description=get_the_excerpt($value->ID);
					if($Id == $postId){

					} else {
						echo '
						<a href="'.$url.'"class="project-list__item"> 
							<div class="post-thumbnail" href="'.$url.'">
								'.$thumbnail.'
								<span></span>
							</div>
							<div class="project-list__item-description">
								<h2 class="post-title">
								
										'.$title.'
								
								</h2>
								<p>'.$description.' </p>
							</div>
						</a>';
					}
				}
				?>
			</div>
				<div id="carousel-project">
				<?php	
			foreach ($get_posts_blog as $key => $value) {
				$postId = $value->ID;
				$url=get_permalink($value->ID);
				$tags=get_the_tags($value->ID);
				$thumbnail= get_the_post_thumbnail($value->ID, 'horizontal');
				$title=$value->post_title;
				$description=get_the_excerpt($value->ID);
				if($Id == $postId){

				} else {
					echo'
					<a href="'.$url.'" class="carousel-project__item">
						'.$thumbnail.'
						<div class="project-list__item-description">
							<h2 class="post-title">
								
									'.$title.'
							</h2>
							<p>'.$description.' </p>
						</div>
					</a>';
				}
			}
			?>
			</div>
		</div>
	</div>
</main>
<?php endwhile; ?>

<?php
get_footer();