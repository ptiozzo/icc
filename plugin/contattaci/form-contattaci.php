<?php

if( $_POST['submit_step3'] ){
  include "form-step4.php";
}elseif( $_POST['submit_step2'] ){
  include "form-step3.php";
}elseif( $_POST['submit_step1'] ){
  include "form-step2.php";
}else{
  include "form-step1.php";
}

?>
