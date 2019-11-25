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
	echo "<!-- Raltà mappate esiste sul DB -->";
}else{
	echo "<!-- DB da Aggiornare -->";
  $realtaMappate = wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=last'));
  update_option('icc_realta_mappate',$realtaMappate,'no');
	update_option('icc_realta_mappate_lastupdate',strtotime(date('Y-m-d H:i:s')),'no');
  echo "<!-- Aggiornato DB Raltà mappate -->";
}

?>

<?php $realtaMappateDecoded = json_decode($realtaMappate);?>

<div id="carouselMappa" class="carousel carousel-control-top slide" data-ride="carousel" data-interval="false">
  <div class="slider-top bg-dark d-flex flex-row align-items-center justify-content-between mb-2">
    <a class="carousel-control-prev" href="#carouselMappa" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <ol class="carousel-indicators pr-2 text-white">
      <li data-target="#carouselMappa" data-slide-to="0" class="text-white active">1</li>
      <?php
      $i = 1;
      foreach ($realtaMappateDecoded as $key): ?>
        <li data-target="#carouselMappa" data-slide-to="<?php echo $i; ?>" class="text-white"><?php echo $i+1; ?></li>
        <?php $i++;
      endforeach;?>
      <p class=""> /<?php echo $i; ?></p>
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

    <?php $i=0; foreach ($realtaMappateDecoded as $key): ?>
      <div class="carousel-item">
        <article class="card border-0">
          <img src="<?php echo get_template_directory_uri();?>/assets/img/regioni/<?php echo $realtaMappateDecoded[$i]->slugregione; ?>.svg" class="regione-slider">
          <img src="<?php echo $realtaMappateDecoded[$i]->img;?>" class="card-img-top img-fluid p-0" alt="<?php echo $realtaMappateDecoded[$i]->nome; ?>">
          <div class="card-body pt-0">
            <h5 class="card-title"><?php echo $realtaMappateDecoded[$i]->nome; ?></h5>
            <a href="<?php echo home_url(); ?>/mappa/<?php echo $realtaMappateDecoded[$i]->slugregione;?>/<?php echo $realtaMappateDecoded[$i]->slugrealta;?>" class="stretched-link">
              <div class="cta mt-2">Leggi di più</div>
            </a>
          </div>
          <?php // echo $realtaMappateDecoded[$i]->slugregione; ?>
          <?php // echo $realtaMappateDecoded[$i]->slugrealta; ?>
          <?php $i++;?>
        </article>
      </div>
    <?php endforeach;?>
  </div>
</div>
