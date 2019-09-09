<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Italia che cambia</title>
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<meta name="title" content="<?php bloginfo( 'name' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/png" href="">

		<?php wp_head(); ?>
    <?php if(!is_page('cerca')){
            $_SESSION['termine-cercato'] = '';
          }
    ?>
	</head>
	<body>

		<!-- Header -->
		<header class='stripe'>
      <div class='left-col'>
				<div class='menu'>
					<div class='bars'>
						<div class='bar'></div>
						<div class='bar'></div>
						<div class='bar'></div>
					</div>
				</div>

				<a href='<?php echo home_url(); ?>'>
					<figure class='logo'>
						<img src='<?php echo get_template_directory_uri();?>/assets/img/logo/italia-che-cambia.png' alt='<?php bloginfo( 'name' ); ?>' title='<?php bloginfo( 'name' ); ?>'>
					</figure>
				</a>
			</div>

			<div class='right-col'>
				<nav>
					<?php
					wp_nav_menu( array(
            'theme_location' => 'menu-principale',
            'menu_class' => 'header__menu__principale',
            'container' => false)
          );
					?>
				</nav>

				<section class='search'>
					<figure>
						<img src='<?php echo get_template_directory_uri();?>/assets/img/icons/search.svg' alt='Cerca su Italia che cambia'>
						<img src='<?php echo get_template_directory_uri();?>/assets/img/icons/search-white.svg' alt='Cerca su Italia che cambia' class='white'>
					</figure>
				</section>
				<section class='socials'>
          <?php
          wp_nav_menu( array(
            'theme_location' => 'menu-social',
            'menu_class' => 'header__menu__social',
            'container' => false)
          );
          ?>
				</section>
			</div>
		</header>

		<header class='overlay-menu'>

			<nav>
				<div class='head'>
					<a href='/'>
						<figure class='logo'>
							<img src='<?php echo get_template_directory_uri();?>/assets/img/logo/italia-che-cambia-header.svg' alt='Italia che cambia' title='Italia che cambia'>
						</figure>
					</a>
					<figure class='close'>
						<img src='<?php echo get_template_directory_uri();?>/assets/img/icons/close.svg' alt='Italia che cambia' title='Italia che cambia'>
					</figure>
				</div>

				<div class='mobile-links'>
          <?php
          wp_nav_menu( array(
            'theme_location' => 'menu-principale',
            'menu_class' => 'header__menu__principale',
            'container' => false)
          );
					?>
				</div>

				<div class='collapse-container'>
					<div class='collapse-head'>
						<h5>I nostri Contenuti</h5>
					</div>
					<ul class='menu-1'>
						<li>
							<a href=''>
								Gli Articoli
							</a>
						</li>
						<li>
							<a href=''>
								Le Storie
							</a>
						</li>
						<li>
							<a href=''>
								I Meme
							</a>
						</li>
						<li>
							<a href=''>
								Le Rubriche
							</a>
						</li>
						<li>
							<a href=''>
								I Documentari
							</a>
						</li>
						<li>
							<a href=''>
								I nostri libri
							</a>
						</li>
						<li>
							<a href='/salute-che-cambia.php'>
								Salute che cambia
							</a>
						</li>
					</ul>
				</div>

				<div class='collapse-container'>
					<div class='collapse-head hidden-mobile'>
						<h5>Le Regioni</h5>
					</div>
					<ul class='menu-2'>
						<li>
							<a href='/piemonte-che-cambia.php'>
								Piemonte che cambia
							</a>
						</li>
						<li>
							<a href=''>
								Casentino che cambia
							</a>
						</li>
						<li>
							<a href=''>
								Berlin im Wandel
							</a>
						</li>
						<li>
							<a href=''>
								Brandeburg im Wandel
							</a>
						</li>
					</ul>
				</div>


				<div class='info'>
					<p>
						<b>CF:</b> 97761390588
						<br>
						<b>P. IVA:</b> 12511651007
					</p>
				</div>

				<div class='socials'>
					<ul>
						<li>
							<a href='' target='_blank'>
								<figure>
									<img src='<?php echo get_template_directory_uri();?>/assets/img/icons/twitter-blu.svg' alt='Italia che cambia su Twitter'>
								</figure>
							</a>
						</li>
						<li>
							<a href='' target='_blank'>
								<figure>
									<img src='<?php echo get_template_directory_uri();?>/assets/img/icons/facebook-blu.svg' alt='Italia che cambia su Facebook'>
								</figure>
							</a>
						</li>
						<li>
							<a href='' target='_blank'>
								<figure>
									<img src='<?php echo get_template_directory_uri();?>/assets/img/icons/youtube-blu.svg' alt='italia che cambia su Youtube'>
								</figure>
							</a>
						</li>
					</ul>
				</div>
			</nav>

			<article>
				<h1>
					Informarsi<br>
					conoscere<br>
					agire
				</h1>
			</article>
			<figure class='hand'>
				<img src='<?php echo get_template_directory_uri();?>/assets/img/icons/hand.svg' alt='italia che cambia'>
			</figure>
		</header>

		<section class="search-section">
			<figure class="close">
				<img src='<?php echo get_template_directory_uri();?>/assets/img/icons/close-white.svg' alt='Italia che cambia' title='Italia che cambia'>
			</figure>
			<form action="">
				<div class="title">RICERCA</div>
				<div class="form-row">
					<input type='text'>
					<figure class='logo'>
						<img src='<?php echo get_template_directory_uri();?>/assets/img/icons/search.svg' alt='Italia che cambia' title='Italia che cambia'>
					</figure>
				</div>
			</form>

			<div class="result">
				<div class="filters">
					<div class="label">Filtri</div>
					<ul>
						<li><span>AUTORI</span></li>
						<li><span>MAPPA</span></li>
						<li><span>ARTICOLI</span></li>
					</ul>
				</div>

				<div class="list">
					<div class="legend">300 RISULTATI PER LA RICERCA</div>
					<ul class="items">
						<?php for($i=0; $i<10; $i++): ?>
						<li>
							<div class='left-col'>
								<div class='title'>Piemonte Plastic Free: il sogno di unire i comuni nella lotta alla plastica</div>
								<div class='description'>
									<p>
										30 apr 2019 in Cicli produttivi e rifiuti
									</p>
									<p>
										Un Giornale che ogni giorno racconta le storie di chi in Italia crea alternative sostenibili dal basso (e ci riesce) e fa informazione sui mondi delle economie alternative, del sociale, dell’ecosostenibilità, dei diritti.
									</p>
								</div>
							</div>
							<div class='right-col'>
								<a href=''>VAI AL GIORNALE</a>
							</div>
						</li>
						<?php endfor; ?>
					</ul>
				</div>
			</div>
		</section>



		<!-- Content -->
		<div class="wrapper">
