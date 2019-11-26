<div class="wrap">
  <h2>Tema</h2>
  <p>Tema costruito per il sito italiachecambia.org</p>
  <h2>Aggiornamenti dati tramite API di pianetafuturo</h2>
  <p><b>Mappa per regione</b></p>
  <p><?php echo date("d/m/Y H:i:s T",get_option('icc_mappa_regioni_lastupdate')); ?></p>
  <p><b>Mappa per reti</b></p>
  <p><?php echo date("d/m/Y H:i:s T",get_option('icc_mappa_reti_lastupdate')); ?></p>
  <p><b>Ultime realtà mappate (home)</b></p>
  <p><?php echo date("d/m/Y H:i:s T",get_option('icc_realta_mappate_lastupdate')); ?></p>
</div>
