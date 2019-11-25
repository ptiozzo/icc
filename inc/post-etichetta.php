<?php

if ( get_post_type( get_the_ID() ) == 'rassegna-stampa') {
  echo 'Rassegna stampa';
}elseif (in_category('piemonte-che-cambia')){
  echo 'Articoli - Piemonte';
}elseif (in_category('casentino-che-cambia')){
  echo 'Articoli - Casentino';
}elseif (in_category('liguria-che-cambia')){
    echo 'Articoli - Liguria';
}elseif (in_category('appunti-viaggio')){
    echo 'Appunti di viaggio';
}elseif (in_category('diari-di-bordo-maestro-di-strada')){
    echo 'Maestro di strada';
}elseif (in_category('dizionario-eretico')){
    echo 'Dizionario eretico';
}elseif (in_category('economia-bene-comune')){
    echo 'Economia del bene comune';
}elseif (in_category('blog')){
    echo 'In diretta dal camper';
}elseif (in_category('in-un-flash')){
    echo 'Rubrica - In un flash';
}elseif (in_category('in-viaggio')){
    echo 'Rubrica - In viaggio';
}elseif (in_category('invece-si-puo')){
    echo 'Rubrica - Invece si può!';
}elseif (in_category('via-uscita-dentro')){
    echo 'La via d\'uscita è dentro';
}elseif (in_category('voce-astice')){
    echo 'La Voce dell\'Astice';
}elseif (in_category('mondo-chiama-italia')){
    echo 'Mondo chiama Italia';
}elseif (in_category('pensare-altro')){
    echo 'Rubrica - Pensare altro';
}elseif (in_category('pillole-transizione')){
    echo 'Pillole per la Transizione';
}elseif (in_category('salute-che-cambia')) {
    echo 'Salute';
}elseif (in_category('terranave')){
    echo 'Rubrica - Terranave';
}elseif (in_category('una-favola-puo-fare')){
    echo 'Una favola può fare';
}elseif (in_category('voci-italia-che-cambia')){
    echo 'Voci da Italia che cambia';
}elseif (in_category('documentari')) {
  echo 'I documentari';
}elseif (in_category('io-faccio-cosi')) {
  echo 'Io faccio così';
}elseif (in_category('meme')) {
  echo 'I meme';
}elseif (in_category('rubriche')) {
  echo 'Le rubriche';
}elseif (in_category('articoli')) {
  echo 'Gli Articoli';
}



?>
