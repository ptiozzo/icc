<?php
$Categoria = 'tuttelecategorie';
$Rete = 'tuttelereti';
$Regione = $a['regione'];
$Provincia = 'tutteleprovince';
$Tipologia = 'tutteletipologie';
$Realta = '';
$resetProvincia = 0;

if($_POST['submit_button']){
  $Categoria1 = $_POST['categoria-dropdown'];
  $Rete1 = $_POST['rete-dropdown'];
  if($_POST['regione-dropdown'] != $_SESSION['mappa_regione']){
    $resetProvincia = 1;
  }
  $Regione1 = $_POST['regione-dropdown'];
  $Provincia1 = $_POST['provincia-dropdown'];
  $Tipologia1 = $_POST['tipologia-dropdown'];
  $Realta1 = $_POST['nome-realta'];
  $_SESSION['mappa_categorie'] = $Categoria1;
  $_SESSION['mappa_rete'] = $Rete1;
  $_SESSION['mappa_regione'] = $Regione1;
  $_SESSION['mappa_provincia'] = $Provincia1;
  $_SESSION['mappa_tipologia'] = $Tipologia1;
  $_SESSION['mappa_realta'] = $Realta1;
} elseif ($_POST['reset_button']) {
  $Categoria1 = $Categoria;
  $Rete1 = $Rete;
  $Regione1 = $Regione;
  $Tipologia1 = $Tipologia;
  $Realta1 = $Realta;
  unset($_SESSION['mappa_categorie']);
  unset($_SESSION['mappa_rete']);
  unset($_SESSION['mappa_regione']);
  unset($_SESSION['mappa_provincia']);
  unset($_SESSION['mappa_tipologia']);
  unset($_SESSION['mappa_realta']);
}

  if($_SESSION['mappa_categorie']){
    $Categoria1 = $_SESSION['mappa_categorie'];
  } else {
    $Categoria1 = $Categoria;
  }
  if($_SESSION['mappa_rete']){
    $Rete1 = $_SESSION['mappa_rete'];
  } else {
    $Rete1 = $Rete;
  }
  if($_SESSION['mappa_regione']){
    $Regione1 = $_SESSION['mappa_regione'];
  } else {
    $Regione1 = $Regione;
  }
  if($_SESSION['mappa_provincia'] && $resetProvincia == 0){
    $Provincia1 = $_SESSION['mappa_provincia'];
  } else {
    $Provincia1 = $Provincia;
  }
  if($_SESSION['mappa_tipologia']){
    $Tipologia1 = $_SESSION['mappa_tipologia'];
  } else {
    $Tipologia1 = $Tipologia;
  }
  if($_SESSION['mappa_realta']){
    $Realta1 = $_SESSION['mappa_realta'];
  } else {
    $Realta1 = $Realta;
  }


echo "<!--Categoria = ".$Categoria1." - Rete = ".$Rete1." - Regione = ".$Regione1." - Provincia = ".$Provincia1." - Tipologia = ".$Tipologia1 ." - Realtà = ".$Realta1."-->";

?>

