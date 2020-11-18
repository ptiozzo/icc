<?php get_header();?>
<?php
  if(have_posts()):while(have_posts()) : the_post();

  $term1 = "regione";
  $terms = get_the_terms( $post->ID , $term1 );
  foreach ( $terms as $term ) {
    if($term->slug == "liguria")
     $menuLiguria = 1;
    elseif ($term->slug == "piemonte")
     $menuPiemonte = 1;
  }
  if ($menuLiguria == 1)
    get_template_part('liguria/menu','liguria');
  if ($menuPiemonte == 1)
    get_template_part('piemonte/menu','piemonte');
  wp_reset_postdata();
  ?>
<div class="row mx-0">
  <div class="col-lg-home-reg">
    <div class="container single">


        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class='single__nav__category'>
    				<a href="/cerco-offro/" class="single__torna__contenuti p-2 mr-3">
              <i class="fas fa-chevron-left"></i>
              <?php
              if(strpos($_SERVER["HTTP_REFERER"],"cerco-offro")) {
                echo "Torna ai cerco/offro";
              } else {
                echo "Visualizza tutti i cerco/offro";
              }
              ?>
            </a>
            <?php

              echo "<span>Regione: </span>";
              $term1 = "regione";
              $terms = get_the_terms( $post->ID , $term1 );
              foreach ( $terms as $term ) {
                if ($term->slug == "piemonte"){
                  echo '<a href="/piemonte/bacheca/">Piemonte</a> ';
                } elseif ($term->slug == "liguria"){
                  echo '<a href="/liguria/bacheca/">Liguria</a> ';
                }else{
                  echo '<a href="' . get_term_link( $term, $term1 ) . '">' . $term->name . ' </a> ';
                }
              }

              echo "<span> Tematica: </span>";
              $term1 = "tematica";
              $terms = get_the_terms( get_the_ID() , $term1 );
              foreach ( $terms as $term ) {
                echo '<a href="' . get_term_link( $term, $term1 ) . '">' . $term->name . ' </a> ';
              }

            ?>

    				<br />
    			</div>

          <div class="single__head">

            <?php

            if( $_POST['submit_risolto'] ){
              wp_set_object_terms($post->ID,'risolto','cercooffro');
              echo '<div class="alert alert-success" role="alert">Annuncio segnato come risolto!</div>';
            }

            if( $_POST['submit_email'] ){

              $to = $_POST['emailRicevente'];
              $subject = 'ItaliaCheCambia - Cerco\Offro: '.get_the_title();
              $body = $_POST['messaggio'];
              $headers = array('Content-Type: text/html; charset=UTF-8');
              $headers[] = 'From: '.$_POST["cognome"].' '.$_POST["nome"].'<'.$_POST["emailMittente"].'>';
              $headers[] = 'Cc: '.$_POST["cognome"].' '.$_POST["nome"].'<'.$_POST["emailMittente"].'>';

              wp_mail( $to, $subject, $body, $headers );

              echo '<div class="alert alert-success" role="alert">Email inviata con successo!</div>';

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
            <?php
            if( current_user_can('edit_post',$post->ID)){
              ?>
              <div class="single__edit__post d-inline-block">
                <a href="/nuovocercooffro/?action=edit&postID=<?php echo get_the_ID(); ?>">Modifica con editor semplice</a>
              </div>
               -
              <div class="single__edit__post d-inline-block">
                <?php
                  edit_post_link(__('Modifica con editor avanzato'));
                ?>
              </div>
              <form class="mb-2" action="<?php echo get_pagenum_link(); ?>" method="post">
                <button type="submit" value="submit" class="btn btn-warning" name="submit_risolto">Segna lo scambio come risolto!</button>
              </form>
              <?php
            }
            ?>

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
          <div class="row justify-content-center">
    			 <div class="col-12 col-lg-10">
            <?php
              if ( has_post_thumbnail() ) {
                the_post_thumbnail('', array('class' => 'img-fluid mx-auto d-block p-1','alt' => get_the_title()));
              }
              the_content();
              if(is_user_logged_in()){
              ?>


              <div class="accordion mb-2" id="accordion">
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Invia un messaggio privato all'inserzionista
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      <h3>Invia un messaggio privato all'inserzionista</h3>
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
                    </div>
                  </div>
                </div>
              </div><!-- Fine accordion -->
              <?php
              }
              if ( comments_open() ) {
                comments_template();
              }
              ?>
            </div>
          </div>
              <!-- Share with -->
        			<!--<div class="single__share">
        				<?php
        				if ( function_exists( 'sharing_display' ) ) {
        					sharing_display( '', true );
        				}

        				if ( class_exists( 'Jetpack_Likes' ) ) {
        					$custom_likes = new Jetpack_Likes;
        				echo $custom_likes->post_likes( '' );
        				}
        				 ?>
        			</div>-->
              <?php
              if(!is_user_logged_in())
              {
                echo "<div class='bacheca_registrati alert alert-warning mr-2 mb-0'>";
                echo "<p>Per poter visualizzare più dettagli e contattare l'utente devi prima <a class='alert-link' href='/wp-login.php?redirect_to=".get_the_permalink()."'>effettuare l'accesso</a> o <a class='alert-link' href='/registrati/?redirect_to=".get_the_permalink()."'>registrarti</a></p>";
                echo "</div>";
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
