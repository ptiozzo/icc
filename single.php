<?php get_header();?>

	<?php
	if (has_category('piemonte-che-cambia') || has_category('casentino-che-cambia') || has_category('liguria-che-cambia')) {
		if (has_category('piemonte-che-cambia')){
			get_template_part('piemonte/menu','piemonte');
		} elseif (has_category('casentino-che-cambia')) {
			get_template_part('casentino/menu','casentino');
		} elseif (has_category('liguria-che-cambia')) {
			get_template_part('liguria/menu','liguria');
		}
	} ?>

	<?php if (have_posts()) :?><?php while(have_posts()) : the_post();
	include("inc/single-visione.php");
	$icc_article_ID = get_the_ID(); ?>
<div class="single">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="row">
				<div class="col-12 col-md-10 order-md-2">
					<div class="container clearfix"><!-- SINGLE -->
						<div class="row">
							<div class="col-12 col-md-6 offset-md-3">
								<?php dynamic_sidebar('singlestart'); ?>
							</div>
						</div>

			<!-- Categorie -->
			<div class='single__nav__category'>
				<?php

				if( strpos($_SERVER["HTTP_REFERER"],"rubriche")) { ?>
				<a href="<?php echo home_url(); ?>/categoria/contenuti/rubriche/<?php {echo "page/".get_transient('icc_rubrichePaged_'.(string) $_COOKIE['PHPSESSID'])."/";}?>" class="single__torna__contenuti p-2 mr-3"><i class="fas fa-chevron-left"></i> Torna alle rubriche</a>
			<?php } elseif (strpos($_SERVER["HTTP_REFERER"],"contenuti") && get_transient('icc_contenutiCat1_'.(string) $_COOKIE['PHPSESSID'])) { ?>
				<a href="<?php echo home_url(); ?>/contenuti/<?php {echo "page/".get_transient('icc_contenutiPaged_'.(string) $_COOKIE['PHPSESSID'])."/";} ?>" class="single__torna__contenuti p-2 mr-3"><i class="fas fa-chevron-left"></i> Torna ai contenuti</a>
			<?php } elseif (strpos($_SERVER["HTTP_REFERER"],"cerca")) { ?>
				<a href="/cerca/<?php {echo "page/".get_transient('icc_cercaPaged_'.(string) $_COOKIE['PHPSESSID'])."/";} ?>" class="single__torna__contenuti p-2 mr-3"><i class="fas fa-chevron-left"></i> Torna alla ricerca</a>
				<?php }
					the_category(' ');
					?>
				</a>

				<br />
			</div>



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
						if( !empty (get_post_meta( get_the_ID(), 'Secondo_Autore',true))){
							echo " e <a href='".get_author_posts_url(get_post_meta( get_the_ID(), 'Secondo_Autore',true))."'><b>". get_userdata(get_post_meta( get_the_ID(), 'Secondo_Autore',true))->display_name."</b></a>";
						} elseif( !empty (get_post_meta( get_the_ID(), 'SecondoAutore',true))){
							echo " e ". get_post_meta( get_the_ID(), 'SecondoAutore',true);
						}
					?>
				</div>
				<!-- Intervista di -->
				<div class="single__author">
					<?php
					if( !empty (get_post_meta( get_the_ID(), 'Intervista_Di',true))){
						echo "Intervista di: <b>". get_post_meta( get_the_ID(), 'Intervista_Di',true)."</b>";
					} elseif( !empty (get_post_meta( get_the_ID(), 'IntervistaDi',true))) {
							echo "Intervista di: <b>". get_post_meta( get_the_ID(), 'IntervistaDi',true)."</b>";
						}
					?>
				</div>
				<!-- Video Realizzato da -->
				<div class="single__author">
					<?php
						if( !empty (get_post_meta( get_the_ID(), 'Video_Realizzato_Da',true))){
							echo "Video realizzato da: <b>". get_post_meta( get_the_ID(), 'Video_Realizzato_Da',true)."</b>";
						} elseif( !empty (get_post_meta( get_the_ID(), 'VideoRealizzatoDa',true))){
							echo "Video realizzato da: <b>". get_post_meta( get_the_ID(), 'VideoRealizzatoDa',true)."</b>";
						}
					?>
				</div>
				<!-- Riprese di -->
				<div class="single__author">
					<?php
						if( !empty (get_post_meta( get_the_ID(), 'Riprese_Di',true))){
							echo "Riprese di: <b>". get_post_meta( get_the_ID(), 'Riprese_Di',true)."</b>";
						}
						if( !empty (get_post_meta( get_the_ID(), 'RipreseDi',true))){
							echo "Riprese di: <b>". get_post_meta( get_the_ID(), 'RipreseDi',true)."</b>";
						}
					?>
				</div>
				<!-- Montaggio di -->
				<div class="single__author">
					<?php
						if( !empty (get_post_meta( get_the_ID(), 'Montaggio_Di',true))){
							echo "Montaggio di: <b>". get_post_meta( get_the_ID(), 'Montaggio_Di',true)."</b>";
						}	elseif( !empty (get_post_meta( get_the_ID(), 'MontaggioDi',true))){
							echo "Montaggio di: <b>". get_post_meta( get_the_ID(), 'MontaggioDi',true)."</b>";
						}
					?>
				</div>
				<!-- Regia di -->
				<div class="single__author">
						<?php
						if( !empty (get_post_meta( get_the_ID(), 'Regia_Di',true))){
							echo "Regia di: <b>". get_post_meta( get_the_ID(), 'Regia_Di',true)."</b>";
						}	elseif( !empty (get_post_meta( get_the_ID(), 'RegiaDi',true))){
							echo "Regia di: <b>". get_post_meta( get_the_ID(), 'RegiaDi',true)."</b>";
						}
					?>
				</div>
				<!-- llustrazione di -->
				<div class="single__author">
						<?php
						if( !empty (get_post_meta( get_the_ID(), 'Illustrazioni_Di',true))){
							echo "Illustrazioni di: <b>". get_post_meta( get_the_ID(), 'Illustrazioni_Di',true)."</b>";
						}	elseif( !empty (get_post_meta( get_the_ID(), 'IllustrazioniDi',true))){
							echo "Illustrazioni di: <b>". get_post_meta( get_the_ID(), 'IllustrazioniDi',true)."</b>";
						}
					?>
				</div>
				<!-- Campo libero  -->
				<div class="single__author">
						<?php
						if( !empty (get_post_meta( get_the_ID(), 'Campo_Libero_Desc',true)) && !empty (get_post_meta( get_the_ID(), 'Campo_Libero_Dato',true))){
							echo get_post_meta( get_the_ID(), 'Campo_Libero_Desc',true).": <b>". get_post_meta( get_the_ID(), 'Campo_Libero_Dato',true)."</b>";
						}
					?>
				</div>


				<!-- Meta Description -->
				<p class="h2 single__metaDescription">
					<?php echo get_the_excerpt();?>
				</p>
			</div>
			<!-- Share with -->
			<div class="single__share">
				<?php
				if ( function_exists( 'sharing_display' ) ) {
					sharing_display( '', true );
				}

				if ( class_exists( 'Jetpack_Likes' ) ) {
					$custom_likes = new Jetpack_Likes;
				echo $custom_likes->post_likes( '' );
				}
				 ?>
			</div>
			<!-- Content -->
			<div class="row justify-content-center">
				<?php if(get_post_meta( get_the_ID(), 'Audio',true)){ ?>
					<div class="col-12 col-lg-6">
						<?php echo do_shortcode('[audio mp3=' . get_post_meta( get_the_ID(), 'Audio',true) . ']'); ?>
					</div>
					<div class="col p-2 p-lg-0 text-center wp-block-button col-12 col-md-6">
						<a href="<?php echo get_post_meta( get_the_ID(), 'Audio',true) ?>" class="wp-block-button__link" download>Scarica</a>
					</div>
				<?php } ?>
			 <div class="col-12 col-lg-10">
				 <div class="single__articolo">

		 			<?php
		 			if( !empty (get_post_meta( get_the_ID(), 'YouTubeLink',true))){
		 				?>
					 	<!-- Thumbnail o video youtube -->
		 				<div class="single__thumbnail">
		 					<figure class="embed-responsive embed-responsive-16by9">
		 						<iframe width="800" height="480" src="https://www.youtube.com/embed/<?php echo linkifyYouTubeURLs(get_post_meta( get_the_ID(), 'YouTubeLink',true));?>?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
		 					</figure>
		 				</div>
		 				<?php
		 			}
		 			?>
	 				<?php the_content();?>
	 			</div>
			 </div>
			</div>


			<!-- Share with -->
			<div class="single__share">
				<?php
				if ( function_exists( 'sharing_display' ) ) {
					sharing_display( '', true );
				}

				if ( class_exists( 'Jetpack_Likes' ) ) {
					$custom_likes = new Jetpack_Likes;
				echo $custom_likes->post_likes( '' );
				}
				 ?>
			</div>
			<!-- Box correlati fondo articolo -->
			<?php include('single-correlati.php'); ?>
			<!-- Box contribuisci fondo articolo -->
			<?php get_template_part('contribuisci/article','contribuisci'); ?>
		</div>
		</div>
		<div class="col-12 col-md-1 col_single_action">
			<?php include("template-part/single-action.php"); ?>
		</div>
		</article>
	</div>
	<?php endwhile; else : ?>

	  <h3> <?php esc_html_e('Sorry, no posts matched your criteria.', 'icc'); ?> </h3>

	<?php endif; ?>
	<div class="row justify-content-center">
		<div class="col-12 col-lg-10 text-center">
			<div class="container">
				<?php
				if (has_category('piemonte-che-cambia',$icc_article_ID) || has_category('casentino-che-cambia',$icc_article_ID) || has_category('liguria-che-cambia',$icc_article_ID)) {
					if (has_category('piemonte-che-cambia',$icc_article_ID	)){
						dynamic_sidebar('singlepiemonteend');
					} elseif (has_category('casentino-che-cambia',$icc_article_ID)) {
						dynamic_sidebar('singlecasentinoend');
					} elseif (has_category('liguria-che-cambia',$icc_article_ID)) {
						dynamic_sidebar('singleliguriaend');
					}
				} ?>
				<?php dynamic_sidebar('singleend'); ?>
			</div>
		</div>
	</div>
</div>



<?php get_footer(); ?>
