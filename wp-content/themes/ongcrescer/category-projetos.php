<?php get_header(); ?>
<main class="l-main">
	<div class="l-loja">
		<div class="row-content"><!-- Inicio dos botões superiores e titulo loja -->
			<div class="col-12 titulo-loja">
				<h1 class="title-loja">Loja da ONG	</h1>
			</div>
                    <div id="categorias-loja"><?php wp_nav_menu(array('menu' =>'projetos'));?></div>
			
		</div><!-- Fim dos botões superiores e titulo loja -->
		<div class="row-content">
			<div class="row loja-bloco">
                            <?php
                            
                             $categorias = wp_title('&raquo;',FALSE);
          
                $args = array(
                    'post_type' => 'ong_projetos',
                    'orderby'   => 'title',
                    'order'     => 'ASC',
                    'category_name' => $categorias
                    );
                $my_page = get_posts($args);
                ?>
                <?php if($my_page) : foreach ($my_page as $post) : setup_postdata($post); ?>
                            
                            <?php
        $images = rwmb_meta( 'loja-image', 'type=image_advanced' );
        $image_background = null;
        foreach($images as $image){
          $image_background = $image["full_url"];
        }
        
    ?>
					<div class="espaco-linha"><!-- Inicio da caixinha 1 -->
						<div class="row-content">
                                                            <?php if ( $image_background == TRUE){?>
                                                            <img class="imagem-loja" src="<?php echo $image_background ?>"><?php }else{?>
                                                            <img class="imagem-loja" src="<?php image_url("perfil.jpg") ?>" />
                                                            <?php }?>
                                                            <p class="titulo-caixa-loja"><?php the_title();?></p>
                                                            <div class="caixa-preco"><strong>
									<?php if (rwmb_meta( 'loja-preço' ) == TRUE) echo rwmb_meta( 'loja-preço' ); else echo "Valor não informado" ?>
								</strong>
							</div><!-- col-10 -->
							<div class="botao-queroisso">
								<a href="" class="btn btn-warning btn-lg">QUERO ISSO <i class="fa fa-heart"></i></a>
							</div>
						</div>
						
					</div><!-- Fim da caixinha 1 -->
                                        <?php endforeach; else: ?>
                    <p>Lamentamos mas não foram encontrados produtos.</p>            
            <?php endif; ?>
					
			</div><!-- row -->

				<div class="row-content">
					<center>
						<div class="espaco-linha-pagination">
							<nav aria-label="Page navigation example">
							  <ul class="pagination justify-content-center">
							    <li class="page-item">
							      <a class="page-link" style="background-color: black;" href="#" aria-label="Previous">
							        <span aria-hidden="true">&laquo;</span>
							        <span class="sr-only">Previous</span>
							      </a>
							    </li>
							    <li class="page-item"><a class="page-link" style="background-color: black;" href="#">1</a></li>
							    <li class="page-item">
							      <a class="page-link" style="background-color: black;" href="#" aria-label="Next">
							        <span aria-hidden="true">&raquo;</span>
							        <span class="sr-only">Next</span>
							      </a>
							    </li>
							  </ul>
							</nav>
						</div>
					</center>
				</div>

		</div><!-- /row-content -->
	</div><!-- /l-loja -->
</main>

<?php  get_footer(); ?>