<?php
$MacroLibrarsiTag = "";
$TagAttivi = get_option("ICC_MacroLibrarsi_Tag_Added") ? get_option("ICC_MacroLibrarsi_Tag_Added") : array();
$post_tags = get_the_tags();

if ( $post_tags ) {

    foreach( $post_tags as $tag ) {
      $result = array_search( $tag->slug ,array_column($TagAttivi, 'tagName') );
      if( $result !== false ){
        $MacroLibrarsiTag .= "<div class='sponsored my-3 row'>";
          $MacroLibrarsiTag .= "<h6 class='col-12  font-weight-lighter'>Sponsored</h6>";
          $MacroLibrarsiTag .= "<div class='col-12 col-md'>";
          ob_start();
          MacroLibrarsiAPI($TagAttivi[$result]['tagName1']);
          $MacroLibrarsiTag .= ob_get_clean();
          $MacroLibrarsiTag .= "</div>";

          if($TagAttivi[$result]['tagName2']){
            $MacroLibrarsiTag .= "<div class='col-12 col-md'>";
            ob_start();
            MacroLibrarsiAPI($TagAttivi[$result]['tagName2']);
            $MacroLibrarsiTag .= ob_get_clean();
            $MacroLibrarsiTag .= "</div>";
          }

          if($TagAttivi[$result]['tagName3']){
            $MacroLibrarsiTag .= "<div class='col-12 col-md'>";
            ob_start();
            MacroLibrarsiAPI($TagAttivi[$result]['tagName3']);
            $MacroLibrarsiTag .= ob_get_clean();
            $MacroLibrarsiTag .= "</div>";
          }

        $MacroLibrarsiTag .= "</div>";
      }
    }
}



$content .= $MacroLibrarsiTag;

 ?>
