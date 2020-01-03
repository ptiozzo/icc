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
echo date("d/m/Y H:i:s T",$currentDate);
echo " - oldDate: ";
echo date("d/m/Y H:i:s T",$oldDate);
echo "-->";

if ($oldDate > $currentDate && get_option('icc_realta_mappate_lastupdate')) {
  //Db aggiornato
	$dbDaAggiornare = 'no';
} else {
  //Db da aggiornare
	$dbDaAggiornare = 'yes';
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

<div id="carouselMappaMobile" class="carousel carousel-control-top slide" data-ride="carousel" data-interval="5000">
  <div class="slider-top bg-dark d-flex flex-row align-items-center justify-content-between mb-2">
    <a class="carousel-control-prev" href="#carouselMappaMobile" data-no-swup role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <ol class="carousel-indicators pr-2 text-white">
      <li data-target="#carouselMappaMobile" data-slide-to="0" class="text-white active">1</li>
      <?php
      $i = 1;
      foreach ($realtaMappateDecoded as $key): ?>
        <li data-target="#carouselMappaMobile" data-slide-to="<?php echo $i; ?>" class="text-white"><?php echo $i+1; ?></li>
        <?php $i++;
      endforeach;?>
      <p class=""> /<?php echo floor($i/2); ?></p>
    </ol>
    <a class="carousel-control-next" href="#carouselMappaMobile" data-no-swup role="button" data-slide="next">
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
                <div class='number'><?php
                  if (get_option('icc_mappa_reti_mappate')){
                    echo get_option('icc_mappa_reti_mappate');
                  } else{
                    echo "0";
                  } ?></div>
                <div class='text'> RETI</div>
              </div>
              <img src='<?php echo get_template_directory_uri();?>/assets/img/modules/home/transparent-hand.svg' alt='' title=''>
            </li>
            <li>
              <div class='info d-flex flex-column flex-md-row'>
                <div class='number'><?php
                  if (get_option('icc_mappa_realta_mappate')){
                    echo get_option('icc_mappa_realta_mappate');
                  } else{
                    echo "0";
                  } ?></div>
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

    <?php $i=0; foreach ($realtaMappateDecoded as $key):
      if ($i%2 == 0){ ?>
        <div class="carousel-item">
      <?php
      }
      ?>
        <article class="border-0 relta__mappata p-0 <?php if ($i%2 == 0) {echo "mb-7px";}?>">
          <img src="<?php echo $realtaMappateDecoded[$i]->img;?>" class="img-fluid p-0" alt="<?php echo $realtaMappateDecoded[$i]->nome; ?>">
          <div class="relta__mappata__detail text-white">
            <h5 class="relta__mappata_regione"><?php echo $realtaMappateDecoded[$i]->slugregione; ?></h5>
            <h5 class="relta__mappata_nome font-weight-bold"><?php echo $realtaMappateDecoded[$i]->nome; ?></h5>
          </div>
          <a href="<?php echo home_url(); ?>/mappa/<?php echo $realtaMappateDecoded[$i]->slugregione;?>/<?php echo $realtaMappateDecoded[$i]->slugrealta;?>" class="stretched-link"></a>
          <?php // echo $realtaMappateDecoded[$i]->slugregione; ?>
          <?php // echo $realtaMappateDecoded[$i]->slugrealta; ?>
        </article>
        <?php if ($i%2 == 1){ ?>
          </div>
        <?php }
        $i++;
        if ($i >= 8){
          break;
        }
      endforeach;?>

    <?php if ($i%2 == 1){ ?>
      </div>
    <?php } ?>

  </div>
</div>
