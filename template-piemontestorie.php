<?php
/*
Template Name: Piemonte storie
*/
?>
<?php get_header(); ?>
<main class="piemonte-che-cambia">
  <?php get_template_part('menu','piemonte'); ?>
</main>
<?php
$Cat1 = 'piemonte-che-cambia';
$Cat2 = 'le-storie';
 ?>
<div class="content-no-sidebar" style="margin-top: 40px;">

  <?php
    $CatTerm = $Cat1."+".$Cat2;
    $args = array(
    'post_type' => 'post',
    'category_name' => $CatTerm,
    'paged'     => $paged,
    );
    /*eseguo la query */
    $loop = new WP_Query( $args );

    if( $loop->have_posts() ) :
      /* Eseguo qualcosa se ho post nel loop */
      ?>
      <div class="row">
      <?php
      while( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="col-xl-5ths col-lg-3 col-md-4 col-sm-6">
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <a href='<?php the_permalink(); ?>'>
              <?php
              if ($Cat1 == $ParentCat1) { ?>
                <div class='category'>
                  <span><?php the_time('j M') ?></span>
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
              <?php } ?>
              <!-- Immagine in evidenza -->
              <figure>
                <?php
                  if ($Cat1 != "nostri-libri"){
                    the_post_thumbnail('icc_category', array('class' => 'img-fluid','alt' => get_the_title()));
                  } else {
                    the_post_thumbnail('icc_libri', array('class' => 'img-fluid','alt' => get_the_title()));
                  }
                ?>
              </figure>
              <!-- Autore o autori -->
              <?php
              if ($Cat1 != "nostri-libri"){
                echo "<div class='autore'>Scritto da <b>".get_the_author();
                /* controllo se esiste un secondo autore */
                if( !empty (get_post_meta( get_the_ID(), 'SecondoAutore',true))){
                  echo " e ". get_post_meta( get_the_ID(), 'SecondoAutore',true);
                }
                echo "</b></div>";
              }
              ?>
              <!-- Titolo -->
              <div class='title'>
                <h3><?php the_title(); ?></h3>
              </div>

                <?php the_excerpt();?>

              <div class='cta'>LEGGI DI PIÙ</div>
            </a>
          </article>
        </div>
        <?php
      endwhile;
        ?>
      </div> <!-- .grid -->
        <!-- paginazione -->
        <?php echo bootstrap_pagination($loop); ?>

        <?php
      else:
        ?>
          <p>Spiacente, ma la tua ricerca non ha prodotto nessun risultato</p>
        <?php
      endif;
    wp_reset_query();
  ?>
  <!-- fine loop -->
</div><!-- .content 	-->
<!-- carico footer -->
<?php get_footer(); ?>
