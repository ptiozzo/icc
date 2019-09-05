<?php get_header(); ?>

<div class="content">

	<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- Thumbnail  -->
			<div class="single__thumbnail">
					<?php the_post_thumbnail('icc_single', array('class' => 'img-res','alt' => get_the_title()));	?>
			</div>

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
