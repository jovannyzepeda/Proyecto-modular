<?php
global $post;
get_header(); 
?>
<div id="theme-page">
	<div class="mk-main-wrapper-holder">
		<div id="mk-page-id-<?php echo $post->ID; ?>" class="theme-page-wrapper mk-main-wrapper <?php echo $page_layout; ?>-layout <?php echo $padding; ?> mk-grid vc_row-fluid">
			<div class="theme-content " itemprop="mainContentOfPage">
				<?php if ( have_posts() ) : the_post();?>
						<h2 class="center"><?= get_the_title(); ?></h2>
						
						<div class="clearboth"></div>
				<?php endif; ?>
				<hr class="separador"/>
				<?php $cliente = recupera_post('clientes',1); 
				$imagen = recupera_imagen_destacada($cliente[0]->ID);?>
				<h4 class="center">Gracias por ser nuestra estrella de este mes</h4>
				<hr class="separador"/>
				<div class="align_right">
					<h5><?= $cliente[0]->post_title; ?></h5>
					<p>Cliente del mes de : <?=  get_post_meta($cliente[0]->ID,'wpcf-mes-letra',true);?></p>
					<p><?= $cliente[0]->post_content ?></p>
				</div>
				<div class="align_left">
					<img src="<?= $imagen; ?>" class="maxmo"/>
				</div>

			</div>
		<div class="clearboth"></div>
		</div>
		<div class="clearboth"></div>
		<?php
			get_sidebar(); 
		?>	
		<hr class="separador"/>
	</div>	
</div>
<?php get_footer(); ?>