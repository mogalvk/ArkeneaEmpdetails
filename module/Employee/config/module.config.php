<?php
 return array(
     'controllers' => array(
         'invokables' => array(
             'Employee\Controller\Employee' => 'Employee\Controller\EmployeeController',
         ),
     ),
     
     'router' => array(
         'routes' => array(
             'employee' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/employee[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Employee\Controller\Employee',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),     
     'view_manager' => array(
         'template_path_stack' => array(
             'Employee' => __DIR__ . '/../view',
         ),
     ),
 );