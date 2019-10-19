<?php get_header(); ?>
<div class="container single"><!-- SINGLE -->
	<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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
						<figure class="embed-responsive embed-responsive-16by9">
							<iframe width="800" height="480" src="https://www.youtube.com/embed/<?php echo linkifyYouTubeURLs(get_post_meta( get_the_ID(), 'YouTubeLink',true));?>?feature=oembed" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
						</figure>
					</div>
					<?php
				}
				?>
				<!-- Riassunto -->
				<h4 class="single__metaDescription p-4">
					<?php the_excerpt();?>
				</h4>
				<hr>
			<!-- Content -->
			<div class="single__articolo">
				<?php the_content();?>
			</div>
		</article>
		<hr>
	<?php endwhile; endif;?><!-- Fine articolo -->
 	<div class="rassegna__footer">
		<?php
		$args = array(
			'post_type' => 'rassegna-stampa',
			'posts_per_page' => 3,
			'post__not_in' => array(get_the_id()),
		);
		$loop = new WP_Query( $args );
		if( $loop->have_posts() ) : ?>
			<h3 class="p-2">Archivio rassegna stampa</h3>
			<div class="row">
				<?php while( $loop->have_posts() ) : $loop->the_post(); ?>
					<div class="col-lg-4 col-md-6 my-3">
						<div id="post-<?php the_ID(); ?>" class="card border-0 p-0">
							<article <?php echo post_class(); ?>>
							<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail('icc_ultimenewshome', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title()));
								}
								else{
									echo '<img class="img-fluid card-img-top mx-auto d-block p-1" src="'.catch_that_image().'" />';
								}
							?>
							<h5 class="card-title"><?php the_title(); ?></h5>
							<p class="card-text pt-2"><?php echo get_the_excerpt();?></p>
							<a href="<?php echo the_permalink();?>" class="stretched-link"><div class="cta">Leggi di più</div></a>
							</article>
						</div>

					</div>
				<?php endwhile; ?>
			</div>
		<?php else: ?>
			<p>Non ho trovato nessun altra Rassegna</p>
		<?php endif; ?>
	</div>
</div>


<?php get_footer(); ?>
