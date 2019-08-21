<aside class="sidebar">
  <?php
    if (is_category('piemonte-che-cambia'))
    {
      dynamic_sidebar('piemonte');
    }
    elseif (is_category('casentino-che-cambia'))
    {
      dynamic_sidebar('casentino');
    }
    else
      dynamic_sidebar('primary');

  ?>
</aside>
