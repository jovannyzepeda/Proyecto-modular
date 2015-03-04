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
						<hr class="separador">
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
			$pagina = recupera_page(1); 
			$imagen = recupera_imagen_destacada($pagina[0]->ID);
			?>
			<div class="amores">
				<div class="amor">
					<h4><?php echo $pagina[0]->post_title; ?></h4>
					<img src="<?= $imagen; ?>" class="adopcion"/>
					<hr class="encuentros">
						<?php 
						$result = recupera_post('mascotas',2);
						foreach ($result as $resultados) :
							$image = recupera_imagen_destacada($resultados->ID);
						?>
					  		<a href="<?= $resultados->guid; ?>">
						  		<div class="informacion">
						  			<div class="item2">
							  			<div class="filtro2">
							  				<h5>Nombre: <?php echo $resultados->post_title ?></h5>
						  					<hr class="encuentros">
						  					<p>Encuetro: <?php echo get_post_meta($resultados->ID,'cf_Encuetro',true); ?></p>
							  				<hr class="encuentros">
							  				<p>Raza: <?php echo get_post_meta($resultados->ID,'cf_raza',true); ?></p>
							  			</div>
						  			</div>
						  			<img src="<?= $image; ?>";/>
						  		</div>
						  	</a>
						  	
						<?php 
						endforeach;
						?>
					  	
				</div>
				<?php
				 	get_sidebar(); 
				?>	
			</div>
		<div class="clearboth"></div>	
		</div>
	</div>	
</div>
<?php get_footer(); ?>