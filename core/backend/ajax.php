<?php
namespace tailwindJIT\backend;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

use tailwindJIT\Environment;
use tailwindJIT\Tailwind;
use tailwindJIT\Option;

class Ajax{

    public static function do(){
        add_action('wp_ajax_getNodeInfo',array('tailwindJIT\backend\Ajax','getNodeInfo'));
        add_action('wp_ajax_regenerateTailwindConfig',array('tailwindJIT\backend\Ajax','regenerateTailwindConfig'));
        add_action('wp_ajax_getOnSaveEventStatus',array('tailwindJIT\backend\Ajax','getOnSaveEventStatus'));
        add_action('wp_ajax_updateOnSaveEventStatus',array('tailwindJIT\backend\Ajax','updateOnSaveEventStatus'));
        add_action('wp_ajax_getDisableGlobalCss',array('tailwindJIT\backend\Ajax','getDisableGlobalCss'));
        add_action('wp_ajax_updateDisableGlobalCss',array('tailwindJIT\backend\Ajax','updateDisableGlobalCss'));
        add_action('wp_ajax_getInlineCssStatus',array('tailwindJIT\backend\Ajax','getInlineCssStatus'));
        add_action('wp_ajax_updateInlineCssStatus',array('tailwindJIT\backend\Ajax','updateInlineCssStatus'));
    }

    public static function getNodeInfo(){
        if(!wp_verify_nonce($_POST['toolkit_nonce'],'toolkit_nonce'))  wp_die();
        $nodeArray = Environment::getNVersion();
        $nodeArray['json'] = Environment::getPackageJsonInfo();
        echo json_encode($nodeArray);
        wp_die();       
    }

    public static function regenerateTailwindConfig(){
        if(!wp_verify_nonce($_POST['toolkit_nonce'],'toolkit_nonce'))  wp_die();
        echo json_encode(Tailwind::createFile(Tailwind::generateConfig(true)));
        wp_die();
    }

    public static function getOnSaveEventStatus(){
        if(!wp_verify_nonce($_POST['toolkit_nonce'],'toolkit_nonce'))  wp_die();
        echo json_encode(boolval(get_option('tailwindJITOnSaveUpdateEvent',false)));
        wp_die();
    }

    public static function updateOnSaveEventStatus(){
        if(!wp_verify_nonce($_POST['toolkit_nonce'],'toolkit_nonce'))  wp_die();
        echo json_encode(boolval(Option::toogle('tailwindJITOnSaveUpdateEvent')));
        wp_die();
    }
    
    /**
     * get global css enable disable status
     * @return void
     */
    public static function getDisableGlobalCss(){
        if(!wp_verify_nonce($_POST['toolkit_nonce'],'toolkit_nonce'))  wp_die();
        echo json_encode(boolval(get_option('tailwindJITDisableGlobalCss',false)));
        wp_die();
    }

    /**
     * enable disable wordpress global css
     * @return void
     */
    public static function updateDisableGlobalCss(){
        if(!wp_verify_nonce($_POST['toolkit_nonce'],'toolkit_nonce'))  wp_die();
        echo json_encode(boolval(Option::toogle('tailwindJITDisableGlobalCss')));
        wp_die();
    }

    /**
     * get inline css setting option
     *
     * @return void
     */
    public static function getInlineCssStatus(){
        if(!wp_verify_nonce($_POST['toolkit_nonce'],'toolkit_nonce'))  wp_die();
        echo json_encode(boolval(get_option('tailwindJITInlineCssStatus',false)));
        wp_die();
    }

    /**
     * update enable disable css Status
     *
     * @return void
     */
    public static function updateInlineCssStatus(){
        if(!wp_verify_nonce($_POST['toolkit_nonce'],'toolkit_nonce'))  wp_die();
        echo json_encode(boolval(Option::toogle('tailwindJITInlineCssStatus')));
        wp_die();
    }

}