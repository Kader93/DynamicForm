<?php
namespace EspaceMembre\Form;

use EspaceMembre\Form\configInterface;

class configJson implements configFileInterface{

    public function getContentsFile($file = NULL)
    {
        $filepath = pathinfo($file);
        if(file_exists($file) && $filepath['extension'] = 'json'){
            $contentConfig = file_get_contents($file);
            return $contentConfig;
        }
        else{throw new \Exception("file doesn't exist or hasn't the good extension");}
    }
    public function getArrayConfig($strContentsFile)
    {

    }
    public function isValidElement($element)
    {

    }
}