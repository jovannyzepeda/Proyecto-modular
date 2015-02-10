<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
global $post;

get_header();
?>
<div id="theme-page">
	<div class="mk-main-wrapper-holder">
		<div class="theme-page-wrapper right-layout vc_row-fluid mk-grid row-fluid">
			<div class="theme-content">

			<!--Carrusel de inicio -->
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<?php 
						$result = recupera_post('post_image',-1);
						$first = true;
						foreach ($result as $resultados) :
							$image = recupera_post_attachments($resultados->ID);
							if($first==true):
						?>

						    <div class="item active">
						        <img src="<?php echo $image; ?>">
						        <div class="carousel-caption">
						            <h3>
						           		<?php echo $resultados->post_title; ?>
						            </h3>
						            <p>
						            	<?php echo $resultados->post_content; ?>
						            </p>
						        </div>
						    </div>
						    <?php 
						    $first = false;
						    else :
						    ?>
						    <div class="item">
						        <img src="<?php echo $image; ?>">
						        <div class="carousel-caption">
						            <h3>
						           		<?php echo $resultados->post_title; ?>
						            </h3>
						            <p>
						            	<?php echo $resultados->post_content; ?>
						            </p>
						        </div>
						    </div>
					    <?php
					    	endif; 
					    endforeach; 
					    ?>
					</div>
					  <!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					    <i class="fa fa-angle-left"></i>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					    <i class="fa fa-angle-right"></i>
					</a>
				</div> 
				<!--fin del Carousel -->

				<!--Servicios-->
				<div class="servicios">
					<h1>Nuestros Servicios.</h1>
						<?php 
						$result = recupera_post('servicios',-1);
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

				<!--Ultimas 5 entradas publicadas-->
				<h1 class="publicaciones">
					Ultimas Publicaciones
				</h1>
				<hr>
				<?php
				$result = recupera_post('post',6);
				$post_n = 0;
				foreach ($result as $resultados) :
				?>
					<div class="post">
						<?php 
						$image = recupera_imagen_destacada($resultados->ID); 
						?>
						<a href="<?=  $resultados->guid; ?>">
							<img src="<?php echo $image; ?>" class="image_post"/>
							<div class="content">
								<h3>
									<?php echo $resultados->post_title; ?>
								</h3>
								<p>
									<?php echo substr($resultados->post_content,0,200);
									if (strlen($resultados->post_content)>200) {
									 	echo "...";
									} 
									?>
								</p>
							</div>
						</a>
					</div>
				<?php
				$post_n += 1;
				if ($post_n == 2) {
					$post_n = 0;
					echo "<hr class='end_post'/>";
				}
				endforeach;
				?>
				<!--fin de entradas-->
			</div>
		<?php
		 	get_sidebar(); 
		?>	
		<div class="clearboth"></div>	
		</div>
	</div>	
</div>
<?php get_footer(); ?>