<?php 
global $post;
get_header();
?>
	<div class="img_sup">
		<img src="<?php echo recupera_imagen_destacada($post->ID); ?>" class="superior"/>
	</div>
	<div class="mascota_res">
		<?php
		echo do_shortcode( $post->post_content);
		?>
		<div class="clearboth"></div>
		<p>La información sera de origen publico</p>
		<p class="center">Y solo sera mostrada durante 45 días.</p>
	</div>
<?php
get_footer();
?>