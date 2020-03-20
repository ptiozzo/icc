<div class="rassegna__footer container">
  <?php
  $args = array(
    'post_type' => 'rassegna-stampa',
    'posts_per_page' => 3,
    'post__not_in' => array($icc_article_ID),
  );
  $loop = new WP_Query( $args );
  if( $loop->have_posts() ) : ?>
    <h3 class="p-2">Archivio rassegna stampa</h3>
    <div class="row">
      <?php while( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="col-lg-4 col-md-6 my-3 text-break">
          <div id="post-<?php the_ID(); ?>" class="card border-0 p-0">
            <article <?php echo post_class(); ?>>
            <?php
              if ( has_post_thumbnail() ) {
                the_post_thumbnail('icc_ultimenewshome', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title()));
              }
              else{
                echo '<img class="img-fluid card-img-top mx-auto d-block p-1" src="'.catch_that_image().'" />';
              }
            ?>
            <h5 class="card-title"><?php the_title(); ?></h5>
            <p class="card-text pt-2"><?php echo get_the_excerpt();?></p>
            <a href="<?php echo the_permalink();?>" class="stretched-link"><div class="cta">Leggi di più</div></a>
            </article>
          </div>

        </div>
      <?php endwhile; ?>
      <div class="col-12 pb-2">
        <form class="pt-2 text-center" method="post" action="/contenuti/">
          <input name="contenuti-dropdown" type="hidden" value="rassegna-stampa">
          <input name="submit_button" type="submit" value="Vedi tutto" class="btn btn-lg btn-outline-dark">
        </form>
      </div>
    </div>
  <?php else: ?>
    <p>Non ho trovato nessun altra Rassegna</p>
  <?php endif; ?>
</div>
