<footer>
	<div class="footer-first">
		<a
		id="footer-logo-anchor"
		class="animationbacktotop"
		href="">
		Voltar ao topo
		<img alt="voltar ao topo" src="<?php echo get_template_directory_uri() ?>/resources/icons/vector.png">

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
	</div>
    <div class="footer-about">
    	<ul class="social-media">
			<li>
				<a target="_blank" href="<?php echo carbon_get_theme_option('facebook'); ?>">
					Newletter
				</a>
    	  	</li>
			<li>
				<a target="_blank" href="<?php echo carbon_get_theme_option('linkedin'); ?>">
					Linkedin
				</a>
    	  	</li>
			<li>
				<a target="_blank" href="<?php echo carbon_get_theme_option('youtube'); ?>">
					Youtube
				</a>
    	  	</li>
    	  	<li>
				<a target="_blank" href="<?php echo carbon_get_theme_option('instagram'); ?>">
					Instagram
				</a>
    	  	</li>
    	</ul>
    </div>

</footer>
</body>
</html>
