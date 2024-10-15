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
                // Obter as categorias do post atual
                $current_post_categories = get_the_category();
				var_dump($current_post_categories, "categoria atual");
				 $matching_tipologia_id = null;
				// var_dump($current_post_categories);
                $tipologia_ids = [];
				$tipologia_category = get_category_by_slug('tipologia');

                
                // Se a categoria "tipologia" existir, buscar suas categorias filhas
                if ($tipologia_category) {
                    $tipologia_ids = get_categories([
                        'child_of' => $tipologia_category->term_id,
                        'hide_empty' => false,
                    ]);
                }

                foreach ($current_post_categories as $current_category) {
                    foreach ($tipologia_ids as $child_category) {
						var_dump($child_category, "filhos");
                        if ($current_category->term_id === $child_category->term_id) {
                            $matching_tipologia_id = $current_category->term_id; // Armazena o ID correspondente
							var_dump($matching_tipologia_id, "TODOS OS IDS", "id deste daqui", $current_category->term_id);

							break 2; // Sai dos dois loops
                        }
                    }
                }
				

                // Filtrar categorias que têm o slug "tipologia"
        		$related_posts = [];
                if ($matching_tipologia_id) {
                    $related_posts = get_posts([
                        'post_type'      => 'post',
                        'order'          => 'DESC',
                        'posts_per_page' => 4,
                        'post__not_in'   => [get_the_ID()],
                        'tax_query'      => [
                            [
                                'taxonomy' => 'category',
                                'field'    => 'term_id',
                                'terms'    => $matching_tipologia_id, // Usa o ID correspondente
                            ],
                        ],
                    ]);
                }

                // Se não houver posts relacionados ou se forem menos que 4, buscar os mais recentes
                if (count($related_posts) < 4) {
                    $recent_posts = get_posts([
                        'post_type'      => 'post',
                        'order'          => 'DESC',
                        'posts_per_page' => 4 - count($related_posts), // Quantidade que falta
                        'post__not_in'   => array_merge([get_the_ID()], wp_list_pluck($related_posts, 'ID')), // Exclui já encontrados
                    ]);

                    // Adiciona os posts mais recentes aos relacionados
                    $related_posts = array_merge($related_posts, $recent_posts);
                }else {
                    // Se não houver posts relacionados, busca os mais recentes
                    $related_posts = get_posts([
                        'post_type'      => 'post',
                        'order'          => 'DESC',
                        'posts_per_page' => 4,
                        'post__not_in'   => [get_the_ID()],
                    ]);
                }


                
                foreach ($related_posts as $related_post) {
                    $url = get_permalink($related_post->ID);
                    $thumbnail = get_the_post_thumbnail($related_post->ID, 'horizontal');
                    $title = $related_post->post_title;
                    $description = get_the_excerpt($related_post->ID);

                    echo '
                    <a href="'.$url.'" class="project-list__item"> 
                        <div class="post-thumbnail">
                            '.$thumbnail.'
                            <span></span>
                        </div>
                        <div class="project-list__item-description">
                            <h2 class="post-title">'.$title.'</h2>
                            <p>'.$description.'</p>
                        </div>
                    </a>';
                }
                ?>
			</div>
		</div>
	</div>
</main>
<?php endwhile; ?>

<?php
get_footer();
