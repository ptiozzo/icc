<?php get_header(); ?>

<?php
if (cat_is_ancestor_of( 2298, get_query_var( 'cat' ) ))
{
  if (get_query_var('cat') == "2300"){
    get_template_part('menu','casentino');
  } elseif (get_query_var('cat') == "2299") {
    get_template_part('menu','piemonte');
  } elseif (get_query_var('cat') == "2359") {
    get_template_part('menu','liguria');
  }
}
 ?>

<div class="container-fluid mt-1">
  <div class="category-<?php echo get_term_by('name', single_cat_title('',false), 'category')->slug; ?> clearfix">
    <div class="cat2 category-<?php echo get_term_by('name', single_cat_title('',false), 'category')->slug; ?>">
      <h1><?php echo get_term_by('name', single_cat_title('',false), 'category')->name ?></h1>
    </div>


    <?php
    $CatTerm = get_term_by('name', single_cat_title('',false), 'category')->slug;
    if (cat_is_ancestor_of( 2298, get_query_var( 'cat' ) )) {
      $args = array(
          'category_name' => $CatTerm,
          'posts_per_page' => 20,
          'paged'          => $paged,
      );
    } else {
      $args = array(
          'category_name' => $CatTerm,
          'posts_per_page' => 20,
          'paged'          => $paged,
          'category__not_in' => array(2299,2300),
      );
    }
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
                  <span class="ml-4"><?php the_time('j M') ?></span>
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
                    if ( has_post_thumbnail() ) {
      								the_post_thumbnail('icc_ultimenewshome', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title()));
      							}
      							else{
      								echo '<img class="img-fluid card-img-top mx-auto d-block p-1" src="'.catch_that_image().'" />';
      							}
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
</div><!-- .category -->
</div><!-- .content 	-->
<!-- carico footer -->
<?php get_footer(); ?>
