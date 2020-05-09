<?php

class icc_Widget_CampagneTematiche extends WP_Widget {


  // Set up the widget name and description.
  public function __construct() {
    $widget_options = array( 'classname' => 'icc_Widget_CampagneTematiche', 'description' => 'Visualizza le campagne tematiche' );
    parent::__construct( 'Widget_CampagneTematiche', 'Visualizza campagne tematiche', $widget_options );
  }


  // Create the widget output.
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];
    $custom_query_args = array(
    'post_type' => 'campagne-tematiche',
    );
    $custom_query = new WP_Query( $custom_query_args );
     if ( $custom_query->have_posts() ) :
       while ( $custom_query->have_posts() ) : $custom_query->the_post();?>
        <a href="<?php the_permalink(); ?>">
          <figure>
            <?php the_post_thumbnail('icc_sidebar', array('class' => 'img-res','alt' => get_the_title())); ?>
          </figure>
          <h4><?php the_title(); ?></h4>
          <?php the_excerpt();?>
        </a>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    <?php echo $args['after_widget'];
  }


  // Create the admin area widget settings form.
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
      <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
    </p><?php
  }


  // Apply settings to the widget instance.
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    return $instance;
  }

}


class icc_Widget_UnaFavolaPuoFare extends WP_Widget {


  // Set up the widget name and description.
  public function __construct() {
    $widget_options = array( 'classname' => 'icc_Widget_UnaFavolaPuoFare', 'description' => 'Visualizza ultima favola' );
    parent::__construct( 'Widget_UnaFavolaPuoFare', 'Visualizza ultima favola', $widget_options );
  }


  // Create the widget output.
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];

    $custom_query_args = array(
    'category_name' => 'una-favola-puo-fare',
    'posts_per_page'=> 1,
    );

    $custom_query = new WP_Query( $custom_query_args );
     if ( $custom_query->have_posts() ) :
       while ( $custom_query->have_posts() ) : $custom_query->the_post();?>
        <a href="<?php the_permalink(); ?>">
          <figure class="my-0">
            <?php the_post_thumbnail('icc_sidebar', array('class' => 'img-res','alt' => get_the_title())); ?>
          </figure>
          <h4 class="my-1"><?php the_title(); ?></h4>
          <?php the_excerpt();?>
        </a>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    <?php echo $args['after_widget'];
  }
  // Create the admin area widget settings form.
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
      <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
    </p><?php
  }


  // Apply settings to the widget instance.
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    return $instance;
  }

}


class icc_Widget_ICCUser extends WP_Widget {


  // Set up the widget name and description.
  public function __construct() {
    $widget_options = array( 'classname' => 'icc_Widget_ICCUser', 'description' => 'ICC Login' );
    parent::__construct( 'Widget_ICCUser', 'ICC Login', $widget_options );
  }


  // Create the widget output.
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    echo $args['before_widget'];?>
    <div class="Widget_ICCUser p-2">
    <?php echo $args['before_title'] . $title . $args['after_title']; ?>
    <?php if(is_user_logged_in()){
      $user_info = wp_get_current_user();
      ?>
        <?php echo get_avatar( $user_info->ID ); ?><br>
        <p class="pt-2 text-left p-0">Benvenuto
        <b><?php echo $user_info->display_name; ?></b>
        <span class="Widget_ICCUser_logout"><a href="/wp-login.php?action=logout">(logout)</a></span></p>

        <hr>
        <h5>Azioni:</h5>
        <p class="pt-2 text-left p-0"><a class="Widget_ICCUser_action" href="wp-admin/post-new.php?post_type=cerco-offro">Aggiungi nuovo cerco/offro</a></p>

      <?php
    } else { ?>
    <div class="">
      <a href="/wp-login.php?redirect_to=/">Accedi</a>
      /
      <a href="wp-login.php?action=register">Registrati</a>
    </div>
    <?php }
    echo "</div>";
    echo $args['after_widget'];
  }


  // Create the admin area widget settings form.
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
      <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
    </p><?php
  }


  // Apply settings to the widget instance.
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    return $instance;
  }

}

// Register the widget.
function jpen_register_example_widget() {
  register_widget( 'icc_Widget_CampagneTematiche' );
  register_widget( 'icc_Widget_UnaFavolaPuoFare' );
  register_widget( 'icc_Widget_ICCUser' );
}
add_action( 'widgets_init', 'jpen_register_example_widget' );

?>
