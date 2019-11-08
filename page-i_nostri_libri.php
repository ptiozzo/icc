<?php get_header(); ?>
<div class="container-fluid libri pt-4">
<?php if( have_posts() ) : ?>
  <?php
    while(have_posts() ) : the_post();
?>

<h1><?php echo get_the_title(); ?></h1>

<?php echo the_content(); ?>

<?php
    endwhile;
else:
echo "Non ho trovato nulla";
endif;
?>

<div class="row">

<?php
//loop i nostri libri
$custom_query_args = array(
'post_type' => 'nostri-libri',
);
$custom_query = new WP_Query( $custom_query_args );
?>

  <?php if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
    <div class="col-xl-5ths col-lg-3 col-md-4 col-sm-6 text-break">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <a href='<?php the_permalink(); ?>'>
          <!-- Immagine in evidenza -->
          <figure>
            <?php
              if ($Cat1 != "nostri-libri"){
                if ( has_post_thumbnail() ) {
                  the_post_thumbnail('icc_libri', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title()));
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
  <?php endwhile; endif; wp_reset_postdata(); ?>
</div> <!-- .grid 	-->
</div> <!-- .content 	-->
<?php get_footer(); ?>
