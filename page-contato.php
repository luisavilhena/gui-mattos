<?php
get_header();

while (have_posts()) : the_post();

$email           = carbon_get_theme_option('email');
$novos_projetos  = carbon_get_theme_option('novosprojetos');
$imprensa        = carbon_get_theme_option('imprensa');
$endereco        = carbon_get_theme_option('endereco');
?>

<div id="contato" class="structure-container">
    <?php the_content();?>

    <div class="contato__textos">

        <?php if ($endereco): ?>
            <div class="address">
                <?php echo $endereco; ?>
            </div>
        <?php endif; ?>

        <?php if ($email || $novos_projetos || $imprensa): ?>
            <ul class="contato-emails">

                <?php if ($email): ?>
                    <li>
                        <h2>Geral</h2>
                        <a target="_blank" aria-label="email geral" href="mailto:<?php echo esc_attr($email); ?>">
                            <?php echo esc_html($email); ?>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($novos_projetos): ?>
                    <li>
                        <h2>Novos Projetos</h2>
                        <a target="_blank" aria-label="email novos projetos" href="mailto:<?php echo esc_attr($novos_projetos); ?>">
                            <?php echo esc_html($novos_projetos); ?>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($imprensa): ?>
                    <li>
                        <h2>Imprensa</h2>
                        <a target="_blank" aria-label="email imprensa" href="mailto:<?php echo esc_attr($imprensa); ?>">
                            <?php echo esc_html($imprensa); ?>
                        </a>
                    </li>
                <?php endif; ?>

            </ul>
        <?php endif; ?>

    </div>
</div>

<?php
endwhile;

get_footer();
?>