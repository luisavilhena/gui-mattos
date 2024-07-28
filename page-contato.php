
<!--?php /* Template name: Contato */ ?-->
<?php
get_header();

while (have_posts()) : the_post();
?>

<div id="contato" class="structure-container">
    <?php the_content();?>
    <div class="contato__textos">
        <div class="address">
            <?php echo carbon_get_theme_option('endereco'); ?>
        </div>
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