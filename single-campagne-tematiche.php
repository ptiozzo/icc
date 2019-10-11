<?php get_header(); ?>
<div class="container single"><!-- SINGLE -->
	<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- Thumbnail o video youtube -->
			<div class="single__thumbnail">
				<?php
				if( !empty (get_post_meta( get_the_ID(), 'YouTubeLink',true))){
					?>
					<figure class="embed-responsive embed-responsive-16by9">
						<iframe width="800" height="480" src="https://www.youtube.com/embed/<?php echo linkifyYouTubeURLs(get_post_meta( get_the_ID(), 'YouTubeLink',true));?>?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
					</figure>
					<?php
				}
				elseif ( has_post_thumbnail() ) {
					the_post_thumbnail('icc_ultimenewshome', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title()));
				}
				else{
					echo '<img class="img-fluid card-img-top mx-auto d-block p-1" src="'.catch_that_image().'" />';
				}

				?>
			</div>

			<!-- TAG -->
			<div class="single__head">
				<!-- Title -->
				<h1 class="single__title">
					<?php the_title(); ?>
				</h1>
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
			<!-- Content -->
			<div class="single__articolo">
				<?php the_content();?>
			</div>



		</article>

	<?php endwhile; else : ?>

	  <h3> <?php esc_html_e('Sorry, no posts matched your criteria.', 'miotema'); ?> </h3>

	<?php endif; ?>

</div>


<?php get_footer(); ?>
