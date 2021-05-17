<?php

add_action('the_content', 'icc_post_regioni_nome_content');
function icc_post_regioni_nome_content( $content ){

  $term1 = "postregione";
  $terms = get_the_terms( $post->ID , $term1 );

  if($terms != false){
    $Provincia = 0;
    foreach ($terms as $Reg) {
      if($Reg->parent != 0){

        $Provincia = $Reg->term_id;
        $ProvinciaRegione = $Reg->parent;
      }
    }

    $postRegione = "<span class='text-uppercase font-weight-lighter font-italic'>";
    if($Provincia != 0){
      $postRegione .= get_term_by('id', $Provincia,'postregione')->name;
      $postRegione .= " (".get_term_by('id', $ProvinciaRegione,'postregione')->name.")";
    } else{
      $postRegione .= get_term_by('id', $terms[0]->term_id,'postregione')->name;
    }

    $postRegione .= "</span>";
    $content = $postRegione . $content;
  }



  return $content;
}

 ?>
