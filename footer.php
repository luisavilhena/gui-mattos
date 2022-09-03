<footer>
	<a
	  id="footer-logo-anchor"
	  href="<?php echo get_home_url(); ?>">
	  <img src="<?php echo get_template_directory_uri() ?>/resources/icons/logo-cocrianca.png">
	  
	</a>

	<nav
      id="footer-container"
      data-component="menu">
      <?php
        wp_nav_menu(array(
          'theme_location' => 'footer',
          'menu_id'        => 'footer',
        ));
      ?>
    </nav>
    <div class="footer-about">
    	<div>
    		<p>escreva pra gente</p>
    		<a href="mailto:contato@cocrianca.com.br">contato@cocrianca.com.br</a>
    	</div>
    	<p>
    		<a target="_blank" href="http://luisavilhena.com/">feito por Luisa Vilhena</a>
    	</p>
    	<ul class="social-media">
    	  <li>
    	    <a href="<?php echo carbon_get_theme_option('instagram'); ?>">
    	      <img src="<?php echo get_template_directory_uri() ?>/resources/icons/icon-instagram.png">
    	    </a>
    	  </li>
    	  <li>
    	    <a href="<?php echo carbon_get_theme_option('youtube'); ?>">
    	      <img src="<?php echo get_template_directory_uri() ?>/resources/icons/icon-youtube.png"">
    	    </a>
    	  </li>
    	  <li>
    	    <a href="<?php echo carbon_get_theme_option('facebook'); ?>">
    	      <img src="<?php echo get_template_directory_uri() ?>/resources/icons/icon-facebook.png"">
    	    </a>
    	  </li>
    	  <li>
    	    <a href="<?php echo carbon_get_theme_option('linkedin'); ?>">
    	      <img src="<?php echo get_template_directory_uri() ?>/resources/icons/icon-linkedin.png"">
    	    </a>
    	  </li>
    	</ul>
    </div>

</footer>
	<script src="//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
