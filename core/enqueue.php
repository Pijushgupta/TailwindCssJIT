<?php 
namespace tailwindJIT;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Enqueue{
    public static function frontend(){
        if(get_option('tailwindJITInlineCssStatus',false) == false){
            add_action('wp_enqueue_scripts',array('tailwindJIT\Enqueue','addCss'));
        }else{
            add_action('wp_head',array('tailwindJIT\Enqueue','internalCss'));
        }


        /**
         * checking if `Disable WordPress global style` is enabled or not 
         * This to remove wordpress global css 
         */
        if(get_option('tailwindJITDisableGlobalCss',false) != false){
            add_action( 'wp_enqueue_scripts', array('tailwindJIT\Enqueue','deregister'), 100 );
        }
    }

    /**
     * adding tailwind css to the frontend
     *
     * @return void
     */
    public static function addCss(){
        wp_enqueue_style('tailwindCss',plugins_url('', __FILE__).'/../dist/main.css',array(),'1','all');
    }

    /**
     * append generated css to head
     *
     * @return void
     */
    public static function internalCss(){
        $css = file_get_contents(TAILWINDJITPATH.'dist'.DIRECTORY_SEPARATOR.'main.css');
        printf('<style id="%1$s">%2$s</style>','tailwindjit',$css);
    }

    /**
     * removing wordpress global css
     *
     * @return void
     */
    public static function deregister(){
        wp_dequeue_style('global-styles'); 
        wp_deregister_style('global-styles'); 
    }


}