<?php


namespace DynamicForm\Form;


use Zend\Form\Form;


class DynamicForm extends Form
{

    public function __construct($filepath = null, $name = null)
    {
        parent::__construct('membre');
        $this->setAttribute('method', 'post');
    }

    public function build(){}

} 