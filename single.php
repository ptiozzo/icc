<?php get_header(); ?>

<div class="content">

	<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- Categorie -->
			<div class="single__category">
				<?php the_category(' | '); ?>
			</div>
			<!-- Thumbnail o video youtube -->
			<div class="single__thumbnail">
				<?php
				if( !empty (get_post_meta( get_the_ID(), 'YouTubeLink',true))){
					?>
						<iframe width="500" height="281" src="https://www.youtube.com/embed/<?php echo linkifyYouTubeURLs(get_post_meta( get_the_ID(), 'YouTubeLink',true));?>?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
					<?php
				}
				else {
					the_post_thumbnail('icc_single', array('class' => 'img-res','alt' => get_the_title()));
				}
				?>
			</div>
			<!-- TAG -->
			<div class="single__tag">
				<?php $post_tags = wp_get_post_tags($post->ID);
				if(!empty($post_tags)) {?>
					<p class="tag"> <small><strong>TAG: </strong>  </small><?php the_tags('', ' ', ''); ?></p>
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
				<?php
					echo "Scritto da ".get_the_author();
					/* controllo se esiste un secondo autore */
					if( !empty (get_post_meta( get_the_ID(), 'SecondoAutore',true))){
						echo " e ". get_post_meta( get_the_ID(), 'SecondoAutore',true);
					}
				?>
			</div>
			<!-- Intervista di -->
			<div class="single__intervista">
				<?php
					if( !empty (get_post_meta( get_the_ID(), 'IntervistaDi',true))){
						echo "Intervista di: ". get_post_meta( get_the_ID(), 'IntervistaDi',true);
					}
				?>
			</div>
			<!-- Riprese di -->
			<div class="single__riprese">
				<?php
					if( !empty (get_post_meta( get_the_ID(), 'RipreseDi',true))){
						echo "Riprese di: ". get_post_meta( get_the_ID(), 'RipreseDi',true);
					}
				?>
			</div>
			<!-- Montaggio di -->
			<div class="single__montaggio">
				<?php
					if( !empty (get_post_meta( get_the_ID(), 'MontaggioDi',true))){
						echo "Montaggio di: ". get_post_meta( get_the_ID(), 'MontaggioDi',true);
					}
				?>
			</div>
			<!-- Meta Description -->
			<div class="single__metaDescription">
				<?php the_excerpt();?>
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



		</article>

	<?php endwhile; else : ?>

	  <h3> <?php esc_html_e('Sorry, no posts matched your criteria.', 'miotema'); ?> </h3>

	<?php endif; ?>

</div>



<?php get_sidebar(); ?>
<?php get_footer(); ?>
