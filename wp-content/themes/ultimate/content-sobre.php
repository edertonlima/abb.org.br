
<section class="box-content box-page">

</section>


<?php /*
<section class="box-content no-padding">
	<span id="nos" class="link_page_ancora"></span>

	<h3 class="sub-tituto-page">
		<div class="container"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_page_nos.png" class="" alt="Nós" /><span>Nós</span></div>
	</h3>

	<?php if(get_field('imagem_destaque_nos')){ ?>
		<img src="<?php the_field('imagem_destaque_nos'); ?>" class="img-nos" />
	<?php } ?>
</section>

<section class="box-content box-page-sobre sombra">
	<div class="container">

		<p class="sub-tituto text-content borda-efeito">
			<?php the_field('texto_longo'); ?>
		</p>

		<?php if( have_rows('equipe') ):
			while ( have_rows('equipe') ) : the_row(); ?>

				<div class="equipe">
					<?php if(get_sub_field('imagem')){ ?>
						<img src="<?php the_sub_field('imagem'); ?>" class="" alt="<?php the_sub_field('titulo'); ?>"/>
					<?php } ?>					

					<?php if(get_sub_field('titulo')){ ?>
						<h5><?php the_sub_field('titulo'); ?></h5>
					<?php } ?>

					<?php if(get_sub_field('funcao')){ ?>
						<span><?php the_sub_field('funcao'); ?></span>
					<?php } ?>

					<?php if(get_sub_field('texto')){ ?>
						<p><?php the_sub_field('texto'); ?></p>
					<?php } ?>
					
				</div>

			<?php endwhile;
		endif; ?>	

	</div>
</section>

<section class="box-content no-padding">
	<span id="realizamos" class="link_page_ancora"></span>

	<h3 class="sub-tituto-page margem">
		<div class="container"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_page_realizamos.png" class="" alt="Realizamos" /><span>Realizamos</span></div>
	</h3>

	<div class="container">
		<p class="sub-tituto text-content-medium borda-efeito">
			<?php the_field('texto_realizamos'); ?>
		</p>
	</div>

	<?php if( have_rows('ico_page_inferior') ): ?>
		<ul class="ico-page ico-page-inferior">
			<?php while ( have_rows('ico_page_inferior') ) : the_row(); ?>

				<li>
					<img src="<?php the_sub_field('icone'); ?>" class="" alt="<?php the_sub_field('titulo'); ?>"/>
					<span><?php the_sub_field('titulo'); ?></span>
				</li>

			<?php endwhile; ?>
		</ul>
	<?php endif; ?>	
</section>

<section class="box-content box-sonhos no-padding">
	<span id="sonhos" class="link_page_ancora"></span>

	<h3 class="sub-tituto-page margem">
		<div class="container"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_page_sonhos.png" class="" alt="Sonhos" /><span>Sonhos</span></div>
	</h3>

	<div class="container">
		<div class="row">
			
			<div class="col-6">
				<img src="<?php the_field('imagem-sonhos'); ?>" class="imagem-sonhos" alt="<?php the_field('titulo-sonhos'); ?>"/>
			</div>
			<div class="col-6">
				<h5><?php the_field('titulo-sonhos'); ?></h5>
				<p><?php the_field('texto-sonhos'); ?></p>
			</div>
		</div>
	</div>
</section>

*/ ?>

<script type="text/javascript">
	jQuery(document).ready(function(){	    

	});

	jQuery(window).resize(function(){

	});
</script>