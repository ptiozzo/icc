<?php get_header(); ?>
<div class="container-fluid home-page">
	<div class="row">
		<div class="col-lg-5 col-md-6">

			<div class='head'>
				<div class='title'>
					<h5>LE NOSTRE STORIE</h5>
				</div>
			</div>

			<?php
			/* Query per Le storie
			*---------------------*/
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 10,
				'category_name' => 'le-storie',
				'category__not_in' => array( 2299,2300 ),


			);
			$loop = new WP_Query( $args );
			$i = 0;
			if( $loop->have_posts() ) : ?>
				<div id="carouselLeNostreStorie" class="carousel carousel-controll-down slide" data-ride="carousel" data-interval="false">
					<div class="carousel-inner">
					<?php
					while( $loop->have_posts() ) : $loop->the_post();
					$i++;
					if ($i % 2 == 1){ ?>
						<div class="carousel-item <?php if ($i == 1){echo 'active';} ?>">
							<div class="card-group">
					<?php
					}
					?>

						<div class="card border-0 p-1">
							<?php the_post_thumbnail('icc_single', array('class' => 'img-fluid card-img-top mx-auto d-block','alt' => get_the_title()));?>
							<div class="card-body">
								<h5 class="card-title"><?php the_title(); ?></h5>
								<p class="card-text pt-2"><?php echo get_the_excerpt();?></p>
								<a href="<?php echo the_permalink();?>" class="stretched-link"></a>
							</div>
						</div>
						<?php
						if ($i % 2 == 0){ ?>
								</div>
							</div>
						<?php
						}
						?>

				<?php
				endwhile; ?>
					</div>
					<div class="slider-footer d-flex flex-row align-items-center justify-content-between">
						<a class="carousel-control-prev pl-2" href="#carouselLeNostreStorie" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next pl-2" href="#carouselLeNostreStorie" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
						<a href="" class="carousel-more mx-auto">Vedi tutto</a>
						<ol class="carousel-indicators pr-2">
							<?php
							$i = $i/2;
							for ($count = 0;$count <= $i-1; $count++){
							 ?>
							<li data-target="#carouselLeNostreStorie" data-slide-to="<?php echo $count;?>" <?php if($count == 0){echo 'class="active"';};?>><?php echo $count+1;?></li>
							<?php
							}
							?>
							<p class="font-weight-bold h4">/<?php echo $i;?></p>
						</ol>
					</div>
				</div>
			<?php
			else:
				echo "<p>Non ho trovato nessun Le storie</p>";
			endif;
			wp_reset_query();?>


			<div class='head'>
				<div class='title'>
					<h5>LA MAPPA DELL’ITALIA CHE CAMBIA</h5>
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
											<div class='text'>RETI</div>
										</div>
										<img src='<?php echo get_template_directory_uri();?>/assets/img/modules/home/transparent-hand.svg' alt='' title=''>
									</li>
									<li>
										<div class='info'>
											<div class='number'>2062</div>
											<div class='text'>REALTÀ</div>
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
											<div class='text'>RETI</div>
										</div>
										<img src='<?php echo get_template_directory_uri();?>/assets/img/modules/home/transparent-hand.svg' alt='' title=''>
									</li>
									<li>
										<div class='info'>
											<div class='number'>2062</div>
											<div class='text'>REALTÀ</div>
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
											<div class='text'>RETI</div>
										</div>
										<img src='<?php echo get_template_directory_uri();?>/assets/img/modules/home/transparent-hand.svg' alt='' title=''>
									</li>
									<li>
										<div class='info'>
											<div class='number'>2062</div>
											<div class='text'>REALTÀ</div>
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

		</div><!-- Fini prima colonna -->

		<div class="col-lg-5 col-md-6">
			<div class='head'>
				<div class='title'>
					<h5>RASSEGNA STAMPA</h5>
				</div>
			</div>
			<?php
			$args = array(
			'post_type' => 'rassegna-stampa',
			'posts_per_page' => 1
			);
			$loop = new WP_Query( $args );
			$i = 0;
			if( $loop->have_posts() ) :
					while( $loop->have_posts() ) : $loop->the_post();
			?>
			<div class='content'>
				<a href='<?php echo the_permalink();?>'>
					<figure>
						<?php the_post_thumbnail('icc_rassegnastampahome', array('class' => 'img-fluid','alt' => get_the_title())); ?>
					</figure>

					<article>
						<div class='date'>
							<?php the_time('j M Y') ?>
						</div>
						<h5><?php the_title(); ?></h5>
						<div class='info'>A cura di <b><?php echo get_the_author();?></b></div>
					</article>
				</a>
			</div>
			<?php
			endwhile;
			else:
			 echo "<p>Non ho trovato nessuna Rassegna Stampa</p>";
			endif;
			wp_reset_query();?>


			<div class="row">

				<?php
				/* Query per Ultime news
				*---------------------*/
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 10,
					'category__not_in' => array( 2299,2300 ),

				);
				$loop = new WP_Query( $args );
				if ( $loop->have_posts() ) : while( $loop->have_posts() ) : $loop->the_post();
				?>

								<div id="post-<?php the_ID(); ?>" class="card col-lg-6 border-0 p-0">
									<article <?php echo post_class(); ?>>
									<div class="category-bg"> </div>
									<div class="category pl-1">
										<span>
											<?php
												if (in_category('documentari')) {
													echo 'I documentari';
												} elseif (in_category('le-storie')) {
													echo 'Le storie';
												}elseif (in_category('meme')) {
													echo 'I meme';
												}elseif (in_category('rubriche')) {
													echo 'Le rubriche';
												}elseif (in_category('salute-che-cambia')) {
													echo 'Salute';
												}elseif (in_category('articoli')) {
													echo 'Gli Articoli';
												}
											?>
										</span>
									</div>
									<?php the_post_thumbnail('icc_ultimenewshome', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title()));?>
									<div class="card-body p-1">
										<div class='date'><?php the_time('j M Y') ?></div>
										<h5 class="card-title"><?php the_title(); ?></h5>
										<p class="card-text pt-2"><?php echo get_the_excerpt();?></p>
										<a href="<?php echo the_permalink();?>" class="stretched-link"><div class="cta">Leggi di più</div></a>
									</div>
									</article>
								</div>






					<?php
					 endwhile;
					else:
					 echo "<p>Non ho trovato nessun Ultime news</p>";
					endif;
					wp_reset_query();?>

			</div> <!-- Fini row  -->
		</div><!-- Fini seconda colonna  -->
		<div class="col-lg-2">
			Sidebar
		</div><!-- Fine sidebar  -->
	</div><!-- Fine row -->
</div><!-- Fine container fluid -->
<?php get_footer(); ?>
