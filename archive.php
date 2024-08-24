<?php
get_header(); 

$tipologia = isset($_GET['tipologia']) ? intval($_GET['tipologia']) : '';
$local = isset($_GET['local']) ? intval($_GET['local']) : '';
$fase = isset($_GET['fase']) ? intval($_GET['fase']) : '';
$decada = isset($_GET['decada']) ? intval($_GET['decada']) : ''; // Novo filtro de década
$search_query = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : ''; // Parâmetro de busca


// Configura os argumentos para a consulta principal
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'order' => 'DESC',
    'orderby' => 'date',
    'posts_per_page' => -1,
    's' => $search_query, // Adiciona a busca aos argumentos
    'tax_query' => array('relation' => 'AND'),
);

if ($tipologia) {
    $args['tax_query'][] = array(
        'taxonomy' => 'category',
        'field'    => 'term_id',
        'terms'    => $tipologia,
        'include_children' => false,
    );
}

if ($local) {
    $args['tax_query'][] = array(
        'taxonomy' => 'category',
        'field'    => 'term_id',
        'terms'    => $local,
        'include_children' => false,
    );
}

if ($fase) {
    $args['tax_query'][] = array(
        'taxonomy' => 'category',
        'field'    => 'term_id',
        'terms'    => $fase,
        'include_children' => false,
    );
}

if ($decada) {
    $args['tax_query'][] = array(
        'taxonomy' => 'category',
        'field'    => 'term_id',
        'terms'    => $decada,
        'include_children' => false,
    );
}

// Execute a consulta principal
$the_query = new WP_Query($args);

// Obtenha todos os termos da taxonomia 'category' para análise, incluindo termos filhos
$all_terms = get_terms(array(
    'taxonomy' => 'category',
    'hide_empty' => false, // Certifique-se de obter todos os termos, mesmo os que não têm posts
));

// Filtra os termos que têm posts com os filtros aplicados
$filter_status = array();

foreach ($all_terms as $term) {
    $term_args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        's' => $search_query, // Inclui a busca na consulta dos termos
        'tax_query' => array('relation' => 'AND'),
    );

    if ($tipologia) {
        $term_args['tax_query'][] = array(
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $tipologia,
        );
    }

    if ($local) {
        $term_args['tax_query'][] = array(
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $local,
        );
    }

    if ($fase) {
        $term_args['tax_query'][] = array(
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $fase,
        );
    }

    if ($decada) {
        $term_args['tax_query'][] = array(
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $decada,
        );
    }

    // Adiciona o termo atual à consulta
    $term_args['tax_query'][] = array(
        'taxonomy' => 'category',
        'field'    => 'term_id',
        'terms'    => $term->term_id,
        'include_children' => false,
    );

    $term_query = new WP_Query($term_args);

    // Se não houver posts, marque o termo como sem projetos
    if (!$term_query->have_posts()) {
        $filter_status[$term->term_id] = 'no-projects';
    }

    wp_reset_postdata();
}
?>

