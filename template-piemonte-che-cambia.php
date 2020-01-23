<?php
/*
Template Name: Piemonte che cambia
*/
?>

<?php get_header(); ?>
<?php
  $catPage = 'piemonte-che-cambia';
?>
<?php
$argsPiemSegnalaProgetto = array(
  'post_type' => 'contenuti-speciali',
  'posts_per_page' => 1,
  'tax_query' => array(
    array(
        'taxonomy'=> 'contenuti_speciali_filtri',
        'field'   => 'slug',
        'terms'		=> 'piemonte-segnala-progetto',
    ),
  ),
);
$loopPiemSegnalaProgetto = new WP_Query( $argsPiemSegnalaProgetto );
if($loopPiemSegnalaProgetto->have_posts()):
 ?>
<div class="modal fade" id="PiemonteSegnalaProgetto" tabindex="-1" role="dialog" aria-labelledby="PiemonteAccediTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="PiemonteAccediTitle">Segnala un progetto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pcc-pianfut">
        <?php
          while($loopPiemSegnalaProgetto->have_posts()) :  $loopPiemSegnalaProgetto->the_post();
            the_content();
          endwhile;
          ?>
        <a href="https://piemonte.pianetafuturo.it">Vai a PianetaFuturo</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<div class="modal fade" id="PiemonteSegnalaEvento" tabindex="-1" role="dialog" aria-labelledby="PiemonteAccediTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="PiemonteAccediTitle">Segnala un evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pcc-pianfut">
        <p>Vuoi segnalare un evento che organizzi o ritieni interessante?</p>
        <p>Per farlo accedi a PianetaFuturo, la piattaforma che offre gli strumenti per la community di Piemonte che Cambia.</p>
        <a href="https://piemonte.pianetafuturo.it">Vai a PianetaFuturo</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="PiemonteScendiPiazza" tabindex="-1" role="dialog" aria-labelledby="PiemonteAccediTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="PiemonteAccediTitle">Scendi in piazza</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pcc-pianfut">
        <p>La piazza è il luogo virtuale dove la community di Piemonte che Cambia condivide e scambia idee, informazioni, contenuti multimediali.</p>
        <p>Per accedere alla piazza devi essere registrato a PianetaFuturo, la piattaforma che offre gli strumenti per la nostra community.</p>
        <a href="https://piemonte.pianetafuturo.it">Vai a PianetaFuturo</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid home-page <?php echo $catPage;?>">
	<div class="row">
    <div id="sidebar" class="col-lg-home1 col-md-12">
        <div class="sidebar__inner">



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
      $icc_numeroPost = $loop->found_posts;
			if( $loop->have_posts() ) : ?>
        <div class='head'>
  				<div class='title'>
  					<h5>ARTICOLI IN EVIDENZA</h5>
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

      <?php dynamic_sidebar('homepiemontesx'); ?>


    <div class="pb-3">

      <?php get_template_part('loop/loop','piemonteslidermappa'); ?>


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
            'post__not_in' => $exclude_posts,
        );
				$loop = new WP_Query( $args );
        $i = 0;
				if ( $loop->have_posts() ) : while( $loop->have_posts() ) : $loop->the_post();
        $i++;


        if($i == 3)
        {
          echo '<div class="col-12">';
          dynamic_sidebar('homepiemontedx');
          echo '</div>';
        }
				?>
							<div class="col-lg-6 mt-3 text-break">
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
      <div class="col-lg-home3">
        <aside class="sidebar">
          <div class="pcc-pianfut">
            <h3>Pianeta Futuro</h3>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#PiemonteSegnalaProgetto">
               Segnala un progetto
            </button>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#PiemonteSegnalaEvento">
               Segnala un evento
            </button>
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#PiemonteScendiPiazza">
               Scendi in piazza
            </button>
          </div>
        </aside>

        <?php get_sidebar(); ?>
      </div><!-- Fine sidebar  -->
	</div><!-- Fine row -->
</div><!-- Fine container fluid -->
<?php get_footer(); ?>
