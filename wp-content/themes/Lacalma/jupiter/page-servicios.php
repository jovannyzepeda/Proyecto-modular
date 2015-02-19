<?php
global $post;
get_header();
?>
<div id="theme-page">
	<div class="mk-main-wrapper-holder">
		<div class="theme-page-wrapper right-layout vc_row-fluid mk-grid row-fluid">
			<div class="theme-content">

			

				<!--Servicios-->
				<div class="servicios">
					<h1>Servicios Hospital Veterinario La Calma.</h1>
					<p>
						<?php 
							echo $post->post_content;
						?>
					</p>
						<?php 
						$result = recupera_post('servicio',-1);
						foreach ($result as $resultados) :
							$image = recupera_imagen_destacada($resultados->ID);
						?>
					  		<a href="<?= $resultados->guid; ?>">
						  		<div class="post_servicio">
						  			<img src="<?= $image; ?>"/>
						  			<h4><?php echo $resultados->post_title ?></h4>
						  			<p>Costo: $<?php echo get_post_meta($resultados->ID,'wpcf-precio_servicio',true); ?></p>
						  		</div>
						  	</a>
						<?php 
						endforeach;
						?>
					  	
				</div>

				<!--fin-->
				<hr class="end_post">

				
			</div>
			<?php 
			$pagina = recupera_page(1); 
			$imagen = recupera_imagen_destacada($pagina[0]->ID);
			?>
			<div class="amores">
				<div class="amor">
					<h4><?php echo $pagina[0]->post_title; ?></h4>
					<img src="<?= $imagen; ?>"/>
					<hr class="end_post">
						<?php 
						$result = recupera_post('mascotas',5);
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
						  	<hr class="end_post">
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