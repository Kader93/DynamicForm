<?php
namespace DynamicForm;
use DynamicForm\Form\DynamicFormService;
use DynamicForm\Model\FormConfigManager\FileJson;

class Module {

    public static $ModuleLocation = __DIR__;

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ =>  __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfig()
    {
        return array(
        'factories' => array(
            'DynamicFormService' => function($sm) {
                $filepath1 = \DynamicForm\Module::$ModuleLocation . "/ressources/Json/Form.config.json";
                $filepath2 =  \DynamicForm\Module::$ModuleLocation . "/ressources/Json/FiltersConfig.json";
                $fileConfig = new FileJson($filepath1);
                $fileInputs = new FileJson($filepath2);
                $DFS = new DynamicFormService($fileConfig, $fileInputs);
                return $DFS;
            }
        ),
    );
    }
}