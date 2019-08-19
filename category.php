<?php get_header(); ?>
<div class="content">
  <?php if( have_posts() ) : ?>
      <h2><?php echo single_cat_title();?></h2>
    <?php
      while(have_posts() ) : the_post();
  ?>

  <a href="<?php echo the_permalink();?>"><?php echo get_the_title(); ?></a><br />


  <?php

      endwhile;
 ?>
      <div class="pagination">
      <br />
        <?php
          $big = 999999999; // need an unlikely integer
          echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages
          ) );
        ?>
      </div><!-- .pagination -->
<?php
  else:
  ?>

  <p>Non ho trovato nulla</p>

  <?php
  endif;
  ?>
</div> <!-- .content 	-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
