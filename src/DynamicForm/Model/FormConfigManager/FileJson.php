<?php

namespace DynamicForm\Model\FormConfigManager;


class FileJson implements FormConfigInterface
{
    protected $filepath;

    public function __construct($filepath)
    {
        $this->filepath = $filepath;
    }

    public function getContents()
    {
        $fileinfo = pathinfo($this->filepath);
        if(file_exists($this->filepath) && $fileinfo['extension'] === 'json'){
            $strContentsFile = file_get_contents($this->filepath);
            return $strContentsFile;
        }
        else{throw new \Exception("file doesn't exist or hasn't the good extension");}
    }

    public function getArrayConfig($strContentsFile)
    {
        $arrayConfig = json_decode($strContentsFile, TRUE);
        if(!$arrayConfig == NULL){
            return $arrayConfig;
        }
        else{throw new \Exception("Parsing failed");}
    }

}