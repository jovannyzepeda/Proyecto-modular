<?php
global $post;
get_header();
?>
<div id="theme-page">
	<div class="mk-main-wrapper-holder">
		<div class="theme-page-wrapper right-layout vc_row-fluid mk-grid row-fluid">
			<div class="theme-content">

			

				<!--Servicios-->
				<h1 class="publicaciones">
					Nuestro Espacio Para Tu Mejor Amigo.
				</h1>
				<hr>
				<?php
				$result = recupera_post('post',-1);
				foreach ($result as $resultados) :
				?>
					<div class="post_full">
						<?php 
						$image = recupera_imagen_destacada($resultados->ID); 
						?>
							<img src="<?php echo $image; ?>" class="image_post full"/>
							<div class="autor">
								<h3>
									<?php echo $resultados->post_title; ?>
								</h3>
								<?php 
								$autor= recupera_autor($resultados->post_author); 
								?>
								<h5>Publicado por: <?php echo $autor[0]->user_nicename; ?></h5>
								<h6>El Día: <?php echo $resultados->post_date;?></h6>
								<?php echo get_avatar( $resultados->post_author, $size='45', $default='' );  ?>
							</div>
							<hr class='end_post'/>
							<div class="content">
								<p>
									<?php echo $resultados->post_content;
									?>
								</p>
							</div>
							<div class="comentarios">
								<h4>Comentarios</h4>
								<hr>
								<?php $commentarios = recupera_comentarios($resultados->ID);
										foreach ($commentarios as $coment) :
											$autor= recupera_autor($coment->user_id);
										?>
											<div class="mk-single-comment">
												<div class="gravatar">
													<?php echo get_avatar( $coment->user_id, $size='45', $default='' ); ?>
												</div>
												<div class="comment-meta">
														<span class="comment-author">
															<a href="<?php echo $autor[0]->user_url; ?>" target="_blank" class="url">
																<?php echo $coment->comment_author; ?>
															</a>
														</span>					
									                    <time class="comment-time"><?php echo $coment->comment_date; ?></time>
												</div>
												<div class="clearboth"></div>
												<div class="comment-content">
													<p>
														<?php 
															echo $coment->comment_content;
														?>
													</p>
													<div class="clearboth"></div>
												</div>

											       
											</div>
										<?php
										endforeach;
								 ?>
							</div>
							<div id="respond" class="comment-respond">
								<h3 id="reply-title" class="comment-reply-title">Tu que opinas...</h3>
									<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="commentform" class="comment-form">																															
										<div class="comment-form-comment">
											<textarea id="comment" name="comment" cols="45" rows="8"></textarea>
										</div>
											<input name="submit" type="submit" id="submit" class="submit" value="Publicar comentario">
											<input type="hidden" name="comment_post_ID" value="<?php echo $resultados->ID; ?>" id="comment_post_ID">
											<input type="hidden" name="comment_parent" id="comment_parent" value="0">
											<input type="hidden" name="url" id="url" value="<?php echo get_permalink( $post->ID ); ?>">
									</form>
							</div>
					</div>
					<hr class='end_post'/>
				<?php
				endforeach;
				?>

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