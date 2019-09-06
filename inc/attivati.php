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
            if (in_category('abitare')){
              $ad_code = '<div class="single__attivati">ATTIVATI ABITARE</div>';
            }
            elseif (in_category('agricoltura')){
              $ad_code = '<div class="single__attivati">ATTIVATI AGRICOLTURA</div>';
            }
            elseif (in_category('ambiente')){
              $ad_code = '<div class="single__attivati">ATTIVATI AMBIENTE</div>';
            }
            elseif (in_category('cicli-produttivi-rifiuti')){
              $ad_code = '<div class="single__attivati">ATTIVATI CICLI PRODUTTIVI E RIFIUTI</div>';
            }
            elseif (in_category('eventi-clima')){
              $ad_code = '<div class="single__attivati">ATTIVATI CLIMA</div>';
            }
            elseif (in_category('disabilita')){
              $ad_code = '<div class="single__attivati">ATTIVATI DISABILITA\'</div>';
            }
            elseif (in_category('economia')){
              $ad_code = '<div class="single__attivati">ATTIVATI ECONOMIA</div>';
            }
            elseif (in_category('educazione')){
              $ad_code = '<div class="single__attivati">ATTIVATI EDUCAZIONE</div>';
            }
            elseif (in_category('energia')){
              $ad_code = '<div class="single__attivati">ATTIVATI ENERGIA</div>';
            }
            elseif (in_category('imprenditoria')){
              $ad_code = '<div class="single__attivati">ATTIVATI IMPRENDITORIA</div>';
            }
            elseif (in_category('informazione-e-comunicazione')){
              $ad_code = '<div class="single__attivati">ATTIVATI INFORMAZIONE E COMUNICAZIONE</div>';
            }
            elseif (in_category('lavoro')){
              $ad_code = '<div class="single__attivati">ATTIVATI LAVORO</div>';
            }
            elseif (in_category('legalita')){
              $ad_code = '<div class="single__attivati">ATTIVATI LEGALITA\'</div>';
            }
            elseif (in_category('mobilita')){
              $ad_code = '<div class="single__attivati">ATTIVATI MOBILITA\'</div>';
            }
            elseif (in_category('salute-alimentazione')){
              $ad_code = '<div class="single__attivati">ATTIVATI SALUTE E ALIMENTAZIONE</div>';
            }
            elseif (in_category('questione-di-genere')){
              $ad_code = '<div class="single__attivati">ATTIVATI TEMATICA DI GENERE</div>';
            }
            elseif (in_category('viaggiare')){
              $ad_code = '<div class="single__attivati">ATTIVATI VIAGGIARE</div>';
            }
            $paragraphs[$index] .= $ad_code;
        }
    }

    return implode( '', $paragraphs );
}

 ?>
