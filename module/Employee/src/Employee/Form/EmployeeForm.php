<?php
 namespace Employee\Form;

 use Zend\Form\Form;

 class EmployeeForm extends Form
 {
     public function __construct($name = null)
     {
         // we want to ignore the name passed
         parent::__construct('employee');

         $this->add(array(
             'name' => 'id',
             'type' => 'Hidden',
         ));
         $this->add(array(
             'name' => 'name',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Employee Name',
             ),
         ));
         $this->add(array(
             'name' => 'address',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Address',
             ),
         ));
         $this->add(array(
             'name' => 'email_add',
             'type' => 'Text',
             'options' => array(
                 'label' => 'Email Address',
             ),
         )); 
         $this->add(array(
             'name' => 'phone',
             'type' => 'Number',
             'options' => array(
                 'label' => 'Phone',
             ),
         ));
         $this->add(array(
             'name' => 'dob',
             'type' => 'Date',
             'options' => array(
                 'label' => 'Date of Birth',
             ),
               'attributes' => array(
                 'id' => 'datepicker',
             ),
             
         ));  
         $this->add(array(
             'name' => 'image',
             'type' => 'File',
             'options' => array(
                 'label' => 'Employee Image',
             ),
         ));  
         $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
         ));
     }
 }