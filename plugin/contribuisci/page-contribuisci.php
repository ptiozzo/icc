<?php get_header(); ?>
<script>
    var date = new Date();
    date.setTime(date.getTime()+(7*24*60*60*1000));
    document.cookie = "contribuisci=close; expires=" + date.toGMTString() + ";path=/";
    jQuery(function($){
      $('#contribuisci').collapse('hide');
    });
</script>
<?php

if ($_SERVER['SERVER_NAME'] == 'www.italiachecambia.org'){
  $icc_paypal_API = 'ARN1KrIpgxFNuB0ZkZQ31y4CbJJ4o36N9TZSFajcSkvMrukjHzEQbjnsLAIjzauR9MBfGMNT3UtOwn7O';
  $icc10mese = 'P-37224294SU217912RLZWS6LQ';
  $icc20mese = 'P-5HE28648AN455770LLZWS65I';
  $icc50mese = 'P-3F385464EP992694TLZWTG7I';
  $icc100mese = 'P-9BR47289TH950191FLZWTHLY';
  $icc250mese = 'P-8ER19785J92642247LZWTH3Y';
  $icc500mese = 'P-9AM39017SH726754RLZWTIFI';
  $icc10anno = 'P-3PP066687Y715944MLZWTJIY';
  $icc20anno = 'P-06F43075088441902LZWTJSY';
  $icc50anno = 'P-50P95046WF434302CLZWTJ7A';
  $icc100anno = 'P-7NP38256C5143092CLZWTKJA';
  $icc250anno = 'P-2BR781013N798401DLZWTKXQ';
  $icc500anno = 'P-7F9378847M556733YLZWTLCI';
  $stripePuclicKey = 'pk_live_W3P46qkvQjMNSJ2iqyqX8y6S';
  $stripeSecretKey = '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';
}
else{ //se server differente da WWW
  $icc_paypal_API = 'AcuA_crJU2LOSvbTXAT907AY1CeUpQHqzwTpD5yxlRi4bLBAPs9OrrUps22VHoSc-WKGAgs-SQDio90M';
  $icc10mese = 'P-9AU56054CD509794XLY5KCRA';
  $icc20mese = 'P-2A100646DT395035VLY5KDCQ';
  $icc50mese = 'P-7U871187DY6980310LY5KEKY';
  $icc100mese = 'P-17D00947XB807025FLY5KFGY';
  $icc250mese = 'P-7EN57308226310709LY5KFTA';
  $icc500mese = 'P-0UM89965CV242504NLY5KF5I';
  $icc10anno = 'P-80480559B2684774KLY5OAVQ';
  $icc20anno = 'P-6AS83261CA290731ELY5OBCQ';
  $icc50anno = 'P-7GH57463U0107712NLY5OBOA';
  $icc100anno = 'P-2322185446664332VLY5OBYI';
  $icc250anno = 'P-67K52472AA427112VLY5OCGY';
  $icc500anno = 'P-8N131668LC884432DLY5OCQQ';
  $stripePuclicKey = 'pk_test_1zjiOt6qJcziwclR7zJjKo6y';
  $stripeSecretKey = 'sk_test_r58ISf4stLk3KN42ycM4S1O8';
}
 ?>

