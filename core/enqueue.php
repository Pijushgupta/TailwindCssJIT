<?php 
namespace tailwindJIT;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Enqueue{
    public static function frontend(){
        add_action('wp_enqueue_scripts',array('tailwindJIT\Enqueue','start'));
        add_action( 'wp_enqueue_scripts', array('tailwindJIT\Enqueue','deregister'), 100 );
    }

    public static function start(){
        wp_enqueue_style('tailwindCss',plugins_url('', __FILE__).'/../dist/main.css',array(),'1','all');
    }
    public static function deregister(){
        wp_dequeue_style('global-styles'); 
        wp_deregister_style('global-styles'); 
    }
}