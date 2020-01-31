<div class="col-xl-5ths4cols col-lg-9 col-md-8 col-12 text-break">
  <div class="row">
  <?php
  // Getting current date
  $currentDate = strtotime(date('Y-m-d H:i:s'));
  // Getting the value of old date + 24 hours
  $oldDate = get_option('icc_realta_mappate_liguria_lastupdate')+86400;
  echo "<!--";
  echo " CurrentDate;";
  echo date("d/m/Y H:i:s T",$currentDate);
  echo " - oldDate: ";
  echo date("d/m/Y H:i:s T",$oldDate);
  echo "-->";

  if ($oldDate > $currentDate && get_option('icc_realta_mappate_liguria_lastupdate')) {
    //Db aggiornato
    $dbDaAggiornare = 'no';
  } else {
    //Db da aggiornare
    $dbDaAggiornare = 'yes';
  }

  if (get_option('icc_realta_mappate_liguria') && $dbDaAggiornare == 'no'){
    $realtaMappate = get_option('icc_realta_mappate_liguria');
    echo "<!-- Raltà mappate esiste sul DB -->";
  }else{
    echo "<!-- DB da Aggiornare -->";
    $realtaMappate = wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=last&a=8'));
    update_option('icc_realta_mappate_liguria',$realtaMappate,'no');
    update_option('icc_realta_mappate_liguria_lastupdate',strtotime(date('Y-m-d H:i:s')),'no');
    echo "<!-- Aggiornato DB Raltà mappate -->";
  }
  ?>

  <?php $realtaMappateDecoded = json_decode($realtaMappate);

  $i=0; foreach ($realtaMappateDecoded as $key): ?>
  <div class="col-xl-3 col-lg-4 col-md-6 col-12 text-break realtaliguria">
    <div class="card border-0 p-0">
      <article class="p-0">
      <img class="img-fluid card-img-top mx-auto d-block p-1" src="<?php echo $realtaMappateDecoded[$i]->img;?>">
      <div class="card-body p-2 text-white">
        <div class="date text-capitalize"><?php echo date("d/m/Y",$realtaMappateDecoded[$i]->data); ?></div>
        <h5 class="card-title"><?php echo $realtaMappateDecoded[$i]->nome; ?></h5>
        <a href="<?php echo home_url(); ?>/mappa/<?php echo $realtaMappateDecoded[$i]->slugregione;?>/<?php echo $realtaMappateDecoded[$i]->slugrealta;?>" class="stretched-link"></a>
      </div>
      </article>
    </div>
  </div>
  <?php
  $i++;
  if ($i >= 8){
    break;
  }
  endforeach;?>
  </div>
</div>


<div class="col-xl-5ths col-lg-3 col-md-4 col-12 text-break">
  <div class="mb-2">
    <div class="pcc-pianfut">
      <h3>Pianeta Futuro</h3>
      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#LiguriaSegnalaProgetto">
         Segnala un progetto
      </button>
      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#LiguriaSegnalaEvento">
         Segnala un evento
      </button>
      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#LiguriaScendiPiazza">
         Scendi in piazza
      </button>
    </div>
  </div>
  <?php dynamic_sidebar('liguria'); ?>
</div>
