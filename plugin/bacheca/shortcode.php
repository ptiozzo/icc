<?php
  $BachecaRegione1 = $a['regione'];
  $BachecaTematica1 = "tutteletematiche";
  $BachecaCercoOffro1 = "cercooffro";
 ?>
  <div class="row mx-0 py-2 cerco-offro">
    <div class=" <?php if(is_archive()) { echo 'col-lg-home-reg';}?>">
      <?php
      if(is_archive()) { ?>
        <h1 class="text-center">Bacheca Cerco/Offro</h1>
        <?php

        $argsCercoOffroArchivio = array(
          'post_type' => 'contenuti-speciali',
          'posts_per_page' => 1,
          'tax_query' => array(
            array(
                'taxonomy'=> 'contenuti_speciali_filtri',
                'field'   => 'slug',
                'terms'		=> 'cerco-offro-archivio',
            ),
          ),
        );
        $loopCercoOffroArchivio = new WP_Query( $argsCercoOffroArchivio );
        if( $loopCercoOffroArchivio->have_posts()) :
          echo '<div class="mt-3">';
          while( $loopCercoOffroArchivio->have_posts() ) : $loopCercoOffroArchivio->the_post();
            the_content();
          endwhile;
          echo '</div>';
        endif;
      }
        ?>
      <?php if(!is_user_logged_in()){ ?>
        <div class="bacheca_registrati alert alert-warning mr-2 mb-0">
          <p>Per inserire un nuovo annuncio e/o visualizzare tutti i dettagli delle altre inserzioni occorre effettuare il <a href="/wp-login.php?redirect_to=<?php echo get_pagenum_link();?>" class="alert-link">login</a> o <a href="/registrati/?redirect_to=<?php echo get_pagenum_link(); ?>" class="alert-link">registrarsi</a></p>
        </div>
      <?php } ?>
      <div class="contenuti_header">
        <?php
        // Verifico se ho premuto submit e setto le ricerche
        // il paged e salvo tutto in sessione
          if ($_POST['submit_button']){
            $BachecaRegione = $_POST['regione'];
            $BachecaTematica = $_POST['tematica'];
            $BachecaCercoOffro = $_POST['cercooffro'];
            $_SESSION['BachecaRegione'] = $BachecaRegione;
            $_SESSION['BachecaTematica'] = $BachecaTematica;
            $_SESSION['BachecaCercoOffro'] = $BachecaCercoOffro;
            $paged = 0;
          } else {
            //Se non ho premuto submit verifico se ho qualcosa in sesisone,
            //altrimenti vado ai valori di default

            if($_SESSION['BachecaRegione']){
              $BachecaRegione = $_SESSION['BachecaRegione'];
            } else {
              $BachecaRegione = $BachecaRegione1;
            }
            if($_SESSION['BachecaTematica']){
              $BachecaTematica = $_SESSION['BachecaTematica'];
            } else {
              $BachecaTematica = $BachecaTematica1;
            }
            if($_SESSION['BachecaCercoOffro']){
              $BachecaCercoOffro = $_SESSION['BachecaCercoOffro'];
            } else {
              $BachecaCercoOffro = $BachecaCercoOffro1;
            }
          }
        ?>

        <!-- Dropdown per selezione contenuto -->
        <form class="pt-2 form-inline" method="post" action="<?php echo get_pagenum_link(); ?>">
            <select name="regione" class="custom-select" <?php if ($BachecaRegione1 != "_tutteleregioni"){echo "style='display:none;'";} ?>>
              <?php
                $categories = get_terms( array('taxonomy' => 'regione','hide_empty' => false,'orderby'=> 'slug','order' => 'ASC'));
                foreach ($categories as $category) {
                  $option = '<option value="'.$category->slug.'" ';
                  if ($BachecaRegione == $category->slug) {$option .= 'selected ';};
                  $option .= '>'.$category->name;
                  $option .= '</option>';
                  echo $option;
                }
              ?>
            </select>
          <select name="tematica" class="custom-select">
            <option value="tutteletematiche" <?php if ( $BachecaTematica == 'tutteletematiche') {echo 'selected';}?> >Tutte le tematiche</option>
            <?php
              $categories = get_terms( array('taxonomy' => 'tematica','hide_empty' => false,'orderby'=> 'slug','order' => 'ASC'));
              foreach ($categories as $category) {
                $option = '<option value="'.$category->slug.'" ';
                if ($BachecaTematica == $category->slug) {$option .= 'selected ';};
                $option .= '>'.$category->name;
                $option .= '</option>';
                echo $option;
              }
            ?>
          </select>
          <form class="pt-2 form-inline" method="post" action="<?php echo get_pagenum_link(); ?>">
              <select name="cercooffro" class="custom-select">
                <option value="cercooffro" <?php if ( $BachecaCercoOffro == 'cercooffro') {echo 'selected';}?> >Cerco/Offro</option>
                <?php
                  $categories = get_terms( array('taxonomy' => 'cercooffro','hide_empty' => false,'orderby'=> 'slug','order' => 'ASC'));
                  foreach ($categories as $category) {
                    if($category->slug != 'risolto'){
                      $option = '<option value="'.$category->slug.'" ';
                      if ($BachecaCercoOffro == $category->slug) {$option .= 'selected ';};
                      $option .= '>'.$category->name;
                      $option .= '</option>';
                      echo $option;
                    }
                  }
                ?>
              </select>
          <input name="submit_button" type="Submit" value="Filtra" class="btn btn-secondary">
        </form>
      </div>
      <?php
      if ($BachecaRegione != "_tutteleregioni"){
        $filtroRegione = array('relation' => 'OR',
                          array(
                              'taxonomy' => 'regione',
                              'field'    => 'slug',
                              'terms'    => $BachecaRegione,
                          ),
                          array(
                              'taxonomy' => 'regione',
                              'field'    => 'slug',
                              'terms'    => 'aanazionale',
                          ),
                        );
      } else {
        $filtroRegione = '';
      }

      if ($BachecaTematica != $BachecaTematica1){
        $filtroTematica = array(
                              'taxonomy' => 'tematica',
                              'field'    => 'slug',
                              'terms'    => $BachecaTematica,
                          );
      } else {
        $filtroTematica = '';

      }

      if ($BachecaCercoOffro != $BachecaCercoOffro1){
        $filtroCercoOffro = array(
                                'taxonomy' => 'cercooffro',
                                'field'    => 'slug',
                                'terms'    => $BachecaCercoOffro,
                              );
      } else {
        $filtroCercoOffro = '';
      }





        $argsBacheca = array(
            'post_type' => array('cerco-offro'),
            'posts_per_page' => 20,
            'paged'          => $paged,
            'tax_query' => array(
                'relation' => 'AND',
                $filtroRegione,
                $filtroTematica,
                $filtroCercoOffro,
                array(
                  'taxonomy' => 'cercooffro',
                  'field'    => 'slug',
                  'terms'    => 'risolto',
                  'operator' => 'NOT IN',
                ),
              ),
            );


      $loopBacheca = new WP_Query( $argsBacheca );

       ?>
      <div class="row mr-0">
        <?php
          if($loopBacheca->have_posts()):while($loopBacheca->have_posts()) : $loopBacheca->the_post();
        ?>

          <div class="col-lg-3 col-md-4 col-sm-6 text-break mt-2">
            <?php
            if ( has_post_thumbnail() ) {
              $image = get_the_post_thumbnail_url(get_the_ID(),'icc_ultimenewshome');
            }else{
              $image = catch_that_image();
            }
            ?>

              <div class="card h-100">
                <img src="<?php echo $image;?>" class="card-img-top p-0" alt="<?php the_title(); ?>">
                <div class="card-body p-1">
                  <h5 class="card-title"><?php the_title(); ?></h5>
                  <p class="card-text"><?php echo get_the_excerpt();?></p>
                  <a href="<?php the_permalink(); ?>" class="btn btn-primary">Leggi di più</a>
                </div>
                <div class="card-footer text-muted p-1">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item font-weight-lighter p-0 bg-transparent"><small><?php the_time('j M Y') ?></small></li>
                    <li class="list-group-item font-weight-lighter p-0 bg-transparent">
                      Regione:
                      <?php foreach ( get_the_terms( get_the_ID() , 'regione' ) as $term ) {
                        echo  $term->name." ";
                      } ?>
                    </li>
                    <li class="list-group-item font-weight-lighter p-0 bg-transparent">
                      Tematica:
                      <?php foreach ( get_the_terms( get_the_ID() , 'tematica' ) as $term ) {
                        echo  $term->name." ";
                      } ?>
                    </li>
                  </ul>
                </div>
              </div>
          </div>


        <?php
      endwhile;else:
        echo "<div class='col-12'><p>Nessuna inserzione disponibile al momento</p></div>";
      endif;
        ?>
      </div>
      <!-- paginazione -->

    <?php echo bootstrap_pagination($loopBacheca); ?>
    </div>
    <?php if(is_archive()) { ?>
    <div class="col-lg-home3">
      <aside class="sidebar">
        <?php dynamic_sidebar('primary'); ?>
      </aside>
    </div>
  <?php } ?>
