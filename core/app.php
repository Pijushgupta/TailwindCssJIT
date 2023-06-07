<?php
namespace tailwindJIT;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * loading composer libs
*/
if(!file_exists(__DIR__ .DIRECTORY_SEPARATOR. '..' . DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php')) return;
require_once __DIR__ . DIRECTORY_SEPARATOR.'..' . DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
use tailwindJIT\backend\Ui;
use tailwindJIT\Environment;
use tailwindJIT\Html;
use tailwindJIT\Enqueue;

/**
 * initializing the plugin
 */
 add_action('plugin_loaded',function(){

   Ui::activate();

   /**
   * checking if node installed or not.
   */
   if(Environment::check() === false) return;

   /**
   * will generate html on post/page/custom_post_type save
   * and will generate Tailwindcss for the same
   */
   Html::generate();

   /**
   * enqueuing the generated css
   */
    Enqueue::frontend();
 });




