<?php
namespace tailwindJIT;
if (!defined('ABSPATH')) exit; // Exit if accessed directly


use Symfony\Component\Process\Process;

class Environment{
    /**
     * This to provide npm version
     * @param void
     * @return string|bool
     */
    public static function check(){
        $process = new Process(['npm','-v']);
        $process->run();
        // executes after the command finishes
        if (!$process->isSuccessful()) {
            return false;
        }
        return $process->getOutput(); 
    }
    
   /**
    * This to return node and npm version as array
    * @param void 
    * @return array|bool    array as version infos and (false)bool as failure
    */
    public static function getNVersion(){
        $process = new Process(['node','-v']);
        $process->run();
        if (!$process->isSuccessful()) {
            return false;
        }
        return array('node'=>$process->getOutput(), 'npm'=>self::check());
        
    }
    
    /**
     * This to build production ready version of tailwindcss
     * @param void
     * @return bool true on sucess and false on failure
     */
    public static function build(){
        $workingDirectory = __DIR__ . DIRECTORY_SEPARATOR . 'assets' ;
        $npmCommand = new Process(['npx', 'mix' , '--production']);
        $npmCommand->setWorkingDirectory( $workingDirectory);
        $npmCommand->run();
        if(!$npmCommand->isSuccessful()) return false;
        return true;
    }

    /**
     * This to install node modules 
     * @return void
     */
    public static function install(){
        $workingDirectory = __DIR__ . DIRECTORY_SEPARATOR . 'assets';
        $npmCommand = new Process(['npm', 'install']);
        $npmCommand->setWorkingDirectory( $workingDirectory);
        if(!$npmCommand->isSuccessful()) return false;
        return true;
    }
   
}