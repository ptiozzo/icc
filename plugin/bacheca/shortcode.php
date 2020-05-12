<?php
  $BachecaRegione1 = $a['regione'];
  $BachecaTematica1 = "tutteletematiche";
 ?>
  <div class="row mx-0 pt-2">
    <div class=" <?php if(is_archive()) { echo 'col-lg-home-reg';}?>">
      <?php
      if(is_archive()) { ?>
        <h1>Cerco/Offro</h1>
        <?php

        $argsCercoOffroArchivio = array(
          'post_type' => 'contenuti-speciali',
          'posts_per_page' => 1,
          'tax_query' => array(
            array(
                'taxonomy'=> 'contenuti_speciali_filtri',
                'field'   => 'slug',
                'terms'		=> 'cerco-offro archivio',
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

      <div class="contenuti_header">
        <?php
        // Verifico se ho premuto submit e setto le ricerche
        // il paged e salvo tutto in sessione
          if ($_POST['submit_button']){
            $BachecaRegione = $_POST['regione'];
            $BachecaTematica = $_POST['tematica'];
            $_SESSION['BachecaRegione'] = $BachecaRegione;
            $_SESSION['BachecaTematica'] = $BachecaTematica;
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
          <input name="submit_button" type="Submit" value="Filtra" class="btn btn-secondary">
        </form>
      </div>
      <?php

      if($BachecaRegione != "_tutteleregioni" && $BachecaTematica != $BachecaTematica1){
        //Filtro sia per regione che per tematica
        $argsBacheca = array(
            'post_type' => array('cerco-offro'),
            'posts_per_page' => 20,
            'paged'          => $paged,
            'tax_query' => array(
                'relation' => 'AND',
                array('relation' => 'OR',
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
                ),
                array(
                    'taxonomy' => 'tematica',
                    'field'    => 'slug',
                    'terms'    => $BachecaTematica,
                ),
              ),

        );

      } elseif ($BachecaTematica == $BachecaTematica1 && $BachecaRegione != "_tutteleregioni"){
        //tutte le tematiche filtrate per regione
        $argsBacheca = array(
            'post_type' => array('cerco-offro'),
            'posts_per_page' => 20,
            'paged'          => $paged,
            'tax_query' => array(
                'relation' => 'OR',
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
            ),
        );

      } elseif ($BachecaRegione == "_tutteleregioni" && $BachecaTematica != $BachecaTematica1){
        //tutte le regioni filtrate per temetica
        $argsBacheca = array(
            'post_type' => array('cerco-offro'),
            'posts_per_page' => 20,
            'paged'          => $paged,
            'tax_query' => array(
                array(
                    'taxonomy' => 'tematica',
                    'field'    => 'slug',
                    'terms'    => $BachecaTematica,
                ),
            ),
        );
      }else{
        //tutti i cerco/offro
        $argsBacheca = array(
            'post_type' => array('cerco-offro'),
            'posts_per_page' => 20,
            'paged'          => $paged,

        );
      }

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
          endwhile;endif;
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
  </div>
