
<?php get_header(); ?>
<?php

  if( get_query_var('tag') ){
    $tagPage = get_query_var('tag');
  } else {
    ?>
    <script type="text/javascript">
        window.location.href = '<?php echo home_url(); ?>';
    </script>
    <?php
  }
  echo 'TAG: '.$tagPage."--";

?>
<?php include('tagCheCambia-menu.php') ?>
<div class="container-fluid">

  <?php

    $args = array(
    'post_type' => 'post',
    'tag' => $tagPage.'+icc-tv',
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
        <div class="col-xl-5ths col-lg-3 col-md-4 col-sm-6 text-break">
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <a href='<?php the_permalink(); ?>'>

              <!-- Immagine in evidenza -->
              <figure>
                <?php
  							if ( has_post_thumbnail() ) {
  								the_post_thumbnail('icc_ultimenewshome', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title()));
  							}
  							else{
  								echo '<img class="img-fluid card-img-top mx-auto d-block p-1" src="'.catch_that_image().'" />';
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
