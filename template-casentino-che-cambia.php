<?php
/*
Template Name: Casentino che cambia
*/
?>

<?php get_header(); ?>
<?php
  $catPage = 'casentino-che-cambia';
?>
<div class="container-fluid home-page">
	<div class="row">
    <div id="sidebar" class="col-lg-6 col-md-12">
        <div class="sidebar__inner">

			<div class='head'>
				<div class='title'>
					<h5>ARTICOLI IN EVIDENZA</h5>
				</div>
			</div>

			<?php
			/* Query per Le storie
			*---------------------*/
      $i = 0;
      $args = array(
          'category_name' => $catPage,
          'post__in' => get_option( 'sticky_posts' ),
          'ignore_sticky_posts' => 1,
          'posts_per_page' => 10
      );
			$loop = new WP_Query( $args );
			if( $loop->have_posts() ) : ?>
				<div id="carouselEvidenza" class="carousel carousel-controll-down slide" data-ride="carousel" data-interval="false">
					<div class="carousel-inner">
					<?php
					while( $loop->have_posts() ) : $loop->the_post();
          $i++;
					?>
						<div class="carousel-item <?php if ($i == 1){echo 'active';} ?>">
							<div class="card-group">
    						<div class="card border-0 p-1">
    							<?php
    							if ( has_post_thumbnail() ) {
    								the_post_thumbnail('icc_rassegnastampahome', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title()));
    							}
    							else{
    								echo '<img class="img-fluid card-img-top mx-auto d-block p-1" src="'.catch_that_image().'" />';
    							}
    							?>
    							<div class="card-body">
    								<h5 class="card-title"><?php the_title(); ?></h5>
    								<p class="card-text pt-2"><?php echo get_the_excerpt();?></p>
    								<a href="<?php echo the_permalink();?>" class="stretched-link"></a>
    							</div>
    						</div>
							</div>
						</div>
				<?php
        $exclude_posts[] = $post->ID;
				endwhile; ?>
					</div>
					<div class="slider-footer d-flex flex-row align-items-center justify-content-between">
						<a class="carousel-control-prev pl-2" href="#carouselEvidenza" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next pl-2" href="#carouselEvidenza" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
						<a href="<?php echo get_home_url(); ?>/category/i-nostri-contenuti/le-storie/" class="carousel-more mx-auto">Vedi tutto</a>
						<ol class="carousel-indicators pr-2">
							<?php
							for ($count = 0;$count <= $i-1; $count++){ ?>
							         <li data-target="#carouselEvidenza" data-slide-to="<?php echo $count;?>" <?php if($count == 0){echo 'class="active"';};?>><?php echo $count+1;?></li>
							<?php }	?>
							<p class="font-weight-bold h4">/<?php echo $i;?></p>
						</ol>
					</div>
				</div>
			<?php
			else:
				echo "<p>Non ho trovato nessun articolo in evidenza</p>";
			endif;
			wp_reset_query();?>
    <div class="pb-3">

			<div class='head'>
				<div class='title'>
					<h5>LA MAPPA DEL CASENTINO CHE CAMBIA</h5>
				</div>
			</div>

			<div id="carouselMappa" class="carousel carousel-control-top slide" data-ride="carousel" data-interval="false">
				<div class="slider-top bg-dark d-flex flex-row align-items-center justify-content-between mb-2">
					<a class="carousel-control-prev" href="#carouselMappa" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<ol class="carousel-indicators pr-2 text-white">
						<li data-target="#carouselMappa" data-slide-to="0" class="text-white active">1</li>
						<p class=""> /1</p>
					</ol>
					<a class="carousel-control-next" href="#carouselMappa" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<article>
								<figure>
									<a href="<?php echo home_url(); ?>/casentino/mappa/"><img class="img-fluid" src='<?php echo get_template_directory_uri();?>/assets/img/modules/casentino/Casentino-mappa.jpg' alt='' title=''></a>
								</figure>
						</article>
					</div>
				</div>
			</div>
    </div>
    </div>
		</div><!-- Fini prima colonna -->

		<div class="col-lg-6 col-md-12">

			<div class='head'>
				<div class='title'>
					<h5>ULTIMI ARTICOLI</h5>
				</div>
			</div>

			<div class="row">



				<?php
				/* Query per Ultimi articoli
				*---------------------*/
        $args = array(
            'category_name' => $catPage,
            'posts_per_page' => 10,
            'post__not_in' => $exclude_posts,
        );
				$loop = new WP_Query( $args );
				if ( $loop->have_posts() ) : while( $loop->have_posts() ) : $loop->the_post();
				?>
							<div class="col-lg-6 mt-3">
								<div id="post-<?php the_ID(); ?>" class="card  border-0 p-0">
									<article <?php echo post_class(); ?>>
									<?php
										if ( has_post_thumbnail() ) {
											the_post_thumbnail('icc_ultimenewshome', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title()));
										}
										else{
											echo '<img class="img-fluid card-img-top mx-auto d-block p-1" src="'.catch_that_image().'" />';
										}
									?>
									<div class="card-body p-1">
										<div class='date'><?php the_time('j M Y') ?></div>
										<h5 class="card-title"><?php the_title(); ?></h5>
										<p class="card-text pt-2"><?php echo get_the_excerpt();?></p>
										<a href="<?php echo the_permalink();?>" class="stretched-link"><div class="cta">Leggi di più</div></a>
									</div>
									</article>
								</div>
							</div>

					<?php
					 endwhile;
					else:
					 echo "<p>Non ho trovato nessun Ultimi articoli</p>";
					endif;
					wp_reset_query();?>

			</div> <!-- Fine row  -->
		</div><!-- Fini seconda colonna  -->
		<div class="col-lg-2">

		</div><!-- Fine sidebar  -->
	</div><!-- Fine row -->
</div><!-- Fine container fluid -->
<?php get_footer(); ?>
