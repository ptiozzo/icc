<div class="wrap">
  <?php
  if ($_POST['submit_button']){


    //aggiorno Reti mappate
    $reti = [
  		'{"value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=network&n=3180')).'", "text": "Action aid", "color": "#82C1BD", "slug": "action-aid"}',
  		'{"value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=network&n=3185')).'", "text": "Arcipelago scec", "color": "#1F8ABD", "slug": "arcipelago-scec"}',
  		'{"value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=network&n=3192')).'", "text": "Associazione botteghe del mondo", "color": "#8BCFBB", "slug": "associazione-botteghe-del-mondo"}',
  		'{"value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=network&n=3197')).'", "text": "Banca etica", "color": "#82C1BD", "slug": "banca-etica"}',
  		'{"value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=network&n=3181')).'", "text": "Banca del tempo", "color": "#BAE3B6", "slug": "banche-del-tempo"}',
  		'{"value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=network&n=3186')).'", "text": "Civilta\' contadina", "color": "#82C1BD", "slug": "civilta-contadina"}',
  		'{"value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=network&n=3193')).'", "text": "Comuni virtuosi", "color": "#63BABF", "slug": "comuni-virtuosi"}',
  		'{"value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=network&n=3198')).'", "text": "Genuino clandestino", "color": "#41B2C4", "slug": "genuino-clandestino"}',
  		'{"value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=network&n=3182')).'", "text": "Gruppo Acquisto Terreni", "color": "#73C6BE", "slug": "gruppo-acquisto-terreni"}',
  		'{"value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=network&n=3187')).'", "text": "Impact Hub", "color": "#2F8AB9", "slug": "impact-hub"}',
  		'{"value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=network&n=3194')).'", "text": "Libera", "color": "#2373B2", "slug": "libera"}',
  		'{"value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=network&n=3199')).'", "text": "Movimento per la decrescita felice", "color": "#B3D698", "slug": "movimento-per-la-decrescita-felice"}',
  		'{"value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=network&n=3183')).'", "text": "Reti di economia solidale", "color": "#BAE3B6", "slug": "rete-di-economia-solidale"}',
  		'{"value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=network&n=3190')).'", "text": "Rete Italiana Villaggi Ecologici", "color": "#73C6BE", "slug": "rete-italiana-villaggi-ecologici"}',
  		'{"value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=network&n=3195')).'", "text": "Rete sostenilita\' e salute", "color": "#41B2C4", "slug": "rete-sostenibilita-e-salute"}',
  		'{"value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=network&n=3200')).'", "text": "Salviamo il paesaggio", "color": "#63BABF", "slug": "salviamo-il-paesaggio"}',
  		'{"value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=network&n=3184')).'", "text": "Sentiero bioregionale", "color": "#0E88A8", "slug": "sentiero-bioregionale"}',
  		'{"value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=network&n=3191')).'", "text": "Transition italia", "color": "#82C1BD", "slug": "transition-italia"}',
  		'{"value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=network&n=3196')).'", "text": "Vivi Consapevole in Romagna", "color": "#63BABF", "slug": "vivi-consapevole-in-romagna"}',
  	];
  	update_option('icc_mappa_reti',$reti,'no');
  	update_option('icc_mappa_reti_lastupdate',strtotime(date('Y-m-d H:i:s')),'no');
    echo "Aggiornato <b>Reti mappate</b><br>";

    //aggiorno Realtà mappate per regioni
    $regioni = [
 	 	'{"id": "Path_632", "value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=count&a=7')).'", "text": "SARDEGNA", "color": "#65afbd", "slug": "sardegna"}',
 	 	'{"id": "Path_633", "value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=count&a=6')).'", "text": "SICILIA", "color": "#2f8ab9", "slug": "sicilia"}',
 	 	'{"id": "Path_643", "value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=count&a=5')).'", "text": "VENETO", "color": "#9cd4bc", "slug": "veneto"}',
 	 	'{"id": "Path_644", "value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=count&a=13')).'", "text": "EMILIA - ROMAGNA", "color": "#82c1bd", "slug": "emilia-romagna"}',
 	 	'{"id": "Path_645", "value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=count&a=11')).'", "text": "TRENTINO-ALTO ADIGE", "color": "#82c1bd", "slug": "trentino-alto-adige"}',
 	 	'{"id": "Path_646", "value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=count&a=10')).'", "text": "FRIULI - VENEZIA GIULIA", "color": "#8dc5c1", "slug": "friuli-venezia-giulia"}',
 	 	'{"id": "Path_647", "value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=count&a=14')).'", "text": "MARCHE", "color": "#63babf", "slug": "marche"}',
 	 	'{"id": "Path_648", "value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=count&a=16')).'", "text": "ABRUZZO", "color": "#0e88a8", "slug": "abruzzo"}',
 	 	'{"id": "Path_649", "value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=count&a=17')).'", "text": "MOLISE", "color": "#349ec0", "slug": "molise"}',
 	 	'{"id": "Path_650", "value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=count&a=15')).'", "text": "UMBRIA", "color": "#41b2c4", "slug": "umbria"}',
 	 	'{"id": "Path_651", "value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=count&a=12')).'", "text": "VALLE D\'AOSTA", "color": "#b3d698", "slug": "valle-d-aosta"}',
 	 	'{"id": "Path_652", "value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=count&a=4')).'", "text": "CAMPANIA", "color": "#2373b2", "slug": "campania"}',
 	 	'{"id": "Path_653", "value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=count&a=20')).'", "text": "CALABRIA", "color": "#2467ac", "slug": "calabria"}',
 	 	'{"id": "Path_654", "value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=count&a=19')).'", "text": "BASILICATA", "color": "#1f8abd", "slug": "basilicata"}',
 	 	'{"id": "Path_655", "value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=count&a=1')).'", "text": "LOMBARDIA", "color": "#8bcfbb", "slug": "lombardia"}',
 	 	'{"id": "Path_656", "value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=count&a=18')).'", "text": "PUGLIA", "color": "#2d79b3", "slug": "puglia"}',
 	 	'{"id": "Path_657", "value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=count&a=8')).'", "text": "LIGURIA", "color": "#93d4b9", "slug": "liguria"}',
 	 	'{"id": "Path_658", "value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=count&a=3')).'", "text": "LAZIO", "color": "#5ebfc1", "slug": "lazio"}',
 	 	'{"id": "Path_659", "value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=count&a=2')).'", "text": "PIEMONTE", "color": "#bae3b6", "slug": "piemonte"}',
 	 	'{"id": "Path_660", "value": "'.wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=count&a=9')).'", "text": "TOSCANA", "color": "#7fd1c9", "slug": "toscana"}',
 	 ];
 	 update_option('icc_mappa_regioni',$regioni,'no');
 	 update_option('icc_mappa_regioni_lastupdate',strtotime(date('Y-m-d H:i:s')),'no');
   echo "Aggiornato <b>Realtà mappate per regioni</b><br>";

    //aggiorno totale realtà mappate
    $realta_mappate = 0;
    foreach ($regioni as $key => $value):
     $value = json_decode($value);
     $realta_mappate += $value->value;
    endforeach;
    update_option('icc_mappa_realta_mappate',$realta_mappate,'no');
    echo "Aggiornato <b>Totale realtà mappate</b><br>";


    //aggiorno totale reti mappate
    $reti_mappate = 0;
    foreach ($reti as $key => $value):
     $reti_mappate ++;
    endforeach;
    update_option('icc_mappa_reti_mappate',$reti_mappate,'no');
    echo "Aggiornato <b>Totale reti mappate</b><br>";

    //aggiorno ultime realtà mappate nazionale
    $realtaMappate = wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=last'));
    update_option('icc_realta_mappate',$realtaMappate,'no');
    update_option('icc_realta_mappate_lastupdate',strtotime(date('Y-m-d H:i:s')),'no');
    echo "Aggiornato <b>Ultime realtà mappate nazionale (home)</b><br>";

    //aggiorno ultime realtà mappate casentino
    $realtaMappate = wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=last&a=21'));
    update_option('icc_realta_mappate_casentino',$realtaMappate,'no');
    update_option('icc_realta_mappate_casentino_lastupdate',strtotime(date('Y-m-d H:i:s')),'no');
    echo "Aggiornato <b>Ultime realtà mappate casentino</b><br>";

    //aggiorno ultime realtà mappate piemonte
    $realtaMappate = wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=last&a=2'));
    update_option('icc_realta_mappate_piemonte',$realtaMappate,'no');
    update_option('icc_realta_mappate_piemonte_lastupdate',strtotime(date('Y-m-d H:i:s')),'no');
    echo "Aggiornato <b>Ultime realtà mappate piemonte</b><br>";

    //aggiorno ultime realtà mappate liguria
    $realtaMappate = wp_remote_retrieve_body(wp_remote_get('https://api.pianetafuturo.it/data/map.php?pk=icc396719&action=last&a=8'));
    update_option('icc_realta_mappate_liguria',$realtaMappate,'no');
    update_option('icc_realta_mappate_liguria_lastupdate',strtotime(date('Y-m-d H:i:s')),'no');
    echo "Aggiornato <b>Ultime realtà mappate liguria</b><br>";
  }

  ?>
  <h2>Tema</h2>
  <p>Tema costruito per il sito italiachecambia.org</p>
  <h2>Aggiornamenti dati tramite API di pianetafuturo</h2>
  <p><b>Totale realtà mappate</b></p>
  <p><?php echo get_option('icc_mappa_realta_mappate'); ?></p>
  <p><b>Totale reti mappate</b></p>
  <p><?php echo get_option('icc_mappa_reti_mappate'); ?></p>
  <p><b>Mappa per regione</b></p>
  <p><?php echo date("d/m/Y H:i:s T",get_option('icc_mappa_regioni_lastupdate')); ?></p>
  <p><b>Mappa per reti</b></p>
  <p><?php echo date("d/m/Y H:i:s T",get_option('icc_mappa_reti_lastupdate')); ?></p>
  <p><b>Ultime realtà mappate nazionale (home)</b></p>
  <p><?php echo date("d/m/Y H:i:s T",get_option('icc_realta_mappate_lastupdate')); ?></p>
  <p><b>Ultime realtà mappate casentino (home)</b></p>
  <p><?php echo date("d/m/Y H:i:s T",get_option('icc_realta_mappate_casentino_lastupdate')); ?></p>
  <p><b>Ultime realtà mappate piemonte (home)</b></p>
  <p><?php echo date("d/m/Y H:i:s T",get_option('icc_realta_mappate_piemonte_lastupdate')); ?></p>
  <p><b>Ultime realtà mappate liguria (home)</b></p>
  <p><?php echo date("d/m/Y H:i:s T",get_option('icc_realta_mappate_liguria_lastupdate')); ?></p>

  <form class="pt-2 form-inline" method="post" action="<?php echo get_pagenum_link(); ?>">
    <input name="submit_button" type="Submit" value="Aggiorna dati" class="btn btn-secondary">
  </form>
</div>
