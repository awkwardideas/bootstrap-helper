<?php
namespace AwkwardIdeas\BootstrapHelper;

class BootstrapHelper{

    public function __construct()
    {

    }

    private static function GetBladeDirectory(){
        return getcwd().'/resources/views/';
    }

    public function PerformUpgrade(){
        $bladeFiles = rsearch(self::GetBladeDirectory(), "*.blade.php");
        $output = "";
        foreach($bladeFiles as  $bladeFile){
            $output .= $bladeFile . PHP_EOL;
        }
        return $output;
    }

    private function rsearch($folder, $pattern) {
        $dir = new RecursiveDirectoryIterator($folder);
        $ite = new RecursiveIteratorIterator($dir);
        $files = new RegexIterator($ite, $pattern, RegexIterator::GET_MATCH);
        $fileList = array();
        foreach($files as $file) {
            $fileList = array_merge($fileList, $file);
        }
        return $fileList;
    }
}