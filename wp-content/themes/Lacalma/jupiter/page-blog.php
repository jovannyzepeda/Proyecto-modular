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
				$values = 1;
				foreach ($result as $resultados) :
				?>
					<div class="post_full" id = "<?= $resultados->ID; ?>">
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
							<div class="comentarios<?= $resultados->ID; ?>">
								<?php $bool = 1;
									$commentarios = recupera_comentarios($resultados->ID);
										foreach ($commentarios as $coment) :
											if($bool==1&&$coment!=NULL){
												echo "<h4>Comentarios</h4>
													<hr>";
												$bool=0;
											}
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
							<?php  
						    global $current_user;
						    get_currentuserinfo();
						    if($current_user->user_login==NULL):
						        echo "<p class='center'>Necesitas Estar logeado para comentar...</p>";
						    else :
						    ?>
								<div id="<?= $values; ?>" class="comment-respond">
									<h3 id="reply-title" class="comment-reply-title">Tu que opinas...</h3>
										<form  id="commentform" class="comment-form">																															
											<div class="comment-form-comment">
												<textarea id="comment" name="comment" class = "<?= $values; ?>"cols="45" rows="8"></textarea>
											</div>
												<input name="submit"  id="<?= $values; ?>" class="submit" value="Publicar comentario" onclick="registrar(this.id)" type = "button">
												<input type="hidden" name="comment_post_ID" value="<?php echo $resultados->ID; ?>" id="comment_post_ID">
												<input type="hidden" name="comment_parent" id="comment_parent" value="0">
												<input type="hidden" name="url" id="url" value="<?php echo get_permalink( $post->ID ); ?>">
										</form>
								</div>
							<?php 
							endif;
							?>
					</div>
					<hr class='end_post'/>
				<?php
				$values ++;
				endforeach;
				?>

				<!--fin-->
				<hr class="end_post">

				
			</div>
			<?php 
			$pagina = recupera_page(1); 
			$imagen = recupera_imagen_destacada($pagina[0]->ID);
			?>
			<div class="amores">
				<div class="amor">
					<h4><?php echo $pagina[0]->post_title; ?></h4>
					<img src="<?= $imagen; ?>"/>
					<hr class="end_post">
						<?php 
						$result = recupera_post('mascotas',20);
						foreach ($result as $resultados) :
							$image = recupera_imagen_destacada($resultados->ID);
						?>
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
						  			<img src="<?= $image; ?>";/>
						  		</div>
						  	</a>
						  	<hr class="end_post">
						<?php 
						endforeach;
						?>
					  	
				</div>
				<?php
				 	get_sidebar(); 
				?>	
			</div>
		<div class="clearboth"></div>	
		</div>
	</div>	
</div>
<script type="text/javascript">
/*cambiar*/
	function registrar(idp) {
		<?php 
		    global $current_user;
		    get_currentuserinfo();
		?>
		var comentario = $('textarea.'+idp).val();
		var id 		   = $('textarea.'+idp).parent().parent().parent().parent().attr("id");
		var autor      = '<?= $current_user->user_nicename; ?>';
		var email      = '<?= $current_user->user_email; ?>';
		var url        = '<?= $current_user->user_url; ?>';
		var user       = '<?= $current_user->ID; ?>'

		$.ajax({
			type: "POST",
			url: "/proyecto_modular/wp-admin/admin-ajax.php",
			dataType: 'json',
			data: {'action':'load','mensaje':comentario,'id_post':id,
					'autor':autor,'email':email,'url':url,'user':user},
			success: function(result){
				$('textarea.'+idp).val('');
				$("<div>",{
					class: "mk-single-comment"
				}).append(
					$("<div>",{
						class : "gravatar",
					}).append(
						$("<img>",{
							class : "avatar avatar-45 photo",
							src   : "<?php echo get_avatar_url(get_avatar( $coment->user_id, $size='45', $default='' )); ?>"
						})
					),
					$("<div>",{
						class : "comment-meta"
					}).append(
						$("<span>",{
							class : "comment-author"
						}).append(
							$("<a>",{
								href : result[3],
								text : result[2]
							})
						),
						$("<time>",{
							class : "comment-time",
							text  : result[1]
						})
					),
					$("<div>",{
						class : "clearboth"
					}),
					$("<div>",{
						class : "comment_content"
					}).append(
						$("<p>",{
							text  : result[0] 
						}),
						$("<div>",{
							class : "clearboth"
						})
					)

				).appendTo("div.comentarios"+id).fadeIn('slow');
		
			}
		});
	}
</script>
<?php get_footer(); ?>