<div class="container contribuisci_form pt-4">
  <?php if( have_posts() ) : ?>
    <?php
      while(have_posts() ) : the_post();
  ?>
  <div class="row">
    <!-- AGGIUNTA PER NATALE! -->
    <?php
    $argsContribuisciPageTop = array(
      'post_type' => 'contenuti-speciali',
      'posts_per_page' => 1,
      'tax_query' => array(
        array(
            'taxonomy'=> 'contenuti_speciali_filtri',
            'field'   => 'slug',
            'terms'		=> 'contribuisci-pagina-top',
        ),
      ),
    );
    $loopContribuisciPegeTop = new WP_Query( $argsContribuisciPageTop );
    if($loopContribuisciPegeTop->have_posts()){
      while ($loopContribuisciPegeTop->have_posts()) {
        $loopContribuisciPegeTop->the_post();
        ?>
          <div class="col-12 mb-3">
            <div class="contribuisci p-3 rounded">

              <?php the_content(); ?>

            </div>
          </div>
        <?php
      }
    }
    wp_reset_postdata();
     ?>

    <!-- FINE AGGIUNTA PER NATALE! -->

    <!-- DESTINAZIONE CONTRIBUTO! -->
    <?php
    if ($_GET['destinazione']){
      $destinazione = $_GET['destinazione'];
    }else{
      $destinazione = 'Generico';
    }

    ?>

    <div class="col-12 col-lg-6 order-2 order-lg-1">
      <?php
        if ($_POST['submit_button']){

          if ($_POST['contributoLibero'] != ''){
              $amount = $_POST['contributoLibero'];
          }else{
            $amount = $_POST['contributo'];
          }
          ?>

          <form action="/contribuisci/grazie" id="contribuisci_ok" name="contribuisci_ok" method="post" style="display:none;">
            <input type="text" name="fullname" value="<?php echo $_POST['fullname'];?>" />
            <input type="text" name="fullsurname" value="<?php echo $_POST['fullsurname'];?>" />
            <input type="text" name="email" value="<?php echo $_POST['email'];?>" />
            <input type="text" name="telephone" value="<?php echo $_POST['telephone'];?>" />
            <input type="text" name="indirizzo" value="<?php echo $_POST['indirizzo'];?>" />
            <input type="text" name="citta" value="<?php echo $_POST['citta'];?>" />
            <input type="text" name="provincia" value="<?php echo $_POST['provincia'];?>" />
            <input type="text" name="cap" value="<?php echo $_POST['cap'];?>" />
            <input type="text" name="amount" value="<?php echo $amount;?>" />
            <input type="text" name="frequenza" value="<?php echo $_POST['frequenza'];?>" />
            <input type="text" name="destinazione" value="<?php echo $_POST['destinazione'];?>" />
          </form>

          <?php dynamic_sidebar('contribuisci2'); ?>

          <?php
          if ($_POST['frequenza'] == "singola"){ ?>

            <!-- Pagamento one time -->
            <h2>Contributo singolo</h2>
            <p><strong>Nome:</strong> <?php echo $_POST['fullname']; ?></p>
            <p><strong>Cognome:</strong> <?php echo $_POST['fullsurname']; ?></p>
            <p><strong>eMail:</strong> <?php echo $_POST['email']; ?></p>
            <p><strong>Telefono:</strong> <?php echo $_POST['telephone']; ?></p>
            <p><strong>Indirizzo:</strong> <?php echo $_POST['indirizzo']; ?></p>
            <p><strong>Città:</strong> <?php echo $_POST['citta']; ?></p>
            <p><strong>Provincia:</strong> <?php echo $_POST['provincia']; ?></p>
            <p><strong>CAP:</strong> <?php echo $_POST['cap']; ?></p>
            <p><strong>Contributo:</strong> <?php echo $amount; ?>€</p>
            <?php
            if ($_POST['destinazione'] != 'Generico'){
              ?>
              <p><strong>Destinazione:</strong> <?php echo $_POST['destinazione']; ?></p>
              <?php
            }
            ?>


            <?php
            if($_POST['metodoPagamento'] == 'stripe'){
              include 'stripe-singola.php';
            }
            if($_POST['metodoPagamento'] == 'paypal'){
             include 'paypal-singola.php';
            }

          }else{ //donazione periodica
            if($_POST['metodoPagamento'] == 'stripe'){
              include 'stripe-periodica.php';
            }
            if($_POST['metodoPagamento'] == 'paypal'){
             include 'paypal-periodica.php';
            }
          }

        }else{

      ?>
      <?php dynamic_sidebar('contribuisci1'); ?>
      <?php include 'form-contribuisci.php'; ?>
    <?php } ?>
    </div>


    <div class="col-12 col-lg-6 order-1 order-lg-2">
      <div class="contribuisci p-3 rounded">
        <h1><?php echo get_the_title(); ?></h1>
        <?php
        $argsContribuisciDestinazione = array(
          'post_type' => 'contenuti-speciali',
          'posts_per_page' => 1,
          'tax_query' => array(
            array(
                'taxonomy'=> 'contenuti_speciali_filtri',
                'field'   => 'slug',
                'terms'		=> 'contribuisci-'.$destinazione,
            ),
          ),
        );
        $loopContribuisciDestinazione = new WP_Query( $argsContribuisciDestinazione );
        if($loopContribuisciDestinazione->have_posts() && $destinazione != 'Generico' ){
          while( $loopContribuisciDestinazione->have_posts() ) : $loopContribuisciDestinazione->the_post();
            echo "<div class='contribuisci--destinazione rounded p-1'>";
            the_content();
            echo "</div>";
          endwhile;
          wp_reset_postdata();
        }
        else{
          echo the_content();
        }
        ?>
      </div>

    </div>
  </div>


  <?php
      endwhile;
  else:
  ?>

  <p>Non ho trovato nulla</p>

  <?php
  endif;
  ?>
</div> <!-- .content 	-->
<!-- carico footer -->
<?php get_footer(); ?>
