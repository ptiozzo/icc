<?php

add_filter( 'the_content', 'prefix_insert_post_ads' );

function prefix_insert_post_ads( $content ) {
    if (is_single() && ! is_admin() && get_post_type( get_the_ID() ) == 'post' &&
    in_category( array(
                    'Abitare',
                    'agricoltura',
                    'ambiente',
                    'cicli-produttivi-rifiuti',
                    'clima',
                    'disabilita',
                    'Economia',
                    'educazione',
                    'energia',
                    'imprenditoria',
                    'informazione-e-comunicazione',
                    'lavoro',
                    'legalita',
                    'mobilita',
                    'salute-alimentazione',
                    'questione-di-genere',
                    'viaggiare'
                )) ) {

        $content = prefix_insert_after_content($content );
        $content = prefix_insert_after_paragraph_contribuisci(4, $content);
        return $content;
    }
    if(get_post_type( get_the_ID()) == 'rassegna-stampa'){
      $content = prefix_insert_after_paragraph_contribuisci("rassegna", $content);
      return $content;
    }
    if(is_single() && ! is_admin() && get_post_type( get_the_ID() ) == 'post'){
      $content = prefix_insert_after_paragraph_contribuisci(4, $content);
    }
    return $content;
}

// Parent Function that makes the magic happen
function prefix_insert_after_content( $content ) {

    $ad_code = '<div class="single__attivati mb-2 d-flex flex-lg-row flex-column">';
    if (in_category('abitare')){
        $ad_code .= "<p class='px-4 py-2 my-0'>Vuoi cambiare la situazione</br> dell'abitare in italia?</p>";
        $ad_code .= "<div class='d-flex flex-row justify-content-center align-items-center'><img class='img-fluid'  src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
        $ad_code .= "<p class='single__attivati2 px-lg-4 pl-2 my-0'>ATTIVATI</p>";
        $ad_code .= '<a href="/visione-2040-abitare/" class="stretched-link"></a></div>';
      }
      elseif (in_category('agricoltura')){
        $ad_code .= "<p class='px-4 py-2 my-0'>Vuoi cambiare la situazione</br> dell'agricoltura in italia?</p>";
        $ad_code .= "<div class='d-flex flex-row justify-content-center align-items-center'><img class='img-fluid' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
        $ad_code .= "<p class='single__attivati2 px-lg-4 pl-2 my-0'>ATTIVATI</p>";
        $ad_code .= '<a href="/visione-2040-agricoltura-e-acqua/" class="stretched-link"></a></div>';
      }
      elseif (in_category('ambiente')){
        $ad_code .= "<p class='px-4 py-2 my-0'>Vuoi cambiare la situazione</br> dell'ambiente in italia?</p>";
        $ad_code .= "<div class='d-flex flex-row justify-content-center align-items-center'><img class='img-fluid' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
        $ad_code .= "<p class='single__attivati2 px-lg-4 pl-2 my-0'>ATTIVATI</p>";
        $ad_code .= '<a href="/visione-2040-ambiente/" class="stretched-link"></a></div>';
      }
      elseif (in_category('cicli-produttivi-rifiuti')){
        $ad_code .= "<p class='px-4 py-2 my-0'>Vuoi cambiare la situazione di <br>cicli produttivi e rifiuti in italia?</p>";
        $ad_code .= "<div class='d-flex flex-row justify-content-center align-items-center'><img class='img-fluid' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
        $ad_code .= "<p class='single__attivati2 px-lg-4 pl-2 my-0'>ATTIVATI</p>";
        $ad_code .= '<a href="/visione-2040-cicli-produttivi-e-rifiuti/" class="stretched-link"></a></div>';
      }
      elseif (in_category('clima')){
        $ad_code .= "<p class='px-4 py-2 my-0'>Vuoi cambiare la situazione</br> del clima in italia?</p>";
        $ad_code .= "<div class='d-flex flex-row justify-content-center align-items-center'><img class='img-fluid' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
        $ad_code .= "<p class='single__attivati2 px-lg-4 pl-2 my-0'>ATTIVATI</p>";
        $ad_code .= '<a href="/visione-2040-clima/" class="stretched-link"></a></div>';
      }
      elseif (in_category('disabilita')){
        $ad_code .= "<p class='px-4 py-2 my-0'>Vuoi cambiare la situazione</br> della disabilità in italia?</p>";
        $ad_code .= "<div class='d-flex flex-row justify-content-center align-items-center'><img class='img-fluid' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
        $ad_code .= "<p class='single__attivati2 px-lg-4 pl-2 my-0'>ATTIVATI</p>";
        $ad_code .= '<a href="/visione-2040-disabilita/" class="stretched-link"></a></div>';
      }
      elseif (in_category('economia')){
        $ad_code .= "<p class='px-4 py-2 my-0'>Vuoi cambiare la situazione</br> dell'economia in italia?</p>";
        $ad_code .= "<div class='d-flex flex-row justify-content-center align-items-center'><img class='img-fluid' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
        $ad_code .= "<p class='single__attivati2 px-lg-4 pl-2 my-0'>ATTIVATI</p>";
        $ad_code .= '<a href="/visione-2040-economia/" class="stretched-link"></a></div>';
      }
      elseif (in_category('educazione')){
        $ad_code .= "<p class='px-4 py-2 my-0'>Vuoi cambiare la situazione</br> dell'educazione in italia?</p>";
        $ad_code .= "<div class='d-flex flex-row justify-content-center align-items-center'><img class='img-fluid' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
        $ad_code .= "<p class='single__attivati2 px-lg-4 pl-2 my-0'>ATTIVATI</p>";
        $ad_code .= '<a href="/visione-2040-educazione/" class="stretched-link"></a></div>';
      }
      elseif (in_category('energia')){
        $ad_code .= "<p class='px-4 py-2 my-0'>Vuoi cambiare la situazione</br> dell'energia in italia?</p>";
        $ad_code .= "<div class='d-flex flex-row justify-content-center align-items-center'><img class='img-fluid' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
        $ad_code .= "<p class='single__attivati2 px-lg-4 pl-2 my-0'>ATTIVATI</p>";
        $ad_code .= '<a href="/visione-2040-energia/" class="stretched-link"></a></div>';
      }
      elseif (in_category('imprenditoria')){
        $ad_code .= "<p class='px-4 py-2 my-0'>Vuoi cambiare la situazione</br> dell'imprenditoria in italia?</p>";
        $ad_code .= "<div class='d-flex flex-row justify-content-center align-items-center'><img class='img-fluid' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
        $ad_code .= "<p class='single__attivati2 px-lg-4 pl-2 my-0'>ATTIVATI</p>";
        $ad_code .= '<a href="/visione-2040-imprenditoria/" class="stretched-link"></a></div>';
      }
      elseif (in_category('informazione-e-comunicazione')){
        $ad_code .= "<p class='px-4 py-2 my-0'>Vuoi cambiare la situazione di informazione e comunicazione in italia?</p>";
        $ad_code .= "<div class='d-flex flex-row justify-content-center align-items-center'><img src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
        $ad_code .= "<p class='single__attivati2 px-lg-4 pl-2 my-0'>ATTIVATI</p>";
        $ad_code .= '<a href="/visione-2040-informazione-e-comunicazione/" class="stretched-link"></a></div>';
      }
      elseif (in_category('lavoro')){
        $ad_code .= "<p class='px-4 py-2 my-0'>Vuoi cambiare la situazione</br> del lavoro in italia?</p>";
        $ad_code .= "<div class='d-flex flex-row justify-content-center align-items-center'><img class='img-fluid' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
        $ad_code .= "<p class='single__attivati2 px-lg-4 pl-2 my-0'>ATTIVATI</p>";
        $ad_code .= '<a href="/visione-2040-lavoro" class="stretched-link"></a></div>';
      }
      elseif (in_category('legalita')){
        $ad_code .= "<p class='px-4 py-2 my-0'>Vuoi cambiare la situazione</br> della legalità in italia?</p>";
        $ad_code .= "<div class='d-flex flex-row justify-content-center align-items-center'><img class='img-fluid' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
        $ad_code .= "<p class='single__attivati2 px-lg-4 pl-2 my-0'>ATTIVATI</p>";
        $ad_code .= '<a href="/visione-2040-legalita/" class="stretched-link"></a></div>';
      }
      elseif (in_category('mobilita')){
        $ad_code .= "<p class='px-4 py-2 my-0'>Vuoi cambiare la situazione</br> della mobilità in italia?</p>";
        $ad_code .= "<div class='d-flex flex-row justify-content-center align-items-center'><img class='img-fluid' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
        $ad_code .= "<p class='single__attivati2 px-lg-4 pl-2 my-0'>ATTIVATI</p>";
        $ad_code .= '<a href="/visione-2040-mobilita/" class="stretched-link"></a></div>';
      }
      elseif (in_category('salute-alimentazione')){
        $ad_code .= "<p class='px-4 py-2 my-0'>Vuoi cambiare la situazione di salute e alimentazione in italia?</p>";
        $ad_code .= "<div class='d-flex flex-row justify-content-center align-items-center'><img class='img-fluid' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
        $ad_code .= "<p class='single__attivati2 px-lg-4 pl-2 my-0'>ATTIVATI</p>";
        $ad_code .= '<a href="/visione-2040-salute/" class="stretched-link"></a></div>';
      }
      elseif (in_category('questione-di-genere')){
        $ad_code .= "<p class='px-4 py-2 my-0'>Vuoi cambiare la situazione</br> della tematica di genere in italia?</p>";
        $ad_code .= "<div class='d-flex flex-row justify-content-center align-items-center'><img class='img-fluid' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
        $ad_code .= "<p class='single__attivati2 px-lg-4 pl-2 my-0'>ATTIVATI</p>";
        $ad_code .= '<a href="/visione-2040-tematiche-di-genere/" class="stretched-link"></a></div>';
      }
      elseif (in_category('viaggiare')){
        $ad_code .= "<p class='px-4 py-2 my-0'>Vuoi cambiare la situazione</br> del viaggiare in italia?</p>";
        $ad_code .= "<div class='d-flex flex-row justify-content-center align-items-center'><img class='img-fluid' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
        $ad_code .= "<p class='single__attivati2 px-lg-4 pl-2 my-0'>ATTIVATI</p>";
        $ad_code .= '<a href="/visione-2040-viaggiare/" class="stretched-link"></a></div>';
      }
      $ad_code .= '</div>';

    $content.= $ad_code;
    return $content;
}

