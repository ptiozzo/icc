<?php
/**
 * Template Name: Reti Mappate
 */
require 'header.php';

//echo get_query_var( 'par1' );
//echo "<br>";
//echo get_query_var( 'par2' );

if (get_query_var( 'par1' )) {

	$codici_regioni = array( "abruzzo" => 16,
							 "basilicata" => 19,
							 "calabria" => 20,
							 "campania" => 4,
							 "emilia-romagna" => 13,
							 "friuli-venezia-giulia" => 10,
							 "lazio" => 3,
							 "liguria" => 8,
							 "lombardia" => 1,
							 "marche" => 14,
							 "molise" => 17,
							 "piemonte" => 2,
							 "puglia" => 18,
							 "sardegna" => 7,
							 "sicilia" => 6,
							 "toscana" => 9,
							 "casentino" => 21,
							 "trentino-alto-adige" => 11,
							 "umbria" => 15,
							 "valle-d-aosta" => 12,
							 "veneto" => 5 );

	$codici_reti = array( "action-aid" => 3180,
						  "arcipelago-scec" => 3185,
						  "associazione-botteghe-del-mondo" => 3192,
						  "banca-etica" => 3197,
						  "banche-del-tempo" => 3181,
						  "civilta-contadina" => 3186,
						  "comuni-virtuosi" => 3193,
						  "genuino-clandestino" => 3198,
						  "gruppo-acquisto-terreni" => 3182,
						  "impact-hub" => 3187,
						  "libera" => 3194,
						  "movimento-per-la-decrescita-felice" => 3199,
						  "rete-di-economia-solidale" => 3183,
						  "rete-italiana-villaggi-ecologici" => 3190,
						  "rete-sostenibilita-e-salute" => 3195,
						  "salviamo-il-paesaggio" => 3200,
						  "sentiero-bioregionale" => 3184,
						  "transition-italia" => 3191,
						  "vivi-consapevole-in-romagna" => 3196 );

	$key_filtro = get_query_var( 'par1' );

	$open = "";
	if (get_query_var( 'par2' )) {

		$slug_realta = get_query_var( 'par2' );
		// check stringa valida con regexp
		// riempire variabile open
	}

	if (isset($codici_regioni[$key_filtro])) {
		echo '<iframe style="border: 0px; width:100%; height: 80vh;" src="https://api.pianetafuturo.it/widget/map/std2.php?a='.$codici_regioni[$key_filtro].'&tagoverride=1&sidebar=1'.$open.'"></iframe>';
	} else {
		if (isset($codici_reti[$key_filtro])) {
			echo '<iframe style="border: 0px; width:100%; height: 80vh;" src="https://api.pianetafuturo.it/widget/map/std2.php?n='.$codici_reti[$key_filtro].'&tagoverride=1&sidebar=1"></iframe>';
		} else echo "ERRORE Rete o regione inesistente";
	}

} else {

$reti = [
	'{"value": "38", "text": "Action aid", "color": "#82C1BD", "slug": "action-aid"}',
	'{"value": "12", "text": "Arcipelago scec", "color": "#1F8ABD", "slug": "arcipelago-scec"}',
	'{"value": "50", "text": "Associazione botteghe del mondo", "color": "#8BCFBB", "slug": "associazione-botteghe-del-mondo"}',
	'{"value": "41", "text": "Banca etica", "color": "#82C1BD", "slug": "banca-etica"}',
	'{"value": "104", "text": "Banca del tempo", "color": "#BAE3B6", "slug": "banche-del-tempo"}',
	'{"value": "14", "text": "Civilta\' contadina", "color": "#82C1BD", "slug": "civilta-contadina"}',
	'{"value": "60", "text": "Comuni virtuosi", "color": "#63BABF", "slug": "comuni-virtuosi"}',
	'{"value": "24", "text": "Genuino clandestino", "color": "#41B2C4", "slug": "genuino-clandestino"}',
	'{"value": "3", "text": "Gruppo Acquisto Terreni", "color": "#73C6BE", "slug": "gruppo-acquisto-terreni"}',
	'{"value": "7", "text": "Impact Hub", "color": "#2F8AB9", "slug": "impact-hub"}',
	'{"value": "109", "text": "Libera", "color": "#2373B2", "slug": "libera"}',
	'{"value": "47", "text": "Movimento per la decrescita felice", "color": "#B3D698", "slug": "movimento-per-la-decrescita-felice"}',
	'{"value": "23", "text": "Reti di economia solidale", "color": "#BAE3B6", "slug": "rete-di-economia-solidale"}',
	'{"value": "23", "text": "Rete Italiana Villaggi Ecologici", "color": "#73C6BE", "slug": "rete-italiana-villaggi-ecologici"}',
	'{"value": "30", "text": "Rete sostenilita\' e salute", "color": "#41B2C4", "slug": "rete-sostenibilita-e-salute"}',
	'{"value": "111", "text": "Salviamo il paesaggio", "color": "#63BABF", "slug": "salviamo-il-paesaggio"}',
	'{"value": "11", "text": "Sentiero bioregionale", "color": "#0E88A8", "slug": "sentiero-bioregionale"}',
	'{"value": "18", "text": "Transition italia", "color": "#82C1BD", "slug": "transition-italia"}',
	'{"value": "66", "text": "Vivi Consapevole in Romagna", "color": "#63BABF", "slug": "vivi-consapevole-in-romagna"}',
];

/**
 * Mappa regioni
 */
 $regioni = [
 	'{"id": "Path_632", "value": "184", "text": "SARDEGNA", "color": "#65afbd", "slug": "sardegna"}',
 	'{"id": "Path_633", "value": "38", "text": "SICILIA", "color": "#2f8ab9", "slug": "sicilia"}',
 	'{"id": "Path_643", "value": "12", "text": "VENETO", "color": "#9cd4bc", "slug": "veneto"}',
 	'{"id": "Path_644", "value": "50", "text": "EMILIA - ROMAGNA", "color": "#82c1bd", "slug": "emilia-romagna"}',
 	'{"id": "Path_645", "value": "41", "text": "TRENTINO-ALTO ADIGE", "color": "#82c1bd", "slug": "trentino-alto-adige"}',
 	'{"id": "Path_646", "value": "104", "text": "FRIULI - VENEZIA GIULIA", "color": "#8dc5c1", "slug": "friuli-venezia-giulia"}',
 	'{"id": "Path_647", "value": "14", "text": "MARCHE", "color": "#63babf", "slug": "marche"}',
 	'{"id": "Path_648", "value": "60", "text": "ABRUZZO", "color": "#0e88a8", "slug": "abruzzo"}',
 	'{"id": "Path_649", "value": "24", "text": "MOLISE", "color": "#349ec0", "slug": "molise"}',
 	'{"id": "Path_650", "value": "3", "text": "UMBRIA", "color": "#41b2c4", "slug": "umbria"}',
 	'{"id": "Path_651", "value": "7", "text": "VALLE D\'AOSTA", "color": "#b3d698", "slug": "valle-daosta"}',
 	'{"id": "Path_652", "value": "109", "text": "CAMPANIA", "color": "#2373b2", "slug": "campania"}',
 	'{"id": "Path_653", "value": "47", "text": "CALABRIA", "color": "#2467ac", "slug": "calabria"}',
 	'{"id": "Path_654", "value": "90", "text": "BASILICATA", "color": "#1f8abd", "slug": "basilicata"}',
 	'{"id": "Path_655", "value": "23", "text": "LOMBARDIA", "color": "#8bcfbb", "slug": "lombardia"}',
 	'{"id": "Path_656", "value": "30", "text": "PUGLIA", "color": "#2d79b3", "slug": "puglia"}',
 	'{"id": "Path_657", "value": "111", "text": "LIGURIA", "color": "#93d4b9", "slug": "liguria"}',
 	'{"id": "Path_658", "value": "11", "text": "LAZIO", "color": "#5ebfc1", "slug": "lazio"}',
 	'{"id": "Path_659", "value": "18", "text": "PIEMONTE", "color": "#bae3b6", "slug": "piemonte"}',
 	'{"id": "Path_660", "value": "65", "text": "TOSCANA", "color": "#7fd1c9", "slug": "toscana"}',
 ];
 ?>

 <?php require 'header.php'; ?>

 <main class="mappa" data-parallax='{"hook": ".8", "showIndicators": false, "progCallback": "default"}'>

 	<section class="sezione-mappa">
 		<div class="head chain-effect scale">
 			<h1>Mappa Italia che Cambia</h1>
 		</div>

 		<div class="content">
 			<div class="left chain-effect scale">
 				<div class="title">
 					<small>
 						CLICCA UNA REGIONE
 					</small>
 				</div>
 				<div class="map-container">
 					<figure class="map-svg">
 						<?php require 'assets/img/svg/italy-map.svg'; ?>

 						<?php foreach ($regioni as $key => $value): ?>
 							<?php $value = json_decode($value) ?>
 							<style>
 								<?php echo '#' . $value->id ?> {
 									fill: <?php echo $value->color ?>
 								}
 							</style>
 						<?php endforeach ?>
 					</figure>
 				</div>
 				<div class="info">
 					<div class="realta col">
 						<h3 class="value">
 							2092
 						</h3>
 						<span>
 							REALTÀ
 						</span>
 					</div>
 					<div class="reti col">
 						<h3 class="value">
 							18
 						</h3>
 						<span>
 							RETI
 						</span>
 					</div>
 				</div>
 			</div>
 			<div class="right chain-effect scale">
 				<div class="title">
 					<small>
 						FILTRA LA MAPPA
 					</small>
 				</div>
 				<div class="content">
 					<p>
 						La mappa dell’Italia che cambia raccoglie le centinaia di realtà
 						che abbiamo incontrato durante i nostri viaggi o che ci sono
 						state segnalate: imprese, associazioni, comitati, persone che stanno contribuendo a cambiare in meglio il nostro paese.
 					</p>
 					<p>
 						Alcune di queste esperienze fanno parti di reti, altre sono singole iniziative.Navigando al suo interno puoi conoscere le realtà più vicine a te, oppure scoprire cosa succede in altre zone d’Italia.
 					</p>
 					<p>
 						Spesso chi vive in un territorio non ha la minima idea di cosa
 						accada intorno a sé e gli stessi protagonisti del cambiamento
 						non sanno che esistono altri soggetti che lavorano per obiettivi
 						simili e complementari.
 					</p>
 					<p>
 						La mappa è navigabile per categoria, per regione e per reti.
 						Per iniziare clicca su una delle regioni oppure seleziona dal box
 						qui sopra la categoria o la rete che vuoi cercare. Buona
 						navigazione nella mappa dell’Italia che Cambia!
 					</p>
 				</div>
 			</div>
 		</div>
 	</section>

 	<section class="sezione-reti-mappate">
 		<div class="head chain-effect scale">
 			<h1>Le Reti Mappate</h1>
 		</div>

 		<div class="content chain-effect scale">
 			<ul class="reti">
 				<?php foreach ($reti as $key => $value): ?>
 					<?php $value = json_decode($value) ?>
					<a href="http://www.italiachecambia.org/mappa/<?php echo $value->slug ?>">
 					<li class="rete" style="background: <?php echo $value->color ?>">
 						<h3 class="value">
 							<?php echo $value->value ?>
 						</h3>
 						<span>
 							<?php echo strtoupper($value->text) ?>
 						</span>
 					</li>
					</a>
 				<?php endforeach ?>
 			</ul>
 		</div>
 	</section>

 	<!-- Infowindow che effetivamente verrà mostrato -->
 	<div class="infowindow">
 		<div class="content">

 		</div>
 		<figure class="pistolino">
 			<?php require 'assets/img/svg/pistolino-infowindow.svg'; ?>
 		</figure>
 	</div>
 	<!-- Infowindow che effetivamente verrà mostrato -->

 	<!-- Contenuto del infowindow sulla mappa -->
 	<section class="regioni">
 		<?php foreach ($regioni as $key => $value): ?>
 			<?php $value = json_decode($value) ?>
 			<div class="regione" data-id="<?php echo $value->id ?>" data-color="<?php echo $value->color ?>" data-slug="<?php echo $value->slug ?>">
 				<h3 class="value">
 					<?php echo $value->value ?>
 				</h3>
 				<span>
 					<?php echo strtoupper($value->text) ?>
 				</span>
 			</div>
 		<?php endforeach ?>
 	</section>
 	<!-- Contenuto del infowindow sulla mappa -->
 </main>

<?php } ?>
<?php require 'footer.php'; ?>
