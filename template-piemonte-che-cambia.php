<?php
/*
Template Name: Piemonte che cambia
*/
?>

<?php get_header(); ?>
<?php
  $catPage = 'piemonte-che-cambia';
?>
<div class="container-fluid home-page">
	<div class="row">
    <div id="sidebar" class="col-lg-home1 col-md-12">
      <div class="sidebar__inner">

			<div class='head'>
				<div class='title'>
					<h5>ARTICOLI IN EVIDENZA</h5>
				</div>
			</div>

			<?php
			/* Query per Articoli in evidenza
			*---------------------*/
      $i = 0;
      $args = array(
          'category_name' => $catPage,
          'post__in' => get_option( 'sticky_posts' ),
          'ignore_sticky_posts' => 1,
          'posts_per_page' => 10,
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
    								the_post_thumbnail('icc_ultimenewshome', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title()));
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
				echo "<p>Non ho trovato nessun Le storie</p>";
			endif;
			wp_reset_query();?>

      <div class="pb-3">
			<div class='head'>
				<div class='title'>
					<h5>LA MAPPA DEL PIEMONTE CHE CAMBIA</h5>
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
						<li data-target="#carouselMappa" data-slide-to="1" class="text-white">2</li>
						<li data-target="#carouselMappa" data-slide-to="2" class="text-white">3</li>
						<p class=""> /3</p>
					</ol>
					<a class="carousel-control-next" href="#carouselMappa" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<article>
							<div class='left'>
								<ul class='list'>
									<li>
										<div class='info'>
											<div class='number'>18</div>
											<div class='text'> RETI</div>
										</div>
										<img src='<?php echo get_template_directory_uri();?>/assets/img/modules/home/transparent-hand.svg' alt='' title=''>
									</li>
									<li>
										<div class='info'>
											<div class='number'>2062</div>
											<div class='text'> REALTÀ</div>
										</div>
									</li>
									<li>
										<a class='cta' href='' target='_blank'>VAI ALLA MAPPA</a>
									</li>
								</ul>
							</div>
							<div class='right'>
								<figure>
									<img src='<?php echo get_template_directory_uri();?>/assets/img/modules/home/italy-map.svg' alt='' title=''>
								</figure>
							</div>
						</article>
					</div>
					<div class="carousel-item">
						<article>
							<div class='left'>
								<ul class='list'>
									<li>
										<div class='info'>
											<div class='number'>18</div>
											<div class='text'> RETI</div>
										</div>
										<img src='<?php echo get_template_directory_uri();?>/assets/img/modules/home/transparent-hand.svg' alt='' title=''>
									</li>
									<li>
										<div class='info'>
											<div class='number'>2062</div>
											<div class='text'> REALTÀ</div>
										</div>
									</li>
									<li>
										<a class='cta' href='' target='_blank'>VAI ALLA MAPPA</a>
									</li>
								</ul>
							</div>
							<div class='right'>
								<figure>
									<img src='<?php echo get_template_directory_uri();?>/assets/img/modules/home/italy-map.svg' alt='' title=''>
								</figure>
							</div>
						</article>
					</div>
					<div class="carousel-item">
						<article>
							<div class='left'>
								<ul class='list'>
									<li>
										<div class='info'>
											<div class='number'>18</div>
											<div class='text'> RETI</div>
										</div>
										<img src='<?php echo get_template_directory_uri();?>/assets/img/modules/home/transparent-hand.svg' alt='' title=''>
									</li>
									<li>
										<div class='info'>
											<div class='number'>2062</div>
											<div class='text'> REALTÀ</div>
										</div>
									</li>
									<li>
										<a class='cta' href='' target='_blank'>VAI ALLA MAPPA</a>
									</li>
								</ul>
							</div>
							<div class='right'>
								<figure>
									<img src='<?php echo get_template_directory_uri();?>/assets/img/modules/home/italy-map.svg' alt='' title=''>
								</figure>
							</div>
						</article>
					</div>
				</div>
			</div>
      </div>
    </div>

		</div><!-- Fini prima colonna -->

		<div class="col-lg-home2 col-md-12">

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
            'post__not_in' => get_option( 'sticky_posts' ),

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
			<?php get_sidebar(); ?>
		</div><!-- Fine sidebar  -->
	</div><!-- Fine row -->
</div><!-- Fine container fluid -->
<?php get_footer(); ?>
