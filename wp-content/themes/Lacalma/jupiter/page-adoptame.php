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
						<h4><?php echo $pagina[0]->post_title; ?></h4>
						<img src="<?= $imagen; ?>"/>
						<hr class="end_post">
							<?php 
							$result = recupera_post('mascotas',5);
							foreach ($result as $resultados) :
								$image = recupera_imagen_destacada($resultados->ID);
							?>
						  		<a href="<?= $resultados->guid; ?>">
						  		<h5><?php echo $resultados->post_title ?></h5>
						  		<p><?php echo get_post_meta($resultados->ID,'cf_Encuetro',true); ?></p>
							  		<div class="informacion">
							  			<img src="<?= $image; ?>";
							  			onmouseover="this.src='<?= $imagen; ?>'";
							  			onmouseout="this.src='<?= $image; ?>'";/>
							  		</div>
							  	</a>
							  	<hr class="end_post">
							<?php 
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