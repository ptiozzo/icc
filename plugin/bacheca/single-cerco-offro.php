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

            <?php

            if( $_POST['submit_email'] ){

              echo '<div class="alert alert-success" role="alert">  Email inviata con successo!</div>';

              $to = $_POST['emailRicevente'];
              $subject = 'ItaliaCheCambia - Cerco\Offro: '.get_the_title();
              $body = $_POST['messaggio'];
              $headers = array('Content-Type: text/html; charset=UTF-8');
              $headers[] = 'From: '.$_POST["cognome"].' '.$_POST["nome"].'<'.$_POST["emailMittente"].'>';
              $headers[] = 'Cc: '.$_POST["cognome"].' '.$_POST["nome"].'<'.$_POST["emailMittente"].'>';
              $headers[] = 'Bcc: ptiozzo@me.com';

              wp_mail( $to, $subject, $body, $headers );

            }
            ?>
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
              <?php
              if(has_excerpt()){
    					 the_excerpt();
              }
              ?>
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
              <hr>

              <?php
              if ( comments_open() ) {
                comments_template();
              }
              ?>

              <h3>Contatta privatamente l'inserzionista</h3>

              <form class="pt-2" action="<?php echo get_pagenum_link(); ?>" method="post">
                <div class="form-row">
                  <input name="emailRicevente" type="hidden" class="form-control" id="emailRicevente" aria-describedby="emailHelp" value="<?php echo get_the_author_meta( 'user_email'); ?>">
                  <div class="form-group col-12 col-md-6">
                    <label for="nome">Nome</label>
                    <input name="nome" type="input" class="form-control" id="nome" aria-describedby="firstName" value="<?php echo wp_get_current_user()->user_firstname; ?>">
                    <small id="emailHelp" class="form-text text-muted">Questo dato sarà visibile all'inserzionista</small>
                  </div>
                  <div class="form-group col-12 col-md-6">
                    <label for="cognome">Cognome</label>
                    <input name="cognome" type="input" class="form-control" id="cognome" aria-describedby="emailHelp" value="<?php echo wp_get_current_user()->user_lastname; ?>">
                    <small id="emailHelp" class="form-text text-muted">Questo dato sarà visibile all'inserzionista</small>
                  </div>
                  <div class="form-group col-12 col-md-6">
                    <label for="email">Tuo indirizzo email</label>
                    <input name="emailMittente" type="email" class="form-control" id="emailMittente" aria-describedby="emailHelp" value="<?php echo wp_get_current_user()->user_email; ?>">
                    <small id="emailHelp" class="form-text text-muted">Questo indirizzo email sarà visibile all'inserzionista</small>
                  </div>
                  <div class="form-group col-12">
                    <label for="messaggio">Messaggio</label>
                    <textarea name="messaggio" class="form-control" id="messaggio" rows="4" required></textarea>
                  </div>
                  <button name="submit_email" type="submit" value="submit" class="btn btn-primary my-2">Invia mail</button>



                </div>
              </form>



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
