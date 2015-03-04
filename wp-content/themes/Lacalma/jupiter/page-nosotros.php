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
						<h1>
							Quienes somos...
						</h1>
						<hr class="separador">
						<p>
							<?php 
								echo $post->post_content;
							?>
						</p>
						<h2 id='mapas'>
							Veterinarias en Servicio
						</h2>
						<hr class="separador">
						<?php $mapa = recupera_post('mapas',-1); 
							foreach ($mapa as $maps) :
							?>
								<div class="mapa">
									<div class="info_mapa">
										<h3>
											<?php
												echo $maps->post_title; 
											?>
										</h3>
										<p>Correo: <?php echo get_post_meta($maps->ID,'wpcf-correo',true); ?>
										</p>
										<p>Tels: 
											<?php $var = recupera_tel_post($maps->ID); ?>
                						</p>
                						<p>
                							<?php echo get_post_meta($maps->ID,'wpcf-descripcion',true); ?>
                						</p>
									</div>
									<?php 
									echo do_shortcode( $maps->post_content); 
									?>	
								</div>
							<?php
							endforeach;
							?>
						<hr class="end_post">
					</div>

					<!--fin-->
				</div>
			</div>
			<?php 
			$pagina = recupera_page(1); 
			$imagen = recupera_imagen_destacada($pagina[0]->ID);
			?>
			<div class="amores">
				<div class="amor">
					<h4><?php echo $pagina[0]->post_title; ?></h4>
					<img src="<?= $imagen; ?>"class="adopcion"/>
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