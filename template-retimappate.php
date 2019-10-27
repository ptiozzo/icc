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
		echo "errore";
	}

} else {

$reti = [
	'{"value": "38", "text": "Action aid", "color": "#82C1BD"}',
	'{"value": "12", "text": "Arcipelago scec", "color": "#1F8ABD"}',
	'{"value": "50", "text": "Associazione botteghe del mondo", "color": "#8BCFBB"}',
	'{"value": "41", "text": "Banca etica", "color": "#82C1BD"}',
	'{"value": "104", "text": "Banca del tempo", "color": "#BAE3B6"}',
	'{"value": "14", "text": "Civilta\' contadina", "color": "#82C1BD"}',
	'{"value": "60", "text": "Comuni virtuosi", "color": "#63BABF"}',
	'{"value": "24", "text": "Genuino clandestino", "color": "#41B2C4"}',
	'{"value": "3", "text": "Gruppo Acquisto Terreni", "color": "#73C6BE"}',
	'{"value": "7", "text": "Impact Hub", "color": "#2F8AB9"}',
	'{"value": "109", "text": "Libera", "color": "#2373B2"}',
	'{"value": "47", "text": "Movimento per la decrescita felice", "color": "#B3D698"}',
	'{"value": "23", "text": "Reti di economia solidale", "color": "#BAE3B6"}',
	'{"value": "23", "text": "Rete Italiana Villaggi Ecologici", "color": "#73C6BE"}',
	'{"value": "30", "text": "Rete sostenilita\' e salute", "color": "#41B2C4"}',
	'{"value": "111", "text": "Salviamo il paesaggio", "color": "#63BABF"}',
	'{"value": "11", "text": "Sentiero bioregionale", "color": "#0E88A8"}',
	'{"value": "18", "text": "Transition italia", "color": "#82C1BD"}',
	'{"value": "65", "text": "Vivi Consapevole in Romagna", "color": "#63BABF"}',
];

/**
 * Mappa regioni
 */
$regioni = [
	'{"id": "Path_632", "value": "184", "text": "SARDEGNA"}',
	'{"id": "Path_633", "value": "38", "text": "SICILIA"}',
	'{"id": "Path_643", "value": "12", "text": "VENETO"}',
	'{"id": "Path_644", "value": "50", "text": "EMILIA ROMAGNA"}',
	'{"id": "Path_645", "value": "41", "text": "TRENTINO ALTO ADIGE"}',
	'{"id": "Path_646", "value": "104", "text": "FRIULI VENEZIA GIULIA"}',
	'{"id": "Path_647", "value": "14", "text": "MARCHE"}',
	'{"id": "Path_648", "value": "60", "text": "UMBRIA"}',
	'{"id": "Path_649", "value": "24", "text": "MOLISE"}',
	'{"id": "Path_650", "value": "3", "text": "UMBRIA"}',
	'{"id": "Path_651", "value": "7", "text": "VALLE AOSTA"}',
	'{"id": "Path_652", "value": "109", "text": "CAMPANIA"}',
	'{"id": "Path_653", "value": "47", "text": "CALABRIA"}',
	'{"id": "Path_654", "value": "23", "text": "BASILICATA"}',
	'{"id": "Path_655", "value": "23", "text": "LOMBARDIA"}',
	'{"id": "Path_656", "value": "30", "text": "PUGLIA"}',
	'{"id": "Path_657", "value": "111", "text": "LIGURIA"}',
	'{"id": "Path_658", "value": "11", "text": "LAZIO"}',
	'{"id": "Path_659", "value": "18", "text": "PIEMONTE"}',
	'{"id": "Path_660", "value": "65", "text": "TOSCANA"}',
];
?>



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
					<li class="rete" style="background: <?php echo $value->color ?>">
						<h3 class="value">
							<?php echo $value->value ?>
						</h3>
						<span>
							<?php echo strtoupper($value->text) ?>
						</span>
					</li>
				<?php endforeach ?>
			</ul>
		</div>
	</section>

	<!--

	<section class="sezione-realta-inserite">
		<div class="head chain-effect scale">
			<h1>LE ULTIME REALTÀ INSERITE</h1>
		</div>

		<div class="content">

		</div>
	</section>

-->

	<!-- Infowindow che effetivamente verrà mostrato -->
	<div class="infowindow"></div>
	<!-- Infowindow che effetivamente verrà mostrato -->

	<!-- Contenuto del infowindow sulla mappa -->
	<section class="regioni">
		<?php foreach ($regioni as $key => $value): ?>
			<?php $value = json_decode($value) ?>
			<div class="regione" data-id="<?php echo $value->id ?>">
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
