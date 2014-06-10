<?php

namespace DynamicForm\Model\FormConfigManager;
use DynamicForm\Model\FormConfigManager;

//require '/Users/Kader/ZendAppli/DynamicForm/src/DynamicForm/Model/FormConfigManager/AbstractFormConfigManager.php';

class File extends AbstractFormConfigManager {

    protected $filepath;

    public function __construct($filepath)
    {
        $this->filepath = $filepath;
    }

    public function getContentsFile()
    {
        $fileinfo = pathinfo($this->filepath);
        if(file_exists($this->filepath) && $fileinfo['extension'] = 'json'){
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

    public function isValidElement($element)
    {
        if (!is_array($element)) {
            return FALSE;
        }

        $this->loadConfigElement();

        $elementCheck = array_merge(
            array(
                'name'          => NULL,
                'type'          => NULL,
                'options' => array(
                    'label' => NULL,
                    'value_options' => array(),
                ),
                'attributes'    => array(
                    'type'      => NULL,
                    'value'     => NULL,
                    'id'        => NULL,
                ),
            ),
            $element
        );

        if ($elementCheck['name'] === NULL AND $elementCheck['type']) {
            return FALSE;
        }
        return $elementCheck;
    }
}