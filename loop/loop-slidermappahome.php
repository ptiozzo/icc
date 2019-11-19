<div class='head'>
  <div class='title'>
    <h5>LA MAPPA DELL’ITALIA CHE CAMBIA</h5>
  </div>
</div>
<?php
// Getting current date
$currentDate = strtotime(date('Y-m-d H:i:s'));
// Getting the value of old date + 24 hours
$oldDate = get_option('icc_realta_mappate_lastupdate')+86400;
echo "<!--";
echo " CurrentDate;";
echo $currentDate;
echo " - oldDate: ";
echo $oldDate;
echo "-->";

if ($oldDate > $currentDate && get_option('icc_realta_mappate_lastupdate')) {
  //Db aggiornato
	$dbDaAggiornare = 'no';
} else {
  //Db da aggiornare
	$dbDaAggiornare = 'yes';

	$to = 'ptiozzo@me.com';
	$subject = '[ICC] Aggiornato ultime realtà mappate';
	$body = "I dati relativi alle ultime realtà mappate sono stati aggiornati";
	$headers = array('Content-Type: text/html; charset=UTF-8');

	//wp_mail( $to, $subject, $body, $headers );
}

if (get_option('icc_realta_mappate') && $dbDaAggiornare == 'no'){
	$realtaMappate = get_option('icc_realta_mappate');
	echo "<!-- Raltà mappate esiste sul DB, DB Aggiornato -->";
}else{
	echo "<!-- DB da Aggiornare -->";
  $realtaMappate = wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=last'));
  $realtaMappate = [
    '{ "nome" : "Focus Cooperativa", "slugregione" : "liguria", "slugrealta" : "focus", "img" : "https://www.pianetafuturo.it/uploads/pagine/focus.jpg" }',
    '{ "nome" : "Open011", "slugregione" : "piemonte", "slugrealta" : "open011", "img" : "https://www.pianetafuturo.it/uploads/pagine/open011.jpg" }',
    '{ "nome" : "MondoQui", "slugregione" : "piemonte", "slugrealta" : "mondoqui", "img" : "https://www.pianetafuturo.it/uploads/pagine/mondoqui.jpg" }',
    '{ "nome" : "Scuola nel Bosco di Pianoro", "slugregione" : "emilia-romagna", "slugrealta" : "scuola-nel-bosco-di-pianoro", "img" : "https://www.pianetafuturo.it/uploads/pagine/scuola-nel-bosco-di-pianoro.jpg" }',
    '{ "nome" : "Rete Olistica Livorno", "slugregione" : "toscana", "slugrealta" : "rete-olistica-livorno", "img" : "https://www.pianetafuturo.it/uploads/pagine/rete-olistica-livorno.jpg" }',  
  ];
  echo $realtaMappate;
  update_option('icc_realta_mappate',$realtaMappate,'no');
	update_option('icc_realta_mappate_lastupdate',strtotime(date('Y-m-d H:i:s')),'no');
}

?>


<div id="carouselMappa" class="carousel carousel-control-top slide" data-ride="carousel" data-interval="false">
  <div class="slider-top bg-dark d-flex flex-row align-items-center justify-content-between mb-2">
    <a class="carousel-control-prev" href="#carouselMappa" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <ol class="carousel-indicators pr-2 text-white">
      <li data-target="#carouselMappa" data-slide-to="0" class="text-white active">1</li>
      <p class=""> /1</p>
    </ol>
    <a class="carousel-control-next" href="#carouselMappa" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <article>
        <div class='left'>
          <ul class='list'>
            <li>
              <div class='info'>
                <div class='number'>19</div>
                <div class='text'> RETI</div>
              </div>
              <img src='<?php echo get_template_directory_uri();?>/assets/img/modules/home/transparent-hand.svg' alt='' title=''>
            </li>
            <li>
              <div class='info d-flex flex-column flex-md-row'>
                <div class='number'>2375</div>
                <div class='text'> REALTÀ</div>
              </div>
            </li>
            <li>
              <a class='cta' href='<?php echo home_url(); ?>/mappa/' target='_blank'>VAI ALLA MAPPA</a>
            </li>
          </ul>
        </div>
        <div class='right'>
          <figure>
            <img src='<?php echo get_template_directory_uri();?>/assets/img/modules/home/italy-map.svg' alt='' title=''>
          </figure>
        </div>
      </article>
    </div>
  </div>
</div>
