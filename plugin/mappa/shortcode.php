<?php

$filtrata = 0;
if( get_query_var('regione') || get_query_var('provincia') ){
  $filtrata = 1;
}
$Categoria = 'tuttelecategorie';
$Rete = $a['rete'];
$Regione = $a['regione'];
$Opzioni = $a['opzioni'];
$Provincia = 'tutteleprovince';
$Tipologia = 'tutteletipologie';
$Realta = '';
$resetProvincia = 0;

//reset sessione
if($_POST['submit_button'] || $_POST['reset_button'] || strpos($_SERVER['HTTP_REFERER'],'mappa') == false){
  unset($_SESSION[$Regione.'mappa_categorie']);
  unset($_SESSION[$Regione.'mappa_rete']);
  $regionePrecedente = $_SESSION[$Regione.'mappa_regione'];
  unset($_SESSION[$Regione.'mappa_regione']);
  unset($_SESSION[$Regione.'mappa_provincia']);
  unset($_SESSION[$Regione.'mappa_tipologia']);
  unset($_SESSION[$Regione.'mappa_realta']);
}

if($_POST['submit_button'] || $_POST['submit_tutte_le_realta']){
  $Categoria1 = $_POST['categoria-dropdown'];
  $Rete1 = $_POST['rete-dropdown'];
  if($_POST['regione-dropdown'] != $regionePrecedente){
    $resetProvincia = 1;
  }
  $Regione1 = $_POST['regione-dropdown'];
  $Provincia1 = $_POST['provincia-dropdown'];
  $Tipologia1 = $_POST['tipologia-dropdown'];
  $Realta1 = $_POST['nome-realta'];
  $_SESSION[$Regione.'mappa_categorie'] = $Categoria1;
  $_SESSION[$Regione.'mappa_rete'] = $Rete1;
  $_SESSION[$Regione.'mappa_regione'] = $Regione1;
  $_SESSION[$Regione.'mappa_provincia'] = $Provincia1;
  $_SESSION[$Regione.'mappa_tipologia'] = $Tipologia1;
  $_SESSION[$Regione.'mappa_realta'] = $Realta1;
} elseif ($_POST['reset_button']) {
  $Categoria1 = $Categoria;
  $Rete1 = $Rete;
  $Regione1 = $Regione;
  $Tipologia1 = $Tipologia;
  $Realta1 = $Realta;
  unset($_SESSION[$Regione.'mappa_categorie']);
  unset($_SESSION[$Regione.'mappa_rete']);
  unset($_SESSION[$Regione.'mappa_regione']);
  unset($_SESSION[$Regione.'mappa_provincia']);
  unset($_SESSION[$Regione.'mappa_tipologia']);
  unset($_SESSION[$Regione.'mappa_realta']);
}


if(get_query_var('provincia')){
  $Regione1 = get_query_var('regione');
  $_SESSION[$Regione.'mappa_regione'] = $Regione1;
  $Provincia1 = get_query_var('provincia');
  $_SESSION[$Regione.'mappa_provincia'] = $Provincia1;
}elseif(get_query_var('regione')){
  $Regione1 = get_query_var('regione');
  $_SESSION[$Regione.'mappa_regione'] = $Regione1;
}

  if($_SESSION[$Regione.'mappa_categorie']){
    $Categoria1 = $_SESSION[$Regione.'mappa_categorie'];
  } else {
    $Categoria1 = $Categoria;
  }
  if($_SESSION[$Regione.'mappa_rete']){
    $Rete1 = $_SESSION[$Regione.'mappa_rete'];
  } else {
    $Rete1 = $Rete;
  }
  if($_SESSION[$Regione.'mappa_regione']){
    $Regione1 = $_SESSION[$Regione.'mappa_regione'];
  } else {
    $Regione1 = $Regione;
  }
  if($_SESSION[$Regione.'mappa_provincia'] && $resetProvincia == 0){
    $Provincia1 = $_SESSION[$Regione.'mappa_provincia'];
  } else {
    $Provincia1 = $Provincia;
  }
  if($_SESSION[$Regione.'mappa_tipologia']){
    $Tipologia1 = $_SESSION[$Regione.'mappa_tipologia'];
  } else {
    $Tipologia1 = $Tipologia;
  }
  if($_SESSION[$Regione.'mappa_realta']){
    $Realta1 = $_SESSION[$Regione.'mappa_realta'];
  } else {
    $Realta1 = $Realta;
  }


