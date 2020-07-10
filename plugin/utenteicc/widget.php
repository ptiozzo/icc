<?php

class icc_Widget_ICCUser extends WP_Widget {


  // Set up the widget name and description.
  public function __construct() {
    $widget_options = array( 'classname' => 'icc_Widget_ICCUser', 'description' => 'ICC Login' );
    parent::__construct( 'Widget_ICCUser', 'ICC Login', $widget_options );
  }


  // Create the widget output.
  public function widget( $args, $instance ) {
    if(is_user_logged_in()){
      $title = apply_filters( 'widget_title', $instance[ 'title' ] );
      echo $args['before_widget'];?>
      <div class="Widget_ICCUser p-2 mb-3">
      <?php if(is_user_logged_in()){
      echo $args['before_title'] . $title . $args['after_title'];

        $user_info = wp_get_current_user();
        ?>
          <?php echo get_avatar( $user_info->ID ); ?><br>
          <p class="pt-2 text-left p-0">Benvenuto
          <b><?php echo $user_info->display_name; ?></b>
          <span class="Widget_ICCUser_logout"><a href="/wp-login.php?action=logout">(logout)</a></span></p>

          <hr>
          <h5>Azioni:</h5>
          <p class="pt-2 text-left p-0"><a class="Widget_ICCUser_action" href="/wp-admin/profile.php">Modifica il tuo profilo</a></p>
          <p class="pt-2 text-left p-0"><a class="Widget_ICCUser_action" href="/nuovocercooffro/">Aggiungi nuovo cerco/offro</a></p>
          <p class="pt-2 text-left p-0"><a class="Widget_ICCUser_action" href="/wp-admin/edit.php?post_type=cerco-offro">Modifica i tuoi cerco/offro</a></p>
          <p class="pt-2 text-left p-0"><a class="Widget_ICCUser_action" href="/nuovarealtasegnalata/">Segnala una realtà</a></p>

        <?php
      }
      echo "</div>";
      echo $args['after_widget'];
    }
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
function icc_user_widget() {
  register_widget( 'icc_Widget_ICCUser' );
}
add_action( 'widgets_init', 'icc_user_widget' );


?>
