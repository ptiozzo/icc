<?php
/*
Template Name: Sicilia che cambia
*/
?>

<?php get_header(); ?>
<?php get_template_part('sicilia/menu','sicilia'); ?>

<?php
  $catPage = 'sicilia-che-cambia';
?>

<div class="container-fluid home-page <?php echo $catPage;?>">
	<div class="row">
    <?php get_template_part('template-part/alert','ferie');?>
    <?php
      if($_GET['contact-form-sent']){
        echo '<div class="alert alert-success alert-dismissible fade show col-12 col-md-8 mx-auto mt-3 " role="alert">';
          echo 'Messaggio inviato con successo. Grazie per averci contattato.';
          echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
          echo '<span aria-hidden="true">&times;</span>';
          echo '</button>';
        echo '</div>';
      }

     ?>

    <div id="sidebar" class="col-lg-home1 col-md-12 mb-2">
        <div class="sidebar__inner">
    			<?php
    			/* Query per Le storie
    			*---------------------*/
          $i = 0;
          $args = array(
              'category_name' => $catPage,
              'ignore_sticky_posts' => 1,
              'posts_per_page' => 10,
              'tax_query' => array(
                array(
                    'taxonomy'=> 'icc_altri_filtri',
                    'field'   => 'slug',
                    'terms'		=> 'siciliasticky',
                ),
              ),
          );
    			$loop = new WP_Query( $args );
          $icc_numeroPost = $loop->found_posts;

    			if( $loop->have_posts() ) : ?>
            <div class='head'>
      				<div class='title'>
      					<h5>IN EVIDENZA</h5>
      				</div>
      			</div>
    				<div id="carouselEvidenza" class="carousel carousel-control-top slide <?php if ($icc_numeroPost > 1){echo "controll-visible";} ?>" data-ride="carousel" data-interval="false">
              <?php if ($icc_numeroPost > 1) { ?>
                <div class="slider-top bg-dark d-flex flex-row align-items-center justify-content-between mb-2">
                  <a class="carousel-control-prev" href="#carouselEvidenza" data-no-swup role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <ol class="carousel-indicators pr-2 text-white">
                     <?php for ($count = 0;$count <= $icc_numeroPost; $count++){ ?>
                             <li data-target="#carouselRassegnaEvidenza" data-slide-to="<?php echo $count;?>" <?php if($count == 0){echo 'class="active"';};?>><?php echo $count+1;?></li>
                    <?php }	?>
                    <p class=""> /<?php echo $icc_numeroPost;?></p>
                  </ol>
                  <a class="carousel-control-next" href="#carouselEvidenza" data-no-swup role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              <?php } ?>
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
    				</div>
    			<?php

    			endif;
    			wp_reset_query();?>

          <?php dynamic_sidebar('homeSiciliasx'); ?>

          <?php include('siciliaslidermappa.php'); ?>
        </div><!-- Fine sidebar__inner -->
		</div><!-- Fini prima colonna -->

		<div class="col-lg-home2 col-md-12">

			<div class='head'>
				<div class='title'>
					<h5>ULTIME STORIE</h5>
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
        $i = 0;
				if ( $loop->have_posts() ) : while( $loop->have_posts() ) : $loop->the_post();
        $i++;

				?>
							<div class="col-lg-6 mt-3 text-break">
								<div id="post-<?php the_ID(); ?>" class="card  border-0 p-0">
									<article <?php echo post_class(); ?>>
                    <div class="category-bg"> </div>
                    <div class="category pl-1">
                      <span>
                        <?php get_template_part('inc/post','etichetta'); ?>
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
          if($i == 2)
          {
            echo '<div class="col-12">';
            dynamic_sidebar('homeSiciliadx');
            echo '</div>';
            echo '<div class="col-12 d-md-none">';
            bachecaSlider('sicilia');
            echo '</div>';
          }
          if($i == 4)
          {
            echo '<div class="col-12 d-none d-md-block">';
            bachecaSlider('sicilia');
            echo '</div>';
          }
					 endwhile;
					else:
					 echo "<p>Non ho trovato nessun Ultimi articoli</p>";
					endif;
					wp_reset_query();?>


			</div> <!-- Fine row  -->
		</div><!-- Fini seconda colonna  -->
      <div class="col-lg-home3">
        <aside class="sidebar">

          <div class="pcc-pianfut">
            <a href="/tag/viaggio-in-sicilia/" class="p-0 mb-2">
              <img class="img-fluid" src="https://www.italiachecambia.org/wp-content/uploads/2021/04/bannerSiciliaCheCambia.png" alt="Viaggio in Sicilia">
            </a>
            <form class="" action="/nuovarealtasegnalata/?regionemappa=sicilia" method="post">
              <input name="regionemappa" type="hidden" value="sicilia">
              <input name="segnala_realta" type="submit" value="Segnala una realtà" class="btn btn-secondary">
            </form>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#SiciliaSegnalaEvento">
               Segnala un evento
            </button>
            <form class="" action="/nuovocercooffro/" method="post">
              <input name="regione" type="hidden" value="sicilia">
              <input name="aggiungi_annuncio" type="submit" value="Inserisci un annuncio" class="btn btn-secondary">
            </form>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#SiciliaCollaboraConNoi">
               Collabora con noi
            </button>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#SiciliaDonazione">
               Fai una donazione
            </button>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#SiciliaDiventaPartner">
               Diventa partner
            </button>
          </div>

        </aside>

        <?php get_sidebar(); ?>
      </div><!-- Fine sidebar  -->
	</div><!-- Fine row -->
  <div class="row my-3">
    <div class="col-12 text-center">
      <?php dynamic_sidebar('sicilia-footer'); ?>
    </div>
  </div>
</div><!-- Fine container fluid -->

<?php get_footer(); ?>
