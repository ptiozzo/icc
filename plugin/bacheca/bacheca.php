<?php

/**
 * Plugin Name: Bacheca per portale ICC
 * Plugin URI: http://ptiozzo.net
 * Description: Bacheca cerco/offo per ItaliaCheCambia
 * Version: 0.1
 * Author: Paolo Tiozzo
 * Author URI: http://ptiozzo.net/
 * License: GPL2
 */


 add_action('init', 'bacheca_paolo_init');

 if(!function_exists('bacheca_paolo_init')){
   function bacheca_paolo_init(){
     require 'customuser-bacheca.php';
     require 'cpt-bacheca.php';
     require 'tassonomia-bacheca.php';
   }
 }


 ?>
