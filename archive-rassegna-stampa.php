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
