<?php



get_header(); ?>

<?php
$search_query = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

$tipologia = isset($_GET['tipologia']) ? $_GET['tipologia'] : '';
$local = isset($_GET['local']) ? $_GET['local'] : '';
$fase = isset($_GET['fase']) ? $_GET['fase'] : ''; 
$args = array( 
	'post_type' => 'post',
	'post_status' => 'publish',
	's' => $search_query, // Termo de pesquisa
	'order'          => 'DES',
	'orderby'        => 'date',
	'order' => 'DESC',
	'posts_per_page' => -1 );
$the_query = new WP_Query( $args );
 
?>
	<div id="category" class="structure-container">
		<div class="structure-container__content structure-container__side">
			<div class="filter">
			<?php $categorias = get_categories();?>
				<div class=filter-form>
                <form id="filtro-categorias" method="GET">
    <div class="blocos">
        <div class="blocos-1">
            <div class="bloco">
                <?php
                $tipo = 'tipologia';
                $tipo_term = get_term_by('slug', $tipo, 'category');
                $taxonomy = 'category';
                $terms = get_terms(array(
                    'taxonomy' => $taxonomy,
                    'hide_empty' => true,
                    'parent' => $tipo_term->term_id,
                ));
                ?>
                <div class="selections">
                    <select name="tipologia" id="select-tipologia" >
                        <option value=""><?php echo $tipo_term->name; ?></option>
                        <?php
                        foreach ($terms as $term) {
                            echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
                        }
                        ?>
                    </select>
                    <img alt="selecionar" class="select-trigger" data-select-id="select-tipologia" src="<?php echo get_template_directory_uri() ?>/resources/icons/vector.png">
                </div>
            </div>
            <div class="bloco">
                <?php
                $tipo = 'local';
                $tipo_term = get_term_by('slug', $tipo, 'category');
                $terms = get_terms(array(
                    'taxonomy' => $taxonomy,
                    'hide_empty' => true,
                    'parent' => $tipo_term->term_id,
                ));
                ?>
                <div class="selections">
                    <select name="local" id="select-local" class="select-filter">
                        <option value=""><?php echo $tipo_term->name; ?></option>
                        <?php
                        foreach ($terms as $term) {
                            echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
                        }
                        ?>
                    </select>
                    <img alt="voltar ao topo" class="select-trigger" data-select-id="select-local" src="<?php echo get_template_directory_uri() ?>/resources/icons/vector.png">
                </div>
            </div>
        </div>
        <div class="bloco">
            <?php
            $tipo = 'fase';
            $tipo_term = get_term_by('slug', $tipo, 'category');
            $terms = get_terms(array(
                'taxonomy' => $taxonomy,
                'hide_empty' => true,
                'parent' => $tipo_term->term_id,
            ));
            ?>
            <div class="selections selection-last">
                <select name="fase" id="select-fase" class="select-filter">
                    <option value=""><?php echo $tipo_term->name; ?></option>
                    <?php
                    foreach ($terms as $term) {
                        echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
                    }
                    ?>
                </select>
                <img alt="selecionar" class="select-trigger" data-select-id="select-fase" src="<?php echo get_template_directory_uri() ?>/resources/icons/vector.png">
            </div>
            <button id="limpar-filtros">
            limpar filtro
            </button>
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
                            echo '<p class="categoria" style="display:none">'.$categories_list.'</p>';
                        
						?>
						<div class="project-list__item">
							<?php if ($thumbnail_url) : ?>
								<a href="<?php echo esc_url($post_url); ?>" class="post-thumbnail">
									<img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>">
									<span></span>
								</a>
							<?php endif; ?>
							<div class="project-list__item-description">
								<h2 class="post-title"><a href="<?php echo esc_url($post_url); ?>"><?php the_title(); ?></a></h2>
								<p><?php echo $excerpt; ?></p>
							</div>
						</div>
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
 
 




    // Adiciona um ouvinte de evento para cada <select>
    var selects = document.querySelectorAll('select');

    selects.forEach(select => {
        select.addEventListener('change', function() {
            setTimeout(() => {
                console.log('modificou');
                console.log('Verificando elementos <p class="categoria">');

                var elementosCategorias = Array.from(document.querySelectorAll('p.categoria'));
                console.log(elementosCategorias); // Verifique o conteúdo da variável

                // Inicializa um array para armazenar as categorias
                var categorias = [];
                // Itera sobre todos os elementos encontrados
                elementosCategorias.forEach(elemento => {
                    const texto = elemento.textContent.trim();
                    const categoriasDivididas = texto.split(',').map(item => item.trim());
                    categorias.push(...categoriasDivididas);
                });

                const categoriasUnicas = [...new Set(categorias)];
                console.log('Categorias únicas:', categoriasUnicas);

                const selects = document.querySelectorAll('select');
                selects.forEach(select => {
                    const options = select.querySelectorAll('option');
                    options.forEach(option => {
                        if (!categoriasUnicas.includes(option.textContent.trim())) {
                            option.style.display = 'none';
                        } else {
                            option.style.display = '';
                        }
                    });
                });
            }, 2000);
        });
    });

    

    // Exibe as categorias únicas no console (opcional)

    function atualizarURL() {
        var tipologia = document.getElementById('select-tipologia').value;
        var local = document.getElementById('select-local').value;
        var fase = document.getElementById('select-fase').value;

        var queryString = [];
        if (tipologia) queryString.push('tipologia=' + encodeURIComponent(tipologia));
        if (local) queryString.push('local=' + encodeURIComponent(local));
        if (fase) queryString.push('fase=' + encodeURIComponent(fase));

        var url = window.location.pathname;
        if (queryString.length > 0) {
            url += '?' + queryString.join('&');
        }

        history.replaceState(null, '', url);
    }

    function filtrarPosts() {
        var tipologia = document.getElementById('select-tipologia').value;
        var local = document.getElementById('select-local').value;
        var fase = document.getElementById('select-fase').value;

        var resultadoPosts = document.getElementById('resultado-posts');
        resultadoPosts.innerHTML = '<div class="loading"><div class="loading-spinner"></div></div>';

        var data = {
            action: 'filtrar_posts',
            tipologia: tipologia,
            local: local,
            fase: fase
        };

        var queryString = Object.keys(data).map(function(key) {
            return key + '=' + encodeURIComponent(data[key]);
        }).join('&');

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    resultadoPosts.innerHTML = xhr.responseText;
                } else {
                    console.error('Ocorreu um erro: ' + xhr.status);
                }
            }
        };

        xhr.open('GET', '<?php echo admin_url('admin-ajax.php'); ?>?' + queryString);
        xhr.send();
    }

    document.getElementById('select-tipologia').addEventListener('change', function() {
        atualizarURL();
        filtrarPosts();
    });
    document.getElementById('select-local').addEventListener('change', function() {
        atualizarURL();
        filtrarPosts();
    });
    document.getElementById('select-fase').addEventListener('change', function() {
        atualizarURL();
        filtrarPosts();
    });
});
function atualizarSelects(tipologiaId) {
        fetch(`<?php echo admin_url('admin-ajax.php'); ?>`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `action=carregar_termos_filhos&tipologia_id=${tipologiaId}`
        })
        .then(response => response.json())
        .then(data => {
            const selectLocal = document.getElementById('select-local');
            const selectFase = document.getElementById('select-fase');

            selectLocal.innerHTML = data.local;
            selectFase.innerHTML = data.fase;
        })
        .catch(error => {
            console.error('Erro ao carregar termos filhos:', error);
        });
    }

    // Carregar as opções iniciais de Local e Fase (se a Tipologia estiver definida)
    const tipologia = document.getElementById('select-tipologia').value;
    if (tipologia) {
        atualizarSelects(tipologia);
    }




</script>