<?php


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


/*  Custom post type Rassegna Stampa
/* ------------------------------------ */
function icc_rassegna_stampa_custom_post() {
    // creo e registro il custom post type
    register_post_type('rassegna-stampa', /* nome del custom post type */
        // definisco le varie etichette da mostrare nei menù
        array('labels' => array(
            'name' => 'Rassegne stampa', /* nome, al plurale, dell'etichetta del post type. */
            'singular_name' => 'La nostra rassegna stampa', /* nome, al singolare, dell'etichetta del post type. */
            'all_items' => 'Tutte le rassegne stampa', /* testo nei menu che indica tutti i contenuti del post type */
            'add_new' => 'Aggiungi nuova rassegna stampa', /*testo del pulsante Aggiungi. */
            'add_new_item' => 'Aggiungi rassegna stampa', /* testo per il pulsante Aggiungi nuovo post type */
            'edit_item' => 'Modifica', /*  testo modifica */
            'new_item' => 'Nuovo', /* testo nuovo oggetto */
            'view_item' => 'Visualizza', /* testo per visualizzare */
            'search_items' => 'Cerca', /* testo per la ricerca*/
            'not_found' =>  'Nessuna rassegna stampa trovata', /* testo se non trova nulla */
            'not_found_in_trash' => 'Nessuna rassegna stampa trovato nel cestino', /* testo se non trova nulla nel cestino */
            'parent_item_colon' => ''
            ), /* fine dell'array delle etichette del menu */
            'description' => 'Rassegna stampa', /* descrizione del post type */
            'public' => true, /* definisce se il post type sia visibile sia da front-end che da back-end */
            'publicly_queryable' => true, /* definisce se possono essere fatte query da front-end */
            'exclude_from_search' => false, /* esclude (false) il post type dai risultati di ricerca */
            'show_ui' => true, /* definisce se deve essere visualizzata l'interfaccia di default nel pannello di amministrazione */
            'query_var' => true,
            'taxonomies' => array('post_tag'),
            'menu_position' => 7, /* definisce l'ordine in cui comparire nel menù di amministrazione a sinistra */
            'menu_icon' => 'dashicons-layout', /* imposta l'icona da usare nel menù per il posty type */
            'rewrite'   => array( 'slug' => 'rassegna-stampa', 'with_front' => false ), /* specificare uno slug per leURL */
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
add_action( 'init', 'icc_rassegna_stampa_custom_post');

?>
