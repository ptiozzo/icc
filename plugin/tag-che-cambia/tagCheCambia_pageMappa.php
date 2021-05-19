
<?php get_header(); ?>
<?php

  if( get_query_var('tag') ){
    $tagPage = get_query_var('tag');
  } else {
    ?>
    <script type="text/javascript">
        window.location.href = '<?php echo home_url(); ?>';
    </script>
    <?php
  }

?>
<script>document.title = "<?php echo get_term_by('slug', $tagPage,'post_tag')->name; ?> - Mappa | <?php bloginfo('name')?>";</script>
<?php include('tagCheCambia-menu.php') ?>
<div class="container-fluid pt-4">

  <?php echo do_shortcode('[ICCmappa rete='.$tagPage.']'); ?>

</div><!-- .content 	-->
<!-- carico footer -->
<?php get_footer(); ?>
