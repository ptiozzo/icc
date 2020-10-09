<h1>Admin mappa</h1>

<h2>Istruzioni</h2>
<p>Una realtà per essere visualizzata sulla mappa ha bisogno di avere le coordinate</p>
<p>Per inserire le coordinate basta inserire un indirizzo e cliccare sul pulsante "Coordinate da indirizzo"</p>

<h2>Realtà senza coordinate</h2>
<?php
//DEBUG per realtà senza LatLong
$filtroLatLong = array(
  'key' => 'Mappa_Latitudine',
  'compare'    => 'NOT EXISTS',
);

$filtroReti = array(
  'taxonomy'=> 'mappastato',
  'field'    => 'slug',
  'terms'    => 'rete',
  'operator' => 'NOT IN',
);

$argsMappaSenzaLatLong = array(
  'post_type' => array('mappa'),
  'posts_per_page' => -1,
  'meta_query' => array(
      $filtroLatLong,
    ),
  'tax_query' => array(
    $filtroReti,
  ),
);
$loopMappaSenzaLatLong = new WP_Query( $argsMappaSenzaLatLong );

if ($loopMappaSenzaLatLong->have_posts()){
  while ($loopMappaSenzaLatLong->have_posts()) {
    $loopMappaSenzaLatLong->the_post();
    echo get_the_title()."-";
    edit_post_link();
    echo "<br> ";
    //wp_delete_post(get_the_ID());
  }
  echo "<br> Totale realtà ".$loopMappaSenzaLatLong->found_posts;
}
//Fine DEBUG per realtà senza LatLong
?>

<h2>Realtà segnalate da utente</h2>
<?php

$filtroUtente = array(
  'taxonomy'=> 'mappastato',
  'field'    => 'slug',
  'terms'    => 'utente',
  'operator' => 'IN',
);

$argsMappaUtente = array(
  'post_type' => array('mappa'),
  'posts_per_page' => -1,
  'tax_query' => array(
      $filtroUtente,
    ),
);

$loopMappaUtente = new WP_Query( $argsMappaUtente );
if ($loopMappaUtente->have_posts()){
  echo $loopMappaUtente->found_posts;
} else {
  echo "Nessuna realtà segnalata dagli utenti!";
}
