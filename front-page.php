<?php get_header(); ?>
<div class="content">


	<?php
			/* Query per Le storie
			*---------------------*/
	    $args = array(
	        'category_name' => 'le-storie',
					'posts_per_page' => 6
	    );
			$loop = new WP_Query( $args );
	    if( $loop->have_posts() ) :
				?>
					<h2>Le storie</h2>
				<?php
	        while( $loop->have_posts() ) : $loop->the_post();
	?>

	<a href="<?php echo the_permalink();?>"><?php echo get_the_title(); ?></a><br />

	<?php
	        endwhile;
	    else:
	?>

	    <p>Non ho trovato nulla</p>

	<?php
	    endif;
	    wp_reset_query();
	?>
	<?php
			/* Query per Rassegna stampa
			*---------------------*/
			$args = array(
					'category_name' => 'rassegna-stampa',
					'posts_per_page' => 3
			);
			$loop = new WP_Query( $args );
			if( $loop->have_posts() ) :
				?>
					<h2>Rassegna stampa</h2>
				<?php
					while( $loop->have_posts() ) : $loop->the_post();
	?>

	<a href="<?php echo the_permalink();?>"><?php echo get_the_title(); ?></a><br />

	<?php
					endwhile;
			else:
	?>

			<p>Non ho trovato nulla</p>

	<?php
			endif;
			wp_reset_query();
	?>
	<?php
			/* Query per Ultime news
			*---------------------*/
			$args = array(
					'category__not_in' => array( 2, 6 ), //******************* Da definire
					'posts_per_page' => 10
			);
			$loop = new WP_Query( $args );
			if( $loop->have_posts() ) :
				?>
					<h2>Ultime news</h2>
				<?php
					while( $loop->have_posts() ) : $loop->the_post();
	?>

	<a href="<?php echo the_permalink();?>"><?php echo get_the_title(); ?></a><br />

	<?php
					endwhile;
			else:
	?>

			<p>Non ho trovato nulla</p>

	<?php
			endif;
			wp_reset_query();
	?>
	<?php
			/* Query per Ultime news
			*---------------------*/
			$args = array(
					'category_name' => 'articoli',
					'posts_per_page' => 10
			);
			$loop = new WP_Query( $args );
			if( $loop->have_posts() ) :
				?>
					<h2>Articoli</h2>
				<?php
					while( $loop->have_posts() ) : $loop->the_post();
	?>

	<a href="<?php echo the_permalink();?>"><?php echo get_the_title(); ?></a><br />

	<?php
					endwhile;
			else:
	?>

			<p>Non ho trovato nulla</p>

	<?php
			endif;
			wp_reset_query();
	?>

</div> <!-- .content 	-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
