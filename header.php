<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>
			<?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(); ?>
		</title>
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<meta name="title" content="<?php bloginfo( 'name' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/png" href="">

		<?php wp_head(); ?>
    <?php if(!is_page('cerca')){
            $_SESSION['termine-cercato'] = '';
          }
					if(!is_single() && !is_category('i-nostri-contenuti')){
						unset ($_SESSION['cat1']);
						unset ($_SESSION['cat2']);
						unset ($_SESSION['ord']);
						echo "Resettata sessione i nostri contenuti";
					}
    ?>
	</head>
	<body <?php body_class(); ?>>

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

				<section class='search align-items-center'>
					<div class="dropdown">
					  <button class="btn dropdown-toggle" type="button" id="dropdownMenuSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   <img src='<?php echo get_template_directory_uri();?>/assets/img/icons/search.svg' alt='Cerca <?php bloginfo( 'name' ); ?>'>
					  </button>
					  <div class="dropdown-menu cerca p-3" aria-labelledby="dropdownMenuSearch">
							<form class="" action="/cerca/" method="post">
								<input class="mb-2" type="text" name="termine-cercato" value="<?php echo $searchterm; ?>" placeholder="Scrivi e premi invio">
								<input name="submit_button" type="hidden" value="Cerca">
							</form>
					  </div>
					</div>
				</section>


				<section class='socials'>
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
          wp_nav_menu( array(
            'theme_location' => 'menu-principale',
            'container' => false)
          );
					?>
				</div>

				<div class='collapse-container'>
					<div class='collapse-head'>
						<h5>I nostri Contenuti</h5>
					</div>
					<?php
					wp_nav_menu( array(
            'theme_location' => 'menu-i-nostri-contenuti',
            'menu_class' => 'menu-1',
            'container' => false)
          );
					?>
				</div>

				<div class='collapse-container'>
					<div class='collapse-head hidden-mobile'>
						<h5>Le Regioni</h5>
					</div>
						<?php
						wp_nav_menu( array(
	            'theme_location' => 'menu-regioni',
	            'menu_class' => 'menu-2',
	            'container' => false)
	          );
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

			<?php
			if (is_page('piemonte')){
				get_template_part('menu','piemonte');
			} elseif (is_page('casentino')) {
				get_template_part('menu','casentino');
			} elseif (is_page('liguria')) {
				get_template_part('menu','liguria');
			}
			?>
		</main>

		<!-- Content -->
		<div class="wrapper">
