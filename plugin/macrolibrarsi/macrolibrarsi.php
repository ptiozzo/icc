<?php

add_action( 'admin_menu', 'icc_menu_macro_admin' );
function icc_menu_macro_admin()
{
  add_submenu_page(
    'icc-theme',
    'ICC Macro test',
    'Macrolibrarsi test',
    'edit_posts',
    'icc-macro-test',
    'icc_menu_admin_macro_test'
  );
}

function icc_menu_admin_macro_test()
{
  require 'admin-macro.php';
}

add_shortcode( 'ICCMacoLibrarsi', 'ICCMacoLibrarsi_shortcode' );

if(!function_exists('ICCMacoLibrarsi_shortcode')){
  function ICCMacoLibrarsi_shortcode($atts) {
    $a = shortcode_atts( array(
      'code' => ''
   ), $atts );
     ob_start();
     MacroLibrarsiAPI($a['code']);
     return ob_get_clean();
  }
}

function MacroLibrarsiAPI($api) {
    $url = "https://api.macrolibrarsi.it/v2/" . "products/" . $api;
    $curl = curl_init($url);
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
            ?>
              <table cellpadding="3" style="margin-bottom:30px">
                <tr>
                  <td align="center" valign="top" width="140">
                    <a target="_blank" href="<?php echo $macro->data->url.'?pn=4113'; ?>" title="<?php echo $macro->data->titolo; ?>" rel="sponsored noopener noreferrer">
                      <img loading="lazy" style="border:0; vertical-align: top" src="<?php echo $macro->data->img_big; ?>" width="122" height="160" alt="<?php echo $macro->data->titolo; ?>" />
                    </a>
                  </td>
                  <td>
                    <div>
                        <?php echo $macro->data->autori; ?>
                    </div>
                    <div>
                      <a target="_blank" href="<?php echo $macro->data->url.'?pn=4113'; ?>" title="<?php echo $macro->data->titolo; ?>" style="font-weight:bold" rel="sponsored noopener noreferrer">
                        <?php echo $macro->data->titolo; ?>
                      </a>
                    </div>
                    <div><?php echo $macro->data->sottotitolo; ?></div>
                    <div>
                      <a href="<?php echo $macro->data->url_cart.'&pn=4113'; ?>" title="<?php echo $macro->data->titolo; ?>" rel="sponsored">
                        <img style="border:0" src="https://www.macrolibrarsi.it/img/carrello.gif" />
                      </a>
                    </div>
                  </td>
                </tr>
              </table>
            <?php
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
        case 429:
            $error_status = "server in manutenzione";
            break;

    }
    curl_close($curl);
    echo $error_status;
    die;
}

 ?>
