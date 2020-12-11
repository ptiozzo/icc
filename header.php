<!DOCTYPE html>
<html <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8">
		<title>
			<?php

			if (!is_front_page()){
				wp_title('');
				echo " | ";
				bloginfo('name');
			} else {
				bloginfo('name');
				echo " | ";
				bloginfo( 'description' );
			}
			?>

		</title>

		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<meta name="title" content="<?php bloginfo( 'name' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/png" href="">
		<meta name="color-scheme" content="dark light">

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="row m-0">
			<div class="col-12 col-md-6 text-center my-1">
				<?php dynamic_sidebar('testatasx'); ?>
			</div>
			<div class="col-12 col-md-6 text-center mt-md-1 mb-1">
				<?php dynamic_sidebar('testatadx'); ?>
			</div>
		</div>
		<!-- Header -->


		<!-- Menu proposto da Alessandro -->
		<header class='stripe px-2' style="border: 1px solid red;">
      <div class='left-col'>
				<div class='menu'>
					<div class='bars d-lg-none'>
						<div class='bar'></div>
						<div class='bar'></div>
						<div class='bar'></div>
					</div>
				</div>

				<a href='<?php echo home_url(); ?>'>
					<figure class='logo m-0'>
						<img src='<?php echo get_template_directory_uri();?>/assets/img/logo/icc_orizz_trasparente.png' alt='<?php bloginfo( 'name' ); ?>' title='<?php bloginfo( 'name' ); ?>'>
					</figure>
				</a>
			</div>

			<div class='right-col'>

					<nav class="">
						<?php
						wp_nav_menu([
			        'menu'            => 'menu-principale',
			        'theme_location'  => 'menu-principale',
			        'container'       => '',
			        'container_id'    => '',
			        'container_class' => '',
			        'menu_id'         => false,
			        'menu_class'      => 'header__menu__principale align-items-start mt-3',
			        'depth'           => 3,
			        'fallback_cb'     => 'bs4navwalker::fallback',
			        'walker'          => new bs4navwalker()
			      ]);
						?>
					</nav>



				<section class='search align-items-center d-none'>
					<div class="dropdown">
					  <button class="btn dropdown-toggle" type="button" id="dropdownMenuSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   <img src='<?php echo get_template_directory_uri();?>/assets/img/icons/search.svg' alt='Cerca <?php bloginfo( 'name' ); ?>'>
					  </button>
					  <div class="dropdown-menu cerca p-3" aria-labelledby="dropdownMenuSearch">
						  	<a class="btn btn-warning mb-2" href="/contenuti/">Tutti i contenuti</a>
							<form class="" action="/cerca/" method="post">
								<input class="mb-2" type="text" name="termine-cercato" value="<?php echo $searchterm; ?>" placeholder="Scrivi e premi invio per cercare">
								<input name="submit_button" type="hidden" value="Cerca">
							</form>
					  </div>
					</div>
				</section>


				<section class='socials d-none'> <!-- d-xl-flex -->
          <?php
          wp_nav_menu( array(
            'theme_location' => 'menu-social',
            'container' => false)
          );
          ?>
				</section>
			</div>
		</header>


		<!-- Menu richiesto da Daniel -->

		<header class='stripe px-2 mt-3 border-bottom-0' style="border: 1px solid green;">
      <div class='left-col'>
				<div class='menu'>
					<div class='bars'>
						<div class='bar'></div>
						<div class='bar'></div>
						<div class='bar'></div>
					</div>
				</div>

				<a href='<?php echo home_url(); ?>'>
					<figure class='logo m-0'>
						<img src='<?php echo get_template_directory_uri();?>/assets/img/logo/icc_orizz_trasparente.png' alt='<?php bloginfo( 'name' ); ?>' title='<?php bloginfo( 'name' ); ?>'>
					</figure>
				</a>
			</div>

			<div class='right-col'>

					<nav class="d-none">
						<?php
						wp_nav_menu([
			        'menu'            => 'menu-principale',
			        'theme_location'  => 'menu-principale',
			        'container'       => '',
			        'container_id'    => '',
			        'container_class' => '',
			        'menu_id'         => false,
			        'menu_class'      => 'header__menu__principale align-items-start mt-3',
			        'depth'           => 3,
			        'fallback_cb'     => 'bs4navwalker::fallback',
			        'walker'          => new bs4navwalker()
			      ]);
						?>
					</nav>



				<section class='search align-items-center'>
					<div class="dropdown">
					  <button class="btn dropdown-toggle" type="button" id="dropdownMenuSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   <img src='<?php echo get_template_directory_uri();?>/assets/img/icons/search.svg' alt='Cerca <?php bloginfo( 'name' ); ?>'>
					  </button>
					  <div class="dropdown-menu cerca p-3" aria-labelledby="dropdownMenuSearch">
						  	<a class="btn btn-warning mb-2" href="/contenuti/">Tutti i contenuti</a>
							<form class="" action="/cerca/" method="post">
								<input class="mb-2" type="text" name="termine-cercato" value="<?php echo $searchterm; ?>" placeholder="Scrivi e premi invio per cercare">
								<input name="submit_button" type="hidden" value="Cerca">
							</form>
					  </div>
					</div>
				</section>


				<section class='socials d-xl-flex'> <!-- d-xl-flex -->
          <?php
          wp_nav_menu( array(
            'theme_location' => 'menu-social',
            'container' => false)
          );
          ?>
				</section>
			</div>
		</header>
		<header class='stripe px-2 border-top-0' style="border: 1px solid green;">


			<div class='right-col'>

					<nav class="">
						<?php
						wp_nav_menu([
			        'menu'            => 'menu-principale',
			        'theme_location'  => 'menu-principale',
			        'container'       => '',
			        'container_id'    => '',
			        'container_class' => '',
			        'menu_id'         => false,
			        'menu_class'      => 'header__menu__principale align-items-start mt-3',
			        'depth'           => 3,
			        'fallback_cb'     => 'bs4navwalker::fallback',
			        'walker'          => new bs4navwalker()
			      ]);
						?>
					</nav>
			</div>
		</header>



		<!-- Menu proposto da Paolo -->

		<header class="stripe mt-3" style="border: 1px solid yellow;">
			<div class='left-col'>
				<div class='menu'>
					<div class='bars d-lg-none'>
						<div class='bar'></div>
						<div class='bar'></div>
						<div class='bar'></div>
					</div>
				</div>

				<a href='<?php echo home_url(); ?>'>
					<figure class='logo m-0'>
						<img class="w-100" src='<?php echo get_template_directory_uri();?>/assets/img/logo/icc_orizz_trasparente.png' alt='<?php bloginfo( 'name' ); ?>' title='<?php bloginfo( 'name' ); ?>'>
					</figure>
				</a>
			</div>

			<div class='right-col right-col2'>

					<nav class="">
						<ul>
							<li><a href="#">Chi siamo</a></li>
							<li><a href="#">Contenuti</a>
								<ul>
									<li><a href="#">Pippo</a></li>
								</ul>
							</li>
							<li><a href="#">Rassegna Stampa</a></li>
							<li><a href="#">Mappa</a></li>
							<li><a href="#">Visione 2040</a></li>
							<li class="btn btn-warning font-weight-bolder manoicc"><a href="#">Contribuisci</a></li>
						</ul>
					</nav>



				<section class='search align-items-center'>
					<div class="dropdown">
					  <button class="btn dropdown-toggle" type="button" id="dropdownMenuSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   <img src='<?php echo get_template_directory_uri();?>/assets/img/icons/search.svg' alt='Cerca <?php bloginfo( 'name' ); ?>'>
					  </button>
					  <div class="dropdown-menu cerca p-3" aria-labelledby="dropdownMenuSearch">
						  	<a class="btn btn-warning mb-2" href="/contenuti/">Tutti i contenuti</a>
							<form class="" action="/cerca/" method="post">
								<input class="mb-2" type="text" name="termine-cercato" value="<?php echo $searchterm; ?>" placeholder="Scrivi e premi invio per cercare">
								<input name="submit_button" type="hidden" value="Cerca">
							</form>
					  </div>
					</div>
				</section>


				<section class='socials d-xl-flex'> <!-- d-xl-flex -->
          <?php
          wp_nav_menu( array(
            'theme_location' => 'menu-social',
            'container' => false)
          );
          ?>
				</section>
			</div>

		</header>









		<header class='overlay-menu'>

			<nav>
				<div class='head'>
					<a href='<?php echo home_url(); ?>'>
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
					wp_nav_menu([
						'menu'            => 'menu-principale',
						'theme_location'  => 'menu-principale',
						'container'       => '',
						'container_id'    => '',
						'container_class' => '',
						'menu_id'         => false,
						'menu_class'      => 'header__menu__principale align-items-start mt-3',
						'depth'           => 3,
						'fallback_cb'     => 'bs4navwalker::fallback',
						'walker'          => new bs4navwalker()
					]);
					?>
				</div>

				<div class='info'>
					<p>
						<b>CF:</b> 97761390588
						<br>
						<b>P. IVA:</b> 12511651007
					</p>
				</div>

				<div class='socials'>
					<?php
					wp_nav_menu( array(
            'theme_location' => 'menu-social',
            'menu_class' => 'socials',
            'container' => false)
          );
          ?>
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
		<div class="modal fade" id="IscrizioneNewsletter" tabindex="-1" role="dialog" aria-labelledby="CasentinoAccediTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="IscrizioneNewsletterTitle">Iscrizione Newsletter</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
						<?php
		        	include "template-part/IscrizioneNewsletter.php";
						?>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
		<div class="modal fade" id="IscrizioneFB" tabindex="-1" role="dialog" aria-labelledby="IscrizioneFB" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="IscrizioneFBTitle">Iscrizione Facebook</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body text-center">
		        <?php dynamic_sidebar('modalSingle'); ?>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
