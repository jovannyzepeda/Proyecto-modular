<?php
global $post;
get_header();
?>
<div id="theme-page">
	<div class="mk-main-wrapper-holder">
		<div class="theme-page-wrapper right-layout vc_row-fluid mk-grid row-fluid">

				<!--Encuentros-->
				<?php 
				$pagina = recupera_page(1); 
				$imagen = recupera_imagen_destacada($pagina[0]->ID);
				?>
				<div class="encuentros">
					<div class="amor">
						<?php  
						    global $current_user;
						    get_currentuserinfo();
						    if($current_user->user_login==NULL):
						        echo "<p class='center'>Necesitas Estar logeado para publicar una mascota...</p>";
						    else :
						    	$page = recupera_page(3);
						?>
						<a href="<?= $page[0]->guid; ?>">
							<p><B>Publica tu mascota</B></p>
						</a>
						<?php 
						endif; 
						?>
						<h4 class="center"><?php echo $pagina[0]->post_title; ?></h4>
						<p class="center"><?php echo $pagina[0]->post_content; ?></p>
						<hr class="mascotas_adoptivas">
							<?php 
							$result = recupera_post('mascotas',-1);
							$var = 0;
							foreach ($result as $resultados) :
								$image = recupera_imagen_destacada($resultados->ID);
							?>
								<div class="contenedor">
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
								  			<img src="<?= $image; ?>" class="img_love" />
								  		</div>
								  	</a>
							  	</div>
					
							<?php 
							$var ++;
							if($var == 3){
								echo "<hr class='mascotas_adoptivas'>";
							}
							endforeach;
							?>
					</div>
				</div>
				<?php
				 	get_sidebar(); 
				?>	
			</div>
		<div class="clearboth"></div>	
	</div>	
</div>
<?php get_footer(); ?>