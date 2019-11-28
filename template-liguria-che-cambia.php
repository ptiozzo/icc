<?php
/*
Template Name: Liguria che cambia
*/
?>

<?php get_header(); ?>
<?php
  $catPage = 'liguria-che-cambia';
?>
<div class="container-fluid home-page <?php echo $catPage; ?>">

  <div style="margin-top: 0px;"><iframe style="border: 0px; width:100%; height: 60vh;" src="https://api.pianetafuturo.it/widget/map/std2.php?a=8&tagoverride=1&sidebar=1&nored=1"></iframe></div>

  <div class='head'>
    <div class='title'>
      <h5>ULTIME REALTA' MAPPATE</h5>
    </div>
  </div>

      <div class="row mb-3">



      <?php get_template_part('loop/loop','ultimerealtaliguria'); ?>

      <?php
      if ($i < 5){
      ?>

        <div class="col-xl-5ths col-lg-3 col-md-4 col-sm-6 text-break">
          <?php dynamic_sidebar('liguria'); ?>
        </div>
      <?php } ?>

    </div> <!-- Fine row  -->

    <div class="row">
      <div class="col-8 offset-2 text-center">
        <?php dynamic_sidebar('homeliguria'); ?>
      </div>
    </div>


    <div class='head'>
      <div class='title'>
        <h5>ULTIME STORIE</h5>
      </div>
    </div>

    <div class="row">
    <?php

    $args = array(
        'category_name' => $catPage.'+io-faccio-cosi',
        'posts_per_page' => 10,
    );
    $loop = new WP_Query( $args );
    if ( $loop->have_posts() ) : while( $loop->have_posts() ) : $loop->the_post();
    ?>
      <div class="col-xl-5ths col-lg-3 col-md-4 col-sm-6 text-break">
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





</div><!-- Fine container fluid -->
<?php get_footer(); ?>
