<aside class="sidebar">
  <?php
    if (is_page('piemonte'))
    {
      dynamic_sidebar('piemonte');
    }
    elseif (get_post_type() == 'rassegna-stampa')
    {
      dynamic_sidebar('rassegna-stampa');
    }
    elseif (is_page('casentino'))
    {
      dynamic_sidebar('casentino');
    }
    elseif (is_page('liguria'))
    {
      dynamic_sidebar('liguria');
    }
    else
      dynamic_sidebar('primary');

  ?>
</aside>
