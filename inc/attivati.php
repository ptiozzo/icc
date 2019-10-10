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
            $ad_code = '<div class="single__attivati p-4 mb-2">';
            if (in_category('abitare')){
              $ad_code .= 'ATTIVATI ABITARE';
              $ad_code .= '<a href="" class="stretched-link"></a>';
            }
            elseif (in_category('agricoltura')){
              $ad_code .= 'ATTIVATI AGRICOLTURA';
              $ad_code .= '<a href="" class="stretched-link"></a>';
            }
            elseif (in_category('ambiente')){
              $ad_code .= 'ATTIVATI AMBIENTE';
              $ad_code .= '<a href="" class="stretched-link"></a>';
            }
            elseif (in_category('cicli-produttivi-rifiuti')){
              $ad_code .= 'ATTIVATI CICLI PRODUTTIVI E RIFIUTI';
              $ad_code .= '<a href="" class="stretched-link"></a>';
            }
            elseif (in_category('eventi-clima')){
              $ad_code .= 'ATTIVATI CLIMA';
              $ad_code .= '<a href="" class="stretched-link"></a>';
            }
            elseif (in_category('disabilita')){
              $ad_code .= 'ATTIVATI DISABILITA\'';
              $ad_code .= '<a href="" class="stretched-link"></a>';
            }
            elseif (in_category('economia')){
              $ad_code .= 'ATTIVATI ECONOMIA';
              $ad_code .= '<a href="" class="stretched-link"></a>';
            }
            elseif (in_category('educazione')){
              $ad_code .= 'ATTIVATI EDUCAZIONE';
              $ad_code .= '<a href="" class="stretched-link"></a>';
            }
            elseif (in_category('energia')){
              $ad_code .= 'ATTIVATI ENERGIA';
              $ad_code .= '<a href="" class="stretched-link"></a>';
            }
            elseif (in_category('imprenditoria')){
              $ad_code .= 'ATTIVATI IMPRENDITORIA';
              $ad_code .= '<a href="" class="stretched-link"></a>';
            }
            elseif (in_category('informazione-e-comunicazione')){
              $ad_code .= 'ATTIVATI INFORMAZIONE E COMUNICAZIONE';
              $ad_code .= '<a href="" class="stretched-link"></a>';
            }
            elseif (in_category('lavoro')){
              $ad_code .= 'ATTIVATI LAVORO';
              $ad_code .= '<a href="" class="stretched-link"></a>';
            }
            elseif (in_category('legalita')){
              $ad_code .= 'ATTIVATI LEGALITA\'';
              $ad_code .= '<a href="" class="stretched-link"></a>';
            }
            elseif (in_category('mobilita')){
              $ad_code .= 'ATTIVATI MOBILITA\'';
              $ad_code .= '<a href="" class="stretched-link"></a>';
            }
            elseif (in_category('salute-alimentazione')){
              $ad_code .= 'ATTIVATI SALUTE E ALIMENTAZIONE';
              $ad_code .= '<a href="" class="stretched-link"></a>';
            }
            elseif (in_category('questione-di-genere')){
              $ad_code .= 'ATTIVATI TEMATICA DI GENERE';
              $ad_code .= '<a href="" class="stretched-link"></a>';
            }
            elseif (in_category('viaggiare')){
              $ad_code .= 'ATTIVATI VIAGGIARE';
              $ad_code .= '<a href="" class="stretched-link"></a>';
            }
            $ad_code .= '</div>';
            $paragraphs[$index] .= $ad_code;
        }
    }

    return implode( '', $paragraphs );
}

 ?>
