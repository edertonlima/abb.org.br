	
	<?php get_template_part( 'content-contato', 'page' ); ?>

	<footer class="footer">
		<div class="msg">
			<div class="container">
				<h3>Venha nos conhecer, ficaremos feliz em te receber!</h3>
			</div>
		</div>
		<div class="container">
			<div class="row">

				<div class="col-4">
					<h1>
						<a href="<?php echo get_home_url(); ?>" title="<?php the_field('titulo', 'option'); ?>">
							<?php /*<img src="<?php the_field('logo_header', 'option'); ?>" alt="<?php the_field('titulo', 'option'); ?>">*/?>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php the_field('titulo', 'option'); ?>">
						</a>
					</h1>
					<h3>ABB Associação Beneficente Betesda</h3>
					<p>Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse pellentesque dui.</p>
					<p>Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula. Ut molestie ultricies porta urna. Vestibulum commodo volutpat a, convallis ac, laoreet enim. Phasellus fermentum in, dolor.</p>
				</div>

				<div class="col-5">
					<div class="item">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<span>
							Quer falar conosco?
							<strong>abel@abb.org.br</strong>
						</span>
					</div>

					<div class="item">
						<i class="fa fa-comment-o" aria-hidden="true"></i>
						<span>
							Ligue para nós
							<strong>(49) 3329-6380</strong>
						</span>
					</div>

					<div class="item endereco">
						<p>Rua Guaporé, 738 D CEP 89.801-101 <br> Bairro Presidente Medici | Chapecó - SC</p>
					</div>
				</div>

				<div class="col-3">
					<div class="fb-page" 
					data-href="https://www.facebook.com/facebook"
					data-width="380" 
					data-hide-cover="false"
					data-show-facepile="false"></div>
				</div>

				<?php /*<div class="tel_footer">
					<span><?php the_field('telefone_1', 'option'); ?></span>
					<?php
						if(get_field('telefone_2', 'option')){ ?>
							<span><?php the_field('telefone_2', 'option'); ?></span>
						<?php }
					 ?>
				</div>
				<img src="<?php the_field('logo_header', 'option'); ?>" alt="<?php the_field('titulo', 'option'); ?>" class="logo_footer"> */?>
				
			</div>
		</div>

		<div class="copy">
			
			<div class="redes">
				<a href="javascript:" title="" class="item_bar"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				<a href="javascript:" title="" class="item_bar"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				<a href="javascript:" title="" class="item_bar"><i class="fa fa-youtube" aria-hidden="true"></i></a>
				<a href="javascript:" class="item_bar" id="gotop"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
			</div>

			<?php if( have_rows('redes_sociais','option') ): ?>
				<div class="redes">						
					<?php while ( have_rows('redes_sociais','option') ) : the_row(); ?>

						<a href="<?php the_sub_field('url','option'); ?>" title="<?php the_sub_field('nome','option'); ?>" target="_blank">
							<img src="<?php the_sub_field('icone','option'); ?>" alt="<?php the_field('nome', 'option'); ?>">
						</a>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<p><i class="fa fa-copyright" aria-hidden="true"></i> <?php echo date('Y') ?> ABB Associação Beneficente Betesda.</p>
		</div>
		
	</footer>

	<script type="text/javascript">
		
		jQuery.noConflict();

		jQuery(document).ready(function(){
			jQuery(".scroll").click(function(event){
				event.preventDefault();
				jQuery('.menu-mobile').removeClass('active');
				jQuery('.header').removeClass('active');
				jQuery('.nav').css('top','-110vh');
				jQuery('html,body').animate( { scrollTop:jQuery(this.hash).offset().top } , 1000);
			});

			jQuery("#gotop").click(function(event){
				event.preventDefault();
				jQuery('html,body').animate( { scrollTop: 0 } , 1000);
			});


			// FORM
			jQuery(".enviar").click(function(){
				jQuery('.enviar').html('ENVIANDO').prop( "disabled", true );
				jQuery('.msg-form').removeClass('erro ok').html('');
				var nome = jQuery('#nome').val();
				var email = jQuery('#email').val();
				var telefone = jQuery('#telefone').val();
				var assunto = jQuery('#assunto').val();
				var mensagem = jQuery('#texto').val();
				var para = '<?php get_field('email', 'option'); ?>';
				var nome_site = '<?php get_field('titulo', 'option'); ?>';

				if(email!=''){
					jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome:nome, email:email, telefone:telefone, assunto:assunto, mensagem:mensagem, para:para, nome_site:nome_site }, function(result){		
						if(result=='ok'){
							resultado = 'Enviado com sucesso! Obrigado.';
							classe = 'ok';
						}else{
							resultado = result;
							classe = 'erro';
						}
						jQuery('.msg-form').addClass(classe).html(resultado);
						jQuery('form').trigger("reset");
						jQuery('.enviar').html('CADASTRAR').prop( "disabled", false );
					});
				}else{
					jQuery('.msg-form').addClass('erro').html('Por favor, digite um e-mail válido.');
					jQuery('.enviar').html('CADASTRAR').prop( "disabled", false );
				}
			});
		});

	</script>

</body>
</html>