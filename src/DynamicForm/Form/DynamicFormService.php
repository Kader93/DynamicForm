<?php
namespace DynamicForm\Form;
use DynamicForm\Model\FormConfigManager\FormConfigInterface;

class DynamicFormService
{
    protected $configform;
    protected $filterform;
    protected $arrayConfig = NULL;
    protected $arrayFilter = NULL;


    public function __construct(FormConfigInterface $configform, FormConfigInterface $filterform)
    {
        $this->configform = $configform;
        $this->filterform = $filterform;
    }


    protected  function initArrayFilter()
    {
        if ($this->arrayFilter == NULL) {
            $strContentsFilter = $this->filterform->getContents();
            $this->arrayFilter = $this->filterform->getArrayConfig($strContentsFilter);
        }
    }

    protected  function initArrayConfig()
    {
        if ($this->arrayConfig == NULL) {
            $strContents = $this->configform->getContents();
            $this->arrayConfig = $this->configform->getArrayConfig($strContents);
        }
    }

    public function get($name)
    {
        $this->initArrayConfig();
        $this->initArrayFilter();
        $getDF = $this->has($name);
        if ($getDF !== FALSE){
        $form = new DynamicForm($name);
            foreach ($this->arrayConfig[0][$name] as $element)
            {
                $form->addElement($element);
            }
        $form->setInputs($this->arrayFilter[0][$name]);
        return $form;
        }
        else {return FALSE;}
    }

    public function has($name)
    {
        $this->initArrayConfig();
        if(array_key_exists($name, $this->arrayConfig[0])){
            return $name;
        }

        else return false;
    }
}