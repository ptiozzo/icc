<?php

add_action( 'admin_menu', 'icc_menu_macro_admin' );
function icc_menu_macro_admin()
{
  add_submenu_page(
    'icc-theme',
    'ICC MacroLibrarsi integration',
    'Macrolibrarsi',
    'edit_posts',
    'icc-macro-integration',
    'icc_menu_admin_macro_integration'
  );
}

function icc_menu_admin_macro_integration()
{
  require 'admin-macro.php';
}

// Add signature or ad after post content
add_filter( "the_content", "MacroLibrarsi_after_content" );
function MacroLibrarsi_after_content($content){
  if (is_single() && ! is_admin() && get_post_type( get_the_ID() ) == 'post' ) {
    require 'tag-macro.php';
  }
  return $content;
}


add_shortcode( 'ICCMacroLibrarsi', 'ICCMacroLibrarsi_shortcode' );
if(!function_exists('ICCMacroLibrarsi_shortcode')){
  function ICCMacroLibrarsi_shortcode($atts) {
    $a = shortcode_atts( array(
      'code' => ''
   ), $atts );
     ob_start();
     MacroLibrarsiAPI($a['code']);
     return ob_get_clean();
  }
}

function MacroLibrarsiAPI($api) {
  if (get_transient('ICC_MacroLibrarsi_Tag_'.$api)){
    echo "<!-- da transient -->";
    echo get_transient('ICC_MacroLibrarsi_Tag_'.$api);
  }else{
    $url = "https://api.macrolibrarsi.it/v2/" . "products/" . $api;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $headers = array("Authorization: 5a63dfe013d3289fb225f9857499df418f84bbd5dc67d10c3d5e92ff435ad127");
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $method = "GET";
    switch ($method) {
        case "GET":
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
            break;
        case "POST":
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            break;
        case "DELETE":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            break;
    }
    $response = curl_exec($curl);
    $data = json_decode($response);

    /* Check for 404 (file not found). */
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    // Check the HTTP Status code
    switch ($httpCode) {
        case 200:
            $error_status = "200: Success";
            $macro = $data;

              echo "<!-- da API -->";
              $ICC_Macro_Table = '<table cellpadding="3" style="margin-bottom:30px">';
              $ICC_Macro_Table .= '<tr>';
              $ICC_Macro_Table .= '<td align="center" valign="top" width="140">';
              $ICC_Macro_Table .= '<a target="_blank" href="'.$macro->data->url.'?pn=4113" title="'.$macro->data->titolo.'" rel="sponsored noopener noreferrer">';
              $ICC_Macro_Table .= '<img loading="lazy" style="border:0; vertical-align: top" src="'.$macro->data->img_big.'" width="122" height="160" alt="'.$macro->data->titolo.'" />';
              $ICC_Macro_Table .= '</a>';
              $ICC_Macro_Table .= '</td>';
              $ICC_Macro_Table .= '<td>';
              $ICC_Macro_Table .= '<div>';
              $ICC_Macro_Table .= $macro->data->autori;
              $ICC_Macro_Table .= '</div>';
              $ICC_Macro_Table .= '<div>';
              $ICC_Macro_Table .= '<a target="_blank" href="'.$macro->data->url.'?pn=4113" title="'.$macro->data->titolo.'" style="font-weight:bold" rel="sponsored noopener noreferrer">';
              $ICC_Macro_Table .= $macro->data->titolo;
              $ICC_Macro_Table .= '</a>';
              $ICC_Macro_Table .= '</div>';
              $ICC_Macro_Table .= '<div>'.$macro->data->sottotitolo.'</div>';
              $ICC_Macro_Table .= '<div>';
              $ICC_Macro_Table .= '<a href="'.$macro->data->url_cart.'&pn=4113" title="'.$macro->data->titolo.'" rel="sponsored">';
              $ICC_Macro_Table .= '<img style="border:0" src="https://www.macrolibrarsi.it/img/carrello.gif" />';
              $ICC_Macro_Table .= '</a>';
              $ICC_Macro_Table .= '</div>';
              $ICC_Macro_Table .= '</td>';
              $ICC_Macro_Table .= '</tr>';
              $ICC_Macro_Table .= '</table>';

              set_transient('ICC_MacroLibrarsi_Tag_'.$api,$ICC_Macro_Table,rand(24,48) * HOUR_IN_SECONDS);

              $to = "webmaster@italiachecambia.org";
              $subject = "ICC - MacroLibrarsi API update";
              $body = "<html><body>";
              $body .= "Ciao <br>";
              $body .= "Aggiornamento del prodotto ".$api." avvenuto con successo<br>";
              $body .= "</body></html>";
              $headers = array('Content-Type: text/html; charset=UTF-8');
              $headers[] = 'From: Italia Che Cambia <checambiaitalia@gmail.com>';
              //$headers[] = 'Bcc: ptiozzo@me.com';

              wp_mail( $to, $subject, $body, $headers );


              echo $ICC_Macro_Table;

            return ($data);
            break;
        case 400:
            $error_status = "richiesta malformata, ad esempio se viene fatta una richiesta che le API non sanno gestire";
            break;
        case 401:
            $error_status = "è richiesta l'autenticazione";
            break;
        case 403:
            $error_status = "permessi non sufficienti per il tipo di richiesta";
            break;
        case 404:
            $error_status = "risorsa non trovata, ad esempio se viene richiesto un prodotto innesistente";
            break;
        case 429:
            $error_status = "superato il rate-limit di richieste";
            break;
        case 500:
            $error_status = "errore server";
            break;
        case 503:
            $error_status = "server in manutenzione";
            break;

    }
    curl_close($curl);
    $to = "webmaster@italiachecambia.org";
    $subject = "ICC - MacroLibrarsi API error";
    $body = "<html><body>";
    $body .= "Ciao <br>";
    $body .= "Errore nelle API di MacroLibrarsi <br>";
    $body .= $error_status."</body></html>";
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $headers[] = 'From: Italia Che Cambia <checambiaitalia@gmail.com>';
    //$headers[] = 'Bcc: ptiozzo@me.com';

    wp_mail( $to, $subject, $body, $headers );
    return('');
    echo $error_status;
    die;
  }
}
