<?php get_header(); ?>
<?php
  $user_ids = get_the_author_meta( 'ID' );
  echo "ID autore: ".$user_ids."<br>";

  $posts1 = array(
    'author' => $user_ids,
  );
  $query1 = new WP_Query($posts1);
  echo "Query 1: ".$query1->found_posts."<br>";

  $posts2 = array(
    'meta_key' => 'Secondo_Autore',
    'meta_value' => $user_ids,
    'posts_per_page' => -1,
  );
  $query2 = new WP_Query($posts2);
  echo "Query 2: ".$query2->found_posts."<br>";


  $allTheIDs = array();
  if( $query1->have_posts() ) : while ($query1->have_posts()) : $query1->the_post();
    $allTheIDs[] = $post->ID;
  endwhile;endif;

  $finalArg = array(
    'post__in' => $allTheIDs,
    'ignore_sticky_posts' => 1,

  );

  $finalQuery = new WP_Query($allTheIDs);




  echo "Query finale: ".$finalQuery->found_posts."<br>";
  echo "Paged: ".$paged."<br>";
?>
  <div class="content-no-sidebar pt-2 index">
    <div class="category-<?php echo get_term_by('name', single_cat_title('',false), 'category')->slug; ?> clearfix">
  <?php

      if( $finalQuery->have_posts() ) :

          echo '<h1 class="archive-title">' . get_the_author() . '</h1>' ;
          if (get_the_author_meta('description')) : // Checking if the user has added any author descript or not. If it is added only, then lets move ahead ?>
            <div class="author-box">
              <div class="author-img"><?php echo get_avatar(get_the_author_meta('user_email'), '100'); // Display the author gravatar image with the size of 100 ?></div>
              <p class="author-description"><?php esc_textarea(the_author_meta('description')); // Displays the author description added in Biographical Info ?></p>
            </div>
          <?php endif; ?>
        <div class="row">
        <?php
        while( $finalQuery->have_posts() ) : $finalQuery->the_post(); ?>
          <div class="col-xl-5ths col-lg-3 col-md-4 col-sm-6  text-break">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <a href='<?php the_permalink(); ?>'>
                <?php
                if ($Cat1 == $ParentCat1) { ?>
                  <div class='category'>
                    <span><?php the_time('j M Y') ?></span>
                    <span>
                      <?php get_template_part('inc/post','etichetta'); ?>
                    </span>
                  </div>
                <?php } ?>
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
  </div><!-- .category -->
  </div><!-- .content 	-->
  <!-- carico footer -->
  <?php get_footer(); ?>
