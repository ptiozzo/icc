<?php require 'header.php'; ?>
<?php
  $catPage = 'piemonte-che-cambia';
?>
<main class="piemonte-che-cambia">

	<section class="page-head">
		<div class='page-name'>
			<figure>
				<img src='<?php echo get_template_directory_uri();?>/assets/img/modules/piemonte/piemonte.svg' alt='' title=''>
			</figure>
			<span>PIEMONTE CHE CAMBIA</span>
		</div>

		<div class='right-section'>
			<ul class='actions'>
				<li class='active'>
					<a href=''>Mappa + Giornale</a>
				</li>
				<li>
					<a href=''>Articoli</a>
				</li>
				<li>
					<a href=''>Le Storie</a>
				</li>
				<li>
					<a href=''>Realtà Mappate</a>
				</li>
				<li>
					<a href=''>Sedi</a>
				</li>
				<li>
					<a href=''>Calendario</a>
				</li>
				<li>
					<a href=''>Gruppi</a>
				</li>
				<li>
					<a href=''>Piazza</a>
				</li>
				<li>
					<a href=''>Contattaci</a>
				</li>
				<li class='border'>
					<a href=''>
						<figure>
							<img src='/assets/img/icons/signup.svg' alt='' title=''>
						</figure>
						<span>Registrati</span>
					</a>
				</li>
				<li class='border'>
					<a href=''>
						<figure>
							<img src='/assets/img/icons/signin.svg' alt='' title=''>
						</figure>
						<span>Accedi</span>
					</a>
				</li>
			</ul>
		</div>

	</section>

	<div class="page-content">
		<section class='left'>

			<div class="content-container">
				<div class='box-1'>
					<div class='head'>
						<div class='title'>
							<h5>ARTICOLI IN EVIDENZA</h5>
						</div>
					</div>

					<section class='articles-container'>
						<section class='articles'>

                  <?php
            			/* Query per Piemonte in evidenza
            			*---------------------*/
                  $i = 0;
            	    $args = array(
            	        'category_name' => $catPage,
            					'post__in' => get_option( 'sticky_posts' ),
            					'ignore_sticky_posts' => 1,
            					'posts_per_page' => 6
            	    );
            			$loop = new WP_Query( $args );
            	    if( $loop->have_posts() ) : ?>
                  <div id="carouselLeNostreStorie" class="carousel carousel-controll-down slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner">
                      <?php
            	        while( $loop->have_posts() ) : $loop->the_post();
                      $i++;
                      ?>
                      <div class="carousel-item <?php if ($i == 1){echo 'active';} ?>">
                        <div class="card border-0 p-1">
                          <?php the_post_thumbnail('icc_single', array('class' => 'img-res card-img-top mx-auto d-block','alt' => get_the_title()));?>
                          <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text"><?php echo get_the_excerpt();?></p>
                            <a href="<?php echo the_permalink();?>" class="stretched-link"></a>
                          </div>
                        </div>
                      </div>
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
        	          ?>
        	          <p>Non ho trovato nulla</p>
            	      <?php
            	    endif;
            	    wp_reset_query();
            	?>
						</section>
					</section>
				</div>


				<div class='box-2'>
					<div class="content">
						<div class='map'></div>
						<div class="legend">Inserisci un progetto nella mappa</div>
					</div>
				</div>
			</div>
		</section>

		<section class="right">

			<div class='home-content'>
				<div class='box-3'>
					<div class='head'>
						<div class='title'>
							<h5>LOREM IPSUM DOLOR</h5>
						</div>
					</div>

					<div class="content">
						<ul class='items'>
							<?php for($i=0; $i<4; $i++): ?>
							<li class=''>
								<a href=''>
									<figure>
										<img src='/assets/img/modules/piemonte-che-cambia/piemonte-<?php echo $i + 1; ?>.jpg' alt='' title=''>
									</figure>

									<div class='title'>
										<div class='date'>10 giugno 2019</div>
										<h3>Racconti on the road di un viaggio… nel Piemonte che Cambia</h3>
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
				</div>
			</div>

			<aside>
				<section class='actions-group'>
					<div class='head'>
						<div class='title'>
							<h5>TEMI</h5>
						</div>
					</div>

					<ul class='actions'>
						<li>
							<a href='' class='red'>
								Inserisci NUOVA REALTÀ
							</a>
						</li>
						<li>
							<a href='' class='orange'>
								SEGNALA EVENTI
							</a>
						</li>
					</ul>
				</section>

				<section class='actions-group'>
					<div class='head'>
						<div class='title'>
							<h5>PROVINCE</h5>
						</div>
					</div>

					<ul class='actions'>
						<li>
							<a href=''>
								ALESSANDRIA
							</a>
						</li>
						<li>
							<a href=''>
								ASTI
							</a>
						</li>
						<li>
							<a href=''>
								BIELLA
							</a>
						</li>
						<li>
							<a href=''>
								CUNEO
							</a>
						</li>
						<li>
							<a href=''>
								NOVARA
							</a>
						</li>
						<li>
							<a href=''>
								TORINO
							</a>
						</li>
						<li>
							<a href=''>
								VERBANO
							</a>
						</li>
						<li>
							<a href=''>
								VERCELLI
							</a>
						</li>
					</ul>
				</section>
			</aside>
		</section>
	</div>
</main>

<?php require 'footer.php'; ?>
