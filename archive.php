<?php



get_header(); ?>

<?php 
$args = array( 
	'post_type' => 'post',
	'post_status' => 'publish',
	'order'          => 'DES',
	'orderby'        => 'date',
	'posts_per_page' => -1 );
$the_query = new WP_Query( $args ); 
?>
	<div id="category" class="structure-container">
		<div class="structure-container__content structure-container__side">
			<div class="filter">
			<?php $categorias = get_categories();?>
				<div class=filter-form>
					<form id="filtro-categorias">
						<div class=blocos>
							<div class="blocos-1">
								<div class="bloco">
									<label>Fase</label><br>
									<div>
										<p><input type="checkbox" name="categorias[]" value="16">Concluído<br></p>
										<p><input type="checkbox" name="categorias[]" value="18">Em Estudo<br></p>
									</div>
									<div>
										<p><input type="checkbox" name="categorias[]" value="17">Concurso<br></p>
										<p><input type="checkbox" name="categorias[]" value="19">Não Executado<br></p>
									</div>
								</div>
								<div class="bloco">
									<label>Local</label><br>
									<div>
										<p><input type="checkbox" name="categorias[]" value="10">São Paulo<br></p>
										<p><input type="checkbox" name="categorias[]" value="9">Interior de SP<br></p>
									</div>
									<div>
										<p><input type="checkbox" name="categorias[]" value="6">Litoral<br></p>
										<p><input type="checkbox" name="categorias[]" value="8">Exterior<br></p>
									</div>
								</div>
							</div>
							<div class="bloco">
								<label>Tipo</label><br>
								<div>
									<p><input type="checkbox" name="categorias[]" value="11">Residencial<br></p>
									<p><input type="checkbox" name="categorias[]" value="12">Comercial<br></p>
								</div>
								<div>
									<p><input type="checkbox" name="categorias[]" value="13">Edifício<br></p>
									<p><input type="checkbox" name="categorias[]" value="14">Interiores<br></p>
								</div>
								<div>
									<p><input type="checkbox" name="categorias[]" value="7">Hotéis<br></p>
									<p><input type="checkbox" name="categorias[]" value="15">Entretenimento<br></p>
								</div>
							</div>
						</div>
						<button type="submit">Filtrar</button>
					</form>
					<form role="search" method="get" class="search-form" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<label>
							<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ); ?></span>
							<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'PROCURAR', 'placeholder' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
						</label>
						<button type="submit" class="search-submit">
							<img alt="search" src="<?php echo get_template_directory_uri() ?>/resources/icons/search.png">
						</button>
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
	var filterHeight = $('.filter').outerHeight(); // Obtém a altura do elemento .filter
	$('.filter').css('margin-top', '-' + filterHeight + 'px'); // Define a margem superior com a altura do elemento .filter
	
	$(window).resize(function() {
    	var filterHeight = $('.filter').outerHeight();
    	$('.filter').css('margin-top', '-' + filterHeight  + 5 + 'px');
	});
	$('#menu-filter').click(function() {
		$('.filter').toggleClass('active'); 
		if ($('.filter').hasClass('active')) {
			$('.filter').css('margin-top',  '60px'); // Define a margem superior com a altura do elemento .filter
		} else {
			$('.filter').css('margin-top', '-' + filterHeight + 'px'); // Define a margem superior como o negativo da altura do elemento .filter
		}
		var topPosition = $('html').offset().top;
		$('html, body').animate({
			scrollTop: topPosition
		}, 1000); 
		$('#open-filter').toggleClass('filter-arrow-active'); 
	});
	function limparFiltros() {
        $('#filtro-categorias input[type="checkbox"]').prop('checked', false);
    }
    $('#filtro-categorias').submit(function(e) {
        e.preventDefault();

		var formData = $(this).serializeArray();
		var categorias_ids = [];


		$.each(formData, function(index, field) {
			if (field.name === 'categorias[]') {
				categorias_ids.push(field.value);
			}
		});

        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'filtrar_posts_por_categoria',
                categorias_ids: categorias_ids
            },
            success: function(response) {
                $('#resultado-posts').html(response);
            }
        });
    });

    $('#search-form').submit(function(e) {
        e.preventDefault();
		limparFiltros();


        var formData = $(this).serialize();
		
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'GET',
            data: formData + '&action=custom_search', 
            success: function(response) {
                $('#resultado-posts').html(response);
            }
        });
    });
});


</script>
