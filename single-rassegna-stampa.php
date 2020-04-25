<?php get_header(); ?>
<div class="single"><!-- SINGLE -->
	<?php if (have_posts()) :?><?php while(have_posts()) : the_post();
	include("inc/single-visione.php");
	$icc_article_ID = get_the_ID();
	?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="row">
				<div class="col-12 col-md-10 order-md-2">
					<div class="container"><!-- SINGLE -->
					<div class="single__head">
						<!-- TAG -->
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
					<!-- Thumbnail o video youtube -->
					<?php
					if( !empty (get_post_meta( get_the_ID(), 'YouTubeLink',true))){
						?>
						<div class="single__thumbnail">
							<figure class="video-container">
								<iframe width="800" height="480" src="https://www.youtube.com/embed/<?php echo linkifyYouTubeURLs(get_post_meta( get_the_ID(), 'YouTubeLink',true));?>?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
							</figure>
						</div>
						<?php
					}
					?>

					<!-- Riassunto -->
					<div class="single__metaDescription p-4">
						<?php the_excerpt();?>
					</div>
					<hr>
					<!-- Content -->
					<div class="single__articolo">
						<?php
						if( !empty (get_post_meta( get_the_ID(), 'MP3Rassegna',true))){ ?>
						<div class="row">
							<div class="col-12 text-center">
								<h3>Podcast:</h3>
							</div>
							<div class="col-12 col-lg-8">
								<?php echo do_shortcode('[audio mp3=' . get_post_meta( get_the_ID(), 'MP3Rassegna',true) . ']'); ?>
							</div>
							<div class="col p-2 p-lg-0 text-center">
								<a href="<?php echo get_post_meta( get_the_ID(), 'MP3Rassegna',true) ?>" class="btn btn-outline-success" download data-no-swup>Scarica</a>
							</div>
							<div class="col p-2 p-lg-0 text-center">
								<a href="https://open.spotify.com/show/2vhde08tuNa5MbNts3uAg6" target="_blank"><i class="fab fa-spotify fa-2x"></i> <span class="">Spotify</span></a>
							</div>
						</div>
						<?php
						}
						?>

						<!-- DA POCKET -->
						<?php
							if( !empty (get_post_meta( get_the_ID(), 'PocketTAG',true))){
								echo do_shortcode("[pocket_links tag='".get_post_meta( get_the_ID(), 'PocketTAG',true)."' tag_list='no']" );
							}
						?>


						

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
				</div>
			</div>
			<div class="col-12 col-md-1 col_single_action">
				<?php include("template-part/single-action.php"); ?>
			</div>
		</div>
		</article>
	<?php endwhile;?>
	<?php endif;?><!-- Fine articolo -->
	<hr>
 	<?php include("template-part/rassegna-footer.php"); ?>
</div>


<?php get_footer(); ?>
