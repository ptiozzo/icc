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

	<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>
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
				//echo "TRAN PRIMA: ".get_transient('icc_contenutiCat1_'.(string) $_COOKIE['PHPSESSID'])."-".get_transient('icc_contenutiCat2_'.(string) $_COOKIE['PHPSESSID'])."-".get_transient('icc_contenutiOrd_'.(string) $_COOKIE['PHPSESSID'])."<br>";
				if(get_transient('icc_contenutiCat1_'.(string) $_COOKIE['PHPSESSID']) || get_transient('icc_contenutiCat2_'.(string) $_COOKIE['PHPSESSID'])) { ?>
					<a href="<?php echo home_url(); ?>/contenuti/" class="single__torna__contenuti p-2 mr-3"><i class="fas fa-chevron-left"></i> Torna ai contenuti</a>
				<?php }
				if(get_transient('icc_rubricheCat1_'.(string) $_COOKIE['PHPSESSID'])) { ?>
					<a href="<?php echo home_url(); ?>/categoria/contenuti/rubriche/" class="single__torna__contenuti p-2 mr-3"><i class="fas fa-chevron-left"></i> Torna alle rubriche</a>
				<?php }
				if(get_transient('icc_termineCercato_'.(string) $_COOKIE['PHPSESSID'])) { ?>
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
				<!-- llustrazione di -->
				<div class="single__author">
						<?php
						if( !empty (get_post_meta( get_the_ID(), 'IllustrazioniDi',true))){
							echo "Illustrazioni di: <b>". get_post_meta( get_the_ID(), 'IllustrazioniDi',true)."</b>";
						}
					?>
				</div>
				<!-- Meta Description -->
				<h2 class="single__metaDescription">
					<?php the_excerpt();?>
				</h2>
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
			<div class="single__articolo">
				<?php the_content();?>
			</div>
			<div class="single__contribuisci mb-2 position-relative">
				<?php
					$argsContribuisciSingle = array(
			    'post_type' => 'contenuti-speciali',
			    'posts_per_page' => 1,
			    'tax_query' => array(
			      array(
			          'taxonomy'=> 'contenuti_speciali_filtri',
			          'field'   => 'slug',
			          'terms'		=> 'contribuisci-singolo-articolo',
			      ),
			    ),
			  );
			  $loopContribuisciSingle = new WP_Query( $argsContribuisciSingle );
				if( $loopContribuisciSingle->have_posts()):
					while( $loopContribuisciSingle->have_posts() ) : $loopContribuisciSingle->the_post();
					?>
					<div class="m-2">
					<?php the_content(); ?>
					</div>
					<?php
					endwhile;
				endif;
				?>
				<button type="button" class="btn btn-lg btn-block btn-warning">
					Contribuisci adesso all'Italia che Cambia
					<img src='<?php echo get_template_directory_uri();?>/assets/img/payment-methods.png'>
				</button>
				<a href="/contribuisci" class="stretched-link"></a>
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
		</div>
		</div>
		<div class="col-12 col-md-1 col_single_action">
			<div class="single__action d-flex d-md-block justify-content-around text-center">
				<div class="my-1 d-flex flex-column justify-content-center position-relative">
					<i class="fas fa-map-marker-alt fa-2x my-auto"></i>
					<?php
						if( !empty (get_post_meta( get_the_ID(), 'MappaProgetto',true))){
							echo '<a href="'.get_post_meta( get_the_ID(), 'MappaProgetto',true).'" class="stretched-link"></a>';
						} else {
							echo '<a href="/mappa" class="stretched-link"></a>';
						}
					?>
					<p>Mappa</p>
				</div>
				<div class="my-1 d-flex flex-column justify-content-center position-relative">
					<button href="#" class="stretched-link btn btn-link" data-toggle="modal" data-target="#IscrizioneNewsletter">
						<i class="far fa-envelope fa-2x my-auto"></i>
					</button>
					<p>Newsletter</p>
				</div>
				<div class="my-1 d-flex flex-column justify-content-center position-relative">
					<i class="fas fa-search fa-2x my-auto"></i>
					<a href="/visione-2040/" class="stretched-link"></a>
					<p>Visione2040</p>
				</div>
				<div class="my-1 d-flex flex-column justify-content-center position-relative">
					<button href="#" class="stretched-link btn btn-link" data-toggle="modal" data-target="#IscrizioneFB">
						<i class="fab fa-facebook-f fa-2x my-auto"></i>
					</button>
					<p>Attivati</p>
				</div>
			</div>
		</div>
		</article>
	</div>
	<?php endwhile; else : ?>

	  <h3> <?php esc_html_e('Sorry, no posts matched your criteria.', 'miotema'); ?> </h3>

	<?php endif; ?>
	<div class="row">
		<div class="col-12">
			<?php
			if (has_category('piemonte-che-cambia') || has_category('casentino-che-cambia') || has_category('liguria-che-cambia')) {
				if (has_category('piemonte-che-cambia')){
					dynamic_sidebar('singlepiemonteend');
					banner_pianetafuturo();
				} elseif (has_category('casentino-che-cambia')) {
					dynamic_sidebar('singlecasentinoend');
					banner_pianetafuturo();
				} elseif (has_category('liguria-che-cambia')) {
					dynamic_sidebar('singleliguriaend');
					banner_pianetafuturo();
				}
			} ?>
		</div>
		<div class="col-12 col-md-6 offset-md-3">
			<?php dynamic_sidebar('singleend'); ?>
		</div>
	</div>
</div>



<?php get_footer(); ?>
