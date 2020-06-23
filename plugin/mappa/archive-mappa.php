<?php get_header();?>

<?php
$Categoria = 'tuttelecategorie';
$Rete = 'tuttelereti';
$Regione = 'tutteleregioni';
$Tipologia = 'tutteletipologie';
$Realta = '';

if($_POST['submit_button']){
  $Categoria1 = $_POST['categoria-dropdown'];
  $Rete1 = $_POST['rete-dropdown'];
  $Regione1 = $_POST['regione-dropdown'];
  $Tipologia1 = $_POST['tipologia-dropdown'];
  $Realta1 = $_POST['nome-realta'];
  $_SESSION['mappa_categorie'] = $Categoria1;
  $_SESSION['mappa_rete'] = $Rete1;
  $_SESSION['mappa_regione'] = $Regione1;
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
  unset($_SESSION['mappa_tipologia']);
  unset($_SESSION['mappa_realta']);
} else {
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
}

echo "<!-- Categoria = ".$Categoria1." - Rete = ".$Rete1." - Regione = ".$Regione1." - Tipologia = ".$Tipologia1 ." - Realtà = ".$Realta1."-->";
?>

<div class="mappa">
  <h1>Mappa Italia che Cambia</h1>
  <div class="row mt-3 mb-2">
    <div class="col-12 col-md-6 overflow-hidden">
      <div class='head'>
				<div class='title'>
					<h5>CLICCA UNA REGIONE</h5>
				</div>
			</div>
      <div id="mappa" class="mx-auto"></div>
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
          <div class="form-group col-6 my-1">
            <select name="regione-dropdown" class="custom-select">
              <option value="tutteleregioni" <?php if ($Regione1 == 'tutteleregioni') {echo 'selected';}?> ><?php echo 'Tutte le regioni'; ?></option>
              <?php
                $terms = get_terms( array(
                  'taxonomy' => 'regionemappa',
                  'hide_empty' => false,
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
          <div>
        </form>
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
        ?>
      </div><!-- Filtri mappa -->
    </div><!-- Fine col-6 -->
  </div><!-- Fine row -->
</div><!-- Fine mappa -->

<?php

if($Categoria1 != 'tuttelecategorie'){
  $filtroCategoria = array(
    'taxonomy' => 'categoria',
    'field'    => 'slug',
    'terms'    => $Categoria1,
  );
} else{
  $filtroCategoria = '';
}
if($Rete1 != 'tuttelereti'){
  $filtroRete =  array(
    'taxonomy' => 'rete',
    'field'    => 'slug',
    'terms'    => $Rete1,
  );
} else{
  $filtroRete = '';
}
if ($Regione1 != 'tutteleregioni'){
  $filtroRegione = array(
    'taxonomy' => 'regionemappa',
    'field'    => 'slug',
    'terms'    => $Regione1,
  );
}else{
  $filtroRegione = '';
}
if ($Tipologia1 != 'tutteletipologie') {
  $filtroTipologia = array(
    'taxonomy' => 'tipologia',
    'field'    => 'slug',
    'terms'    => $Tipologia1,
  );
}else{
  $filtroTipologia = '';
}


$argsMappaArchivio = array(
  'post_type' => array('mappa'),
  's' => $Realta1,
  'tax_query' => array(
      'relation' => 'AND',
      $filtroCategoria,
      $filtroRete,
      $filtroRegione,
      $filtroTipologia,
    ),
);
$loopMappaArchivio = new WP_Query( $argsMappaArchivio );
echo $loopMappaArchivio->found_posts;
if( $loopMappaArchivio->have_posts()) :
?>

  <script>
    var map = L.map('mappa',{gestureHandling: true}).setView([42.088, 12.564], 6);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
      //attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox/outdoors-v11',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: 'pk.eyJ1IjoiaWNjLW1hcHBhIiwiYSI6ImNrYmpzNWZkcTByeXAzMXBqaGRzM2dmaWoifQ.TYuCegt1hW_2z5qyjDBZkg'
  }).addTo(map);
  var markers = L.markerClusterGroup({
    showCoverageOnHover: false,
  });

  var redIcon = L.icon({
    iconUrl: '<?php echo get_template_directory_uri();?>/plugin/mappa/asset/leaflet/images/marker-icon-red.png',
    shadowUrl: 'marker-shadow.png',

    iconSize:     [25, 41], // size of the icon
    iconAnchor:   [25, 41], // point of the icon which will correspond to marker's location
    popupAnchor:  [-13, -40] // point from which the popup should open relative to the iconAnchor
  });
  </script>
<?php
$tuttiIPuntini = "[";
while( $loopMappaArchivio->have_posts() ) : $loopMappaArchivio->the_post();
  $popupMappa = get_the_excerpt();
  $popupMappa .= "<br>";
  $popupMappa .= "<a href='".get_the_permalink()."'>Approfondisci</a>";
  $tuttiIPuntini .= "[".get_post_meta( get_the_ID(), 'Mappa_Latitudine',true).", ".get_post_meta( get_the_ID(), 'Mappa_Longitudine',true)."],";
 ?>
  <script>

    var title = "<?php echo $popupMappa; ?>";
    var puntino = L.marker([<?php echo get_post_meta( get_the_ID(), 'Mappa_Latitudine',true) ?>, <?php echo get_post_meta( get_the_ID(), 'Mappa_Longitudine',true) ?>],{title: title,<?php if(get_the_terms( get_the_ID() , 'stato' )[0]->slug == "utente" ){echo "icon: redIcon";}?>});
    puntino.bindPopup(title);
    markers.addLayer(puntino);

  </script>

<?php
endwhile;
$tuttiIPuntini .= "]";
?>
<script>
  map.addLayer(markers);
  map.fitBounds(<?php echo $tuttiIPuntini; ?>);
</script>
<?php
else:
  echo "Nessuna realtà trovata";
endif;
//echo $tuttiIPuntini;
?>

<?php get_footer(); ?>
