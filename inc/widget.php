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

// Register the widget.
function jpen_register_example_widget() {
  register_widget( 'icc_Widget_CampagneTematiche' );
}
add_action( 'widgets_init', 'jpen_register_example_widget' );

?>
