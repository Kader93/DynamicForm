<?php
namespace DynamicForm\Controller;

use DynamicForm\Model\Membre;
use Zend\Mvc\Controller\AbstractActionController;
use DynamicForm\Form\DynamicForm;


class DynamicFormController extends AbstractActionController
{
    public function indexAction()
    {
        $filepath = \DynamicForm\Module::$ModuleLocation."/ressources/Json/membreForm.config.json";
        $form = new DynamicForm($filepath);
        $form->get('submit')->setValue("S'inscrire");
        $request = $this->getRequest();
        if ($request->isPost()) {
            $membre = new Membre();
            $form->setInputFilter($membre->getInputFilter());
            $form->setData($request->getPost());
            $form->isValid();
        }
        return array('form' => $form);
    }
}