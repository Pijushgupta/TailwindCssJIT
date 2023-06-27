<?php
namespace tailwindJIT;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

use tailwindJIT\Environment;

class Html{
    public static function generate(){
        /**
         * checking if `Update css file on save/update` option is enabled or not.
         */
        if(get_option('tailwindJITOnSaveUpdateEvent',false) == false) return;
        add_action('save_post',array('\tailwindJIT\Html','start'),99,3);
    }

    public static function start($post_id, $post, $update){
        //TODO: Check if new npx mix watch is already running or not. if running, skip environment build.
        if (wp_is_post_autosave($post_id)) {
            return;
        }
        if (!$update) { // if new object
            return;
        }
        $url = get_permalink($post_id);
        if(self::createFile($url,$post_id) === false) return;
        
        Environment::build();
       
    }

    public static function createFile($url,$post_id){
        /**
         * getting html from the url
         */
       $html =  file_get_contents($url);

        /**
         * checking if html is valid or not
         */
       if($html === false) return false;

        /**
         * setting locale path for the
         */
       $path = __DIR__ . DIRECTORY_SEPARATOR .'assets' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . (string)$post_id . '.html'; 
       $result = file_put_contents($path,$html);
       if($result === false) return false;
       return true;
    }
}