<?php
$Regione1 = $_POST["regione-dropdown"] ? $_POST["regione-dropdown"] : "tutteleregioni";
$post_per_page = -1;
?>

<h2>EXPORT MAPPA</h2>
<form method="post" action="<?php echo admin_url( 'admin.php?page=icc-mappa-export' ) ?>&action=download_csv&regione=<?php echo $Regione1 ?>&_wpnonce=<?php echo wp_create_nonce( 'download_csv' )?>">
  <input name="download_button" type="Submit" value="Download" class="button-primary">
</form>

<br>

<form method="post" action="<?php echo get_pagenum_link(); ?>">
  <!-- Filtro regione -->

      <select name="regione-dropdown" class="custom-select">
        <option value="tutteleregioni" <?php if ($Regione1 == 'tutteleregioni') {echo 'selected';}?> ><?php echo 'Tutte le regioni'; ?></option>
        <?php
          $terms = get_terms( array(
            'taxonomy' => 'mapparegione',
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
  <input name="filtra_button" type="Submit" value="Filtra" class="button-primary">
</form>
<br>

<?php
if($Regione1 != "tutteleregioni"){
  $filtroRegione = array(
    'taxonomy' => 'mapparegione',
    'field'    => 'slug',
    'terms'    => $Regione1,
  );
} else {
  $filtroRegione = '';
}

$argsAllMappa = array(
  'post_type' => array('mappa'),
  'posts_per_page' => $post_per_page,
  'post_status' => 'any',
  'tax_query' => array(
      'relation' => 'AND',
      $filtroRegione,
    ),
);

$loopAllMappa = new WP_Query( $argsAllMappa );

if($loopAllMappa->have_posts()){
  global $post;
  ?>
  <style>
  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 5px;
  }
  </style>

  <?php
  $row = 0;
  echo "<table style='border:1px solid black;'>";
  echo "<tr>";
  echo "<th>Riga</th>";
  echo "<th>ID</th>";
  echo "<th>Titolo</th>";
  echo "<th>Stato</th>";
  echo "<th>Autore</th>";
  echo "<th>Slug</th>";
  echo "<th>Regione</th>";
  echo "<th>Categoria</th>";
  echo "<th>Tipologia</th>";
  echo "<th>Rete</th>";
  echo "<th>TAG</th>";
  echo "<th>Chiuso motivazione</th>";
  echo "<th>Chiuso data</th>";
  echo "<th>Contenuto</th>";
  echo "<th>Video YT</th>";
  echo "<th>Latitudine</th>";
  echo "<th>Longitudine</th>";
  echo "<th>Indirizzo</th>";
  echo "<th>Sito</th>";
  echo "<th>Email</th>";
  echo "<th>Telefono</th>";
  echo "<th>Facebook</th>";
  echo "<th>Instagram</th>";
  echo "<th>YouTube</th>";
  echo "<th>Linkedin</th>";
  echo "<th>Twitter</th>";
  echo "<th>Post status</th>";
  echo "<th>Legale rappresentante</th>";
  echo "<th>Termini e condizioni</th>";
  echo "<th>Ultima Modifica</th>";
  echo "</tr>";
  while($loopAllMappa->have_posts()){
    $loopAllMappa->the_post();
    $row++;
    echo "<tr>";
    echo "<td>".$row."</td>";
    if(get_post_status ( $ID ) == 'publish'){
      echo "<td style='background: #b3ff66;'><a href='".get_edit_post_link(get_the_ID())."'>".get_the_ID()."</a></td>";
    }elseif(get_post_status ( $ID ) == 'draft'){
      echo "<td style='background: #ffff66;'><a href='".get_edit_post_link(get_the_ID())."'>".get_the_ID()."</a></td>";
    }elseif(get_post_status ( $ID ) == 'pending'){
      echo "<td style='background: pink;'><a href='".get_edit_post_link(get_the_ID())."'>".get_the_ID()."</a></td>";
    }else{
      echo "<td><a href='".get_edit_post_link(get_the_ID())."'>".get_the_ID()."</a></td>";
    }
    echo "<td>". get_the_title()."</td>";
    //STATO
    echo "<td>";
    $term1 = "mappastato";
    $terms = get_the_terms( $post->ID , $term1 );
    if ($terms != ""){
      foreach ( $terms as $term ) {
        if($term->parent == 0){
          echo $term->slug.",";
        }
      }
      foreach ( $terms as $term ) {
        if($term->parent != 0){
          echo $term->slug.",";
        }
      }
    }
    echo "</td>";
    echo "<td>". get_the_author()."</td>";
    echo "<td>". $post->post_name."</td>";
    //REGIONE
    echo "<td>";
    $term1 = "mapparegione";
    $terms = get_the_terms( $post->ID , $term1 );
    if ($terms != ""){
      foreach ( $terms as $term ) {
        if($term->parent == 0){
          echo $term->slug.",";
        }
      }
      foreach ( $terms as $term ) {
        if($term->parent != 0){
          echo $term->slug.",";
        }
      }
    }
    echo "</td>";
    //CATEGORIA
    echo "<td>";
    $term1 = "mappacategoria";
    $terms = get_the_terms( $post->ID , $term1 );
    if ($terms != ""){
      foreach ( $terms as $term ) {
        if($term->parent == 0){
          echo $term->slug.",";
        }
      }
      foreach ( $terms as $term ) {
        if($term->parent != 0){
          echo $term->slug.",";
        }
      }
    }
    //TIPOLOGIA
    echo "<td>";
    $term1 = "mappatipologia";
    $terms = get_the_terms( $post->ID , $term1 );
    if ($terms != ""){
      foreach ( $terms as $term ) {
        if($term->parent == 0){
          echo $term->slug.",";
        }
      }
      foreach ( $terms as $term ) {
        if($term->parent != 0){
          echo $term->slug.",";
        }
      }
    }
    echo "</td>";
    //RETE
    echo "<td>";
    $term1 = "mapparete";
    $terms = get_the_terms( $post->ID , $term1 );
    if ($terms != ""){
      foreach ( $terms as $term ) {
        if($term->parent == 0){
          echo $term->slug.",";
        }
      }
      foreach ( $terms as $term ) {
        if($term->parent != 0){
          echo $term->slug.",";
        }
      }
    }
    echo "</td>";
    //TAG
    echo "<td>";
    $term1 = "mappatag";
    $terms = get_the_terms( $post->ID , $term1 );
    if ($terms != ""){
      foreach ( $terms as $term ) {
        if($term->parent == 0){
          echo $term->slug.",";
        }
      }
      foreach ( $terms as $term ) {
        if($term->parent != 0){
          echo $term->slug.",";
        }
      }
    }
    echo "</td>";

    echo "<td>".get_post_meta( $post->ID, 'Mappa_Chiuso_Motivazione',true)."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_Chiuso_Data',true)."</td>";
    echo "<td>Contenuto</td>";// echo "<td>".get_the_content()."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_VideoYT',true)."</td>";
    if(get_post_meta( $post->ID, 'Mappa_Latitudine',true)){
      echo "<td>".get_post_meta( $post->ID, 'Mappa_Latitudine',true)."</td>";
    }else{
      echo "<td style='background-color: red;'>".get_post_meta( $post->ID, 'Mappa_Latitudine',true)."</td>";
    }

    if(get_post_meta( $post->ID, 'Mappa_Longitudine',true)){
      echo "<td>".get_post_meta( $post->ID, 'Mappa_Longitudine',true)."</td>";
    }else{
      echo "<td style='background-color: red;'>".get_post_meta( $post->ID, 'Mappa_Longitudine',true)."</td>";
    }

    echo "<td>".get_post_meta( $post->ID, 'Mappa_Indirizzo',true)."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_Sito',true)."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_Email',true)."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_Telefono',true)."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_FB',true)."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_IG',true)."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_YT',true)."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_IN',true)."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_TW',true)."</td>";
    echo "<td>".get_post_status()."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_legaleRappresentante',true)."</td>";
    echo "<td>".get_post_meta( $post->ID, 'Mappa_privacy',true)."</td>";
    echo "<td>".get_the_modified_date("d F Y")."</td>";




    echo "</tr>";
  }
  echo "</table>";
}


?>
