<?php get_header(); ?>

	<?php
	if (has_category('piemonte-che-cambia') || has_category('casentino-che-cambia') || has_category('liguria-che-cambia')) {
		if (has_category('piemonte-che-cambia')){
			get_template_part('menu','piemonte');
		} elseif (has_category('casentino-che-cambia')) {
			get_template_part('menu','casentino');
		} elseif (has_category('liguria-che-cambia')) {
			get_template_part('menu','liguria');
		}
	} ?>

<div class="container single clearfix"><!-- SINGLE -->
	<div class="row">
		<div class="col-12 col-md-6 offset-md-3">
			<?php dynamic_sidebar('singlestart'); ?>
		</div>
	</div>
	<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- Categorie -->
			<div class='single__nav__category'>
				<?php
				if(isset($_SESSION['cat1'])) { ?>
					<a href="<?php echo home_url(); ?>/categoria/contenuti/" class="single__torna__contenuti p-2 mr-3"><i class="fas fa-chevron-left"></i> Torna ai contenuti</a>
				<?php }
				if(isset($_SESSION['RubricheCat1'])) { ?>
					<a href="<?php echo home_url(); ?>/categoria/contenuti/rubriche/" class="single__torna__contenuti p-2 mr-3"><i class="fas fa-chevron-left"></i> Torna alle rubriche</a>
				<?php }
				if(isset($_SESSION['termine-cercato'])) { ?>
					<a href="<?php echo home_url(); ?>/cerca/" class="single__torna__contenuti p-2 mr-3"><i class="fas fa-chevron-left"></i> Torna alla ricerca</a>
				<?php }
					the_category(' ');
					?>
				</a>

				<br />
			</div>
			<!-- Thumbnail o video youtube -->

				<?php
				if( !empty (get_post_meta( get_the_ID(), 'YouTubeLink',true))){
					?>
					<div class="single__thumbnail">
						<figure class="embed-responsive embed-responsive-16by9">
							<iframe width="800" height="480" src="https://www.youtube.com/embed/<?php echo linkifyYouTubeURLs(get_post_meta( get_the_ID(), 'YouTubeLink',true));?>?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
						</figure>
					</div>
					<?php
				}
				?>


			<!-- TAG -->
			<div class="single__head">
				<div class="single__tag">
					<?php $post_tags = wp_get_post_tags($post->ID);
					if(!empty($post_tags)) {?>
						<p class="tag"><?php the_tags('', ' ', ''); ?></p>
					<?php } ?>
				</div>
				<!-- DATA -->
				<div class="single__date">
					<?php the_time('j M Y') ?>
				</div>
				<!-- Title -->
				<h1 class="single__title">
					<?php the_title(); ?>
				</h1>
				<!-- Autore/i -->
				<div class="single__author">

						Scritto da: <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><b><?php the_author(); ?></b></a>
						<?php
						/* controllo se esiste un secondo autore */
						if( !empty (get_post_meta( get_the_ID(), 'SecondoAutore',true))){
							echo " e <b>". get_post_meta( get_the_ID(), 'SecondoAutore',true)."</b>";
						}
					?>
				</div>
				<!-- Intervista di -->
				<div class="single__author">
					<?php
						if( !empty (get_post_meta( get_the_ID(), 'IntervistaDi',true))){
							echo "Intervista di: <b>". get_post_meta( get_the_ID(), 'IntervistaDi',true)."</b>";
						}
					?>
				</div>
				<!-- Video Realizzato da -->
				<div class="single__author">
					<?php
						if( !empty (get_post_meta( get_the_ID(), 'VideoRealizzatoDa',true))){
							echo "Video realizzato da: <b>". get_post_meta( get_the_ID(), 'VideoRealizzatoDa',true)."</b>";
						}
					?>
				</div>
				<!-- Riprese di -->
				<div class="single__author">
					<?php
						if( !empty (get_post_meta( get_the_ID(), 'RipreseDi',true))){
							echo "Riprese di: <b>". get_post_meta( get_the_ID(), 'RipreseDi',true)."</b>";
						}
					?>
				</div>
				<!-- Montaggio di -->
				<div class="single__author">
					<?php
						if( !empty (get_post_meta( get_the_ID(), 'MontaggioDi',true))){
							echo "Montaggio di: <b>". get_post_meta( get_the_ID(), 'MontaggioDi',true)."</b>";
						}
					?>
				</div>
				<!-- Meta Description -->
				<h2 class="single__metaDescription">
					<?php the_excerpt();?>
				</h2>
				<!-- Share with -->
				<div class="single__share mb-1">
					<?php
					if ( function_exists( 'sharing_display' ) ) {
	    			sharing_display( '', true );
					}

					if ( class_exists( 'Jetpack_Likes' ) ) {
	    			$custom_likes = new Jetpack_Likes;
	    		echo $custom_likes->post_likes( '' );

					}
					 ?>
					 <div class="fb-like" data-href="https://www.facebook.com/itachecambia/" data-width="" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>


				</div>
			</div>
			<!-- Content -->
			<div class="single__articolo">
				<?php the_content();?>
			</div>



			<div class="single__share mb-1">
				<?php
				if ( function_exists( 'sharing_display' ) ) {
					sharing_display( '', true );
				}

				if ( class_exists( 'Jetpack_Likes' ) ) {
					$custom_likes = new Jetpack_Likes;
				echo $custom_likes->post_likes( '' );
				}
				 ?>
				 <div class="fb-like" data-href="https://www.facebook.com/itachecambia/" data-width="" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
			</div>



		</article>

	<?php endwhile; else : ?>

	  <h3> <?php esc_html_e('Sorry, no posts matched your criteria.', 'miotema'); ?> </h3>

	<?php endif; ?>
	<div class="row">
		<div class="col-12 col-md-6 offset-md-3">
			<?php dynamic_sidebar('singleend'); ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>
