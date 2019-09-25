<?php require 'header.php'; ?>

<main class='home'>
	<section class='left'>

		<div class="content-container">
			<!--
			LE STORIE
			-->
			<div class='box-1'>
				<div class='head'>
					<div class='title'>
						<h5>LE NOSTRE STORIE</h5>
					</div>
				</div>

				<section class='articles-container'>
					<section class='articles'>

						<!-- Swiper -->
						<div class="swiper-container instance1">
							<div class="swiper-wrapper">
								<?php
								/* Query per Le storie
								*---------------------*/
						    $args = array(
						        'category_name' => 'le-storie',
										'posts_per_page' => 10
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
												<?php the_post_thumbnail('icc_single', array('class' => 'img-res card-img-top mx-auto d-block','alt' => get_the_title()));?>
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
							</div>
						</div>

					</section>
				</section>
			</div><!-- BOX 1 - Le storie-->

			<!--
			LA MAPPA
			 -->
			<div class='box-2'>

				<div class='head'>
					<div class='title'>
						<h5>LA MAPPA DELL’ITALIA CHE CAMBIA</h5>

						<div class='arrows'>
							<figure data-action="prev">
								<img src='<?php echo get_template_directory_uri();?>/assets/img/icons/arrow-white-left.svg' alt='' title=''>
							</figure>
							<div class='page-number'>1 / 5</div>
							<figure data-action="next">
								<img src='<?php echo get_template_directory_uri();?>/assets/img/icons/arrow-white-right.svg' alt='' title=''>
							</figure>
						</div>
					</div>
				</div>

				<div class='content'>
					<!-- Swiper -->
					<div class="swiper-container map-swiper">
						<div class="swiper-wrapper">
							<?php for($i=0; $i<10; $i++ ): ?>
								<div class="swiper-slide">
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
									<article>
								</div>
							<?php endfor; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="right">
		<div class='home-content'>

			<!--
			RASSEGNA STAMPA
			-->
			<div class='box-1'>
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
							<?php the_post_thumbnail('icc_rassegnastampahome', array('class' => 'img-res','alt' => get_the_title())); ?>
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
			</div>

			<div class='box-2'>
				<!--<div class='head'>
					<div class='title'>
						<h5>ULTIME NEWS</h5>

						<div class='arrows'>
							<figure data-action="prev">
								<img src='<?php echo get_template_directory_uri();?>/assets/img/icons/arrow-white-left.svg' alt='' title=''>
							</figure>
							<div class='page-number'>1 / 5</div>
							<figure data-action="next">
								<img src='<?php echo get_template_directory_uri();?>/assets/img/icons/arrow-white-right.svg' alt='' title=''>
							</figure>
						</div>
					</div>
				</div>

				<div class="content">-->
					<!-- Swiper -->
				<!--	<div class="swiper-container latest-news-swiper">
						<div class="swiper-wrapper">
							<?php //for($i=0; $i<2; $i++): ?>
							<div class='swiper-slide'>
								<ul class='items'>
									<li>
										<a href=''>
											<figure>
												<img src='/assets/img/modules/home/news-1.jpg' alt='' title=''>
											</figure>

											<div class='title'>
												<div class='date'>22 MAGGIO 2019</div>
												<h3>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</h3>
											</div>

											<article>
												<p>
													Sed ut perspiciatis unde omnis iste
													natus error sit voluptatem accusantium
													doloremque laudantium, totam rem
													aperiam, eaque ipsa quae ab illo
													inventore veritatis et quasi architecto
													beatae vitae dicta sunt explicabo.
													Nemo enim ipsam voluptatem quia
													voluptas sit aspernatur aut odit aut.
												</p>
											</article>
										</a>
									</li>
									<li>
										<a href=''>
											<figure>
												<img src='/assets/img/modules/home/news-2.jpg' alt='' title=''>
											</figure>

											<div class='title'>
												<div class='date'>22 MAGGIO 2019</div>
												<h3>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</h3>
											</div>

											<article>
												<p>
													Sed ut perspiciatis unde omnis iste
													natus error sit voluptatem accusantium
													doloremque laudantium, totam rem
													aperiam, eaque ipsa quae ab illo
													inventore veritatis et quasi architecto
													beatae vitae dicta sunt explicabo.
													Nemo enim ipsam voluptatem quia
													voluptas sit aspernatur aut odit aut.
												</p>
											</article>
										</a>
									</li>
								</ul>
							</div>
							<?php //endfor; ?>
						</div>
					</div>
				</div>-->
			</div>
			<div class='box-3'>
				<div class="content">

					<!--<div class='arrows'>
						<figure data-action="prev">
							<img src='<?php //echo get_template_directory_uri();?>/assets/img/icons/arrow-white-left.svg' alt='' title=''>
						</figure>
						<div class='page-number'>1 / 5</div>
						<figure data-action="next">
							<img src='<?php //echo get_template_directory_uri();?>/assets/img/icons/arrow-white-right.svg' alt='' title=''>
						</figure>
					</div>-->

					<!-- Swiper -->
					<div class="swiper-container generic-article-swiper">
						<div class="swiper-wrapper">
								<div class='swiper-slide'>
								<?php
								/* Query per Ultime news
								*---------------------*/
								$args = array(
										'posts_per_page' => 10
								);
								$loop = new WP_Query( $args );
								$i = 0;
								if ( $loop->have_posts() ) : while( $loop->have_posts() ) : $loop->the_post();
								$i++;
								if ($i % 2 == 1){
									echo '<ul class="items">';
								}
								?>
										<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
											<a href='<?php the_permalink(); ?>'>
												<div class='category'>
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
												<figure>
													<?php the_post_thumbnail('icc_ultimenewshome', array('class' => 'img-res','alt' => get_the_title())); ?>
												</figure>

												<div class='title'>
													<div class='date'><?php the_time('j M Y') ?></div>
													<h3><?php the_title(); ?></h3>
												</div>

												<article>
													<?php the_excerpt();?>
												</article>

												<div class='cta'>LEGGI DI PIÙ</div>
											</a>
										</li>
										<?php if ($i % 2 == 0){
                      echo '</ul>';
                    }
									 endwhile;
									else:
									 echo "<p>Non ho trovato nessun Ultime news</p>";
									endif;
									wp_reset_query();?>
								</div>
						</div>
					</div><!-- swiper-container generic-article-swiper -->
				</div>
			</div>
			<div class='box-4'>
				<div class="content">
					<ul class='items'>
						<?php
						$custom_query_args = array(
						'post_type' => 'nostri-libri',
						'orderby' => 'date',
						'posts_per_page' => 3,
						'order' => 'DESC',
						);
						$custom_query = new WP_Query( $custom_query_args );
						if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post();
							 ?>
						<li>
							<a href=''>
								<div class='category'>
									<span>I NOSTRI LIBRI</span>
								</div>
								<figure>
									<?php the_post_thumbnail('icc_libri', array('class' => 'img-res','alt' => get_the_title())); ?>
								</figure>

								<div class='title'>
									<h3><?php the_title(); ?></h3>
								</div>

								<article>
									<?php the_excerpt();?>
								</article>
							</a>
						</li>
					<?php endwhile;
					else:
					 echo "<p>Non ho trovato nessun Libro</p>";
					endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<?php get_sidebar(); ?>
</main>

<?php get_footer(); ?>
