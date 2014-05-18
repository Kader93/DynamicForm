<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'DynamicForm\Controller\DynamicForm' => 'DynamicForm\Controller\DynamicFormController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'dynamicform' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/dynamicform[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'DynamicForm\Controller\DynamicForm',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'dynamic-form' => __DIR__ . '/../view',
        ),
    ),
);