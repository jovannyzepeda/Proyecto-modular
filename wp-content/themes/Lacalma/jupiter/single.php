<?php
global $post;
get_header(); 
?>

<div id="theme-page">

	<?php 
	if ( have_posts() )  : the_post();
		$background = recupera_post_attachments($post->ID);
		$image      = recupera_imagen_destacada($resultados->ID);
		$author     = recupera_autor($post->post_author);
		$precio     = get_post_meta($post->ID,'wpcf-precio_servicio',true);
		$id = $post->ID;
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
					$correo    = get_post_meta($post->ID,'cf_Correo',true);
					$encuentro = get_post_meta($post->ID,'cf_Encuetro',true);
					$raza      = get_post_meta($post->ID,'cf_raza',true);
					$tel       = get_post_meta($post->ID,'cf_Telefono',true);
					$dueno     = get_post_meta($post->ID,'cf_Dueno',true);
					//$from      = 
						echo '<p><i class="fa fa-paw"></i> Raza: '. $raza .'</p>';
						echo '<p><i class="fa fa-heart"></i> Encuentro: '. $encuentro .'</p>';
						echo '<p><i class="fa fa-user"></i> Dueño:'. $dueno .'</p>';
						echo '<p><i class="fa fa-phone"></i> Teléfono: '. $tel .'</p>';
						echo '<p><i class="fa fa-envelope-o"></i> Correo: '. $correo .'</p>';
						echo "<p><i class='fa fa-info-circle'></i> Información Adicional: ". get_the_content() ."</p>";
					echo "</div>";
					echo "<hr class='mascotas_adoptivas'>";
					echo "<a href = '#contacto'><button class = 'single_add_to_cart_button shop-skin-btn shop-flat-btn alt mensaje_adopta'><i class='fa fa-users'> Enviar mensaje...</i></button></a>";
				}
				?>
				<?php if($precio!="")
					echo "<p class='center'>". get_the_content() ."</p>";
				?>
			</div>
			<div id="message"></div>
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
<div id="contacto" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close"><i class="fa fa-times"></i></a>
        <h4 class="center">Mensaje de contacto</h4>
        <form method="post" action="<?php echo get_template_directory_uri(); ?>/contact.php" name="contactform" id="contactforms">
        	<label for = "nombre"><i class="fa fa-smile-o"></i> Nombre: </label>
        	<input type = "text" placeholder = "Nombre" id = "nombre" name = "nombre"/>
        	<hr class="limpia">
        	<label for = "correo"><i class="fa fa-at"></i> Correo: </label>
        	<input type = "email" placeholder = "Correo electrónico" id = "correo" name = "correo"/>
        	<hr class="limpia">
        	<label for = "numero"><i class="fa fa-mobile"></i> Tel: </label>
        	<input type = "text" placeholder = "Teléfono de contacto" id = "numero" name = "numero"/>
        	<hr class="limpia">
        	<label for = "Mensaje"><i class="fa fa-envelope"></i> Mensaje: </label>
        	<textarea id = "content" placeholder = "Introduce tu mensaje aquí..." rows = "4" cols = "50" name = "content"></textarea>
        	<input type = "hidden"  id = "from" name = "from" value = "<?= $correo ?>"/>
        	<hr class="limpia">
        	<input type = "submit" value="Enviar" class="enviar" onclick="location.href='#close';"/>
        </form>
    </div>
</div>
<div id="adopcion" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close"><i class="fa fa-times"></i></a>
        <h4 class="center">Mensaje de contacto</h4>
        <form method="post" action="<?php echo get_template_directory_uri(); ?>/contact.php" name="contactform" id="contactform">
        	<label for = "nombre"><i class="fa fa-smile-o"></i> Nombre: </label>
        	<input type = "text" placeholder = "Nombre" id = "nombre" name = "nombre"/>
        	<hr class="limpia">
        	<label for = "correo"><i class="fa fa-at"></i> Correo: </label>
        	<input type = "email" placeholder = "Correo electrónico" id = "correo" name = "correo"/>
        	<hr class="limpia">
        	<label for = "numero"><i class="fa fa-mobile"></i> Tel: </label>
        	<input type = "text" placeholder = "Teléfono de contacto" id = "numero" name = "numero"/>
        	<hr class="limpia">
        	<label for = "Mensaje"><i class="fa fa-envelope"></i> Mensaje: </label>
        	<textarea id = "content" placeholder = "Introduce tu mensaje aquí..." rows = "4" cols = "50" name = "content"></textarea>
        	<input type = "hidden"  id = "from" name = "from" value = "<?= $correo ?>"/>
        	<input type = "hidden"  id = "post" name = "post" value = "<?= $id; ?>"/>
        	<input type = "hidden"  id = "type" name = "type" value = "adopcion"/>
        	<hr class="limpia">
        	<input type = "submit" value="Enviar" class="enviar" onclick="location.href='#close';"/>
        </form>
    </div>
</div>
<?php get_footer(); ?>
