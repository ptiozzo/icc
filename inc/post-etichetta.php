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
}elseif (in_category('abitare')){
    echo 'Abitare';
}elseif (in_category('agricoltura')){
    echo 'Agricoltura';
}elseif (in_category('arte-cultura')){
    echo 'Arte e cultura';
}elseif (in_category('informazione-e-comunicazione')){
    echo 'Informazione e comunicazione';
}elseif (in_category('cicli-produttivi-rifiuti')){
    echo 'Cicli produttivi e rifiuti';
}elseif (in_category('economia')){
    echo 'Economia';
}elseif (in_category('educazione')){
    echo 'Educazione';
}elseif (in_category('energia')){
    echo 'Energia';
}elseif (in_category('integrazione-sociale')){
    echo 'Integrazione sociale';
}elseif (in_category('disabilita')){
    echo 'Disabilità';
}elseif (in_category('questione-di-genere')){
    echo 'Questione di genere';
}elseif (in_category('lavoro-imprenditoria')){
    echo 'Lavoro e imprenditoria';
}elseif (in_category('imprenditoria')){
    echo 'Imprenditoria';
}elseif (in_category('lavoro')){
    echo 'Lavoro';
}elseif (in_category('legalita')){
    echo 'Legalità';
}elseif (in_category('mobilita')){
    echo 'Mobilità';
}elseif (in_category('salute-alimentazione')){
    echo 'Salute e alimentazione';
}elseif (in_category('sostenibilita-ambientale')){
    echo 'Sostenibilità ambientale';
}elseif (in_category('ambiente')){
    echo 'Ambiente';
}elseif (in_category('animali')){
    echo 'Animali';
}elseif (in_category('clima')){
    echo 'Clima';
}elseif (in_category('stili-di-vita')){
    echo 'Stili di vita';
}elseif (in_category('viaggiare')){
    echo 'Viaggiare';
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
