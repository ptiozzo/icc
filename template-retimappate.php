<?php
/**
 * Template Name: Reti Mappate
 */
$reti = [
	'{"value": "38", "text": "Action aid", "color": "#82C1BD"}',
	'{"value": "12", "text": "Arcipelago scec", "color": "#1F8ABD"}',
	'{"value": "50", "text": "associazione botteghe del mondo", "color": "#8BCFBB"}',
	'{"value": "41", "text": "Banca etnica", "color": "#82C1BD"}',
	'{"value": "104", "text": "Banca del tempo", "color": "#BAE3B6"}',
	'{"value": "14", "text": "Civiltà contadina", "color": "#82C1BD"}',
	'{"value": "60", "text": "Comuni virtuosi", "color": "#63BABF"}',
	'{"value": "24", "text": "Genuino clandestino", "color": "#41B2C4"}',
	'{"value": "3", "text": "Gruppo Acquisto Terreni", "color": "#73C6BE"}',
	'{"value": "7", "text": "Impact Hub", "color": "#2F8AB9"}',
	'{"value": "109", "text": "Libera", "color": "#2373B2"}',
	'{"value": "47", "text": "Movimento per la decrescita felice", "color": "#B3D698"}',
	'{"value": "23", "text": "Reti di economia solidale", "color": "#BAE3B6"}',
	'{"value": "23", "text": "Rete Italiana Villaggi Ecologici", "color": "#73C6BE"}',
	'{"value": "30", "text": "Rete sostenilità e salute", "color": "#41B2C4"}',
	'{"value": "111", "text": "Salviamo il paesaggio", "color": "#63BABF"}',
	'{"value": "11", "text": "Sentiero bioregionale", "color": "#0E88A8"}',
	'{"value": "18", "text": "Transition italia", "color": "#82C1BD"}',
	'{"value": "65", "text": "Vivi Consapevole in Romagna", "color": "#63BABF"}',
];

/**
 * Mappa regioni
 */
$regioni = [
	'{"id": "Path_632", "value": "184", "text": "TOSCANA"}',
	'{"id": "Path_633", "value": "38", "text": "TOSCANA"}',
	'{"id": "Path_643", "value": "12", "text": "TOSCANA"}',
	'{"id": "Path_644", "value": "50", "text": "TOSCANA"}',
	'{"id": "Path_645", "value": "41", "text": "TOSCANA"}',
	'{"id": "Path_646", "value": "104", "text": "TOSCANA"}',
	'{"id": "Path_647", "value": "14", "text": "TOSCANA"}',
	'{"id": "Path_648", "value": "60", "text": "TOSCANA"}',
	'{"id": "Path_649", "value": "24", "text": "TOSCANA"}',
	'{"id": "Path_650", "value": "3", "text": "TOSCANA"}',
	'{"id": "Path_651", "value": "7", "text": "TOSCANA"}',
	'{"id": "Path_652", "value": "109", "text": "TOSCANA"}',
	'{"id": "Path_653", "value": "47", "text": "TOSCANA"}',
	'{"id": "Path_654", "value": "23", "text": "TOSCANA"}',
	'{"id": "Path_655", "value": "23", "text": "TOSCANA"}',
	'{"id": "Path_656", "value": "30", "text": "TOSCANA"}',
	'{"id": "Path_657", "value": "111", "text": "TOSCANA"}',
	'{"id": "Path_658", "value": "11", "text": "TOSCANA"}',
	'{"id": "Path_659", "value": "18", "text": "PIEMONTE"}',
	'{"id": "Path_660", "value": "65", "text": "TOSCANA"}',
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

	<section class="sezione-realta-inserite">
		<div class="head chain-effect scale">
			<h1>LE ULTIME REALTÀ INSERITE</h1>
		</div>

		<div class="content">
			<ul class='items'>
				<?php for($i=0; $i<5; $i++): ?>
				<li class='chain-effect scale'>
					<a href='#'>
						<figure>
							<img src='/assets/img/modules/home/articoli-<?php echo $i + 1; ?>.jpg' alt='' title=''>
						</figure>

						<div class='title'>
							<div class='date'>CATEGORIA ABITARE</div>
							<h3>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</h3>
						</div>

						<article>
							<p>
								Sed ut perspiciatis unde omnis iste
								natus error sit voluptatem accusantium
								doloremque laudantium, totam rem
								aperiam, eaque ipsa quae ab illo
								inventore veritatis et quasi architecto
								beatae vitae dicta sunt explicabo.
								Nemo enim ipsam voluptatem quia
								voluptas sit aspernatur aut odit aut.
							</p>
						</article>
					</a>
				</li>
				<?php endfor; ?>
			</ul>
		</div>
	</section>

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

<?php require 'footer.php'; ?>
