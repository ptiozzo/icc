<?php

if (in_category('documentari')) {
  echo 'I documentari';
}elseif (in_category('io-faccio-cosi')) {
  echo 'Io faccio così';
}elseif (in_category('meme')) {
  echo 'I meme';
}elseif (in_category('rubriche')) {
  echo 'Le rubriche';
}elseif (in_category('salute-che-cambia')) {
  echo 'Salute';
}elseif (in_category('articoli')) {
  echo 'Gli Articoli';
}elseif (in_category('piemonte-che-cambia')){
  echo 'Articoli - Piemonte';
}elseif (in_category('casentino-che-cambia')){
  echo 'Articoli - Casentino';
}elseif (in_category('liguria-che-cambia')){
    echo 'Articoli - Liguria';
}elseif ( get_post_type( get_the_ID() ) == 'rassegna-stampa') {
  echo 'Io non mi rassegno';
}
?>
