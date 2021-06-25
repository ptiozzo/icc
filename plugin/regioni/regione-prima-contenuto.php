<?php

add_action('the_content', 'icc_post_regioni_nome_content');
function icc_post_regioni_nome_content( $content ){

  $term1 = "postregione";
  $terms = get_the_terms( $post->ID , $term1 );
  
  if($terms != false){

    $postRegione = "<span class='text-uppercase font-weight-bold'>";
    $postRegione .= get_term_by('id', $terms[0]->term_id,'postregione')->name;
    $postRegione .= "</span> - ";
    $content = $postRegione . $content;
    $content = preg_replace('/<p([^>]+)?>/', '<p$1 class="intro">', $content, 1);

  }

  return $content;
}

 ?>
