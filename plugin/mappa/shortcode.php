<?php
//DEBUG per realtà senza LatLong
$filtroLatLong = array(
  'key' => 'Mappa_Latitudine',
  'compare'    => 'NOT EXISTS',
);

$argsMappaSenzaLatLong = array(
  'post_type' => array('mappa'),
  'posts_per_page' => -1,
  'meta_query' => array(
      $filtroLatLong,
    )
);
$loopMappaSenzaLatLong = new WP_Query( $argsMappaSenzaLatLong );

if ($loopMappaSenzaLatLong->have_posts()){
  echo $loopMappaSenzaLatLong->found_posts."<br>";
  while ($loopMappaSenzaLatLong->have_posts()) {
    $loopMappaSenzaLatLong->the_post();
    echo get_the_title()."-";
    echo get_the_ID()."<br>";
  }
}
//Fine DEBUG per realtà senza LatLong
$filtrata = 0;
if( get_query_var('regione') || get_query_var('provincia') ){
  $filtrata = 1;
}

$Categoria = 'tuttelecategorie';
$Rete = 'tuttelereti';
$Regione = $a['regione'];
$Provincia = 'tutteleprovince';
$Tipologia = 'tutteletipologie';
$Realta = '';
$resetProvincia = 0;

//reset sessione
if($_POST['submit_button'] || $_POST['reset_button']){
  unset($_SESSION['mappa_categorie']);
  unset($_SESSION['mappa_rete']);
  $regionePrecedente = $_SESSION['mappa_regione'];
  unset($_SESSION['mappa_regione']);
  unset($_SESSION['mappa_provincia']);
  unset($_SESSION['mappa_tipologia']);
  unset($_SESSION['mappa_realta']);
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


if(get_query_var('provincia')){
  $Regione1 = get_query_var('regione');
  $_SESSION['mappa_regione'] = $Regione1;
  $Provincia1 = get_query_var('provincia');
  $_SESSION['mappa_provincia'] = $Provincia1;
}elseif(get_query_var('regione')){
  $Regione1 = get_query_var('regione');
  $_SESSION['mappa_regione'] = $Regione1;
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
  echo "<h1>";
  if ($Regione == "tutteleregioni" && !get_query_var('regione') ){
    echo "La mappa dell'Italia che Cambia";
  } else {
    echo "La mappa di ".get_term_by('slug',$Regione1,'mapparegione')->name." che Cambia";
  }

  if($filtrata == 1){
    //echo " <span class='text-danger font-italic h6'>filtrata<span>";
  }
  echo "</h1>";

  if($_POST['submit_tutte_le_realta']){
    include('mappa-archivio.php');
  } else {

  ?>
  <div class="row mt-3 mb-2">

    <!-- COLONNA DX -->
    <div id="sidebar" class="col-12 col-md-6 ">
      <div class="sidebar__inner clearfix">
        <div class='head'>
  				<div class='title'>
  					<h5>REALTA'</h5>
  				</div>
  			</div>
        <div id="mappa" class=""></div>

        <div class="row conteggi_mappa m-0">
          <?php if($Regione == "tutteleregioni" && !get_query_var('regione')){ ?>
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
      </div><!-- Fine sidebar__inner -->
    </div><!-- Fine col-6 -->

    <div class="col-12 col-md-6">
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





  <div class="row">
    <?php if ($Regione == "tutteleregioni" && $filtrata == 0){ ?>
      <div class="col-12">
        <h2>Le reti mappate</h2>
        <?php
        //numero realtà per rete
        $terms = get_terms( array(
          'taxonomy' => 'mapparete',
          'hide_empty' => false,
        ) );
        foreach ($terms as $key ) {
          ?>
          <form class="pt-2 d-inline-block" method="post" action="<?php echo get_pagenum_link(); ?>">
            <input name="rete-dropdown" type="hidden" value="<?php echo $key->slug ?>">
            <input name="submit_button" type="submit" value="<?php echo get_option('icc_mappa_rete_'.$key->slug)." ".$key->name ?>" class="btn btn-lg btn-outline-dark btn-outloine-mappa text-wrap">
          </form>
          <?php
        }
          ?>

      </div>

    <div class="col-12">

     <?php
       $argsMappaArchivio = array(
         'post_type' => 'mappa',
         'orderby' => 'modified',
         'posts_per_page' => 10,
       );

       $loopMappaArchivio = new WP_Query( $argsMappaArchivio );
       if($loopMappaArchivio->have_posts()) :
         echo "<h2 class='mt-3'>Ultime realtà mappate</h2>";
         echo '<div class="row">';
         while ($loopMappaArchivio->have_posts()) : $loopMappaArchivio->the_post();
         ?>

           <div class="col-xl-5ths col-lg-3 col-md-4 col-sm-6 text-break">
             <div class="card card--mappa mt-2 border-0 p-0">
               <article class="p-0">
               <img class="img-fluid card-img-top mx-auto d-block p-1" src="<?php if(has_post_thumbnail()){echo get_the_post_thumbnail_url();} else {echo get_template_directory_uri().'/plugin/mappa/asset/mappa-icc.png';} ?>">
               <div class="card-body p-2 text-white">
                 <div class="date text-capitalize"><?php echo get_the_terms( get_the_ID() , 'mapparegione' )[0]->name; ?></div>
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
