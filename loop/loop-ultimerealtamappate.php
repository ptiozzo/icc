<div class="content chain-effect scale">
  <div class="head chain-effect scale">
    <h2>Ultime Realtà Mappate</h2>
  </div><br>

  <div class="row mb-3">


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

  if ($oldDate > $currentDate && get_option('icc_realta_mappate_astupdate')) {
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

  <?php $realtaMappateDecoded = json_decode($realtaMappate);

  $i=0; foreach ($realtaMappateDecoded as $key): ?>
  <div class="col-xl-5ths col-lg-3 col-md-4 col-sm-6 text-break">
    <div class="card border-0 p-0">
      <article class="p-0">
      <img class="img-fluid card-img-top mx-auto d-block p-1" src="<?php echo $realtaMappateDecoded[$i]->img;?>">
      <div class="card-body p-0">
        <div class='date'><?php echo $realtaMappateDecoded[$i]->slugregione; ?></div>
        <h5 class="card-title"><?php echo $realtaMappateDecoded[$i]->nome; ?></h5>
        <a href="<?php echo home_url(); ?>/mappa/<?php echo $realtaMappateDecoded[$i]->slugregione;?>/<?php echo $realtaMappateDecoded[$i]->slugrealta;?>" class="stretched-link"><div class="cta">Leggi di più</div></a>
      </div>
      </article>
    </div>
  </div>
  <?php
  $i++;
  if ($i >= 5){
    break;
  }
  endforeach;?>

  </div>
</div>
