<?php require 'header.php'; ?>

<main class='home'>
	<section class='left'>

		<div class="content-container">
			<div class='box-1'><!-- Le storie  -->
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
						    if( $loop->have_posts() ) :
						        while( $loop->have_posts() ) : $loop->the_post();
                    $i++;

                  if ($i % 2 == 1){
                    echo '<div class="swiper-slide">';
                  }
                  ?>
										<div class='box'>
											<a href='<?php echo the_permalink();?>'>
												<div class='box-head'>
													<figure>
														<img src='<?php the_post_thumbnail('icc_category', array('class' => 'img-res','alt' => get_the_title())); ?>'>
													</figure>
													<div class='date'><?php the_time('j M Y') ?></div>
												</div>
												<div class='box-body'>
													<article>
														<div class='title'>
															<?php the_title(); ?>
														</div>
														<div class='description'>
															<p>
																<?php the_excerpt();?>
															</p>
														</div>
													</article>
												</div>
											</a>
										</div>
                    <?php if ($i % 2 == 0){
                      echo '</div>';
                    }
								 endwhile;
                else:
                  echo "<p>Non ho trovato nessun Le storie</p>";
                endif;
                wp_reset_query();?>
							</div>

							<div class='articles-foot'>

								<div class='arrows'>
									<figure data-action='prev'>
										<img src='<?php echo get_template_directory_uri();?>/assets/img/icons/arrow-circle-left.svg' alt='' title=''>
									</figure>
									<figure data-action='next'>
										<img src='<?php echo get_template_directory_uri();?>/assets/img/icons/arrow-circle-right.svg' alt='' title=''>
									</figure>
									<div class='numbers'>1 / <?php echo $i; ?></div>
								</div>

								<a href='http://icc.local/category/i-nostri-contenuti/le-storie/' class='action'>
									VEDI TUTTE LE STORIE
								</a>

								<!-- Swiper Pagination -->
								<div class="swiper-pagination"></div>
							</div>
						</div>

					</section>
				</section>
			</div><!-- BOX 1 - Le storie-->


			<div class='box-2'> <!-- La mappa -->

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
			<div class='box-1'><!-- RASSEGNA STAMPA -->
				<div class='head'>
					<div class='title'>
						<h5>RASSEGNA STAMPA</h5>
					</div>
				</div>

				<div class='content'>
					<a href=''>
						<figure>
							<img src='/assets/img/modules/home/press.jpg' alt='' title=''>
						</figure>

						<article>
							<div class='date'>22 MAGGIO 2019</div>
							<h5>Neque porro quisquam est qui dolorem <br>ipsum quia dolor sit amet</h5>
							<div class='info'>A cura di <b>Andrea Degl’Innocenti</b></div>
						</article>
					</a>
				</div>
			</div>

			<div class='box-2'>
				<div class='head'>
					<div class='title'>
						<h5>ULTIME NEWS</h5>

						<div class='arrows'>
							<figure data-action="prev">
								<img src='/assets/img/icons/arrow-white-left.svg' alt='' title=''>
							</figure>
							<div class='page-number'>1 / 5</div>
							<figure data-action="next">
								<img src='/assets/img/icons/arrow-white-right.svg' alt='' title=''>
							</figure>
						</div>

					</div>
				</div>

				<div class="content">
					<!-- Swiper -->
					<div class="swiper-container latest-news-swiper">
						<div class="swiper-wrapper">
							<?php for($i=0; $i<2; $i++): ?>
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
							<?php endfor; ?>
						</div>
					</div>
				</div>
			</div>
			<div class='box-3'>
				<div class="content">

					<div class='arrows'>
						<figure data-action="prev">
							<img src='/assets/img/icons/arrow-white-left.svg' alt='' title=''>
						</figure>
						<div class='page-number'>1 / 5</div>
						<figure data-action="next">
							<img src='/assets/img/icons/arrow-white-right.svg' alt='' title=''>
						</figure>
					</div>

					<!-- Swiper -->
					<div class="swiper-container generic-article-swiper">
						<div class="swiper-wrapper">
							<?php for($y=0; $y<10; $y++): ?>
								<div class='swiper-slide'>
									<ul class='items'>
										<?php for($i=0; $i<10; $i++): ?>
										<li class='
											<?php
												switch($i){
													case 0:
													case 9:
														echo 'articles';
													break;
													case 1:
													case 3:
													case 7:
														echo 'contacts';
													break;
													case 2:
													case 8:
														echo 'meme';
													break;
													case 4:
														echo 'stories';
													break;
													case 5:
														echo 'healthy';
													break;
													case 6:
														echo 'documentary';
													break;
												}
											?>
										'>
											<a href=''>
												<div class='category'>
													<span>
														<?php
															switch($i){
																case 0:
																	echo 'Gli Articoli';
																break;
																case 1:
																	echo 'Le rubriche';
																break;
																case 2:
																	echo 'I meme';
																break;
																case 3:
																	echo 'Le rubriche';
																break;
																case 4:
																	echo 'Le storie';
																break;
																case 5:
																	echo 'Salute';
																break;
																case 6:
																	echo 'I documentari';
																break;
																case 7:
																	echo 'Le rubriche';
																break;
																case 8:
																	echo 'I Meme';
																break;
																case 9:
																	echo 'Gli Articoli';
																break;
															}
														?>
													</span>
												</div>
												<figure>
													<img src='/assets/img/modules/home/articoli-<?php echo $i + 1; ?>.jpg' alt='' title=''>
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

												<div class='cta'>LEGGI DI PIÙ</div>
											</a>
										</li>
										<?php endfor; ?>
									</ul>
								</div>
							<?php endfor; ?>
						</div>
					</div>
				</div>
			</div>
			<div class='box-4'>
				<div class="content">
					<ul class='items'>
						<?php for($i=0; $i<3; $i++): ?>
						<li>
							<a href=''>
								<div class='category'>
									<span>I NOSTRI CORSI</span>
								</div>
								<figure>
									<img src='/assets/img/modules/home/corso-<?php echo $i+1; ?>.jpg' alt='' title=''>
								</figure>

								<div class='title'>
									<h3>E ora si cambia</h3>
								</div>

								<article>
									<p>
									Sed ut perspiciatis unde
									omnis iste natus error sit
									voluptatem accusantium
									doloremque laudantium,
									totam rem aperiam,
									eaque ipsa quae ab illo
									inventore veritatis et
									quasi architecto
									beatae vitae dicta sunt…
									</p>
								</article>
							</a>
						</li>
						<?php endfor; ?>
					</ul>
				</div>
			</div>
		</div>

		<aside>
			<section class='newsletter-box'>
				<div class='box-title'>ISCRIVITI ALLA NEWSLETTER</div>
				<form>
					<input type="text" placeholder='Email'>
					<figure>
						<img src='/assets/img/icons/arrow-bar-right.svg' title='' alt=''>
					</figure>
				</form>
			</section>

			<section class='actions-group'>
				<div class='head'>
					<div class='title'>
						<h5>LE REGIONI</h5>
					</div>
				</div>

				<ul class='actions'>
					<li>
						<a href=''>
							Piemonte che cambia
						</a>
					</li>
					<li>
						<a href=''>
							Casentino che cambia
						</a>
					</li>
					<li>
						<a href=''>
							Berlin im Wandel
						</a>
					</li>
					<li>
						<a href=''>
							Brandeburg im Wandel
						</a>
					</li>
				</ul>
			</section>

			<section class='list'>
				<a href=''>PERCORSI DI CAMBIAMENTO</a>

				<div class='head'>
					<div class='title'>
						<h5>CAMPAGNE TEMATICHE</h5>
					</div>
				</div>


				<ul class='campaigns'>
					<li>
						<a href=''>
							<figure>
								<img src='/assets/img/modules/home/campaign-1.jpg' alt='' title=''>
							</figure>

							<div class='title'>
								<h3>Cambia la finanza,<br> scegli l’etica</h3>
								<div class='date'>22 MAGGIO 2019</div>
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
								<img src='/assets/img/modules/home/campaign-2.jpg' alt='' title=''>
							</figure>

							<div class='title'>
								<h3>Viaggia in un mo(n)do diverso</h3>
								<div class='date'>22 MAGGIO 2019</div>
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
								<img src='/assets/img/modules/home/campaign-3.jpg' alt='' title=''>
							</figure>

							<div class='title'>
								<h3>La scuola cambia, cambia la tua scuola</h3>
								<div class='date'>22 MAGGIO 2019</div>
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
								<img src='/assets/img/modules/home/campaign-4.jpg' alt='' title=''>
							</figure>

							<div class='title'>
								<h3>A natale non mangiamoci il pianeta</h3>
								<div class='date'>22 MAGGIO 2019</div>
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
								<img src='/assets/img/modules/home/campaign-5.jpg' alt='' title=''>
							</figure>

							<div class='title'>
								<h3>Cambia la tua energia</h3>
								<div class='date'>22 MAGGIO 2019</div>
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


			</section>
		</aside>
	</section>
</main>

<?php require 'footer.php'; ?>
