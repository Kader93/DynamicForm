<?php
namespace DynamicForm\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class DynamicFormController extends AbstractActionController
{
    public function indexAction()
    {
        $sm = $this->getServiceLocator();
        $DFS = $sm->get('DynamicFormService');
        $form = $DFS->get('membre');
        $form->setInputFilter($form->getInputFilter());
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            $form->isValid();
        }
        return array('form' => $form);
    }
}