<div class="mappa">
  <?php
  if ($Regione == "tutteleregioni"){
    echo "<h1>Mappa Italia che Cambia</h1>";
  } else {
    echo "<h1>Mappa ".get_term_by('slug',$Regione,'regionemappa')->name." che Cambia</h1>";
  }

  ?>
  <div class="row mt-3 mb-2">
    <div class="col-12 col-md-6 ">
      <div class='head'>
				<div class='title'>
					<h5>REALTA'</h5>
				</div>
			</div>
      <div id="mappa" class=""></div>

      <div class="row conteggi_mappa m-0">
        <?php if($Regione == "tutteleregioni"){ ?>
          <div class="border col-6 text-center">
              <h3 class="d-inline-block"><?php echo get_option('icc_mappa_realta_totale') ?></h3><span class="text-uppercase"> Realtà</span>
          </div>
          <div class="border col-6 text-center">
            <h3 class="d-inline-block"><?php echo get_option('icc_mappa_rete_totale') ?></h3><span class="text-uppercase"> Reti</span>
          </div>
      <?php } else {
          $RegioneMappa = "icc_mappa_realta_".$Regione1; ?>

        <div class="border col-12 text-center">
            <h3 class="d-inline-block"><?php echo get_option($RegioneMappa) ?></h3><span class="text-uppercase"> Realtà</span>
        </div>
      <?php } ?>
      </div>
    </div><!-- Fine col-6 -->

    <div class="col-12 col-md-6">
      <div class='head'>
				<div class='title'>
					<h5>FILTRA LA MAPPA</h5>
				</div>
			</div>
      <div class="filtri_mappa">
        <form class="form-row" action="<?php echo get_pagenum_link(); ?>" method="post">
          <!-- Filtro categoria -->
          <div class="form-group col-6 my-1">
            <select name="categoria-dropdown" class="custom-select">
              <option value="tuttelecategorie" <?php if ($Categoria1 == 'tuttelecategorie') {echo 'selected';}?> ><?php echo 'Tutti i contenuti'; ?></option>
              <?php
                $terms = get_terms( array(
                  'taxonomy' => 'categoria',
                  'hide_empty' => false,
                ) );

                foreach ($terms as $category) {
                  $option = '<option value="'.$category->slug.'" ';
                  if ($Categoria1 == $category->slug) {$option .= 'selected ';};
                  $option .= '>'.$category->name;
                  $option .= '</option>';
                  echo $option;
                }
              ?>
            </select>
          </div>

          <!-- Filtro rete -->
          <div class="form-group col-6 my-1">
            <select name="rete-dropdown" class="custom-select">
              <option value="tuttelereti" <?php if ($Rete1 == 'tuttelereti') {echo 'selected';}?> ><?php echo 'Tutte le reti'; ?></option>
              <?php
                $terms = get_terms( array(
                  'taxonomy' => 'rete',
                  'hide_empty' => false,
                ) );

                foreach ($terms as $category) {
                  $option = '<option value="'.$category->slug.'" ';
                  if ($Rete1 == $category->slug) {$option .= 'selected ';};
                  $option .= '>'.$category->name;
                  $option .= '</option>';
                  echo $option;
                }
              ?>
            </select>
          </div>
          <!-- Filtro regione -->
          <?php
          if($Regione == "tutteleregioni"){ ?>
            <div class="form-group col-6 my-1">
              <select name="regione-dropdown" class="custom-select">
                <option value="tutteleregioni" <?php if ($Regione1 == 'tutteleregioni') {echo 'selected';}?> ><?php echo 'Tutte le regioni'; ?></option>
                <?php
                  $terms = get_terms( array(
                    'taxonomy' => 'regionemappa',
                    'hide_empty' => false,
                    'parent'        => 0,
                  ) );
                  foreach ($terms as $category) {
                    $option = '<option value="'.$category->slug.'" ';
                    if ($Regione1 == $category->slug) {$option .= 'selected ';};
                    $option .= '>'.$category->name;
                    $option .= '</option>';
                    echo $option;
                  }
                ?>
              </select>
            </div>
          <?php } ?>
          <!-- Filtro provincia -->
          <?php
            if(get_term_by('slug',$Regione1,'regionemappa')->term_id != ""){
              ?>
                <div class="form-group col-6 my-1">
                  <select name="provincia-dropdown" class="custom-select">
                    <option value="tutteleprovince" <?php if ($Provincia1 == 'tutteleprovince') {echo 'selected';}?> ><?php echo 'Tutte le province'; ?></option>
                    <?php
                      $terms = get_terms( array(
                        'taxonomy' => 'regionemappa',
                        'hide_empty' => false,
                        'parent'        => get_term_by('slug',$Regione1,'regionemappa')->term_id,
                      ) );
                      foreach ($terms as $category) {
                        $option = '<option value="'.$category->slug.'" ';
                        if ($Provincia1 == $category->slug) {$option .= 'selected ';};
                        $option .= '>'.$category->name;
                        $option .= '</option>';
                        echo $option;
                      }
                    ?>
                  </select>
                </div>
              <?php
            }

            if($Regione1 == "tutteleregioni"){
              $terms = get_terms( array(
                'taxonomy' => 'regionemappa',
                'hide_empty' => false,
                'parent'        => 0,
              ) );
            } else {
              if( $parent != "")
                $parent = get_term_by('slug',$Regione1,'regionemappa')->term_id;
              $terms = get_terms( array(
                'taxonomy' => 'regionemappa',
                'hide_empty' => false,
                'parent'        => get_term_by('slug',$Regione1,'regionemappa')->term_id,
              ) );
            }


            ?>

          <!-- Filtro tipologia -->
          <div class="form-group col-6 my-1">
            <select name="tipologia-dropdown" class="custom-select">
              <option value="tutteletipologie" <?php if ($Tipologia1 == 'tutteletipologie') {echo 'selected';}?> ><?php echo 'Tutte le tipologie'; ?></option>
              <?php
                $terms = get_terms( array(
                  'taxonomy' => 'tipologia',
                  'hide_empty' => false,
                ) );

                foreach ($terms as $category) {
                  $option = '<option value="'.$category->slug.'" ';
                  if ($Tipologia1 == $category->slug) {$option .= 'selected ';};
                  $option .= '>'.$category->name;
                  $option .= '</option>';
                  echo $option;
                }
              ?>
            </select>
          </div>
          <div class="form-group col-12 my-1">
            <input name="nome-realta" type="text" value="<?php if ($Realta1 != '') echo $Realta1; ?>" class="col-6" placeholder="Cerca una realtà">
            <input name="submit_button" type="Submit" value="Applica i filtri" class="btn btn-primary">
            <input name="reset_button" type="Submit" value="Reset filtri" class="btn btn-warning">
          </div>
        </form>

        <?php include('scriptArchiveMappa.php') ?>

        <hr>
        <?php
        $argsMappaArchive = array(
          'post_type' => 'contenuti-speciali',
          'posts_per_page' => 1,
          'tax_query' => array(
            array(
                'taxonomy'=> 'contenuti_speciali_filtri',
                'field'   => 'slug',
                'terms'		=> 'mappa-archivio',
            ),
          ),
        );
        $loopMappaArchive = new WP_Query( $argsMappaArchive );
        if( $loopMappaArchive->have_posts()) :
          while( $loopMappaArchive->have_posts() ) : $loopMappaArchive->the_post();
            the_content();
          endwhile;
        endif;
        wp_reset_postdata();
        ?>
      </div><!-- Filtri mappa -->
    </div><!-- Fine col-6 -->
  </div><!-- Fine row -->





  <div class="row">
    <?php if ($Regione == "tutteleregioni"){ ?>
      <div class="col-12">
        <h2>Le reti mappate</h2>
        <?php
        //numero realtà per rete
        $terms = get_terms( array(
          'taxonomy' => 'rete',
          'hide_empty' => false,
        ) );
        foreach ($terms as $key ) {
          ?>
          <form class="pt-2 d-inline-block" method="post" action="<?php echo get_pagenum_link(); ?>">
            <input name="rete-dropdown" type="hidden" value="<?php echo $key->slug ?>">
            <input name="submit_button" type="submit" value="<?php echo get_option('icc_mappa_rete_'.$key->slug)." ".$key->name ?>" class="btn btn-lg btn-outline-dark">
          </form>
          <?php
        }
          ?>

      </div>
    <?php } ?>
    <div class="col-12">

     <?php
     if ($Regione == "tutteleregioni"){
       $argsMappaArchivio = array(
         'post_type' => 'mappa',
         'orderby' => 'modified',
         'posts_per_page' => 10,
       );
     }else{
       $argsMappaArchivio = array(
         'post_type' => 'mappa',
         'orderby' => 'modified',
         'posts_per_page' => 10,
         'tax_query' => array(
           array(
               'taxonomy'=> 'regionemappa',
               'field'   => 'slug',
               'terms'		=> $Regione,
           ),
         ),
       );
     }
       $loopMappaArchivio = new WP_Query( $argsMappaArchivio );
       if($loopMappaArchivio->have_posts()) :
         if ($Regione == "tutteleregioni"){
           echo "<h2 class='mt-3'>Ultime realtà mappate</h2>";
         }else{
           echo "<h2 class='mt-3'>Ultime realtà mappate in ".get_term_by('slug',$Regione,'regionemappa')->name."</h2>";
         }
         echo '<div class="row">';
         while ($loopMappaArchivio->have_posts()) : $loopMappaArchivio->the_post();
         ?>

           <div class="col-xl-5ths col-lg-3 col-md-4 col-sm-6 text-break">
             <div class="card border-0 p-0">
               <article class="p-0">
               <img class="img-fluid card-img-top mx-auto d-block p-1" src="<?php echo get_the_post_thumbnail_url();?>">
               <div class="card-body p-2 text-white">
                 <div class="date text-capitalize"><?php echo get_the_terms( get_the_ID() , 'regionemappa' )[0]->name; ?></div>
                 <h5 class="card-title"><?php echo get_the_title(); ?></h5>
                 <a href="<?php echo the_permalink(); ?>" class="stretched-link"></a>
               </div>
               </article>
             </div>
           </div>
         <?php
         endwhile;
         echo '</div>';
       endif;
       wp_reset_postdata();
     ?>
    </div>
  </div>
</div><!-- Fine mappa -->
