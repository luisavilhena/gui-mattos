<footer id="footer">
	<a
        aria-label="ir para home"
        id="logo-anchor"
        href="<?php echo get_home_url(); ?>">
        <img alt="logo Gui Mattos" src="<?php echo get_template_directory_uri() ?>/resources/icons/logo-gui-mattos.png">
      </a>
	<div class="footer-content">
		<div class="footer-first">
			<a
			id="footer-logo-anchor"
			class="animationbacktotop"
			href="">
			Voltar ao topo
			<img alt="voltar ao topo" src="<?php echo get_template_directory_uri() ?>/resources/icons/vector.png">

			</a>
			<?php if (is_front_page() || is_archive() || is_single()) : ?>
				<a href="<?php echo home_url('/projetos'); ?>">Outros Projetos +</a>
			<?php endif; ?>

			<nav
			id="footer-container"
			data-component="menu">
				<?php
					wp_nav_menu(array(
					'theme_location' => 'footer',
					'menu_id'        => 'footer',
					));
				?> 
				<a href="<?php echo home_url('/projetos');?>">RUA ESTADOS UNIDOS, 1162</a>
			</nav>
		</div>
		<div class="footer-about">
			<ul class="social-media">
				<li>
					<a target="_blank" href="<?php echo carbon_get_theme_option('facebook'); ?>">
						Newsletter
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
	</div>


</footer>
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script>
		AOS.init();
	</script>
</body>
</html>
<?php
$imgUrl = get_template_directory_uri().'/resources/icons/arrow-next.png';
$imgUrlPrev = get_template_directory_uri().'/resources/icons/arrow-prev.png';

?>

<script>
    //add ícone de arrow dentro do carrossel
    jQuery(document).ready(function($) {
        $('#carousel-arrow .slick-next').html('<img src="<?php echo $imgUrl; ?>">');
		$('#carousel-arrow .slick-prev').html('<img src="<?php echo $imgUrlPrev; ?>">');
    });
</script>