<div id="category" class="structure-container">
    <div class="structure-container__content structure-container__side">
        <div class="filter">
            <div class="filter-form">
                <form id="filtro-categorias" method="GET">
                <div id="loading" class="loading">
                <div class="spinner"></div>
            </div>
                    <div class="blocos">
                        <div class="blocos-1">
                            <!-- Tipologia -->
                            <div class="bloco">
                                <?php
                                $tipo = 'tipologia';
                                $tipo_term = get_term_by('slug', $tipo, 'category');
                                $terms = get_terms(array(
                                    'taxonomy' => 'category',
                                    'hide_empty' => true,
                                    'parent' => $tipo_term->term_id,
                                ));
                                ?>
                                <div class="selections">
                                    <div  data-selected="tipologia" class="filter-selected"></div>
                                    <div name="tipologia" id="select-tipologia">
                                        <span class="category"><?php echo $tipo_term->name; ?></span>
                                        <ul class="sibling">
                                        <?php
                                        foreach ($terms as $term) {
                                            $class = isset($filter_status[$term->term_id]) ? 'class="' . $filter_status[$term->term_id] . '"' : '';
                                            echo '<li data-term-id="' . $term->term_id . '" data-filter="tipologia" ' . $class . '>' . $term->name . '</li>';
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Local -->
                            <div class="bloco">
                                <?php
                                $tipo = 'local';
                                $tipo_term = get_term_by('slug', $tipo, 'category');
                                $terms = get_terms(array(
                                    'taxonomy' => 'category',
                                    'hide_empty' => true,
                                    'parent' => $tipo_term->term_id,
                                ));
                                ?>
                                <div class="selections">
                                    <div data-selected="local" class="filter-selected"></div>
                                    <div name="local" id="select-local">
                                        <span class="category"><?php echo $tipo_term->name; ?></span>
                                        <ul class="sibling">
                                        <?php
                                        foreach ($terms as $term) {
                                            $class = isset($filter_status[$term->term_id]) ? 'class="' . $filter_status[$term->term_id] . '"' : '';
                                            echo '<li data-term-id="' . $term->term_id . '" data-filter="local" ' . $class . '>' . $term->name . '</li>';
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Fase -->
                            <div class="bloco">
                                <?php
                                $tipo = 'fase';
                                $tipo_term = get_term_by('slug', $tipo, 'category');
                                $terms = get_terms(array(
                                    'taxonomy' => 'category',
                                    'hide_empty' => true,
                                    'parent' => $tipo_term->term_id,
                                ));
                                ?>
                                <div class="selections">
                                    <div data-selected="fase" class="filter-selected"></div>
                                    <div name="fase" id="select-fase">
                                        <span class="category"><?php echo $tipo_term->name; ?></span>
                                        <ul class="sibling">
                                        <?php
                                        foreach ($terms as $term) {
                                            $class = isset($filter_status[$term->term_id]) ? 'class="' . $filter_status[$term->term_id] . '"' : '';
                                            echo '<li data-term-id="' . $term->term_id . '" data-filter="fase" ' . $class . '>' . $term->name . '</li>';
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Década -->
                            <div class="bloco">
                                <?php
                                $tipo = 'decada';
                                $tipo_term = get_term_by('slug', $tipo, 'category');
                                $terms = get_terms(array(
                                    'taxonomy' => 'category',
                                    'hide_empty' => true,
                                    'parent' => $tipo_term->term_id,
                                ));
                                ?>
                                <div class="selections">
                                    <div data-selected="decada" class="filter-selected"></div>
                                    <div name="decada" id="select-decada">
                                        <span class="category"><?php echo $tipo_term->name; ?></span>
                                        <ul class="sibling">
                                        <?php
                                        foreach ($terms as $term) {
                                            $class = isset($filter_status[$term->term_id]) ? 'class="' . $filter_status[$term->term_id] . '"' : '';
                                            echo '<li data-term-id="' . $term->term_id . '" data-filter="decada" ' . $class . '>' . $term->name . '</li>';
                                        }
                                        ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="resultado-posts" class="project-list">
            <?php
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) : $the_query->the_post();

                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'horizontal');
                    $post_url = get_permalink();
                    $excerpt = get_the_excerpt();
                    $categories = get_the_terms(get_the_ID(), 'category');

                    $category_names = array();

                    foreach ($categories as $category) {
                        $category_names[] = $category->name;
                    }

                    $categories_list = implode(', ', $category_names);
                    echo '<p class="categoria" style="display:none">' . $categories_list . '</p>';

                    ?>
                    <a href="<?php echo esc_url($post_url); ?>" class="project-list__item">
                        <?php if ($thumbnail_url) : ?>
                            <div class="post-thumbnail">
                                <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>">
                                <span></span>
                        </div>
                        <?php endif; ?>
                        <div class="project-list__item-description">
                            <h2 class="post-title">
                                <?php the_title(); ?></h2>
                            <p><?php echo $excerpt; ?></p>
                        </div>
                        </a>
                    <?php

                endwhile;
                // Restaure os dados do post
                wp_reset_postdata();
            }
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Adiciona evento de clique aos itens <li>
    document.querySelectorAll('.selections li').forEach(function(item) {
        item.addEventListener('click', function() {
            if (this.classList.contains('no-projects')) {
                return; // Não faz nada se o item tiver a classe 'no-projects'
            }

            const filterType = this.getAttribute('data-filter');
            const termId = this.getAttribute('data-term-id');
            const termText = this.textContent;

            // Atualiza a URL com o filtro selecionado
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set(filterType, termId);

            // Remove o parâmetro de busca 's'
            urlParams.delete('s');
            window.location.search = urlParams.toString();  // Recarrega a página com novos parâmetros de filtro

            // Armazena todos os filtros aplicados no armazenamento local
            const selectedFilters = JSON.parse(localStorage.getItem('selectedFilters')) || {};
            selectedFilters[filterType] = termText;
            localStorage.setItem('selectedFilters', JSON.stringify(selectedFilters));
        });
    });

    // Restaura o estado dos filtros ao carregar a página
    window.addEventListener('load', function() {
        updateFilterDisplay();
    });

    // Atualiza a exibição dos filtros selecionados
    function updateFilterDisplay() {
        const selectedFilters = JSON.parse(localStorage.getItem('selectedFilters')) || {};

        // Oculta todos os elementos `data-selected`
        document.querySelectorAll('[data-selected]').forEach(function(div) {
            div.style.display = "none";
        });

        // Exibe todos os elementos `.category`
        document.querySelectorAll('.category').forEach(function(span) {
            span.classList.remove('bold'); // Remove a classe 'bold' de todos os elementos
            span.style.display = "block";
        });

        for (const [filterType, termText] of Object.entries(selectedFilters)) {
            const filterSelectedDiv = document.querySelector(`[data-selected="${filterType}"]`);
            if (filterSelectedDiv) {
                filterSelectedDiv.style.display = "block";
                filterSelectedDiv.textContent = 'x ' + termText;
            }

            const spanCategory = document.querySelector(`[name="${filterType}"] .category`);
            if (spanCategory) {
                spanCategory.style.display = "none";
            }
        }
    }

    // Ocultar o filtro selecionado quando clicado
    document.addEventListener('click', function(event) {
        if (event.target.hasAttribute('data-selected')) {
            const selectedValue = event.target.getAttribute('data-selected');

            // Oculta o filtro selecionado
            event.target.style.display = 'none';

            // Mostra o menu de seleção correspondente
            const targetElement = document.querySelector(`[name="${selectedValue}"] .category`);
            if (targetElement) {
                targetElement.style.display = 'block';
            }

            // Remove o filtro selecionado do armazenamento local
            const selectedFilters = JSON.parse(localStorage.getItem('selectedFilters')) || {};
            delete selectedFilters[selectedValue];
            localStorage.setItem('selectedFilters', JSON.stringify(selectedFilters));

            // Atualiza a URL para remover o filtro
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.delete(selectedValue);
            window.location.search = urlParams.toString();  // Recarrega a página com filtros removidos
        }
    });

    // Mostrar/ocultar as listas de categorias
    const blockFilter = document.getElementById("filtro-categorias");
    document.querySelectorAll('.category').forEach(function(category) {
        category.addEventListener('click', function() {
            // Encontra a lista irmã
            var sibling = this.nextElementSibling;

            // Verifica se a lista irmã existe e tem a classe 'sibling'
            if (sibling && sibling.classList.contains('sibling')) {
                // Verifica se a lista irmã já tem a classe 'active'
                if (sibling.classList.contains('active')) {
                    // Remove a classe 'active' se já estiver ativa
                    sibling.classList.remove('active');
                    blockFilter.classList.remove('open');
                } else {
                    // Oculta todas as listas irmãs
                    document.querySelectorAll('.sibling').forEach(function(siblingList) {
                        siblingList.classList.remove('active');
                        blockFilter.classList.remove('open');
                    });

                    // Adiciona a classe 'active' à lista irmã correspondente
                    sibling.classList.add('active');
                    blockFilter.classList.add('open');
                }
            }

            // Remove a classe 'bold' de todos os outros elementos .category
            document.querySelectorAll('.category').forEach(function(span) {
                span.classList.remove('bold');
            });

            // Adiciona a classe 'bold' ao elemento clicado
            this.classList.add('bold');
        });
    });
});

</script>
