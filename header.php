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

		<header class="home">


		<nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
			<div class='navbar-brand logo align-self-center mr-0 p-0'>
				<a href="/" class="p-0">
					<img class="img-fluid" src="<?php echo get_template_directory_uri();?>/assets/img/logo/icc_orizz_trasparente.png" alt="ItaliaCheCambia Logo">
				</a>
			</div>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHome" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse justify-content-between" id="navbarHome">

				<div class="main-menu align-self-center">
					<?php
          wp_nav_menu( array(
            'theme_location' => 'menu-principale',
            'container' => false,
						'menu_class' => 'd-flex flex-column flex-lg-row m-0',
					 )
          );
          ?>
				</div>

				<div class='search align-self-center d-flex justify-content-center justify-content-lg-end my-lg-0'>
					<div class="dropdown">
					  <button class="btn dropdown-toggle" type="button" id="dropdownMenuSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   <img src='<?php echo get_template_directory_uri();?>/assets/img/icons/search.svg' alt='Cerca <?php bloginfo( 'name' ); ?>'>
					  </button>
					  <div class="dropdown-menu dropdown-menu-right cerca p-3" aria-labelledby="dropdownMenuSearch">
						  	<a class="btn btn-warning mb-2" href="/contenuti/">Tutti i contenuti</a>
							<form class="" action="/cerca/" method="post">
								<input class="mb-2" type="text" name="termine-cercato" value="<?php echo $searchterm; ?>" placeholder="Scrivi e premi invio per cercare">
								<input name="submit_button" type="hidden" value="Cerca">
							</form>
					  </div>
					</div>
					<div class='socials align-self-center d-flex d-lg-none d-xl-flex'> <!-- d-xl-flex -->
	          <?php
	          wp_nav_menu( array(
	            'theme_location' => 'menu-social',
	            'container' => false,
							'menu_class' => 'd-flex m-0',
							)
	          );
	          ?>
					</div>
				</div>
		  </div>
		</nav>








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
