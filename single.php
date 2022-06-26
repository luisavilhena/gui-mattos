<?php

get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

<main id="blog-single" class="structure-container">
	<div class="structure-container__content structure-container__side">
			<div class="blog-single__header">
				<div class="blog-single__header__btn">
					<span class="arrow-1"></span>
					<span class="arrow-2"></span>
					<Input class="button"type = "button" onclick = "document.location.href = 'blog';">
				</div>
				<div class="blog-single__header">
					<h1><?php the_title(); ?></h1>
					<div><?php the_excerpt();?></div>
				</div>
				<img class="blog-single__header__img"  data-featherlight="<?php the_post_thumbnail_url("vertical") ?>"  src='<?php the_post_thumbnail_url("vertical") ?>'>
				</div>
				<?php the_content(); ?>
			</div>
	</div>
</main>
<?php endwhile; ?>

<?php
get_footer();