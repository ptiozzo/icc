<?php

if ( get_post_type( get_the_ID() ) == 'rassegna-stampa') {
  echo 'Rassegna stampa';
}elseif (has_category('alessandria')){
  echo 'News da Alessandria';
}elseif (has_category('asti')){
  echo 'News da Asti';
}elseif (has_category('biella')){
  echo 'News da Biella';
}elseif (has_category('cuneo')){
  echo 'News da Cuneo';
}elseif (has_category('novara')){
  echo 'News da Novara';
}elseif (has_category('torino')){
  echo 'News da Torino';
}elseif (has_category('verbania')){
  echo 'News dal verbano';
}elseif (has_category('vercelli')){
  echo 'News da Vercelli';
}elseif (has_category('piemonte-che-cambia')){
  echo 'News dal Piemonte';
}elseif (has_category('casentino-che-cambia')){
  echo 'News dal Casentino';
}elseif (has_category('genova')){
  echo 'News da Genova';
}elseif (has_category('imperia')){
  echo 'News da Imperia';
}elseif (has_category('savona')){
  echo 'News da Savona';
}elseif (has_category('laspezia')){
  echo 'News da La Spezia';
}elseif (has_category('liguria-che-cambia')){
  echo 'News dalla Liguria';
}elseif (has_tag('matrix-dentro-di-noi')){
  echo 'Matrix è dentro di noi';
}elseif (has_tag('appunti-viaggio')){
  echo 'Appunti di viaggio';
}elseif (has_tag('diari-di-bordo-maestro-di-strada')){
  echo 'Maestro di strada';
}elseif (has_tag('dizionario-eretico')){
  echo 'Dizionario eretico';
}elseif (has_tag('blog')){
  echo 'In diretta dal camper';
}elseif (has_tag('in-un-flash')){
  echo 'Rubrica - In un flash';
}elseif (has_tag('in-viaggio')){
  echo 'Rubrica - In viaggio';
}elseif (has_tag('invece-si-puo')){
  echo 'Rubrica - Invece si può!';
}elseif (has_tag('via-uscita-dentro')){
  echo 'La via d\'uscita è dentro';
}elseif (has_tag('voce-astice')){
  echo 'La Voce dell\'Astice';
}elseif (has_tag('mondo-chiama-italia')){
  echo 'Mondo chiama Italia';
}elseif (has_tag('pensare-altro')){
  echo 'Rubrica - Pensare altro';
}elseif (has_tag('pillole-transizione')){
  echo 'Pillole per la Transizione';
}elseif (has_tag('terranave')){
  echo 'Rubrica - Terranave';
}elseif (has_tag('una-favola-puo-fare')){
    echo 'Una favola può fare';
}elseif (has_tag('voci-italia-che-cambia')){
  echo 'Voci da Italia che cambia';
}elseif (has_tag('documentari')) {
  echo 'I documentari';
}elseif (has_tag('io-faccio-cosi')) {
  echo 'Io faccio così';
}elseif (has_tag('meme')) {
  echo 'I meme';
}else{
  echo get_the_category()[0]->cat_name;
  //var_dump( get_the_category());
}



?>
