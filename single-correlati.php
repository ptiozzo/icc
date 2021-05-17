<?php
  $orig_post = $post;
  global $post;
  $tags = wp_get_post_tags($post->ID);

  if ($tags) {
  $tag_ids = array();
  foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
  $args=array(
  'tag__in' => $tag_ids,
  'post__not_in' => array($post->ID),
  'posts_per_page'=>3, // Number of related posts to display.
  'caller_get_posts'=>1,
  'order_by' => 'rand',
  );

  $my_query = new wp_query( $args );
  ?>
  <div class="single__correlati mb-3 p-3">
    <h6 class='col-12 font-weight-lighter'>Articoli simili</h6>
    <div class="card-group">
      <?php
      while( $my_query->have_posts() ) {
        $my_query->the_post();
        ?>

            <div class="card">
              <?php
                if ( has_post_thumbnail() ) {
                  the_post_thumbnail('icc_ultimenewshome', array('class' => 'card-img-top p-0','alt' => get_the_title()));
                }else{
                  echo '<img class="card-img-top p-0" src="'.catch_that_image().'" />';
                }
              ?>
              <div class="card-body">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <p class="card-text"><?php //the_excerpt(); ?></p>
              </div>
              <div class="card-footer border-0 bg-transparent">
                <a href="<?php the_permalink(); ?>" class="stretched-link">Leggi di più</a>
              </div>

            </div>

      <?php }
      ?>
    </div>
  </div>
    <?php
  }
  $post = $orig_post;
  wp_reset_query();
  ?>
