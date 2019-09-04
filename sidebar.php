<aside class="sidebar">
  <?php
    if (is_category('piemonte-che-cambia'))
    {
      dynamic_sidebar('piemonte');
    }
    elseif (is_category('rassegna-stampa'))
    {
      dynamic_sidebar('rassegna-stampa');
    }
    else
      dynamic_sidebar('primary');

  ?>
</aside>
