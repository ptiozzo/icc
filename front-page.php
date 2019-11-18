<?php get_header(); ?>


<div class="container-fluid home-page">
  <div class="row">
    <div id="sidebar" class="col-lg-home1 col-md-12 order-2 order-xl-1">
      <div class="sidebar__inner">
        <div class='head'>
  				<div class='title'>
  					<h5>APPROFONDIMENTI - ICC TV</h5>
  				</div>
  			</div>

        <?php
  			/* Query per Io faccio così/Meme
  			*---------------------*/
  			$args = array(
  				'post_type' => 'post',
  				'posts_per_page' => 10,
  				'category_name' => 'io-faccio-cosi,meme',
  				'tax_query' => array(
  					array(
  							'taxonomy'=> 'icc_altri_filtri',
  							'field'   => 'slug',
  							'terms'		=> 'InHome',
  					),
  				),
  			);
  			$loop = new WP_Query( $args );
  			$i = 0;


  			if( $loop->have_posts() ) : ?>
  				<div id="carouselLeNostreStorie" class="carousel carousel-control-top slide" data-ride="carousel" data-interval="false">
            <div class="slider-top bg-dark d-flex flex-row align-items-center justify-content-between mb-2">
              <a class="carousel-control-prev" href="#carouselLeNostreStorie" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <ol class="carousel-indicators pr-2 text-white">
                 <?php for ($count = 0;$count <= 10; $count++){ ?>
  							         <li data-target="#carouselRassegnaEvidenza" data-slide-to="<?php echo $count;?>" <?php if($count == 0){echo 'class="active"';};?>><?php echo $count+1;?></li>
  							<?php }	?>
                <p class=""> /<?php echo '5';?></p>
              </ol>
              <a class="carousel-control-next" href="#carouselLeNostreStorie" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
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
  							<?php
  							if ( has_post_thumbnail() ) {
  								the_post_thumbnail('icc_ultimenewshome', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title()));
  							}
  							else{
  								echo '<img class="img-fluid card-img-top mx-auto d-block p-1" src="'.catch_that_image().'" />';
  							}
  							?>
  							<div class="card-body p-1">
  								<h5 class="card-title"><?php the_title(); ?></h5>
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
          $exclude_posts[] = $post->ID;
  				endwhile;
  				if ($i % 2 == 1){ ?>
  						</div>
  					</div>
  				<?php } ?>
  					</div>
  				</div>
  			<?php
  			else:
  				echo "<p>Non ho trovato nessun Le storie</p>";
  			endif;
  			wp_reset_query();?>


        <?php dynamic_sidebar('homesx'); ?>


  			<div class="pb-3">
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
  											<div class='text'> RETI</div>
  										</div>
  										<img src='<?php echo get_template_directory_uri();?>/assets/img/modules/home/transparent-hand.svg' alt='' title=''>
  									</li>
  									<li>
  										<div class='info d-flex flex-column flex-md-row'>
  											<div class='number'>2062</div>
  											<div class='text'> REALTÀ</div>
  										</div>
  									</li>
  									<li>
  										<a class='cta' href='<?php echo home_url(); ?>/mappa/' target='_blank'>VAI ALLA MAPPA</a>
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
  											<div class='number d-flex flex-column flex-md-row'>2062</div>
  											<div class='text'> REALTÀ</div>
  										</div>
  									</li>
  									<li>
  										<a class='cta' href='<?php echo home_url(); ?>/mappa/' target='_blank'>VAI ALLA MAPPA</a>
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
  											<div class='number d-flex flex-column flex-md-row'>2062</div>
  											<div class='text'> REALTÀ</div>
  										</div>
  									</li>
  									<li>
  										<a class='cta' href='<?php echo home_url(); ?>/mappa/' target='_blank'>VAI ALLA MAPPA</a>
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
    </div>


    <div class="col-lg-home2 col-md-12 order-1 order-xl-2">

			<?php
			$argsRassegna = array(
			'post_type' => 'rassegna-stampa',
			'posts_per_page' => 1,
      'date_query' => array(
         array(
           'after' => '6 hours ago',
         )
        )
			);
			$loopRassegna = new WP_Query( $argsRassegna );
      $argsSticky = array(
          'post__in' => get_option( 'sticky_posts' ),
          'ignore_sticky_posts' => 1,
          'posts_per_page' => 10,
          'tax_query' => array(
  					array(
  							'taxonomy'=> 'icc_altri_filtri',
  							'field'   => 'slug',
  							'terms'		=> 'InHome',
  					),
  				),
      );
			$loopSticky = new WP_Query( $argsSticky );
			$i = 0;
      $icc_ArticNumber = $loopRassegna->found_posts+$loopSticky->found_posts;
			if( $loopRassegna->have_posts() || $loopSticky->have_posts() ) : ?>
        <div class='head'>
  				<div class='title'>
  					<h5>IN EVIDENZA</h5>
  				</div>
  			</div>
        <div id="carouselRassegnaEvidenza" class="carousel carousel-control-top slide <?php if ($icc_ArticNumber > 1){echo "controll-visible";} ?>" data-ride="carousel" data-interval="5000">
          <?php if ($icc_ArticNumber > 1) { ?>
            <div class="slider-top bg-dark d-flex flex-row align-items-center justify-content-between mb-2">
              <a class="carousel-control-prev" href="#carouselRassegnaEvidenza" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <ol class="carousel-indicators pr-2 text-white">
                 <?php for ($count = 0;$count <= $icc_ArticNumber; $count++){ ?>
  							         <li data-target="#carouselRassegnaEvidenza" data-slide-to="<?php echo $count;?>" <?php if($count == 0){echo 'class="active"';};?>><?php echo $count+1;?></li>
  							<?php }	?>
                <p class=""> /<?php echo $icc_ArticNumber;?></p>
              </ol>
              <a class="carousel-control-next" href="#carouselRassegnaEvidenza" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          <?php } ?>
          <div class="carousel-inner">
            <!-- Rassegna stampa -->
				<?php	while( $loopRassegna->have_posts() ) : $loopRassegna->the_post();
          $i++; ?>
          <div class="carousel-item <?php if ($i == 1){echo "active";} ?>">
            <article class="p-0">
              <div class='content rassegna-stampa p-0'>
        				<a href='<?php echo the_permalink();?>'>
        						<?php
        						if ( has_post_thumbnail() ) {
        							the_post_thumbnail('icc_rassegnastampahome', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title()));
        						}
        						else{
        							echo '<img class="img-fluid card-img-top mx-auto d-block p-1" src="'.catch_that_image().'" />';
        						}
        						?>
        					<article>
        						<div class='date'>
        							<?php the_time('j M Y') ?>
        						</div>
        						<h5><?php the_title(); ?></h5>
        						<div class='info'>A cura di <b><?php echo get_the_author();?></b></div>
        					</article>
        				</a>
        			</div>
            </article>
          </div>
          <?php
          $exclude_posts[] = $post->ID;
          endwhile;?>
          <!-- Post in evidenza con flag InHome -->
        	<?php while( $loopSticky->have_posts() ) : $loopSticky->the_post();
          $i++?>
            <div class="carousel-item <?php if ($i == 1){echo "active";} ?>">
              <article class="p-0">
                <div class='content rassegna-stampa p-0'>
          				<a href='<?php echo the_permalink();?>'>
          						<?php
          						if ( has_post_thumbnail() ) {
          							the_post_thumbnail('icc_rassegnastampahome', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title()));
          						}
          						else{
          							echo '<img class="img-fluid card-img-top mx-auto d-block p-1" src="'.catch_that_image().'" />';
          						}
          						?>
          					<article>
          						<div class='date'>
          							<?php the_time('j M Y') ?>
          						</div>
          						<h5><?php the_title(); ?></h5>
          						<div class='info'>A cura di <b><?php echo get_the_author();?></b></div>
          					</article>
          				</a>
          			</div>
              </article>
            </div>
            <?php
            $exclude_posts[] = $post->ID;
            endwhile;
            ?>
        </div>
      </div>
			<?php
			endif;
			wp_reset_query();?>


      <!-- Ultime news -->
			<div class='head'>
				<div class='title'>
					<h5>ULTIME NEWS</h5>
				</div>
			</div>

			<div class="row">



				<?php
        $i = 0;
        /*controllo se ho una rassegna in evidenza,
        se NO metto una rassegna e poi 9 post,
        se SI metto 10 post
        */
        if ($loopRassegna->found_posts == 0){
          $UltimeNewsPost = 9;
          $argsRassegna = array(
      			'post_type' => 'rassegna-stampa',
      			'posts_per_page' => 1,
    			);
    			$loopRassegnaNews = new WP_Query( $argsRassegna );
          if ( $loopRassegnaNews->have_posts() ) : while( $loopRassegnaNews->have_posts() ) : $loopRassegnaNews->the_post();
          $i++;?>
          <div class="col-md-6 mt-3  text-break">
            <div id="post-<?php the_ID(); ?>" class="card  border-0 p-0">
              <article <?php echo post_class(); ?>>
              <div class="category-bg"> </div>
              <div class="category pl-1">
                <span>
                  <?php
                    get_template_part('inc/post','etichetta');
                  ?>
                </span>
              </div>
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
          endif;
        } else {
          $UltimeNewsPost = 10;
        }
        /* Query per Ultime news
				*---------------------*/
				$argsUltimeNews = array(
					'post_type' => array('post'),
					'posts_per_page' => $UltimeNewsPost,
					'post__not_in' => $exclude_posts,
					'tax_query' => array(
		        array(
		            'taxonomy'=> 'icc_altri_filtri',
		            'field'   => 'slug',
								'terms'		=> 'InHome',
		        ),
    			),

				);
				$loopUltimeNews = new WP_Query( $argsUltimeNews );
				if ( $loopUltimeNews->have_posts() ) : while( $loopUltimeNews->have_posts() ) : $loopUltimeNews->the_post();
				    $i++;

            //dopo 2 articoli metto area widget per bannerq
            if($i == 3)
            {
              echo '<div class="col-12">';
              dynamic_sidebar('homedx');
              echo '</div>';
            }

        ?>

							<div class="col-md-6 mt-3  text-break">
								<div id="post-<?php the_ID(); ?>" class="card border-0 p-0">
									<article <?php echo post_class(); ?>>
  									<div class="category-bg"> </div>
  									<div class="category pl-1">
  										<span>
  											<?php
                          get_template_part('inc/post','etichetta');
  											?>
  										</span>
  									</div>
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
					 echo "<p>Non ho trovato nessun Ultime news</p>";
					endif;
					wp_reset_query();?>

			</div> <!-- Fine row  -->
			<div class="row">
				<?php

				$args = array(
					'post_type' => 'nostri-libri',
					'posts_per_page' => 3,
				);
				$loop = new WP_Query( $args );
				if ( $loop->have_posts() ) : while( $loop->have_posts() ) : $loop->the_post();
				 ?>
					<div class="col-md-4 col-xs-6 my-3">
						<div id="post-<?php the_ID(); ?>" class="card border-0 p-0">
							<article <?php echo post_class(); ?>>
							<div class="category-bg"> </div>
							<div class="category pl-1">
								<span>
									<?php
											echo 'I nostri libri';
									?>
								</span>
								<?php the_post_thumbnail('icc_libri', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title())); ?>
							</div>
							<h5 class="card-title"><?php the_title(); ?></h5>

							<a href="<?php echo the_permalink();?>" class="stretched-link"></a>
							</article>
						</div>

					</div>

				<?php
				endwhile;
				else:
					echo "<p>Non ho trovato nessun I nostri libri</p>";
				endif;?>

			</div><!-- Fine colonna libri  -->
		</div><!-- Fini seconda colonna  -->
    <div class="col-lg-home3 order-3">
      <?php get_sidebar(); ?>
    </div>
    <?php get_template_part('inc/loop','newsbar') ?>
  </div>
</div>

<?php get_footer(); ?>
