
<!--?php /* Template name: Contato */ ?-->
<?php
get_header();

while (have_posts()) : the_post();
?>

<div id="contato" class="structure-container"> 
    <a  aria-label="Google Maps" target="_blank" href="<?php echo carbon_get_theme_option('link'); ?>">
        <img alt="google maps" src="<?php echo wp_get_attachment_image_src(carbon_get_theme_option('googlemaps', 'image_desktop_full_no_crop'))[0]; ?>">
    </a>
    <div class="contato__textos">
        <address>
            <?php echo carbon_get_theme_option('endereco'); ?>
        </address>
        <ul class="contato-emails">
            <li>
                <h2>Geral</h2>
                <a target="_blank"  aria-label="email geral" href=" mailto:<?php echo carbon_get_theme_option('email'); ?>">
                    <?php echo carbon_get_theme_option('email'); ?>
                </a>
            </li>
            <li>
                <h2> Novos Projetos</h2>
                <a target="_blank"  aria-label="email geral" href=" mailto:<?php echo carbon_get_theme_option('novosprojetos'); ?>">
                    <?php echo carbon_get_theme_option('novosprojetos'); ?>
                </a>
            </li>
            <li>
                <h2>Imprensa</h2>
                <a target="_blank"  aria-label="email geral" href=" mailto:<?php echo carbon_get_theme_option('imprensa'); ?>">
                    <?php echo carbon_get_theme_option('imprensa'); ?>
                </a>
            </li>
        </ul>
    </div>
</div>
<?php
endwhile;

get_footer();
?>