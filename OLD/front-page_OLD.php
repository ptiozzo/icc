<?php get_header(); ?>
<section class="content">


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

	    <p>Non ho trovato nessun Le storie</p>

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

			<p>Non ho trovato nessuna Rassegna Stampa</p>

	<?php
			endif;
			wp_reset_query();
	?>

	<div class="mappa">
		<h2>Mappa</h2>
	</div>

	<?php
			/* Query per Ultime news
			*---------------------*/
			$args = array(
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

			<p>Non ho trovato nessun ultimo articolo</p>

	<?php
			endif;
			wp_reset_query();
	?>
	<?php
			/* Query per Libri
			*---------------------*/
			$args = array(
				'post_type' => 'nostri-libri',
				'posts_per_page' => 3
			);
			$loop = new WP_Query( $args );
			if( $loop->have_posts() ) :
				?>
					<h2>Libri</h2>
				<?php
					while( $loop->have_posts() ) : $loop->the_post();
	?>

	<a href="<?php echo the_permalink();?>"><?php echo get_the_title(); ?></a><br />

	<?php
					endwhile;
			else:
	?>

			<p>Non ho trovato nessun libro</p>

	<?php
			endif;
			wp_reset_query();
	?>

</section> <!-- .content 	-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
