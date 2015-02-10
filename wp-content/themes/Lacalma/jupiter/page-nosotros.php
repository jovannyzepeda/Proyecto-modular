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
						<p>
							<?php 
								echo $post->post_content;
							?>
						</p>
						<h2 id='mapas'>
							Veterinarias en Servicio
						</h2>
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
			get_sidebar(); 
		?>	
		<div class="clearboth"></div>	
		</div>
	</div>	
</div>
<?php get_footer(); ?>