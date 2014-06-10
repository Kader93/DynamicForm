<?php


namespace DynamicForm\Form;


use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use Zend\Form\Form;


class DynamicForm extends Form implements InputFilterAwareInterface
{
    protected $name;
    protected $inputs;
    protected $inputFilter;

    public function __construct($name)
    {
        $this->name = $name;
        parent::__construct($name);
        $this->setAttribute('method','post');
    }

    public function setInputs($inputs)
    {
        $this->inputs = $inputs;
    }

    public function addElement($element)
    {
        $this->add($element);
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        parent::setInputFilter($inputFilter);
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            foreach($this->inputs as $input){
                $inputFilter->add($factory->createInput(($input)));
            }
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }

} 