<!--?php /* Template name: Block */ ?-->

<?php while (have_posts()) : the_post(); ?>
<style type="text/css">
	body {
		margin: 0;
	}
	h2 {
		font-weight: normal;
		font-size: 30px;
	}
</style>
<main id="page-filter" class="structure-container" style=" width: 100%; height: 100vh; background-color: #FCE5C4; display: flex; flex-direction: column; justify-content: center; align-items: center">
	<img src="<?php echo get_template_directory_uri() ?>/resources/icons/logo-cocrianca.png">
	<h2>Nosso site está em construção, logo estaremos de cara nova!</h2>
</main>
<?php endwhile; ?>



