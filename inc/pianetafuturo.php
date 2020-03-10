<?php

// Parent Function that makes the magic happen
function banner_pianetafuturo() {
            $ad_code = '<div class="single__pianetafuturo mb-2 d-flex flex-column">';
            if (in_category('piemonte-che-cambia')){
              $ad_code .= "<div class='d-flex flex-column flex-md-row justify-content-center align-items-center'><img class='img-fluid ml-1 my-1'  src='". get_template_directory_uri() ."/assets/img/modules/pianetafuturo/pianetafuturo.png' title='' alt=''>";
              $ad_code .= "<img class='img-fluid'  src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''></div>";
              $ad_code .= "<p class='px-lg-5 py-2 my-0 text-center'>Scopri la piattaforma della <b>comunity</b> di Italia che Cambia in Piemonte</p>";
              $ad_code .= '<a href="https://piemonte.pianetafuturo.it" class="stretched-link"></a>';
            }
            elseif (in_category('casentino-che-cambia')){
              $ad_code .= "<div class='d-flex flex-column flex-md-row justify-content-center align-items-center'><p class='single__pianetafuturo2 px-lg-5 pl-2 my-0'>pianeta<b>futuro</b></p>";
              $ad_code .= "<img class='img-fluid'  src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''></div>";
              $ad_code .= "<p class='px-lg-5 py-2 my-0 text-center'>Scopri la piattaforma della <b>comunity</b> di Italia che Cambia in Piemonte</p>";
              $ad_code .= '<a href="https://casentino.pianetafuturo.it" class="stretched-link"></a>';
            }
            elseif (in_category('liguria-che-cambia')){
              $ad_code .= "<div class='d-flex flex-column flex-md-row justify-content-center align-items-center'><p class='single__pianetafuturo2 px-lg-5 pl-2 my-0'>pianeta<b>futuro</b></p>";
              $ad_code .= "<img class='img-fluid'  src='". get_template_directory_uri() ."/assets/img/icons/multi-right-arrow.svg' title='' alt=''></div>";
              $ad_code .= "<p class='px-lg-5 py-2 my-0 text-center'>Scopri la piattaforma della <b>comunity</b> di Italia che Cambia in Piemonte</p>";
              $ad_code .= '<a href="https://liguria.pianetafuturo.it" class="stretched-link"></a>';
            }

            $ad_code .= '</div>';


            echo $ad_code;
}


 ?>
