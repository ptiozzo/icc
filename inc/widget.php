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
    $blog_title = get_bloginfo( 'name' );
    $tagline = get_bloginfo( 'description' );

    echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; ?>
  		Contenuto del widget
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
