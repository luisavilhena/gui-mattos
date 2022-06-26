<!--?php /* Template name: Filter */ ?-->
<?php

get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

<main id="page-filter" class="structure-container">
  <div class="structure-container__content structure-container__side">
  	<div>
  		<?php the_content(); ?>  		
  	</div>
  </div>
</main>
<?php endwhile; ?>



<?php
get_footer();
