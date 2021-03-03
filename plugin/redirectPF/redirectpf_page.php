<?php get_header(); ?>
<?php

  if($_GET['url']){

    $redirectSlugError = "";
    $redirectSlug = "";
    $time = 500;

    if( explode('checambia.org/persona/',$_GET['url'])[1] ){
      $redirectSlug = explode('checambia.org/persona/',$_GET['url'])[1];
    }elseif(explode('checambia.org/categoria/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/categoria/',$_GET['url'])[1];
    }elseif(explode('checambia.org/sp/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/sp/',$_GET['url'])[1];
    }elseif(explode('checambia.org/articolo/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/articolo/',$_GET['url'])[1];
    }elseif(explode('checambia.org/storie/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/storie/',$_GET['url'])[1];
    }elseif(explode('checambia.org/gruppo/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/gruppo/',$_GET['url'])[1];
    }elseif(explode('checambia.org/evento/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/evento/',$_GET['url'])[1];
    }elseif(explode('checambia.org/progetto/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/progetto/',$_GET['url'])[1];
    }elseif(explode('checambia.org/rete/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/rete/',$_GET['url'])[1];
    }elseif(explode('checambia.org/pagina/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/pagina/',$_GET['url'])[1];
    }elseif(explode('checambia.org/piazza/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/piazza/',$_GET['url'])[1];
    }elseif(explode('checambia.org/gruppi/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/gruppi/',$_GET['url'])[1];
    }elseif(explode('checambia.org/elenco/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/elenco/',$_GET['url'])[1];
    }elseif(explode('checambia.org/calendario/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/calendario/',$_GET['url'])[1];
    }elseif(explode('checambia.org/mappa/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/mappa/',$_GET['url'])[1];
    }elseif(explode('checambia.org/bacheca/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/bacheca/',$_GET['url'])[1];
    }elseif(explode('checambia.org/provincia/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/provincia/',$_GET['url'])[1];
    }elseif(explode('checambia.org/citta/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/citta/',$_GET['url'])[1];
    }elseif(explode('checambia.org/quartiere/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/quartiere/',$_GET['url'])[1];
    }elseif(explode('checambia.org/iscriviti/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/iscriviti/',$_GET['url'])[1];
    }elseif(explode('checambia.org/privacy/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/privacy/',$_GET['url'])[1];
    }elseif(explode('checambia.org/resetpassword/',$_GET['url'])[1]){
      $redirectSlug = explode('checambia.org/resetpassword/',$_GET['url'])[1];
    }

    elseif(strpos($_GET['url'], 'favicon.ico') !== false){
      $redirectSlug = "";
      $time = 0;
    }elseif(strpos($_GET['url'], 'robots.txt') !== false){
      $redirectSlug = "";
      $time = 0;
    }elseif(strpos($_GET['url'], 'piemonte.checambia.org') !== false){
      $redirectSlug = "piemonte";
      $time = 0;
    }elseif(strpos($_GET['url'], 'liguria.checambia.org') !== false){
      $redirectSlug = "liguria";
      $time = 0;
    }elseif(strpos($_GET['url'], 'casentino.checambia.org') !== false){
      $redirectSlug = "casentino";
      $time = 0;
    }elseif(strpos($_GET['url'], 'www.checambia.org') !== false){
      $redirectSlug = "";
      $time = 0;
    }



    else {
      $redirectSlugError = "URL non valido";
    }



    //$redirectSlugError = "PIPPO";
    if($redirectSlugError === "")
    {
      $to = "webmaster@italiachecambia.org";
      $subject = 'ICC - Redirect: '. $redirectSlug ;
      $body = "<html><body>";
      $body .= "Ciao <br>";
      $body .= "E' stato tentato un nuovo redirect. <br>";
      $body .=  "URL di provenienza ".$_GET['url'] . "<br>";
      $body .=  "URL di destinazione ".home_url() ."/". $redirectSlug ."<br>";
      $body .= "</body></html>";
      $headers = array('Content-Type: text/html; charset=UTF-8');
      $headers[] = 'From: Italia Che Cambia <checambiaitalia@gmail.com>';

      //wp_mail( $to, $subject, $body, $headers );
      ?>
      <script>
        setTimeout(function(){
          window.location.href = '<?php echo home_url(); ?>/<?php echo $redirectSlug; ?>';
        }, <?php echo $time; ?>);
      </script>
      <div class="alert alert-warning" role="alert">
        Redirect in corso verso <?php echo $redirectSlug; ?>
      </div>
      <?php

    }else{

      $to = "webmaster@italiachecambia.org";
      $subject = 'ICC - Redirect FALLITO';
      $body = "<html><body>";
      $body .= "Ciao <br>";
      $body .= "E' stato tentato un nuovo redirect. <br>";
      $body .=  "URL di provenienza ".$_GET['url'] . "<br>";
      $body .= "</body></html>";
      $headers = array('Content-Type: text/html; charset=UTF-8');
      $headers[] = 'From: Italia Che Cambia <checambiaitalia@gmail.com>';

      wp_mail( $to, $subject, $body, $headers );

      ?>
      <div class="container-fluid quattrozeroquattro">
        <div class="category-<?php echo get_term_by('name', single_cat_title('',false), 'category')->slug; ?> clearfix">
          <h1 class="pt-4">OPS!</h1>
          <!-- <?php echo "URL: ".$_GET['url']." - Redirect: ". $redirectSlug ?> -->
          <p>La pagina cercata non è stata trovata ed è stata segnalata alla redazione</p>
          <p>Puoi continuare la tua navigazione effettuando una ricerca tramite il form sottostante oppure puoi tornare in <a href="/">Home page</a></p>
          <div class="contenuti_header text-center ">
            <form class="mb-2" method="post" action="/cerca/">
                  <input class="mb-2" type="text" name="termine-cercato" value="<?php echo $searchterm; ?>">
                  <input name="submit_button" type="Submit" value="Cerca">
            </form>
          </div>
        </div>
      </div>
    <?php


    }




  }
  else
  {

    $to = "webmaster@italiachecambia.org";
    $subject = 'ICC - Redirect TENTATO';
    $body = "<html><body>";
    $body .= "Ciao <br>";
    $body .= "E' stato tentato un nuovo redirect. <br>";
    $body .= "Il parametro URL non è stato trovato!. <br>";
    $body .= "</body></html>";
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $headers[] = 'From: Italia Che Cambia <checambiaitalia@gmail.com>';

    wp_mail( $to, $subject, $body, $headers );
    ?>
    <script>
      setTimeout(function(){
        window.location.href = '<?php echo home_url(); ?>/<?php echo $redirectSlug; ?>';
      }, 0);
    </script>
  <?php } ?>
  <?php get_footer(); ?>
