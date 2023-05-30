<?php
namespace tailwindJIT;
if (!defined('ABSPATH')) exit; // Exit if accessed directly


use Symfony\Component\Process\Process;

class Environment{

    public static function check(){
        $process = new Process(['npm','-v']);
        $process->run();
        // executes after the command finishes
        if (!$process->isSuccessful()) {
            return false;
        }
        return $process->getOutput(); 
    }

    public static function build(){
        $workingDirectory = __DIR__ . DIRECTORY_SEPARATOR . 'assets' ;
        $npmCommand = new Process(['npx', 'mix' , '--production']);
        $npmCommand->setWorkingDirectory( $workingDirectory);
        $npmCommand->run();
        if(!$npmCommand->isSuccessful()) return false;
        return true;
    }
    public static function install(){
        $workingDirectory = __DIR__ . DIRECTORY_SEPARATOR . 'assets';
        $npmCommand = new Process(['npm', 'install']);
        $npmCommand->setWorkingDirectory( $workingDirectory);
        if(!$npmCommand->isSuccessful()) return false;
        return true;
    }
   
}