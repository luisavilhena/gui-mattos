<!--?php /* Template name: Cinza */ ?-->
<?php
get_header();

while (have_posts()) : the_post();
?>

<div id="cinza" class="structure-container"> 
    <?php the_content();?>
</div>
<?php

endwhile;

get_footer();
?>


