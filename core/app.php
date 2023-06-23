<?php
namespace tailwindJIT;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * loading composer libs
*/
if(!file_exists(__DIR__ .DIRECTORY_SEPARATOR. '..' . DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php')) return;
require_once __DIR__ . DIRECTORY_SEPARATOR.'..' . DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
use tailwindJIT\backend\Ui;
use tailwindJIT\backend\Ajax;
use tailwindJIT\Environment;
use tailwindJIT\Html;
use tailwindJIT\Enqueue;
use tailwindJIT\Tailwind;
use tailwindJIT\Theme;

/**
 * initializing the plugin
 * note: Its fires before activtion hook
 */
 add_action('plugin_loaded',function(){

   /**
   * checking if node installed or not.
   */
   if(Environment::check() === false) return;

   /**
    * setting up the UI
    */
   Ui::activate();

   /**
    * enabling AJAX for the ui
    */
   Ajax::do();

   Theme::watch();

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

/**
 * task to do after plugin activation
 * 
 */
register_activation_hook(dirname(__DIR__) .DIRECTORY_SEPARATOR.'tailwind-jit.php',function(){

  $fileContent = Tailwind::generateConfig(true);
  Tailwind::createFile($fileContent);

});