echo "<!--Categoria = ".$Categoria1." - Rete = ".$Rete1." - Regione = ".$Regione1." - Provincia = ".$Provincia1." - Tipologia = ".$Tipologia1 ." - Realtà = ".$Realta1."-->";
if($Categoria1 != $Categoria
  || $Rete1 != $Rete
  || $Regione1 != $Regione
  || $Provincia1 != $Provincia
  || $Tipologia1 != $Tipologia
  || $Realta1 != $Realta ){
    $filtrata = 1;
  }
?>

<div class="mappa">
  <?php

  if($Opzioni == 'solomappa'){
    echo "<h1 class='d-none'>";
  }else {
    echo "<h1>";
  }
  if ($Regione == "tutteleregioni" && $Rete == "tuttelereti" && !get_query_var('regione') ){
    echo "La mappa dell'Italia che Cambia";
  } elseif( $Regione != "tutteleregioni" ) {
    echo "La mappa di ".get_term_by('slug',$Regione1,'mapparegione')->name." che Cambia";
  } else {
    echo "La mappa di ".get_term_by('slug',$Rete,'post_tag')->name;
    if( strpos(strtolower(get_term_by('slug',$Rete,'post_tag')->name),"che cambia") == false){
      echo " che cambia";
    }
  }

  if($filtrata == 1){
    //echo " <span class='text-danger font-italic h6'>filtrata<span>";
  }
  echo "</h1>";

  if($_POST['submit_tutte_le_realta'] || get_query_var('mappatag')){
    include('mappa-archivio.php');
  } else {

  ?>
  <div class="row mt-3 mb-2">

    <!-- COLONNA DX -->
    <div id="sidebar" class="col-12 <?php if($Opzioni != 'solomappa'){echo "col-md-6";} ?>">
      <div class="sidebar__inner clearfix">
        <div class='head'>
  				<div class='title'>
  					<h5>REALTÀ</h5>
  				</div>
  			</div>
        <div id="mappa" class="full-width"></div>

        <div class="row conteggi_mappa m-0 <?php if($Opzioni == 'solomappa'){echo "d-none";} ?>">
          <?php if($Regione == "tutteleregioni" && $Rete == "tuttelereti" && !get_query_var('regione')){ ?>
            <div class="border col-6 text-center">
                <h3 class="d-inline-block"><?php echo get_option('icc_mappa_realta_totale') ?></h3><span class="text-uppercase"> Realtà</span>
            </div>
            <div class="border col-6 text-center">
              <h3 class="d-inline-block"><?php echo get_option('icc_mappa_rete_totale') ?></h3><span class="text-uppercase"> Reti</span>
            </div>
        <?php } elseif($Regione != "tutteleregioni") {
            $RegioneMappa = "icc_mappa_realta_".$Regione1; ?>

          <div class="border col-12 text-center">
              <h3 class="d-inline-block"><?php echo get_option($RegioneMappa) ?></h3><span class="text-uppercase"> Realtà</span>
          </div>
        <?php } else {
            $ReteMappa = "icc_mappa_rete_".$Rete1; ?>

          <div class="border col-12 text-center">
              <h3 class="d-inline-block"><?php echo get_option($ReteMappa) ?></h3><span class="text-uppercase"> Realtà</span>
          </div>
        <?php } ?>
        </div>
      </div><!-- Fine sidebar__inner -->
    </div><!-- Fine col-6 -->

    <div class="col-12 col-md-6 <?php if($Opzioni == 'solomappa'){echo "d-none";} ?>">
      <div class='head'>
				<div class='title'>
					<h5>FILTRA LA MAPPA</h5>
				</div>
			</div>
      <div class="filtri_mappa">
        <?php include('mappaFiltri.php') ?>
        <div class="mappa_realta_filtrate">
          <?php include('scriptArchiveMappa.php') ?>
          <?php include('mappaRealtaFiltrate.php') ?>
        </div>
      </div><!-- Filtri mappa -->
    </div><!-- Fine col-6 -->
  </div><!-- Fine row -->





  <div class="row <?php if($Opzioni == 'solomappa'){echo "d-none";} ?>">
    <?php if ($Regione == "tutteleregioni" && $Rete == "tuttelereti" && $filtrata == 0){ ?>
      <div class="col-12">
        <h2>Le reti mappate</h2>
        <?php
        //numero realtà per rete
        $terms = get_terms( array(
          'taxonomy' => 'mapparete',
          'hide_empty' => false,
        ) );
        foreach ($terms as $key ) {
          if (get_option('icc_mappa_rete_'.$key->slug) > 0 && !icc_is_ReteNascosta($key->slug)){
            ?>
            <a class="mt-2 btn btn-lg btn-outline-dark btn-outline-mappa text-wrap" href="/mappa/<?php echo $key->slug; ?>"><?php echo get_option('icc_mappa_rete_'.$key->slug)." ".$key->name ?></a>
            <?php
          }
        }
          ?>

      </div>

    <div class="col-12 mb-2">

     <?php
       $filtroChiuse = array(
         'taxonomy'=> 'mappastato',
         'field'    => 'slug',
         'terms'    => 'chiuso',
         'operator' => 'NOT IN',
       );
       $filtroUtente = array(
         'taxonomy'=> 'mappastato',
         'field'    => 'slug',
         'terms'    => 'utente',
         'operator' => 'NOT IN',
       );
       $argsMappaArchivio = array(
         'post_type' => 'mappa',
         'orderby' => 'modified',
         'posts_per_page' => 10,
         'tax_query' => array(
             'relation' => 'AND',
             $filtroChiuse,
             $filtroUtente,
           ),
       );

       $loopMappaArchivio = new WP_Query( $argsMappaArchivio );
       if($loopMappaArchivio->have_posts()) :
         echo "<h2 class='mt-3'>Ultime realtà mappate</h2>";
         echo '<div class="row">';
         while ($loopMappaArchivio->have_posts()) : $loopMappaArchivio->the_post();
         global $post;
         ?>

           <div class="col-xl-5ths col-lg-3 col-md-4 col-sm-6 text-break">
             <div class="card card--mappa mt-2 p-0">
               <article class="p-0">
                 <?php
                 if ( has_post_thumbnail() ) {
                   echo '<img class="card-img-top p-0" src="'.get_the_post_thumbnail_url().'" />';
                 }elseif (has_post_thumbnail(get_page_by_title(get_the_terms($post->ID,'mapparete')[0]->name,'','mappa')->ID)){
                   echo '<img class="card-img-top p-0" src="'.get_the_post_thumbnail_url(get_page_by_title(get_the_terms($post->ID,'mapparete')[0]->name,'','mappa')->ID).'" />';
                 }else{
                   echo '<img class="card-img-top p-0" src="'.get_template_directory_uri().'/plugin/mappa/asset/mappa-icc.png" />';
                 }
                  ?>
               <div class="card-body p-2 text-white">
                 <div class="date text-capitalize">
                   <?php
                    $realtaRete = 0;
                    $terms = get_terms( array('taxonomy' => 'mapparete','hide_empty' => false,'orderby'=> 'slug','order' => 'ASC'));
                    foreach ( $terms as $term ) {
                     if($term->slug == $post->post_name){
                      $realtaRete = 1;
                      $Rete1 = $term->name;
                     }
                    }
                    if($realtaRete == 1){
                     echo "Rete ";
                    } else {
                      $term = get_the_terms( get_the_ID() , 'mapparegione' );
                      if( $term != false ){
                        foreach ($term as $term1 ) {
                          echo $term1->name." ";
                        }
                      }
                    }
                   ?>
                 </div>
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
     }
     ?>
    </div>
  </div>
<?php } ?>
</div><!-- Fine mappa -->
