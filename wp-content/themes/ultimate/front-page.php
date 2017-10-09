<?php get_header(); ?>

<!-- slide -->
<section class="box-content box-slide">
	<div class="slide">
		<div class="carousel slide" data-ride="carousel" data-interval="6000" id="slide">

			<div class="carousel-inner" role="listbox">

				<?php if( have_rows('slide') ):
					$slide = 0;
					while ( have_rows('slide') ) : the_row();

						if(get_sub_field('imagem')){
							$slide = $slide+1; ?>

							<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem'); ?>');">

								<div class="box-height">
									<div class="box-texto">

										<?php if(get_sub_field('texto')){ ?>
											<p class="texto"><?php the_sub_field('texto'); ?></p>
										<?php } ?>

										<?php if(get_sub_field('sub_texto')){ ?>
											<p class="sub-texto"><?php the_sub_field('sub_texto'); ?></p>
										<?php } ?>

									</div>
								</div>
								
							</div>

						<?php }

					endwhile;
				endif; ?>

			</div>

			<ol class="carousel-indicators">
				
				<?php for($i=0; $i<$slide; $i++){ ?>
					<li data-target="#slide" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
				<?php } ?>
				
			</ol>

		</div>
	</div>
</section>

<section class="box-content box-areaatuacao">
	<div class="container">

		<div class="list-post-home">
			<h4>Conheça um pouco sobre nós</h4>
		</div>

		<div class="row">
			
			<div class="col-4">				
				<div class="item-areaatuacao">
					<div class="icon-content">
						<div class="icon">
							<i class="fa fa-star-o" aria-hidden="true"></i>
						</div>
					</div>
					<div class="desc_wrapper">
						<h3>Capacitação de Lideres</h3>
						<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
					</div>
				</div>
			</div>

			<div class="col-4">				
				<div class="item-areaatuacao">
					<div class="icon-content">
						<div class="icon">
							<i class="fa fa-star-o" aria-hidden="true"></i>
						</div>
					</div>
					<div class="desc_wrapper">
						<h3>Capacitação de Lideres</h3>
						<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
					</div>
				</div>
			</div>

			<div class="col-4">				
				<div class="item-areaatuacao">
					<div class="icon-content">
						<div class="icon">
							<i class="fa fa-star-o" aria-hidden="true"></i>
						</div>
					</div>
					<div class="desc_wrapper">
						<h3>Capacitação de Lideres</h3>
						<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
					</div>
				</div>
			</div>

			<div class="home-sobre-nos">
				<div class="col-6">
					<p><strong>E ainda que tivesse o dom de profecia, e conhecesse todos os mistérios e toda ciência, e ainda que tivesse toda a fé, de maneira tal que transportasse os montes, e não tivesse amor, nada seria. (1 Coríntios 13:2)</strong></p>

					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

					<a href="" class="leia-mais">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
						Leia mais
					</a>
				</div>

				<div class="col-6">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg_header.jpg" alt="Conheça um pouco sobre nós">
				</div>
			</div>

		</div>
	</div>	
</section>

<section class="box-content box-post box-projetos">
	<div class="list-post-home">
		<h3>Conheça nossos projetos</h3>

		<ul class="row list-post">
			<li class="col-4">
				<a href="" style="background-image: url('http://betheme.muffingroupsc.netdna-cdn.com/betheme/wp-content/uploads/2017/02/home_betheme_portfolio1-480x360.jpg');">
					<div class="mask">
						<i class="fa fa-link" aria-hidden="true"></i>
					</div>
				</a>
			</li>

			<li class="col-4">
				<a href="" style="background-image: url('http://betheme.muffingroupsc.netdna-cdn.com/betheme/wp-content/uploads/2017/02/home_betheme_portfolio2-480x360.jpg');">
					<div class="mask">
						<i class="fa fa-link" aria-hidden="true"></i>
					</div>
				</a>
			</li>

			<li class="col-4">
				<a href="" style="background-image: url('http://betheme.muffingroupsc.netdna-cdn.com/betheme/wp-content/uploads/2017/02/home_betheme_portfolio3-480x360.jpg');">
					<div class="mask">
						<i class="fa fa-link" aria-hidden="true"></i>
					</div>
				</a>
			</li>
		</ul>

	</div>
</section>

<section class="box-content box-post">
	<div class="container">

		<div class="list-post-home">
			<h4>Últimas notícias</h4>
		</div>

		<ul class="row list-post">
			<li class="col-4">
				<a href="" style="background-image: url('http://betheme.muffingroupsc.netdna-cdn.com/betheme/wp-content/uploads/2017/02/home_betheme_portfolio1-480x360.jpg');">
					<div class="mask">
						<i class="fa fa-link" aria-hidden="true"></i>
					</div>
				</a>

				<h3>Vestibulum at pulvinar nullam</h3>
				<p>Interdum et malesuada fames ac ante sed. Pellente sque at bibendum diam cras amet.</p>
				<a href="" class="leia-mais">
					<i class="fa fa-file-text-o" aria-hidden="true"></i>
					Leia mais
				</a>
			</li>

			<li class="col-4">
				<a href="" style="background-image: url('http://betheme.muffingroupsc.netdna-cdn.com/betheme/wp-content/uploads/2017/02/home_betheme_portfolio2-480x360.jpg');">
					<div class="mask">
						<i class="fa fa-link" aria-hidden="true"></i>
					</div>
				</a>

				<h3>Vestibulum at pulvinar nullam</h3>
				<p>Interdum et malesuada fames ac ante sed. Pellente sque at bibendum diam cras amet.</p>
				<a href="" class="leia-mais">
					<i class="fa fa-file-text-o" aria-hidden="true"></i>
					Leia mais
				</a>
			</li>

			<li class="col-4">
				<a href="" style="background-image: url('http://betheme.muffingroupsc.netdna-cdn.com/betheme/wp-content/uploads/2017/02/home_betheme_portfolio3-480x360.jpg');">
					<div class="mask">
						<i class="fa fa-link" aria-hidden="true"></i>
					</div>
				</a>

				<h3>Vestibulum at pulvinar nullam</h3>
				<p>Interdum et malesuada fames ac ante sed. Pellente sque at bibendum diam cras amet.</p>
				<a href="" class="leia-mais">
					<i class="fa fa-file-text-o" aria-hidden="true"></i>
					Leia mais
				</a>
			</li>
		</ul>

	</div>
</section>	

<?php get_footer(); ?>

<script type="text/javascript">
	jQuery(document).ready(function(){	    



	});

	jQuery(window).resize(function(){

	});
</script>