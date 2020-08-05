<?php

// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {

  $clean_src = remove_query_arg( 'ver', $src );
  $path      = wp_parse_url( $src, PHP_URL_PATH );

  if ( $modified_time = @filemtime( untrailingslashit( ABSPATH ) . $path ) ) {
      $src = add_query_arg( 'ver', $modified_time, $clean_src );
  } else {
      $src = add_query_arg( 'ver', time(), $clean_src );
  }
  return $src;
}
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 99999999);

remove_action('wp_head', 'wp_generator');

/*  Include Styles & Script
/* ------------------------------------ */
if ( ! function_exists( 'icc_styles_scripts' ) ) {
	function icc_style_scripts() {
		//wp_enqueue_script;
		wp_enqueue_style( 'icc-sourcesanspro','//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700');
		wp_enqueue_style( 'icc-fontfavole','//fonts.googleapis.com/css?family=Annie+Use+Your+Telescope&display=swap');
		wp_enqueue_style( 'icc2', get_template_directory_uri().'/assets/css/main.css',array(),filemtime(get_template_directory() . '/assets/css/main.css'),'all');
		wp_enqueue_style( 'icc6', get_template_directory_uri().'/assets/css/modules/chi-siamo/index.css',array(),filemtime(get_template_directory() . '/assets/css/modules/chi-siamo/index.css'),'all');
		wp_enqueue_style( 'icc8', get_template_directory_uri().'/assets/css/modules/visione/index.css',array(),filemtime(get_template_directory() . '/assets/css/modules/visione/index.css'),'all');
		wp_enqueue_style( 'icc12', get_template_directory_uri().'/assets/css/modules/sostienici/index.css',array(),filemtime(get_template_directory() . '/assets/css/modules/sostienici/index.css'),'all');
		wp_enqueue_style( 'mappa', get_template_directory_uri().'/assets/css/modules/mappa/index.css',array(),filemtime(get_template_directory() . '/assets/css/modules/mappa/index.css'),'all');
		wp_enqueue_style( 'icc-bootstrap-css', get_template_directory_uri().'/assets/css/bootstrap.min.css',array(),filemtime(get_template_directory() . '/assets/css/bootstrap.min.css'),'all');
	  wp_enqueue_style( 'icc', get_template_directory_uri().'/style.css',array(),filemtime(get_template_directory() . '/style.css'),'all');
		wp_enqueue_script('jquery');

		wp_enqueue_script( 'icc-scripts2', get_template_directory_uri() . '/assets/js/app.js','','',true);
    wp_enqueue_script( 'icc-darkMode', get_template_directory_uri() . '/assets/js/darkMode.js','','',true);
		wp_enqueue_script( 'icc-scripts5', get_template_directory_uri() . '/assets/js/mappa/index.js','','',true);
		wp_enqueue_script( 'icc-scripts3', get_template_directory_uri() . '/assets/js/plugins/jquery.min.js');
		wp_enqueue_script( 'icc-scripts4', get_template_directory_uri() . '/assets/js/plugins/jquery.easing.min.js');
		wp_enqueue_script( 'icc-sticky-sidebar', get_template_directory_uri() . '/assets/js/sticky-sidebar.min.js');
		wp_enqueue_script( 'icc-popper-js', get_template_directory_uri().'/assets/js/popper.min.js','','',true);
		wp_enqueue_script( 'icc-bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js','','',true);
		wp_enqueue_script( 'icc-script', get_template_directory_uri().'/assets/js/script.js','',filemtime(get_template_directory() . '/assets/js/script.js'),true);
		wp_enqueue_script( 'icc-fontawsome-js', '//kit.fontawesome.com/befb91387f.js','','',true);

	}
}
add_action( 'wp_enqueue_scripts', 'icc_style_scripts' );

