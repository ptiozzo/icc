<?php get_header();?>
<div class="row">
  <div class="col-lg-home-reg">
    <div class="container single">
      <?php
        if(have_posts()):while(have_posts()) : the_post();
      ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class='single__nav__category'>
            <?php
            if(strpos($_SERVER["HTTP_REFERER"],"cerco-offro")) { ?>
    					<a href="<?php echo home_url(); ?>/cerco-offro/" class="single__torna__contenuti p-2 mr-3"><i class="fas fa-chevron-left"></i> Torna ai cerco/offro</a>
    				<?php }
              echo "Regione: ";
              $term1 = "regione";
              $terms = get_the_terms( $post->ID , $term1 );
              foreach ( $terms as $term ) {
                echo '<a href="' . get_term_link( $term, $term1 ) . '">' . $term->name . ' </a>';
              }

              echo "Tematica: ";
              $term1 = "tematica";
              $terms = get_the_terms( get_the_ID() , $term1 );
              foreach ( $terms as $term ) {
                echo '<a href="' . get_term_link( $term, $term1 ) . '">' . $term->name . ' </a>';
              }

            ?>

    				<br />
    			</div>

          <div class="single__head">
            <!-- DATA -->
            <div class="single__date">
              <?php the_time('j M Y') ?>
            </div>
            <!-- Title -->
    				<h1 class="single__title">
    					<?php the_title(); ?>
    				</h1>
            <!-- Autore -->
            <div class="single__author">
    						Scritto da:
                <span>
                  <b>
                    <?php
                      echo get_the_author_meta( 'first_name',get_the_author_meta( 'ID' ) );
                      if (is_user_logged_in()){
                        echo " ".get_the_author_meta( 'last_name',get_the_author_meta( 'ID' ) );
                      }
                    ?>
                  </b>
                </span>
    				</div>
            <!-- Meta Description -->
    				<h2 class="single__metaDescription">
    					<?php the_excerpt();?>
    				</h2>
          </div>

          <!-- Share with -->
    			<div class="single__share">
    				<?php
    				if ( function_exists( 'sharing_display' ) ) {
    					sharing_display( '', true );
    				}

    				if ( class_exists( 'Jetpack_Likes' ) ) {
    					$custom_likes = new Jetpack_Likes;
    				echo $custom_likes->post_likes( '' );
    				}
    				 ?>
    			</div>

            <?php if(is_user_logged_in()){
              the_content();?>
              <!-- Share with -->
        			<div class="single__share">
        				<?php
        				if ( function_exists( 'sharing_display' ) ) {
        					sharing_display( '', true );
        				}

        				if ( class_exists( 'Jetpack_Likes' ) ) {
        					$custom_likes = new Jetpack_Likes;
        				echo $custom_likes->post_likes( '' );
        				}
        				 ?>
        			</div>
              <?php
            } else {
              echo "<p>Per poter visualizzare più dettagli e contattare l'utente devi prima <a href='/wp-login.php?redirect_to=".get_the_permalink()."'>effettuare l'accesso</a></p>";
            }

            ?>




        </article>
        <?php
          endwhile;
        else:
          echo "Annuncio non trovato!";
        endif;
        ?>


    </div>
  </div>
  <div class="col-lg-home3">
    <aside class="sidebar">
      <?php dynamic_sidebar('primary'); ?>
    </aside>
  </div>
</div>
<?php get_footer(); ?>
