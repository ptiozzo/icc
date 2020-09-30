<?php

class icc_Widget_bacheca extends WP_Widget {


  // Set up the widget name and description.
  public function __construct() {
    $widget_options = array( 'classname' => 'icc_Widget_bacheca', 'description' => 'ICC Bacheca' );
    parent::__construct( 'Widget_bacheca', 'ICC Bacheca', $widget_options );
  }


  // Create the widget output.
  public function widget( $args, $instance ) {
    if($instance['regione'] != "_tutteleregioni"){
      $filtroRegione = array('relation' => 'OR',
                        array(
                            'taxonomy' => 'regione',
                            'field'    => 'slug',
                            'terms'    => $instance['regione'],
                        ),
                        array(
                            'taxonomy' => 'regione',
                            'field'    => 'slug',
                            'terms'    => 'aanazionale',
                        ),
                      );
    } else {
      $filtroRegione = '';
    }
    $argsBacheca = array(
        'post_type' => array('cerco-offro'),
        'posts_per_page' => 10,
        'tax_query' => array(
            'relation' => 'AND',
            $filtroRegione,
            array(
              'taxonomy' => 'cercooffro',
              'field'    => 'slug',
              'terms'    => 'risolto',
              'operator' => 'NOT IN',
            ),
          ),
        );
    $loopBacheca = new WP_Query( $argsBacheca );
    $i = 0;
    if ($loopBacheca->found_posts >= 2){
      $title = apply_filters( 'widget_title', $instance[ 'title' ] );
      echo $args['before_widget'];?>
      <div class="Widget_bacheca p-2 row">
        <div id="carouselBacheca" class="carousel carousel-control-top slide" data-ride="carousel" data-interval="1000">
          <div class="slider-top bg-dark d-flex flex-row align-items-center justify-content-between mb-2">
            <a class="carousel-control-prev" href="#carouselBacheca" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <ol class="carousel-indicators pr-2 text-white">
               <?php for ($count = 0;$count <= 10; $count++){ ?>
                       <li data-target="#carouselBacheca" data-slide-to="<?php echo $count;?>" <?php if($count == 0){echo 'class="active"';};?>><?php echo $count+1;?></li>
              <?php }	?>
              <p class=""> /<?php echo '5';?></p>
            </ol>
            <a class="carousel-control-next" href="#carouselBacheca" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <div class="carousel-inner">
            <?php
            while( $loopBacheca->have_posts() ) : $loopBacheca->the_post();
            $i++;
            if ($i % 2 == 1){ ?>
              <div class="carousel-item <?php if ($i == 1){echo 'active';} ?>">
                <div class="card-group">
            <?php
            }
            ?>
            <div class="col-6 text-break p-1">
              <?php
              $tipologia = get_the_terms( get_the_ID() , 'cercooffro' )[0]->slug;
              if ( has_post_thumbnail() ) {
                $image = get_the_post_thumbnail_url(get_the_ID(),'icc_ultimenewshome');
              }elseif ($tipologia == "cerco") {
                $image = get_template_directory_uri().'/plugin/bacheca/asset/img/Cerco.png';
              }elseif ($tipologia == "offro") {
                $image = get_template_directory_uri().'/plugin/bacheca/asset/img/Offro.png';
              }elseif ($tipologia == "Risolto") {
                $image = get_template_directory_uri().'/plugin/bacheca/asset/img/Risolto.png';
              } else {
                $image = catch_that_image();
              }
              ?>

                <div class="card h-100">
                  <img src="<?php echo $image;?>" class="card-img-top p-0" alt="<?php the_title(); ?>">
                  <div class="card-body p-1">
                    <h5 class="card-title"><?php the_title(); ?></h5>
                    <p class="card-text"><?php echo get_the_excerpt();?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Leggi di più</a>
                  </div>
                </div>
              </div>
                <?php
                if ($i % 2 == 0){ ?>
                    </div>
                  </div>
                <?php
                }
              endwhile;
              ?>
            </div>
            <?php
            if ($i % 2 == 1){ ?>
                </div>
              </div>
            <?php } ?>
        </div>
      </div>
      <?php
      echo $args['after_widget'];
    }
    wp_reset_query();
  }


  // Create the admin area widget settings form.
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $form_regioni = $instance['regione'];?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
      <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />

      <select id="<?php echo $this->get_field_id( 'regione' ); ?>" name="<?php echo $this->get_field_name( 'regione' ); ?>" class="custom-select mx-2" >
        <?php
          $categories = get_terms( array('taxonomy' => 'regione','hide_empty' => false,'orderby'=> 'slug','order' => 'ASC'));
          ?>
          <option value="_tutteleregioni" <?php if ($form_regioni == "_tutteleregioni") {echo 'selected';} ?>>Seleziona la regione</option>
          <?php
          foreach ($categories as $category) {
            if($category->slug != "_tutteleregioni"){
              $option = '<option value="'.$category->slug.'" ';
              if ($form_regioni == $category->slug) {$option .= 'selected ';};
              $option .= '>'.$category->name;
              $option .= '</option>';
              echo $option;
            }
          }
        ?>
      </select>
    </p><?php
  }


  // Apply settings to the widget instance.
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    $instance[ 'regione' ] = strip_tags( $new_instance[ 'regione' ] );
    return $instance;
  }

}

// Register the widget.
function icc_bacheca_widget() {
  register_widget( 'icc_Widget_bacheca' );
}
add_action( 'widgets_init', 'icc_bacheca_widget' );


?>
