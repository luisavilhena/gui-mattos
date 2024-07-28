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
					<form id="filtro-categorias">
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
										<select name="tipologia" id="select-tipologia">
											<option value=""><?php echo $tipo_term->name; ?></option>
											<?php
											foreach ($terms as $term) {
												echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
											}
											?>
										</select>
										<img alt="selecionar" src="<?php echo get_template_directory_uri() ?>/resources/icons/vector.png">
									</div>
								</div>
								<div class="bloco">
									<?php
									$tipo = 'local';
									$tipo_term = get_term_by('slug', $tipo, 'category');
									$taxonomy = 'category';
									$terms = get_terms(array(
										'taxonomy' => $taxonomy,
										'hide_empty' => true,
										'parent' => $tipo_term->term_id,
									));
									?>
									<div class="selections">
										<select name="local" id="select-local">
											<option value=""><?php echo $tipo_term->name; ?></option>
											<?php
											foreach ($terms as $term) {
												echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
											}
											?>
										</select>
										<img alt="voltar ao topo" src="<?php echo get_template_directory_uri() ?>/resources/icons/vector.png">
									</div>
								</div>
							</div>
							<div class="bloco">
								<?php
								$tipo = 'fase';
								$tipo_term = get_term_by('slug', $tipo, 'category');
								$taxonomy = 'category';
								$terms = get_terms(array(
									'taxonomy' => $taxonomy,
									'hide_empty' => true,
									'parent' => $tipo_term->term_id,
								));
								?>
								<div class="selections selection-last">
									<select name="fase" id="select-fase">
										<option value=""><?php echo $tipo_term->name; ?></option>
										<?php
										foreach ($terms as $term) {
											echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
										}
										?>
									</select>
									<img alt="selecionar" src="<?php echo get_template_directory_uri() ?>/resources/icons/vector.png">
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
$(document).ready(function() {
	var filterHeight = $('.filter').outerHeight(); 
	$('.filter').css('margin-top', '-' + (filterHeight + 50)  + 'px');
	
	$(window).resize(function() {
    	var filterHeight = $('.filter').outerHeight();
    	$('.filter').css('margin-top', '-' + (filterHeight + 50) + 'px');
	});
	$('#menu-filter').click(function() {
		$('.filter').toggleClass('active'); 
		if ($('.filter').hasClass('active')) {
			$('.filter').css('margin-top',  '10px'); // Define a margem superior com a altura do elemento .filter
		} else {
			$('.filter').css('margin-top', '-' + (filterHeight + 50) + 'px'); // Define a margem superior como o negativo da altura do elemento .filter
		}
		var topPosition = $('html').offset().top;
		$('html, body').animate({
			scrollTop: topPosition
		}, 1000); 
		$('#open-filter').toggleClass('filter-arrow-active'); 
	});
	// $('#filtro-categorias input[type="checkbox"]').change(function() {
	// 	var formData = $('#filtro-categorias').serializeArray();
	// 	var categorias_ids = [];

	// 	$.each(formData, function(index, field) {
	// 		if (field.name === 'categorias[]') {
	// 			categorias_ids.push(field.value);
	// 		}
	// 	});

	// 	$.ajax({
	// 		url: '<?php echo admin_url('admin-ajax.php'); ?>',
	// 		type: 'POST',
	// 		data: {
	// 			action: 'filtrar_posts_por_categoria',
	// 			categorias_ids: categorias_ids
	// 		},
	// 		success: function(response) {
	// 			$('#resultado-posts').html(response);
	// 		}
	// 	});
	// });

	// function limparFiltros() {
    //     $('#filtro-categorias input[type="checkbox"]').prop('checked', false);
    // }
    // $('#filtro-categorias').submit(function(e) {
    //     e.preventDefault();

	// 	var formData = $(this).serializeArray();
	// 	var categorias_ids = [];


	// 	$.each(formData, function(index, field) {
	// 		if (field.name === 'categorias[]') {
	// 			categorias_ids.push(field.value);
	// 		}
	// 	});

    //     $.ajax({
    //         url: '<?php echo admin_url('admin-ajax.php'); ?>',
    //         type: 'POST',
    //         data: {
    //             action: 'filtrar_posts_por_categoria',
    //             categorias_ids: categorias_ids
    //         },
    //         success: function(response) {
    //             $('#resultado-posts').html(response);
    //         }
    //     });
    // });

    // $('#search-form').submit(function(e) {
    //     e.preventDefault();
	// 	limparFiltros();


    //     var formData = $(this).serialize();
		
    //     $.ajax({
    //         url: '<?php echo admin_url('admin-ajax.php'); ?>',
    //         type: 'GET',
    //         data: formData + '&action=custom_search', 
    //         success: function(response) {
    //             $('#resultado-posts').html(response);
    //         }
    //     });
    // });
	var usuarioInteragiu = false; // Variável para controlar se o usuário já interagiu com os selects

    // Função para realizar a filtragem
    function filtrarPosts() {
        var tipologia = document.getElementById('select-tipologia').value;
        var local = document.getElementById('select-local').value;
        var fase = document.getElementById('select-fase').value;

        // Mostrar indicador de carregamento apenas se o usuário já interagiu
        if (usuarioInteragiu) {
            var resultadoPosts = document.getElementById('resultado-posts');
            resultadoPosts.innerHTML = '<div class="loading"><div class="loading-spinner"></div></div>';
        }

        // Configuração do objeto de dados para o AJAX
        var data = {
            action: 'filtrar_posts',
            tipologia: tipologia,
            local: local,
            fase: fase
        };

        // Formatar os dados para URL
        var queryString = Object.keys(data).map(function(key) {
            return key + '=' + encodeURIComponent(data[key]);
        }).join('&');

        // Criar uma requisição AJAX
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Atualizar o conteúdo com os posts filtrados
                    resultadoPosts.innerHTML = xhr.responseText;
                } else {
                    console.error('Ocorreu um erro: ' + xhr.status);
                }
            }
        };

        // Configurar e enviar a requisição
        xhr.open('GET', '<?php echo admin_url('admin-ajax.php'); ?>?' + queryString);
        xhr.send();
    }

    // Captura a mudança nos selects e chama a função de filtragem
    document.getElementById('select-tipologia').addEventListener('change', function() {
        if (!usuarioInteragiu) {
            usuarioInteragiu = true; // Marcar que o usuário interagiu com os selects pela primeira vez
        }
        filtrarPosts();
    });
    document.getElementById('select-local').addEventListener('change', function() {
        if (!usuarioInteragiu) {
            usuarioInteragiu = true; // Marcar que o usuário interagiu com os selects pela primeira vez
        }
        filtrarPosts();
    });
    document.getElementById('select-fase').addEventListener('change', function() {
        if (!usuarioInteragiu) {
            usuarioInteragiu = true; // Marcar que o usuário interagiu com os selects pela primeira vez
        }
        filtrarPosts();
    });
	if (usuarioInteragiu) {
        var resultadoPosts = document.getElementById('resultado-posts');
        resultadoPosts.innerHTML = '<div class="loading"><div class="loading-spinner"></div><p>Carregando...</p></div>';
    }

});


</script>
