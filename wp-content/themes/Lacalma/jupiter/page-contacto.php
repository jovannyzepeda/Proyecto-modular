<?php
global $post;
get_header();
?>
<div id="theme-page">
	<div class="mk-main-wrapper-holder">
		<div class="theme-page-wrapper right-layout vc_row-fluid mk-grid row-fluid">
			<div class="theme-content">

			

				<!--Contacto-->
				<?php $image = recupera_imagen_destacada($post->ID); ?>
				<div class="contacto" style="background: url('<?= $image; ?>');">
					<div class="filtro">
						<h1>Tu opinión es muy importante para nosotros, 
							envíanos tu mensaje.
						</h1>
						<p>
							<?php 
								echo $post->post_content;
							?>
						</p>
						<?php 
						if( function_exists( 'ninja_forms_display_form' ) ){ 
							ninja_forms_display_form( recupera_formulario_pagina('contacto') ); 
						}
						?>
					</div>

					<!--fin-->
					<hr class="end_post">

				</div>
			</div>
		<?php
			get_sidebar(); 
		?>	
		<div class="clearboth"></div>	
		</div>
	</div>	
</div>
<?php get_footer(); ?>