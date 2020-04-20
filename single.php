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
					exclude_post_categories("15,2300,2359,2299"); // 15 Articoli, 2300 Casentino, 2359 Liguria, 2299 Piemonte
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
				$argsContribuisciSingleDesktop = array(
			    'post_type' => 'contenuti-speciali',
			    'posts_per_page' => 1,
			    'tax_query' => array(
			      array(
			          'taxonomy'=> 'contenuti_speciali_filtri',
			          'field'   => 'slug',
			          'terms'		=> 'contribuisci-singolo-articolo-desktop',
			      ),
			    ),
			  );
			  $loopContribuisciSingleDesktop = new WP_Query( $argsContribuisciSingleDesktop );

				$argsContribuisciSingleMobile = array(
			    'post_type' => 'contenuti-speciali',
			    'posts_per_page' => 1,
			    'tax_query' => array(
			      array(
			          'taxonomy'=> 'contenuti_speciali_filtri',
			          'field'   => 'slug',
			          'terms'		=> 'contribuisci-singolo-articolo-mobile',
			      ),
			    ),
			  );
			  $loopContribuisciSingleMobile = new WP_Query( $argsContribuisciSingleMobile );

				if( $loopContribuisciSingleDesktop->have_posts() || $loopContribuisciSingleMobile->have_posts()):
					while( $loopContribuisciSingleDesktop->have_posts() ) : $loopContribuisciSingleDesktop->the_post();
					?>
					<div class="m-2 d-none d-md-block">
					<?php the_content(); ?>
					</div>
					<?php
					endwhile;
					while( $loopContribuisciSingleMobile->have_posts() ) : $loopContribuisciSingleMobile->the_post();
					?>
					<div class="m-2 d-block d-md-none">
					<?php the_content(); ?>
					</div>
					<?php
					endwhile;
				endif;
				?>
				<button type="button" class="btn btn-lg btn-block btn-warning">
					<b>Contribuisci adesso all'Italia che Cambia</b>
					<img src='<?php echo get_template_directory_uri();?>/assets/img/payment-methods.png' class="ml-2">
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
			<?php include("template-part/single-action.php"); ?>
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