/*  Theme setup
/* ------------------------------------ */
if ( ! function_exists( 'icc_setup' ) ) {
	function icc_setup() {
		add_theme_support( "title-tag" );
		// Enable automatic feed links
		add_theme_support( 'automatic-feed-links' );
		// Enable featured image
		add_theme_support( 'post-thumbnails' );
		// Thumbnail sizes
		add_image_size( 'icc_rassegnastampahome', 660, 488, true ); 	//(cropped)
		add_image_size( 'icc_ultimenewshome', 305, 207, true ); 	//(cropped)
		add_image_size( 'icc_sidebar', 239, 151, true ); 	//(cropped)
		add_image_size( 'icc_libri', 200, 300, true ); 	//(cropped)
		add_image_size( 'icc_single', 625, 447, true ); 	//(cropped)

		// Custom menu areas
		register_nav_menus( array(
			'menu-principale' => esc_html__( 'Menu principale', 'icc' ),
			'menu-social' => esc_html__( 'Menu social', 'icc' ),
			'menu-footer' => esc_html__( 'Menu footer', 'icc' ),
			'menu-i-nostri-contenuti' => esc_html__( 'Menu i nostri contenuti', 'icc' ),
      'menu-icc-tv' => esc_html__( 'Menu ICC TV', 'icc' ),
			'menu-regioni' => esc_html__( 'Menu regioni', 'icc' ),
			'menu-piemonte' => esc_html__( 'Menu piemonte', 'icc' ),
			'menu-casentino' => esc_html__( 'Menu casentino', 'icc' ),
			'menu-liguria' => esc_html__( 'Menu liguria', 'icc' ),
		) );
	}
}
add_action( 'after_setup_theme', 'icc_setup' );
require_once('assets/bs4navwalker.php');

