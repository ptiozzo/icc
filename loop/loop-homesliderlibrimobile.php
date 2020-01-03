<?php
/* Query per Io faccio così/Meme
*---------------------*/
$argsLibri = array(
  'post_type' => 'nostri-libri',
  'posts_per_page' => -1,
);
$loopLibri = new WP_Query( $argsLibri );
$i = 0;

$page = $loopLibri->found_posts;


if( $loopLibri->have_posts() ) : ?>
  <div id="carouselLibriMobile" class="carousel carousel-control-top slide" data-ride="carousel" data-interval="false">
    <div class="slider-top bg-dark d-flex flex-row align-items-center justify-content-between mb-2">
      <a class="carousel-control-prev" href="#carouselLibriMobile" data-no-swup role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <ol class="carousel-indicators pr-2 text-white">
         <?php for ($count = 0;$count <= $page ; $count++){ ?>
                 <li data-target="#carouselRassegnaEvidenza" data-slide-to="<?php echo $count;?>" <?php if($count == 0){echo 'class="active"';};?>><?php echo $count+1;?></li>
        <?php }	?>
        <p class=""> /<?php echo $page;?></p>
      </ol>
      <a class="carousel-control-next" href="#carouselLibriMobile" data-no-swup role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="carousel-inner">
    <?php
    while( $loopLibri->have_posts() ) : $loopLibri->the_post();
    ?>
      <div class="carousel-item <?php if ($i == 0){echo 'active';} ?>">
        <div class="row">
          <div class="col-12 col-md-4 col-xs-6 my-3">

          <div id="post-<?php the_ID(); ?>" class="card border-0 p-0">
            <article <?php echo post_class(); ?>>
            <div class="category-bg"> </div>
            <div class="category pl-1">
              <span>
                <?php
                    echo 'I nostri libri';
                ?>
              </span>
              <?php the_post_thumbnail('icc_libri', array('class' => 'img-fluid card-img-top mx-auto d-block p-1','alt' => get_the_title())); ?>
            </div>
            <h5 class="card-title"><?php the_title(); ?></h5>

            <a href="<?php echo the_permalink();?>" class="stretched-link"></a>
            </article>
          </div>
        </div>
            </div>
          </div>
        <?php
        $i++;
  endwhile;
  ?>
  </div>
</div>
<?php
else:
  echo "<p>Non ho trovato nessun Libro</p>";
endif;
wp_reset_query();?>
