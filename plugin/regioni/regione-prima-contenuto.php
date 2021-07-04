<?php

add_action('the_content', 'icc_post_regioni_nome_content');
function icc_post_regioni_nome_content( $content ){

  $term1 = "territori";
  $terms = get_the_terms( $post->ID , $term1 );
  if($terms != false){
    $postRegione = "";
    foreach ($terms as $term) {
      $postRegione .= "<span class='text-capitalize font-weight-bold'><u>";
      if(icc_is_region_active($term->slug)){
        if($term->parent == 0){
          $postRegione .= "<a class='text-dark' href='/".$term->slug."'>";
        }else{
          $regione_padre = get_term_by('id',$term->parent,'postregione');
          $postRegione .= "<a class='text-dark' href='/".$regione_padre->slug."/".$term->slug."'>";
        }

      }else{
        $postRegione .= "<a class='text-dark' href='".get_term_link($term->slug,'territori')."'>";
      }

      $postRegione .= get_term_by('id', $term->term_id,'territori')->name;
      $postRegione .= "</u></a>";
      $postRegione .= "</span> - ";
    }
    $content = $postRegione . $content;
    $content = preg_replace('/<p([^>]+)?>/', '<p$1 class="intro">', $content, 1);

  }

  return $content;
}

 ?>