/*  Register sidebars
/* ------------------------------------ */
if ( ! function_exists( 'icc_sidebars' ) ) {
	function icc_sidebars()	{
		register_sidebar(array( 'name' => esc_html__( 'Home colonna sinistra', 'icc' ),'id' => 'homesx','description' => esc_html__( 'Area nella colonna di sinistra tra evidenza e mappa, larghezza max 991px', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s mt-4">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Home colonna centrale 2', 'icc' ),'id' => 'homedx','description' => esc_html__( 'Area nella colonna centrale dopo 2 articoli, larghezza max 991', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s mt-4">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
    register_sidebar(array( 'name' => esc_html__( 'Home colonna centrale 4', 'icc' ),'id' => 'homedx4','description' => esc_html__( 'Area nella colonna centrale dopo 4 articoli, larghezza max 991', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s mt-4">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Home colonna destra', 'icc' ),'id' => 'primary','description' => esc_html__( 'Sidebar homepage non visualizzata su mobile', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Footer1', 'icc' ),'id' => 'footer1','description' => esc_html__( 'Area nel footer sotto a logo e menù. Centrale', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Footer2', 'icc' ),'id' => 'footer2','description' => esc_html__( 'Area nel footer sotto a logo, menù e sotto footer1 a sinistra', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Footer3', 'icc' ),'id' => 'footer3','description' => esc_html__( 'Area nel footer sotto a logo, menù e sotto footer1 a destra', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Mobile 1', 'icc' ),'id' => 'mobile-1','description' => esc_html__( 'Area visualizzata su mobile dopo evidenza e 4 articoli', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Mobile 2', 'icc' ),'id' => 'mobile-2','description' => esc_html__( 'Area visualizzata su mobile dopo evidenza e 6 articoli', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Mobile 3', 'icc' ),'id' => 'mobile-3','description' => esc_html__( 'Area visualizzata su mobile dopo libri', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
    register_sidebar(array( 'name' => esc_html__( 'Mobile 4', 'icc' ),'id' => 'mobile-4','description' => esc_html__( 'Area visualizzata su mobile dopo ICC-TV', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Testata Sinistra', 'icc' ),'id' => 'testatasx','description' => esc_html__( 'Area nel header a sinistra, larghezza max 768px', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Testata Destra', 'icc' ),'id' => 'testatadx','description' => esc_html__( 'Area nel header a destra, larghezza max 768px', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'ModalSingle', 'icc' ),'id' => 'modalSingle','description' => esc_html__( 'Area modal richiamata nel singolo articolo', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'ModalSingleNewsletter', 'icc' ),'id' => 'modalSingleNewsletter','description' => esc_html__( 'Area modal richiamata nel singolo articolo', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Piemonte', 'icc' ),'id' => 'piemonte','description' => esc_html__( 'Sidebar Piemonte', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Casentino', 'icc' ),'id' => 'casentino','description' => esc_html__( 'Sidebar Casentino', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Liguria', 'icc' ),'id' => 'liguria','description' => esc_html__( 'Sidebar Liguria', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Rassegna Stampa', 'icc' ),'id' => 'rassegna-stampa','description' => esc_html__( 'Sidebar rassegna stampa(non attiva)', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Single inizio articolo', 'icc' ),'id' => 'singlestart','description' => esc_html__( 'Area ad inizio singolo articolo, larghezza max 768', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s my-3">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Single piemonte fine articolo', 'icc' ),'id' => 'singlepiemonteend','description' => esc_html__( 'Area a fine singolo articolo piemonte, larghezza max 1400', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s my-3">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Single casentino fine articolo', 'icc' ),'id' => 'singlecasentinoend','description' => esc_html__( 'Area a fine singolo articolo casentino, larghezza max 1400', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s my-3">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Single liguria fine articolo', 'icc' ),'id' => 'singleliguriaend','description' => esc_html__( 'Area a fine singolo articolo liguria, larghezza max 1400', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s my-3">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Single fine articolo', 'icc' ),'id' => 'singleend','description' => esc_html__( 'Area a fine singolo articolo, larghezza max 768', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s my-3">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Home piemonte sinistra', 'icc' ),'id' => 'homepiemontesx','description' => esc_html__( 'Area piemonte nella colonna di sinistra tra evidenza e mappa, larghezza max 991', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s mt-4">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Home piemonte centrale 2', 'icc' ),'id' => 'homepiemontedx','description' => esc_html__( 'Area piemonte nella colonna centrale dopo 2 articoli, larghezza max 991', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s mt-4">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
    register_sidebar(array( 'name' => esc_html__( 'Home piemonte bacheca', 'icc' ),'id' => 'homepiemontebacheca','description' => esc_html__( 'Area piemonte nella colonna centrale dopo 4 articoli (da mobile dopo 2), larghezza max 991', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s mt-4">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Home casentino sinistra', 'icc' ),'id' => 'homecasentinosx','description' => esc_html__( 'Area casentino nella colonna di sinistra tra evidenza e mappa, larghezza max 991', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s mt-4">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Home casentino centrale 2', 'icc' ),'id' => 'homecasentinodx','description' => esc_html__( 'Area casentino nella colonna centrale dopo 2 articoli, larghezza max 991', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s mt-4">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
    register_sidebar(array( 'name' => esc_html__( 'Home casentino bacheca', 'icc' ),'id' => 'homecasentinobacheca','description' => esc_html__( 'Area casentino nella colonna centrale dopo 4 articoli (da mobile dopo 2), larghezza max 991', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s mt-4">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
    register_sidebar(array( 'name' => esc_html__( 'Home Liguria sinistra', 'icc' ),'id' => 'homeliguriasx','description' => esc_html__( 'Area liguria nella colonna di sinistra tra evidenza e mappa, larghezza max 991', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s mt-4">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
    register_sidebar(array( 'name' => esc_html__( 'Home Liguria centrale 2', 'icc' ),'id' => 'homeliguriadx','description' => esc_html__( 'Area liguria nella colonna centrale dopo 2 articoli, larghezza max 991', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s mt-4">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
    register_sidebar(array( 'name' => esc_html__( 'Home Liguria bacheca', 'icc' ),'id' => 'homeliguriabacheca','description' => esc_html__( 'Area liguria nella colonna centrale dopo 4 articoli (da mobile dopo 2), larghezza max 991', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s mt-4">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));

	}
}
add_action( 'widgets_init', 'icc_sidebars' );

// Update CSS within in Admin
function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/admin.css');
}
add_action('login_enqueue_scripts', 'admin_style');

/*  Include Rassegna stampa in RSS
/* ------------------------------------ */
function myfeed_request($qv) {
    if (isset($qv['feed']) && !isset($qv['post_type']))
        $qv['post_type'] = array('post', 'rassegna-stampa');
    return $qv;
}
add_filter('request', 'myfeed_request');

function wpse28145_add_custom_types( $query ) {
    if( is_tag() && $query->is_main_query() ) {

        // this gets all post types:
        $post_types = get_post_types();

        // alternately, you can add just specific post types using this line instead of the above:
        // $post_types = array( 'post', 'your_custom_type' );

        $query->set( 'post_type', $post_types );
    }
}
add_filter( 'pre_get_posts', 'wpse28145_add_custom_types' );

/*
* Add Response code to video embeds in WordPress
*
* @refer  http://alxmedia.se/code/2013/10/make-wordpress-default-video-embeds-responsive/
*/
function abl1035_alx_embed_html( $html ) {

 return '<div class="video-container">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'abl1035_alx_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'abl1035_alx_embed_html' ); // Jetpack

/*  Exclude category list in singolo articolo
/* ------------------------------------ */

add_filter( 'get_the_categories', 'remove_category_link' );

function remove_category_link( $categories ) {

    if ( is_admin() )
        return $categories;

    $remove = array();

    foreach ( $categories as $category ) {

    if ( $category->name == "Articoli" ||
         $category->name == "ICC-TV" ||
         $category->name == "Piemonte che cambia" ||
         $category->name == "Casentino che cambia" ||
         $category->name == "Liguria che cambia" )
      continue;

    $remove[] = $category;
    }
    return $remove;
}

/*  Custom post type
/* ------------------------------------ */
require 'inc/custom-post.php';
require 'inc/custom-tassonomy.php';

/*  Bootstrap pagination
/* ------------------------------------ */
require 'inc/bootstrap-pagination.php';

/*  URL Rewrite
/* ------------------------------------ */
require 'inc/rewrite.php';

/*  DB contribuisci
/* ------------------------------------ */
require 'inc/contribuisci-db.php';



/*  Pagina istruzioni su admin
/* ------------------------------------ */
add_action( 'admin_menu', 'icc_menu_admin' );
function icc_menu_admin()
{
    add_menu_page(
        'Tema Italia che Cambia',     // page title
        'Tema Italia che Cambia',     // menu title
        'administrator',   // capability
        'icc-theme',     // menu slug
        'icc_menu_admin_page_istruction' // callback function
    );
		add_submenu_page(
			'icc-theme',
			'ICC Suggerimenti scrittura',
			'Suggerimenti scrittura',
			'administrator',
			'icc-theme-suggestion',
			'icc_menu_admin_page_suggestion'
		);

}
function icc_menu_admin_page_istruction()
{
  require 'adm/theme-istruction.php';
}
function icc_menu_admin_page_suggestion()
{
  require 'adm/theme-scritturaarticoli.php';
}

/* Inizio una sessione
/* ------------------------------------ */
function start_session() {
	if(!session_id()) {
		session_start();
	}
}
add_action('init', 'start_session', 1);

function end_session() {
	session_destroy ();
}

add_action('wp_logout','end_session');
add_action('wp_login','end_session');
add_action('end_session_action','end_session');
//fine sessione


/* Aggiunta banner ATTIVATI dopo secondo paragrafo.
/* ------------------------------------ */
require 'inc/attivati.php';
/* Aggiunta banner PIANETA FUTURO dopo secondo paragrafo.
/* ------------------------------------ */
require 'inc/pianetafuturo.php';

/* Aggiunta dei Widget.
/* ------------------------------------ */
require 'inc/widget.php';

/* Funzione per categoria figlia di.
/* ------------------------------------ */
function category_has_parent($catid){
    $category = get_category($catid);
    if ($category->category_parent > 0){
        return true;
    }
    return false;
}

/* Attivazione plugin pocket
/* ------------------------------------ */
add_action('init', 'pocket_wp_paolo_init');

if(!function_exists('pocket_wp_paolo_init')){
  function pocket_wp_paolo_init(){
    require 'plugin/pocket/pocket-wp-paolo.php';
  }
}

/* Attivazione utenteICC
/* ------------------------------------ */
require 'plugin/utenteicc/utenteicc.php';

/* Attivazione plugin bacheca
/* ------------------------------------ */
require 'plugin/bacheca/bacheca.php';

/* Attivazione plugin mappa
/* ------------------------------------ */
require 'plugin/mappa/mappa.php';

/* Attivazione plugin altriautori
/* ------------------------------------ */
require 'plugin/altriautori/altriautori.php';


/* Prima immagine del post.
/* ------------------------------------ */
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
    $first_img = "https://via.placeholder.com/305x207?text=ItaliaCheCambia.org";
  }
  return $first_img;
}


/*	Extract youtube video code from youtube link.
/* ------------------------------------ */
function linkifyYouTubeURLs($text) {
$text = preg_replace('~
# Match non-linked youtube URL in the wild. (Rev:20111012)
https?://         # Required scheme. Either http or https.
(?:[0-9A-Z-]+\.)? # Optional subdomain.
(?:               # Group host alternatives.
youtu\.be/      # Either youtu.be,
| youtube\.com    # or youtube.com followed by
\S*             # Allow anything up to VIDEO_ID,
[^\w\-\s]       # but char before ID is non-ID char.
)                 # End host alternatives.
([\w\-]{11})      # $1: VIDEO_ID is exactly 11 chars.
(?=[^\w\-]|$)     # Assert next char is non-ID or EOS.
(?!               # Assert URL is not pre-linked.
[?=&amp;+%\w]*      # Allow URL (query) remainder.
(?:             # Group pre-linked alternatives.
[\'"][^&lt;&gt;]*&gt;  # Either inside a start tag,
| &lt;/a&gt;          # or inside &lt;a&gt; element text contents.
)               # End recognized pre-linked alts.
)                 # End negative lookahead assertion.
[?=&amp;+%\w-]*        # Consume any URL (query) remainder.
~ix',
'$1',
$text);
return $text;
}

/*  Remove share button from end of article
/* ------------------------------------ */

function jptweak_remove_share() {
    remove_filter( 'the_content', 'sharing_display', 19 );
    remove_filter( 'the_excerpt', 'sharing_display', 19 );
    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}
add_action( 'loop_start', 'jptweak_remove_share' );

?>
