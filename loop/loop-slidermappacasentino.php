<div class='head'>
  <div class='title'>
    <h5>LA MAPPA DEL CASENTINO CHE CAMBIA</h5>
  </div>
</div>
<?php
// Getting current date
$currentDate = strtotime(date('Y-m-d H:i:s'));
// Getting the value of old date + 24 hours
$oldDate = get_option('icc_realta_mappate_casentino_lastupdate')+86400;
echo "<!--";
echo " CurrentDate;";
echo date("d/m/Y H:i:s T",$currentDate);
echo " - oldDate: ";
echo date("d/m/Y H:i:s T",$oldDate);
echo "-->";

if ($oldDate > $currentDate && get_option('icc_realta_mappate_casentino_lastupdate')) {
  //Db aggiornato
	$dbDaAggiornare = 'no';
} else {
  //Db da aggiornare
	$dbDaAggiornare = 'yes';
}

if (get_option('icc_realta_mappate_casentino') && $dbDaAggiornare == 'no'){
	$realtaMappate = get_option('icc_realta_mappate_casentino');
	echo "<!-- Raltà mappate esiste sul DB -->";
}else{
	echo "<!-- DB da Aggiornare -->";
  $realtaMappate = wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=last&a=21'));
  update_option('icc_realta_mappate_casentino',$realtaMappate,'no');
	update_option('icc_realta_mappate_casentino_lastupdate',strtotime(date('Y-m-d H:i:s')),'no');
  echo "<!-- Aggiornato DB Raltà mappate -->";
}

?>

<?php $realtaMappateDecoded = json_decode($realtaMappate);?>

<div id="carouselMappa" class="carousel carousel-control-top slide" data-ride="carousel" data-interval="false">
  <div class="slider-top bg-dark d-flex flex-row align-items-center justify-content-between mb-2">
    <a class="carousel-control-prev" href="#carouselMappa" data-no-swup role="button" data-slide="prev">
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
      <p class=""> /<?php echo floor($i/2+1); ?></p>
    </ol>
    <a class="carousel-control-next" href="#carouselMappa" data-no-swup role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <article>
          <figure>
            <a href="<?php echo home_url(); ?>/casentino/mappa/"><img class="img-fluid" src='<?php echo get_template_directory_uri();?>/assets/img/modules/casentino/Casentino-mappa.jpg' alt='' title=''></a>
          </figure>
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
        <?php } ?>
        <?php $i++;?>
    <?php endforeach;?>

    <?php if ($i%2 == 1){ ?>
      </div>
    <?php } ?>

  </div>
</div>
