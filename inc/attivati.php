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
        return prefix_insert_after_paragraph( 2, $content );
    }
    return $content;
}

// Parent Function that makes the magic happen
function prefix_insert_after_paragraph( $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {

        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }

        if ( $paragraph_id == $index + 1 ) {
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
            $paragraphs[$index] .= $ad_code;
        }
    }

    return implode( '', $paragraphs );
}

 ?>
