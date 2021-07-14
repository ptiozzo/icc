
<div class="accordion" id="accordion<?php echo str_replace(' ', '', block_value( 'titolo' )); ?>">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?php echo str_replace(' ', '', block_value( 'titolo' )); ?>" aria-expanded="true" aria-controls="collapseOne">
          <?php block_field( 'titolo' ); ?>
        </button>
      </h2>
    </div>

    <div id="collapse<?php echo str_replace(' ', '', block_value( 'titolo' )); ?>" class="collapse" aria-labelledby="heading<?php echo str_replace(' ', '', block_value( 'titolo' )); ?>" data-parent="#accordion<?php echo str_replace(' ', '', block_value( 'titolo' )); ?>">
      <div class="card-body">
        <?php block_field( 'contenuto' ); ?>
      </div>
    </div>
  </div>
</div>
