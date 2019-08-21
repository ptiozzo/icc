<?php get_header(); ?>
<div class="content">
	<?php
		$catPage = 'casentino-che-cambia';
	?>

	<?php
			/* Query per Casentino in evidenza
			*---------------------*/
	    $args = array(
	        'category_name' => $catPage,
					'post__in' => get_option( 'sticky_posts' ),
					'ignore_sticky_posts' => 1,
					'posts_per_page' => 6
	    );
			$loop = new WP_Query( $args );
	    if( $loop->have_posts() ) :
				?>
					<h2>Casentino in evidenza</h2>
				<?php
	        while( $loop->have_posts() ) : $loop->the_post();
	?>

	<a href="<?php echo the_permalink();?>"><?php echo get_the_title(); ?></a><br />

	<?php
	        endwhile;
	    else:
	?>

	    <p>Nessun articolo Casentino in evidenza</p>

	<?php
	    endif;
	    wp_reset_query();
	?>
	<?php
			/* Query per Ultimi articoli Casentino
			*---------------------*/
			$args = array(
					'category_name' => $catPage,
					'posts_per_page' => 3
			);
			$loop = new WP_Query( $args );
			if( $loop->have_posts() ) :
				?>
					<h2>Ultimi articoli casentino</h2>
				<?php
					while( $loop->have_posts() ) : $loop->the_post();
				?>
						<a href="<?php echo the_permalink();?>"><?php echo get_the_title(); ?></a><br />
				<?php
					endwhile;
			else:
				?>
					<p>Non ho trovato ultime notizie Casentino</p>
				<?php
			endif;
			wp_reset_query();
		?>

</div> <!-- .content 	-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
