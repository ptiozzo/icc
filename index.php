<?php get_header(); ?>
<div class="content-no-sidebar pt-2 index">
  <div class="category-<?php echo get_term_by('name', single_cat_title('',false), 'category')->slug; ?> clearfix">
<?php

    if( have_posts() ) :
      if (is_tag()){
        the_archive_title('<h1 class="archive-title">', '</h1>');
      }
      if (is_author()){
        echo '<h1 class="archive-title">' . get_the_author() . '</h1>' ;
        if (get_the_author_meta('description')) : // Checking if the user has added any author descript or not. If it is added only, then lets move ahead ?>
          <div class="author-box">
            <div class="author-img"><?php echo get_avatar(get_the_author_meta('user_email'), '100'); // Display the author gravatar image with the size of 100 ?></div>
            <p class="author-description"><?php esc_textarea(the_author_meta('description')); // Displays the author description added in Biographical Info ?></p>
          </div>
        <?php endif;
      }
      ?>
      <div class="row">
      <?php
      while( have_posts() ) : the_post(); ?>
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
