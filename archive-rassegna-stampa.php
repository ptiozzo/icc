<?php get_header(); ?>
<div class="single"><!-- SINGLE -->
  <?php
  $args = array(
    'post_type' => 'rassegna-stampa',
    'posts_per_page' => 1,
  );
  $loop = new WP_Query( $args ); ?>
  <?php get_header(); ?>
  <div class="single"><!-- SINGLE -->
  	<?php if ($loop->have_posts()) :?><?php while($loop->have_posts()) : $loop->the_post();
  	include("inc/single-visione.php");
  	$icc_article_ID = get_the_ID();
  	?>
  		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  			<div class="row">
  				<div class="col-12 col-md-10 order-md-2">
  					<div class="container"><!-- SINGLE -->
              <div class='single__nav__category'>
  				       <form class="" method="post" action="/contenuti/">
  				         <input name="contenuti-dropdown" type="hidden" value="rassegna-stampa">
  				         <input name="submit_button" type="submit" value="Rassegna stampa" class="btn btn-link p-0 border-0">
  				       </form>
  						</div>
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
            <!-- Seguici su -->
            <div class="row mt-3 rassegna_seguici">
              <div class="col-12">
                <h3>Seguici su:</h3>
              </div>
              <div class="col-12">
                <a class="border p-2 rounded mr-2 my-1 d-inline-block" href="https://chat.whatsapp.com/IVfMUBwtQb3HiBSODZSXAQ" target="_blank"><i class="fab fa-whatsapp"></i> <span class="">WhatApp</span></a>
                <a class="border p-2 rounded mr-2 my-1 d-inline-block" href="https://t.me/iononmirassegno" target="_blank"><i class="fab fa-telegram"></i> <span class="">Telegram</span></a>
                <a class="border p-2 rounded mr-2 my-1 d-inline-block" href="https://b3x1d.emailsp.com/frontend/forms/Subscription.aspx?idList=15&idForm=307&guid=65da3bdb-24d7-4cba-a318-a6fda6aa2266&utm_source=newsletter&utm_medium=email" target="_blank"><i class="far fa-envelope"></i> <span class="">NewsLetter</span></a>
                <a class="border p-2 rounded mr-2 my-1 d-inline-block" href="https://www.youtube.com/playlist?list=PL0WvMTrbIjqpEEOqbLjtIzI38-U8jI0H6" target="_blank"><i class="fab fa-youtube"></i> <span class="">Youtube</span></a>
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
  					<!-- Content -->
  					<div class="single__articolo">
              <?php
              if( !empty (get_post_meta( get_the_ID(), 'MP3Rassegna',true))){ ?>
              <div class="row">
                <div class="col-12">
  								<h3>Podcast:</h3>
  							</div>
                <div class="col-12 col-lg-6">
                  <?php echo do_shortcode('[audio mp3=' . get_post_meta( get_the_ID(), 'MP3Rassegna',true) . ']'); ?>
                </div>
                <div class="col p-2 p-lg-0 text-center wp-block-button">
                  <a href="<?php echo get_post_meta( get_the_ID(), 'MP3Rassegna',true) ?>" class="wp-block-button__link" download>Scarica</a>
                </div>
                <div class="col text-center mt-2">
                  <a href="https://open.spotify.com/show/2vhde08tuNa5MbNts3uAg6" target="_blank"><i class="fab fa-spotify fa-2x"></i><br><span class="">Spotify</span></a>
                </div>
                <div class="col text-center mt-2">
                  <a href="https://www.spreaker.com/show/iononmirassegno" target="_blank"><i class="fas fa-podcast fa-2x"></i><br><span class="">Spreaker</span></a>
                </div>
                <div class="col text-center mt-2">
                  <a href="https://podcasts.apple.com/it/podcast/io-non-mi-rassegno/id1515104848" target="_blank"><i class="fas fa-podcast fa-2x"></i><br><span class="">Apple podcast</span></a>
                </div>
              </div>
              <?php
              }
              ?>
              <hr>



              <!-- DA POCKET -->
  						<?php
  							if( !empty (get_post_meta( get_the_ID(), 'PocketTAG',true))){
  								echo do_shortcode("[pocket_links filter_tag='".get_post_meta( get_the_ID(), 'PocketTAG',true)."']" );
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

            <!-- Box contribuisci fondo articolo -->
            <?php get_template_part('contribuisci/article','contribuisci'); ?>

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
