f<?php
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
							$image = recupera_post_attachments($resultados->ID);
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
			get_sidebar(); 
		?>	
		<div class="clearboth"></div>	
		</div>
	</div>	
</div>
<?php get_footer(); ?>