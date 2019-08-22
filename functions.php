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
		wp_enqueue_style( 'icc-normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css');
		wp_enqueue_style( 'icc', get_template_directory_uri().'/style.css');
		//wp_enqueue_script('jquery');
		wp_enqueue_script( 'icc-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ),'', true );
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
		add_image_size( 'icc_single', 800, 493, true ); //(cropped)
		add_image_size( 'icc_big', 1400, 928, true ); 	//(cropped)
		add_image_size( 'icc_category', 200, 200, true ); 	//(cropped)
		// Custom menu areas
		register_nav_menus( array(
			'menu-principale' => esc_html__( 'Menu principale', 'icc' ),
			'menu-social' => esc_html__( 'Menu social', 'icc' ),
			'menu-footer' => esc_html__( 'Menu footer', 'icc' ),
			'menu-i-nostri-contenuti' => esc_html__( 'Menu i nostri contenuti', 'icc' ),
			'menu-regioni' => esc_html__( 'Menu regioni', 'icc' ),
			'menu-salute' => esc_html__( 'Menu salute', 'icc' ),
			'menu-piemonte' => esc_html__( 'Menu piemonte', 'icc' ),
			'menu-casentino' => esc_html__( 'Menu casentino', 'icc' ),
		) );
	}
}
add_action( 'after_setup_theme', 'icc_setup' );

/*  Register sidebars
/* ------------------------------------ */
if ( ! function_exists( 'icc_sidebars' ) ) {
	function icc_sidebars()	{
		register_sidebar(array( 'name' => esc_html__( 'Primary', 'icc' ),'id' => 'primary','description' => esc_html__( 'Normal full width sidebar.', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Piemonte', 'icc' ),'id' => 'piemonte','description' => esc_html__( 'Normal full width sidebar.', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		register_sidebar(array( 'name' => esc_html__( 'Casentino', 'icc' ),'id' => 'casentino','description' => esc_html__( 'Normal full width sidebar.', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	}
}
add_action( 'widgets_init', 'icc_sidebars' );

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


?>
