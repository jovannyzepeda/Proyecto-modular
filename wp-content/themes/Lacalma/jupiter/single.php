<?php
global $post;
get_header(); 
?>

<div id="theme-page">

	<?php 
	if ( have_posts() )  : the_post();
		$background = recupera_post_attachments($post->ID);
		$image = recupera_imagen_destacada($resultados->ID);
		///Variables
		$precio = get_post_meta($post->ID,'wpcf-precio_servicio',true);

	?>
		<hr class="end_post">
		<div class="content_single" style="background : url('<?= $background; ?>');">
			<div class="margin">
				
				<?php 
				if($precio=="") :?>
					<div class = "info pet">
						<img src="<?= $image; ?>" class="small pet" />
						<h4 class="center"><i class="fa fa-github-alt"></i> <?= get_the_title(); ?></h4>
				<?php 
				else :?>
					<img src="<?= $image; ?>" class="small" />
					<h4 class="center"><?= get_the_title(); ?></h4>
				<?php 
				endif; ?>
				<?php if($precio!="")
				echo '<p class="center">Precio: $'. $precio .'</p>';
				else {
					$correo = get_post_meta($post->ID,'cf_Correo',true);
					$encuentro = get_post_meta($post->ID,'cf_Encuetro',true);
					$raza = get_post_meta($post->ID,'cf_raza',true);
					$tel = get_post_meta($post->ID,'cf_Telefono',true);
					$dueno = get_post_meta($post->ID,'cf_Dueno',true);
						echo '<p><i class="fa fa-paw"></i> Raza: '. $raza .'</p>';
						echo '<p><i class="fa fa-heart"></i> Encuentro: '. $encuentro .'</p>';
						echo '<p><i class="fa fa-user"></i> Dueño:'. $dueno .'</p>';
						echo '<p><i class="fa fa-phone"></i> Teléfono: '. $tel .'</p>';
						echo '<p><i class="fa fa-envelope-o"></i> Correo: '. $correo .'</p>';
						echo "<p><i class='fa fa-info-circle'></i> Información Adicional: ". get_the_content() ."</p>";
					echo "</div>";
					echo "<hr class='mascotas_adoptivas'>";
					echo "<p class = 'center'><i class='fa fa-users'></i>Enviar mensaje...</p>";
				}
				?>
				<?php if($precio!="")
					echo "<p class='center'>". get_the_content() ."</p>";
				?>
			</div>
		</div>

	<?php 
	endif;?>
	<?php
	 	get_sidebar(); 
	?>	
	<div class="Relacionados">
		<h4 class="center">Publicaciones relacionadas</h4>
		<?php 
		$publicacion = recupera_post($post->post_type,3);
		foreach ($publicacion as $publicar) :
		?>
		<a href="<?= $publicar->guid; ?>">
			<div class="content_relacionado">
				<?php $image = recupera_imagen_destacada($publicar->ID); ?>
				<img src="<?= $image; ?>">
				<p class="center"><?= $publicar->post_title; ?><p>
			</div>
		</a>
		<?php 
		endforeach;
		?>
	</div>
</div>

<?php get_footer(); ?>