function prefix_insert_after_paragraph_contribuisci( $paragraph_id, $content ) {

  $closing_p = '</p>';

  $terms = "contribuisci-singolo-articolo-desktop";
  if ($paragraph_id == "rassegna"){
    $terms = "contribuisci-singolo-rassegna-desktop";
  }

  $argsContribuisciSingleDesktop = array(
    'post_type' => 'contenuti-speciali',
    'posts_per_page' => 1,
    'orderby' => 'rand',
    'tax_query' => array(
      array(
          'taxonomy'=> 'contenuti_speciali_filtri',
          'field'   => 'slug',
          'terms'		=> $terms,
      ),
    ),
  );
  $loopContribuisciSingleDesktop = new WP_Query( $argsContribuisciSingleDesktop );

  $terms = "contribuisci-singolo-articolo-mobile";
  if ($paragraph_id == "rassegna"){
    $terms = "contribuisci-singolo-rassegna-mobile";
  }
  $argsContribuisciSingleMobile = array(
    'post_type' => 'contenuti-speciali',
    'posts_per_page' => 1,
    'orderby' => 'rand',
    'tax_query' => array(
      array(
          'taxonomy'=> 'contenuti_speciali_filtri',
          'field'   => 'slug',
          'terms'		=> $terms,
      ),
    ),
  );
  $loopContribuisciSingleMobile = new WP_Query( $argsContribuisciSingleMobile );

  if( $loopContribuisciSingleDesktop->have_posts() || $loopContribuisciSingleMobile->have_posts()):
    $ad_code = '<div class="single__article__contribuisci text-center mb-2 pb-3">';
    while( $loopContribuisciSingleDesktop->have_posts() ) : $loopContribuisciSingleDesktop->the_post();
      $ad_code .= '<div class="m-2 d-none d-md-block">';
      $ad_code .= get_the_content();
      $ad_code .= '</div>';
    endwhile;
    while( $loopContribuisciSingleMobile->have_posts() ) : $loopContribuisciSingleMobile->the_post();
      $ad_code .= '<div class="m-2 d-block d-md-none text-center">';
      $ad_code .= get_the_content();
      $ad_code .= '</div>';
    endwhile;
    $ad_code .= '<button type="button" class="btn btn-lg btn-warning position-relative">';
    $ad_code .= 'Contribuisci adesso all\'italia che cambia';
    //$ad_code .= '<img src="'.get_template_directory_uri().'/assets/img/payment-methods.png" class="ml-2">';
    $ad_code .= '<a href="/contribuisci" class="stretched-link"></a>';
    $ad_code .= '</button>';
    $ad_code .= '</div>';
  endif;
  wp_reset_postdata();


  $paragraphs = explode( $closing_p, $content );
  foreach ($paragraphs as $index => $paragraph) {

      if ( trim( $paragraph ) ) {
          $paragraphs[$index] .= $closing_p;
      }
      if ( $paragraph_id == $index + 1 ) {
        $paragraphs[$index] .= $ad_code;
      }
  }

  if($paragraph_id == "last" || $paragraph_id== "rassegna"){
    $content.= $ad_code;
    return $content;
  }

  return implode( '', $paragraphs );
}


 ?>
