<?php
global $post;
get_header(); 
?>

<div id="theme-page">

	<?php 
	if ( have_posts() )  : the_post();
		$background = recupera_post_attachments($post->ID);
		$image = recupera_imagen_destacada($resultados->ID);
	?>
		<hr class="end_post">
		<div class="content_single" style="background : url('<?= $background; ?>');">
			<div class="margin">
				<img src="<?= $image; ?>" class="small" />
				<h4 class="center"><?= get_the_title(); ?>hjvh</h4>
				
				<p class="center"><?= get_the_content(); ?></p>
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