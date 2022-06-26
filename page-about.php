<!--?php /* Template name: About */ ?-->
<?php

get_header(); ?>

<main id="about" class="structure-container structure-color-light-pink">
	<?php while (have_posts()) : the_post(); ?>
	<div class="about__content structure-container__content">
		<div class="about__content__fixed">
			<div class="about__content__fixed-right">
				<h3 class="about__content__fixed-right-title">
					<?php echo carbon_get_theme_option('fixed_title'); ?>
				</h3>
				<div class="about__content__fixed-right-box">
					<h4 class="about__content__fixed-right-box__subtitle">
						<?php echo carbon_get_theme_option('fixed_subtile_1'); ?>
					</h4>
					<div class="about__content__fixed-right-box__description rich-text">
						<?php echo carbon_get_theme_option('fixed_description_1'); ?>
					</div>
				</div>
				<div class="about__content__fixed-right-box">
					<h4 class="about__content__fixed-right-box__subtitle">
						<?php echo carbon_get_theme_option('fixed_subtile_2'); ?>
					</h4>
					<div class="about__content__fixed-right-box__description rich-text">
						<?php echo carbon_get_theme_option('fixed_description_2'); ?>
					</div>
					<div></div>
				</div>
				<div class="about__content__fixed-right-box">
					<h4 class="about__content__fixed-right-box__subtitle">
						<?php echo carbon_get_theme_option('fixed_subtile_3'); ?>
					</h4>
					<div class="about__content__fixed-right-box__description rich-text">
						<?php echo carbon_get_theme_option('fixed_description_3'); ?>
					</div>
				</div>
			</div>
			<div class="about__content__fixed-footer">
				<a class="about__content__fixed-footer__link" href="<?php echo carbon_get_theme_option('fixed_footer_link_1'); ?>">
					<h4>
						<?php echo carbon_get_theme_option('fixed_footer_title_1'); ?>
					</h4>
					<?php echo carbon_get_theme_option('fixed_footer_description_1'); ?>
				</a>
				<a  class="arrow"href="#">
					<span class="arrow-1"></span>
					<span class="arrow-2"></span>
				</a>
				<a class="about__content__fixed-footer__link"href="<?php echo carbon_get_theme_option('fixed_footer_link_2'); ?>">
					<h4>
						<?php echo carbon_get_theme_option('fixed_footer_title_2'); ?>
					</h4>
					<?php echo carbon_get_theme_option('fixed_footer_description_2'); ?>
				</a>				
			</div>
		</div>
		<section id="part-2" class="about__content__scroll">
			<?php 
			$thumbnail_id_2 = carbon_get_theme_option('photo_2'); 
			$thumbnail_url_2 = wp_get_attachment_image_url( $thumbnail_id_2, 'vertical' );
			?>
			<div class="about__content__scroll-flex">
				<img data-featherlight="<?php echo $thumbnail_url_2; ?>"  class="about__content__scroll-image" src="<?php echo $thumbnail_url_2; ?>">

				<div class="about__content__scroll__column2">
					<div class="about__content__scroll__description rich-text">
						<?php echo carbon_get_theme_option('scroll_description_2'); ?>
					</div>
					<div class="about__content__scroll__box-description rich-text">
						<?php echo carbon_get_theme_option('scroll_box_description_2'); ?>
					</div>
				</div>
			</div>
		</section>
		<section id="part-3" class="about__content__scroll">
			<?php 
			$photo_list_1 = carbon_get_theme_option('photo_list_1'); 
			$photo_list_url_1 = wp_get_attachment_image_url( $photo_list_1, 'full' );
			$photo_list_2 = carbon_get_theme_option('photo_list_2'); 
			$photo_list_url_2 = wp_get_attachment_image_url( $photo_list_2, 'full' );
			$photo_list_3 = carbon_get_theme_option('photo_list_3'); 
			$photo_list_url_3 = wp_get_attachment_image_url( $photo_list_3, 'full' );
			?>
			<div class="about__content__scroll-flex">
				<div class="about__content__scroll-photo-list">
					<div data-featherlight="<?php echo $photo_list_url_1; ?>" style="background-image: url('<?php echo $photo_list_url_1; ?>');">
					</div>
					<div class="" data-featherlight="<?php echo $photo_list_url_2; ?>" style="background-image: url('<?php echo $photo_list_url_2; ?>');">
					</div>
					<div class="" data-featherlight="<?php echo $photo_list_url_3; ?>" style="background-image: url('<?php echo $photo_list_url_3; ?>');">
					</div>
				</div>
				<div class="about__content__scroll__column2">
					<div class="about__content__scroll__description rich-text">
						<?php echo carbon_get_theme_option('scroll_description_3'); ?>
					</div>
					<div class="about__content__scroll-box rich-text">
						<h4><?php echo carbon_get_theme_option('scroll_box_title_3'); ?></h4>
						<?php echo carbon_get_theme_option('scroll_box_description_3'); ?>
					</div>
				</div>
			</div>
		</section>
	</div>
	<?php endwhile; ?>

</main>


<?php
get_footer();