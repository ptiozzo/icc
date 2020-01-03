<?php get_header(); ?>


<div class="container-fluid home-page">
  <div class="row">
    <div id="sidebar" class="col-lg-home1 col-md-12 order-2 order-xl-1 d-none d-md-block">
      <div class="sidebar__inner">

        <?php include('loop/loop-homeicctv.php'); ?>

        <?php dynamic_sidebar('homesx'); ?>

  			<div class="pb-3">
          <?php get_template_part('loop/loop','homeslidermappa'); ?>
  		  </div>
      </div>
    </div>


    <div class="col-lg-home2 col-md-12 order-1 order-xl-2">

			<?php include('loop/loop-homeevidenza.php'); ?>


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

            //dopo 2 articoli metto area widget per banner
            if($i == 3)
            {
              echo '<div class="col-12">';
              dynamic_sidebar('homedx');
              echo '</div>';
              echo '<div class="col-12 d-md-none">';
              get_template_part("loop/loop","homeicctvmobile");
              echo '</div>';
            }
            if($i == 5)
            {
              echo '<div class="col-12 d-md-none">';
              get_template_part("loop/loop","homeslidermappamobile");
              echo '</div>';
              echo '<aside class="col-12 d-md-none sidebar">';
              dynamic_sidebar('mobile-1');
              echo '</aside>';
            }
            if($i == 7)
            {
              echo '<aside class="col-12 sidebar d-md-none">';
              dynamic_sidebar('mobile-2');
              echo '</aside>';
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
      <!-- Slider Libri  -->
      <?php
        echo '<div class="col-12 d-md-none">';
        get_template_part("loop/loop","homesliderlibrimobile");
        echo '</div>';
        echo '<div class="col-12 d-none d-md-block">';
        get_template_part("loop/loop","homesliderlibri");
        echo '</div>';
        echo '<aside class="col-12 sidebar d-md-none">';
        dynamic_sidebar('mobile-3');
        echo '</aside>';
      ?>
      <!-- Fine slider libri  -->
		</div><!-- Fini seconda colonna  -->
    <div class="col-lg-home3 order-3 d-none d-md-block">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
