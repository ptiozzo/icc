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
		register_sidebar(array( 'name' => esc_html__( 'Rassegna Stampa', 'icc' ),'id' => 'rassegna-stampa','description' => esc_html__( 'Normal full width sidebar.', 'icc' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	}
}
add_action( 'widgets_init', 'icc_sidebars' );

/*  Custom post type Campagne tematiche
/* ------------------------------------ */
function icc_campagne_tematiche_custom_post() {
    // creo e registro il custom post type
    register_post_type('campagne-tematiche', /* nome del custom post type */
        // definisco le varie etichette da mostrare nei menù
        array('labels' => array(
            'name' => 'Campagne Tematiche', /* nome, al plurale, dell'etichetta del post type. */
            'singular_name' => 'Campagna Tematica', /* nome, al singolare, dell'etichetta del post type. */
            'all_items' => 'Tutte le Campagne tematiche', /* testo nei menu che indica tutti i contenuti del post type */
            'add_new' => 'Aggiungi nuova campagna tematica', /*testo del pulsante Aggiungi. */
            'add_new_item' => 'Aggiungi nuova campagna', /* testo per il pulsante Aggiungi nuovo post type */
            'edit_item' => 'Modifica', /*  testo modifica */
            'new_item' => 'Nuovo', /* testo nuovo oggetto */
            'view_item' => 'Visualizza', /* testo per visualizzare */
            'search_items' => 'Cerca', /* testo per la ricerca*/
            'not_found' =>  'Nessuna campagna tematica trovata', /* testo se non trova nulla */
            'not_found_in_trash' => 'Nessuna campagna tematica trovata nel cestino', /* testo se non trova nulla nel cestino */
            'parent_item_colon' => ''
            ), /* fine dell'array delle etichette del menu */
            'description' => 'Campagne Tematiche', /* descrizione del post type */
            'public' => true, /* definisce se il post type sia visibile sia da front-end che da back-end */
            'publicly_queryable' => true, /* definisce se possono essere fatte query da front-end */
            'exclude_from_search' => false, /* esclude (false) il post type dai risultati di ricerca */
            'show_ui' => true, /* definisce se deve essere visualizzata l'interfaccia di default nel pannello di amministrazione */
            'query_var' => true,
            'menu_position' => 8, /* definisce l'ordine in cui comparire nel menù di amministrazione a sinistra */
            'menu_icon' => 'dashicons-layout', /* imposta l'icona da usare nel menù per il posty type */
            'rewrite'   => array( 'slug' => 'campagne-tematiche', 'with_front' => false ), /* specificare uno slug per leURL */
						'show_in_rest' => 'true', /* abilita gutemberg come editor */
            'has_archive' => true, /* definisci se abilitare la generazione di un archivio (tipo archive-cd.php) */
            'capability_type' => 'post', /* definisci se si comporterà come un post o come una pagina */
            'hierarchical' => false, /* definisci se potranno essere definiti elementi padri di altri */
            /* la riga successiva definisce quali elementi verranno visualizzati nella schermata di creazione del post */
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
        ) /* fine delle opzioni */
    ); /* fine della registrazione */

}
// Inizializzo la funzione
add_action( 'init', 'icc_campagne_tematiche_custom_post');


/*  Custom post type I nostri libri
/* ------------------------------------ */
function icc_nostri_libri_custom_post() {
    // creo e registro il custom post type
    register_post_type('nostri-libri', /* nome del custom post type */
        // definisco le varie etichette da mostrare nei menù
        array('labels' => array(
            'name' => 'I nostri libri', /* nome, al plurale, dell'etichetta del post type. */
            'singular_name' => 'Nostro libro', /* nome, al singolare, dell'etichetta del post type. */
            'all_items' => 'Tutti i libri', /* testo nei menu che indica tutti i contenuti del post type */
            'add_new' => 'Aggiungi nuovo libro', /*testo del pulsante Aggiungi. */
            'add_new_item' => 'Aggiungi libro', /* testo per il pulsante Aggiungi nuovo post type */
            'edit_item' => 'Modifica', /*  testo modifica */
            'new_item' => 'Nuovo', /* testo nuovo oggetto */
            'view_item' => 'Visualizza', /* testo per visualizzare */
            'search_items' => 'Cerca', /* testo per la ricerca*/
            'not_found' =>  'Nessuna libro trovato trovata', /* testo se non trova nulla */
            'not_found_in_trash' => 'Nessun libro trovato nel cestino', /* testo se non trova nulla nel cestino */
            'parent_item_colon' => ''
            ), /* fine dell'array delle etichette del menu */
            'description' => 'I nostri libri', /* descrizione del post type */
            'public' => true, /* definisce se il post type sia visibile sia da front-end che da back-end */
            'publicly_queryable' => true, /* definisce se possono essere fatte query da front-end */
            'exclude_from_search' => false, /* esclude (false) il post type dai risultati di ricerca */
            'show_ui' => true, /* definisce se deve essere visualizzata l'interfaccia di default nel pannello di amministrazione */
            'query_var' => true,
            'menu_position' => 8, /* definisce l'ordine in cui comparire nel menù di amministrazione a sinistra */
            'menu_icon' => 'dashicons-layout', /* imposta l'icona da usare nel menù per il posty type */
            'rewrite'   => array( 'slug' => 'nostri-libri', 'with_front' => false ), /* specificare uno slug per leURL */
						'show_in_rest' => 'true', /* abilita gutemberg come editor */
            'has_archive' => true, /* definisci se abilitare la generazione di un archivio (tipo archive-cd.php) */
            'capability_type' => 'post', /* definisci se si comporterà come un post o come una pagina */
            'hierarchical' => false, /* definisci se potranno essere definiti elementi padri di altri */
            /* la riga successiva definisce quali elementi verranno visualizzati nella schermata di creazione del post */
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
        ) /* fine delle opzioni */
    ); /* fine della registrazione */

}
// Inizializzo la funzione
add_action( 'init', 'icc_nostri_libri_custom_post');

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

//Aggiunta banner ATTIVATI dopo secondo paragrafo.

add_filter( 'the_content', 'prefix_insert_post_ads' );

function prefix_insert_post_ads( $content ) {
    $ad_code = '<div class="single__attivati">ATTIVATI</div>';
    if ( is_single() && ! is_admin() ) {
        return prefix_insert_after_paragraph( $ad_code, 2, $content );
    }
    return $content;
}

// Parent Function that makes the magic happen
function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {

        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }

        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }

    return implode( '', $paragraphs );
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
