<form class="form-row" action="<?php echo get_pagenum_link(); ?>" method="post">
  <!-- Filtro categoria -->
  <div class="form-group col-12 col-md-6 my-1">
    <select name="categoria-dropdown" class="custom-select" <?php if(get_query_var('categoria')){ echo 'disabled'; } ?>>
      <option value="tuttelecategorie" <?php if ($Categoria1 == 'tuttelecategorie') {echo 'selected';}?> ><?php echo 'Tutte le categorie'; ?></option>
      <?php
        $terms = get_terms( array(
          'taxonomy' => 'mappacategoria',
          'hide_empty' => false,
        ) );

        foreach ($terms as $category) {
          $option = '<option value="'.$category->slug.'" ';
          if ($Categoria1 == $category->slug) {$option .= 'selected ';};
          $option .= '>'.$category->name;
          $option .= '</option>';
          echo $option;
        }
      ?>
    </select>
  </div>

  <!-- Filtro rete -->
  <div class="form-group col-12 col-md-6 my-1">
    <select name="rete-dropdown" class="custom-select" <?php if(get_query_var('rete')){ echo 'disabled'; } ?>>
      <option value="tuttelereti" <?php if ($Rete1 == 'tuttelereti') {echo 'selected';}?> ><?php echo 'Tutte le reti'; ?></option>
      <?php
        $terms = get_terms( array(
          'taxonomy' => 'mapparete',
          'hide_empty' => false,
        ) );

        foreach ($terms as $category) {
          $option = '<option value="'.$category->slug.'" ';
          if ($Rete1 == $category->slug) {$option .= 'selected ';};
          $option .= '>'.$category->name;
          $option .= '</option>';
          echo $option;
        }
      ?>
    </select>
  </div>
  <!-- Filtro regione -->
  <?php
  if($Regione == "tutteleregioni"){ ?>
    <div class="form-group col-12 col-md-6 my-1">
      <?php
      if(get_query_var('regione')){
        echo "<input type='hidden' name='regione-dropdown' value='".get_query_var('regione')."'>";
      }
       ?>
      <select name="regione-dropdown" class="custom-select" <?php if(get_query_var('regione')){ echo 'disabled'; } ?>>
        <option value="tutteleregioni" <?php if ($Regione1 == 'tutteleregioni') {echo 'selected';}?> ><?php echo 'Tutte le regioni'; ?></option>
        <?php
          $terms = get_terms( array(
            'taxonomy' => 'mapparegione',
            'hide_empty' => false,
            'parent'        => 0,
          ) );
          foreach ($terms as $category) {
            $option = '<option value="'.$category->slug.'" ';
            if ($Regione1 == $category->slug) {$option .= 'selected ';};
            $option .= '>'.$category->name;
            $option .= '</option>';
            echo $option;
          }
        ?>
      </select>
    </div>
  <?php } ?>
  <!-- Filtro provincia -->
  <?php
    $terms = get_terms( array(
      'taxonomy' => 'mapparegione',
      'hide_empty' => false,
      'parent'        => get_term_by('slug',$Regione1,'mapparegione')->term_id,
    ) );
    if((get_term_by('slug',$Regione1,'mapparegione')->term_id != "" || get_query_var('regione')) && count($terms) > 0 ){
      ?>
        <div class="form-group col-12 col-md-6 my-1">
          <?php
          if(get_query_var('regione')){
            echo "<input type='hidden' name='provincia-dropdown' value='".get_query_var('provincia')."'>";
          }?>
          <select name="provincia-dropdown" class="custom-select" <?php if(get_query_var('provincia')) echo 'disabled'; ?>>
            <option value="tutteleprovince" <?php if ($Provincia1 == 'tutteleprovince') {echo 'selected';}?> ><?php echo 'Tutte le province'; ?></option>
            <?php
              $terms = get_terms( array(
                'taxonomy' => 'mapparegione',
                'hide_empty' => false,
                'parent'        => get_term_by('slug',$Regione1,'mapparegione')->term_id,
              ) );
              foreach ($terms as $category) {
                $option = '<option value="'.$category->slug.'" ';
                if ($Provincia1 == $category->slug) {$option .= 'selected ';};
                $option .= '>'.$category->name;
                $option .= '</option>';
                echo $option;
              }
            ?>
          </select>
        </div>
      <?php
    }

    ?>

  <!-- Filtro tipologia -->
  <div class="form-group col-12 col-md-6 my-1">
    <select name="tipologia-dropdown" class="custom-select" <?php if(get_query_var('tipologia')){ echo 'disabled'; } ?>>
      <option value="tutteletipologie" <?php if ($Tipologia1 == 'tutteletipologie') {echo 'selected';}?> ><?php echo 'Tutte le tipologie'; ?></option>
      <?php
        $terms = get_terms( array(
          'taxonomy' => 'mappatipologia',
          'hide_empty' => false,
        ) );

        foreach ($terms as $category) {
          $option = '<option value="'.$category->slug.'" ';
          if ($Tipologia1 == $category->slug) {$option .= 'selected ';};
          $option .= '>'.$category->name;
          $option .= '</option>';
          echo $option;
        }
      ?>
    </select>
  </div>
  <div class="form-group col-12 my-1">
    <input name="nome-realta" type="text" value="<?php if ($Realta1 != '') echo $Realta1; ?>" class="col-12 col-md-6 mb-2" placeholder="Cerca una realtà">
    <input name="submit_button" type="Submit" value="Applica i filtri" class="btn btn-primary">
    <input name="reset_button" type="Submit" value="Reset filtri" class="btn btn-warning">
    <?php
      if(get_query_var('regione')){
        echo "<a href='/mappa/' class='btn btn-success'>Torna alla mappa</a>";
      }
    ?>
  </div>
</form>
<?php

if(is_user_logged_in() && in_array(strtolower($Regione),['liguria'])) { ?>
  <form class="my-2" action="/nuovarealtasegnalata/" method="post">
    <input name="regionemappa" type="hidden" value="liguria">
    <input name="segnala_realta" type="Submit" value="Segnala una realtà" class="btn btn-success">
  </form>

<?php }

if(is_user_logged_in() && in_array(strtolower($Regione),['piemonte'])) { ?>
  <a href="http://piemonte.pianetafuturo.it" class="btn btn-success my-1" target="_blank" rel="nofollow">Segnala una realtà</a>

<?php } ?>
