<?php
/*
Template Name: Casentino che cambia
*/
?>

<?php get_header(); ?>
<?php
  $catPage = 'casentino-che-cambia';
?>
<main class="piemonte-che-cambia">

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
							<h5>ULTIMI ARTICOLI</h5>
						</div>
					</div>
          <?php
          $args = array(
              'category_name' => $catPage,
              'posts_per_page' => 10,
          );
          $loop = new WP_Query( $args );
          if( $loop->have_posts() ) : ?>
					<div class="content">
						<ul class='items'>
              <?php while( $loop->have_posts() ) : $loop->the_post(); ?>
  							<li class=''>
  								<a href='<?php the_permalink(); ?>'>
  									<figure>
  										<?php the_post_thumbnail('icc_category', array('class' => 'img-fluid','alt' => get_the_title())); ?>
  									</figure>

  									<div class='title'>
  										<div class='date'><?php the_time('j M') ?></div>
  										<h3><?php the_title(); ?></h3>
  									</div>

  									<article>
  										<?php the_excerpt();?>
  									</article>

  									<div class='cta'>LEGGI DI PIÙ</div>
  								</a>
  							</li>
							<?php endwhile; ?>
						</ul>
					</div>
        <?php endif; ?>
				</div>
			</div>
		</section>
	</div>
</main>

<?php require 'footer.php'; ?>
