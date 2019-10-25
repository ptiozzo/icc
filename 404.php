<?php get_header(); ?>
<div class="container-fluid cerca">
  <div class="category-<?php echo get_term_by('name', single_cat_title('',false), 'category')->slug; ?> clearfix">
    <h1 class="pt-4">OPS!</h1>
    <p>La pagina cercata non esiste, prova ad effettuare un'ulteriore ricerca, grazie</p>
    <p>La pagina è stata segnalata alla redazione!</p>
    <?php
    $to = 'ptiozzo@me.com';
    $subject = '[ICC] 404';
    $body = "E' stata trovata una pagina 404 <br>". get_pagenum_link();
    $headers = array('Content-Type: text/html; charset=UTF-8');

    wp_mail( $to, $subject, $body, $headers );
     ?>
    <div class="contenuti_header text-center ">
      <form class="mb-2" method="post" action="/cerca/">
            <input class="mb-2" type="text" name="termine-cercato" value="<?php echo $searchterm; ?>">
            <input name="submit_button" type="Submit" value="Cerca">
      </form>
    </div>
  </div>
</div>

<?php get_footer(); ?>
