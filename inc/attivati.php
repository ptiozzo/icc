<?php

add_filter( 'the_content', 'prefix_insert_post_ads' );

function prefix_insert_post_ads( $content ) {
    if (is_single() && ! is_admin() && get_post_type( get_the_ID() ) == 'post' &&
    in_category( array(
                    'Abitare',
                    'agricoltura',
                    'ambiente',
                    'cicli-produttivi-rifiuti',
                    'eventi-clima',
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
            $ad_code = '<div class="single__attivati mb-2">';
            if (in_category('abitare')){
              $ad_code .= "<p class='px-5 my-0'>Vuoi cambia la situazione</br> dell'abitare in italia?</p>";
              $ad_code .= "<img class='d-none d-md-block' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
              $ad_code .= "<p class='single__attivati2 px-5 my-0'>ATTIVATI</p>";
              $ad_code .= '<a href="/visione-2040-abitare/" class="stretched-link"></a>';
            }
            elseif (in_category('agricoltura')){
              $ad_code .= "<p class='px-5 my-0'>Vuoi cambia la situazione</br> dell'agricoltura in italia?</p>";
              $ad_code .= "<img class='d-none d-md-block' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
              $ad_code .= "<p class='single__attivati2 px-5 my-0'>ATTIVATI</p>";
              $ad_code .= '<a href="/visione-2040-agricoltura-e-acqua/" class="stretched-link"></a>';
            }
            elseif (in_category('ambiente')){
              $ad_code .= "<p class='px-5 my-0'>Vuoi cambia la situazione</br> dell'ambiente in italia?</p>";
              $ad_code .= "<img class='d-none d-md-block' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
              $ad_code .= "<p class='single__attivati2 px-5 my-0'>ATTIVATI</p>";
              $ad_code .= '<a href="/visione-2040-ambiente/" class="stretched-link"></a>';
            }
            elseif (in_category('cicli-produttivi-rifiuti')){
              $ad_code .= "<p class='px-5 my-0'>Vuoi cambia la situazione dei clicli produttivi e dell'ambiente ambiente in italia?</p>";
              $ad_code .= "<img class='d-none d-md-block' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
              $ad_code .= "<p class='single__attivati2 px-5 my-0'>ATTIVATI</p>";
              $ad_code .= '<a href="/visione-2040-cicli-produttivi-e-rifiuti/" class="stretched-link"></a>';
            }
            elseif (in_category('eventi-clima')){
              $ad_code .= "<p class='px-5 my-0'>Vuoi cambia la situazione</br> del clima in italia?</p>";
              $ad_code .= "<img class='d-none d-md-block' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
              $ad_code .= "<p class='single__attivati2 px-5 my-0'>ATTIVATI</p>";
              $ad_code .= '<a href="/visione-2040-clima/" class="stretched-link"></a>';
            }
            elseif (in_category('disabilita')){
              $ad_code .= "<p class='px-5 my-0'>Vuoi cambia la situazione</br> della disabilità in italia?</p>";
              $ad_code .= "<img class='d-none d-md-block' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
              $ad_code .= "<p class='single__attivati2 px-5 my-0'>ATTIVATI</p>";
              $ad_code .= '<a href="/visione-2040-disabilita/" class="stretched-link"></a>';
            }
            elseif (in_category('economia')){
              $ad_code .= "<p class='px-5 my-0'>Vuoi cambia la situazione</br> dell'economia in italia?</p>";
              $ad_code .= "<img class='d-none d-md-block' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
              $ad_code .= "<p class='single__attivati2 px-5 my-0'>ATTIVATI</p>";
              $ad_code .= '<a href="/visione-2040-economia/" class="stretched-link"></a>';
            }
            elseif (in_category('educazione')){
              $ad_code .= "<p class='px-5 my-0'>Vuoi cambia la situazione</br> dell'educazione in italia?</p>";
              $ad_code .= "<img class='d-none d-md-block' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
              $ad_code .= "<p class='single__attivati2 px-5 my-0'>ATTIVATI</p>";
              $ad_code .= '<a href="/visione-2040-educaizone/" class="stretched-link"></a>';
            }
            elseif (in_category('energia')){
              $ad_code .= "<p class='px-5 my-0'>Vuoi cambia la situazione</br> dell'energia in italia?</p>";
              $ad_code .= "<img class='d-none d-md-block' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
              $ad_code .= "<p class='single__attivati2 px-5 my-0'>ATTIVATI</p>";
              $ad_code .= '<a href="/visione-2040-energia/" class="stretched-link"></a>';
            }
            elseif (in_category('imprenditoria')){
              $ad_code .= "<p class='px-5 my-0'>Vuoi cambia la situazione</br> dell'imprenditoria in italia?</p>";
              $ad_code .= "<img class='d-none d-md-block' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
              $ad_code .= "<p class='single__attivati2 px-5 my-0'>ATTIVATI</p>";
              $ad_code .= '<a href="/visione-2040-imprenditoria/" class="stretched-link"></a>';
            }
            elseif (in_category('informazione-e-comunicazione')){
              $ad_code .= "<p class='px-5 my-0'>Vuoi cambia la situazione di informazione e comunicazione in italia?</p>";
              $ad_code .= "<img src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
              $ad_code .= "<p class='single__attivati2 px-5 my-0'>ATTIVATI</p>";
              $ad_code .= '<a href="/visione-2040-informazione-e-comunicazione/" class="stretched-link"></a>';
            }
            elseif (in_category('lavoro')){
              $ad_code .= "<p class='px-5 my-0'>Vuoi cambia la situazione</br> del lavoro in italia?</p>";
              $ad_code .= "<img class='d-none d-md-block' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
              $ad_code .= "<p class='single__attivati2 px-5 my-0'>ATTIVATI</p>";
              $ad_code .= '<a href="/visione-2040-lavoro" class="stretched-link"></a>';
            }
            elseif (in_category('legalita')){
              $ad_code .= "<p class='px-5 my-0'>Vuoi cambia la situazione</br> della legalità in italia?</p>";
              $ad_code .= "<img class='d-none d-md-block' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
              $ad_code .= "<p class='single__attivati2 px-5 my-0'>ATTIVATI</p>";
              $ad_code .= '<a href="/visione-2040-legalita/" class="stretched-link"></a>';
            }
            elseif (in_category('mobilita')){
              $ad_code .= "<p class='px-5 my-0'>Vuoi cambia la situazione</br> della mobilità in italia?</p>";
              $ad_code .= "<img class='d-none d-md-block' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
              $ad_code .= "<p class='single__attivati2 px-5 my-0'>ATTIVATI</p>";
              $ad_code .= '<a href="/visione-2040-mobilita/" class="stretched-link"></a>';
            }
            elseif (in_category('salute-alimentazione')){
              $ad_code .= "<p class='px-5 my-0'>Vuoi cambia la situazione di salute e alimentazione in italia?</p>";
              $ad_code .= "<img class='d-none d-md-block' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
              $ad_code .= "<p class='single__attivati2 px-5 my-0'>ATTIVATI</p>";
              $ad_code .= '<a href="/visione-2040-salute/" class="stretched-link"></a>';
            }
            elseif (in_category('questione-di-genere')){
              $ad_code .= "<p class='px-5 my-0'>Vuoi cambia la situazione</br> della tematica di genere in italia?</p>";
              $ad_code .= "<img class='d-none d-md-block' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
              $ad_code .= "<p class='single__attivati2 px-5 my-0'>ATTIVATI</p>";
              $ad_code .= '<a href="/visione-2040-tematiche-di-genere/" class="stretched-link"></a>';
            }
            elseif (in_category('viaggiare')){
              $ad_code .= "<p class='px-5 my-0'>Vuoi cambia la situazione</br> del viaggiare in italia?</p>";
              $ad_code .= "<img class='d-none d-md-block' src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''>";
              $ad_code .= "<p class='single__attivati2 px-5 my-0'>ATTIVATI</p>";
              $ad_code .= '<a href="/visione-2040-viaggiare/" class="stretched-link"></a>';
            }
            $ad_code .= '</div>';
            $paragraphs[$index] .= $ad_code;
        }
    }

    return implode( '', $paragraphs );
}

 ?>
