<?php
 
use Carbon_Fields\Block;
use Carbon_Fields\Field;
 
add_action( 'after_setup_theme', 'cocrianca' );
 
function mailchimp() {
	Block::make( 'Mailchimp' )
		->add_fields( array(
		) )
		->set_render_callback( function ( $block ) {
 
			// ob_start();
			?>
 
			<div class="mail">
				<div>
					<img src="<?php echo get_template_directory_uri() ?>/resources/icons/mail.png">
			
				</div>
				<div>
					<!-- Begin Mailchimp Signup Form -->
					<link href="//cdn-images.mailchimp.com/embedcode/classic-071822.css" rel="stylesheet" type="text/css">
					<style type="text/css">
						#mc_embed_signup{clear:left; font:18px Helvetica,Arial,sans-serif;  width:600px;}
						/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
						   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
					</style>
					<div id="mc_embed_signup">
					<form action="https://gmail.us7.list-manage.com/subscribe/post?u=21253827dec0a2deae494fd62&amp;id=7ea32f0367&amp;f_id=000acbe4f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					    <div id="mc_embed_signup_scroll">
						<h2>Inscreva-se na nossa newsletter!</h2>
						<p>Por lá contamos o que fizemos no mês e trazemos dicas de filmes, livros ou eventos relacionados ao tema cidade e infância!</p>
					<div class="mc-field-group">
					</label>
						<input type="email" value="Deixe seu e-mail aqui" name="EMAIL" class="required email" id="mce-EMAIL">
					</div>
						<div id="mce-responses" class="clear foot">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_21253827dec0a2deae494fd62_7ea32f0367" tabindex="-1" value=""></div>
					        <div class="optionalParent">
					            <div class="clear foot">
					                <input type="submit" value="Enviar" name="subscribe" id="mc-embedded-subscribe" class="button">
					            </div>
					        </div>
					    </div>
					</form>
					</div>
					<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='MMERGE2';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
					<!--End mc_embed_signup-->
				</div>
			</div>

			<?php
 
			// return ob_get_flush();
		} );
}
add_action( 'carbon_fields_register_fields', 'mailchimp' );