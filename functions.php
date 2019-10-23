<?php

//remove version
function wpbeginner_remove_version() {
	return '';
}
add_filter('the_generator', 'wpbeginner_remove_version');

// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );


/*  Include Styles & Script
/* ------------------------------------ */
if ( ! function_exists( 'icc_styles_scripts' ) ) {
	function icc_style_scripts() {
		//wp_enqueue_script;
		wp_enqueue_style( 'icc-sourcesanspro','//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700');
		//wp_enqueue_style( 'icc-normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css');
		wp_enqueue_style( 'icc2', get_template_directory_uri().'/assets/css/main.css');
		wp_enqueue_style( 'icc6', get_template_directory_uri().'/assets/css/modules/chi-siamo/index.css');
		wp_enqueue_style( 'icc8', get_template_directory_uri().'/assets/css/modules/visione/index.css');
		wp_enqueue_style( 'icc12', get_template_directory_uri().'/assets/css/modules/sostienici/index.css');
		wp_enqueue_style( 'icc-bootstrap-css', get_template_directory_uri().'/assets/css/bootstrap.min.css');
		wp_enqueue_style( 'icc', get_template_directory_uri().'/style.css');

		wp_enqueue_script('jquery');

		wp_enqueue_script( 'icc-scripts2', get_template_directory_uri() . '/assets/js/app.js','','',true);
		wp_enqueue_script( 'icc-scripts3', get_template_directory_uri() . '/assets/js/plugins/jquery.min.js');
		wp_enqueue_script( 'icc-scripts4', get_template_directory_uri() . '/assets/js/plugins/jquery.easing.min.js');
		wp_enqueue_script( 'icc-popper-js', get_template_directory_uri().'/assets/js/popper.min.js','','',true);
		wp_enqueue_script( 'icc-bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js','','',true);
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
		register_sidebar(array( 'name' => esc_html__( 'Primary', 'icc' ),'id' => 'primary','description' => esc_html__( 'Normal full width sidebar.', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Piemonte', 'icc' ),'id' => 'piemonte','description' => esc_html__( 'Normal full width sidebar.', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Casentino', 'icc' ),'id' => 'casentino','description' => esc_html__( 'Normal full width sidebar.', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Rassegna Stampa', 'icc' ),'id' => 'rassegna-stampa','description' => esc_html__( 'Normal full width sidebar.', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	}
}
add_action( 'widgets_init', 'icc_sidebars' );

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

/*  Custom post type
/* ------------------------------------ */
require 'inc/custom-post.php';

/*  Bootstrap pagination
/* ------------------------------------ */
require 'inc/bootstrap-pagination.php';

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
        'icc_menu_admin_page' // callback function
    );
		add_submenu_page(
			'icc-theme',
			'ICC Istruction',
			'Istruzioni tema',
			'administrator',
			'icc-theme-istruction',
			'icc_menu_admin_page_istruction'
		);

}
function icc_menu_admin_page()
{
    require 'adm/theme.php';
}
function icc_menu_admin_page_istruction()
{
  require 'adm/theme-istruction.php';
}

/* Inizio una sessione
/* ------------------------------------ */
function start_session() {
	if(!session_id()) {
	session_start();
	}
}
add_action('init', 'start_session', 1);


/* Aggiunta banner ATTIVATI dopo secondo paragrafo.
/* ------------------------------------ */
require 'inc/attivati.php';


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
    $first_img = "https://via.placeholder.com/305x207?text=ItaliaCheCambiia.org";
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