<!--<div id="swup" class="swuptransition">-->

	<?php
/*
				if(!is_single() && !is_page('cerca')){
					delete_transient('icc_termineCercato_'.(string) $_COOKIE['PHPSESSID']);
			    delete_transient('icc_searchCat1_'.(string) $_COOKIE['PHPSESSID']);
			    delete_transient('icc_searchCat2_'.(string) $_COOKIE['PHPSESSID']);
			    delete_transient('icc_searchOrd_'.(string) $_COOKIE['PHPSESSID']);
			    delete_transient('icc_searchAutore_'.(string) $_COOKIE['PHPSESSID']);
					delete_transient('icc_searchReg_'.(string) $_COOKIE['PHPSESSID']);
				}
				if(!is_single() && !is_page('contenuti')){
					delete_transient('icc_contenutiCat1_'.(string) $_COOKIE['PHPSESSID']);
					delete_transient('icc_contenutiCat2_'.(string) $_COOKIE['PHPSESSID']);
					delete_transient('icc_contenutiReg_'.(string) $_COOKIE['PHPSESSID']);
					delete_transient('icc_contenutiOrd_'.(string) $_COOKIE['PHPSESSID']);
				}
				if(!is_single() && !is_category('rubriche')){
					delete_transient('icc_rubricheCat1_'.(string) $_COOKIE['PHPSESSID']);
				}
*/

	?>
			<?php
			if (is_page('piemonte')){
				get_template_part('piemonte/menu','piemonte');
			} elseif (is_page('casentino')) {
				get_template_part('casentino/menu','casentino');
			} elseif (is_page('liguria')) {
				get_template_part('liguria/menu','liguria');
			}
			?>


		<!-- Content -->
		<div class="wrapper">
