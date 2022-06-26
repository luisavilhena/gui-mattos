<?php

get_header(); ?>

<main id="project-list" class="structure-container">
	<div class="structure-container__content">
		<div class="project-list">
			<?php while (have_posts()) : the_post(); ?>
			<a href="<?php the_permalink(); ?>" class="project-list__item">
				<img  class=""src="<?php the_post_thumbnail_url("vertical") ?>'">
			  <h2 class="project-list__item__title">
			    <?php the_title(); ?>
			  </h2>
			</a>
			<?php endwhile; ?>
		</div>
	</div>

</main>


<?php
get_footer();
