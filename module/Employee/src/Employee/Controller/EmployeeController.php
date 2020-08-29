<?php
 namespace Employee\Controller;

 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;
 
 use Employee\Model\Employee;
 use Employee\Form\EmployeeForm;

 class EmployeeController extends AbstractActionController
 {
     protected $employeeTable;
     public function indexAction()
     {
         
         return new ViewModel(array(
            'employees' => $this->getEmployeeTable()->fetchAll(), 
         ));
     }

     public function addAction()
     {
         $form = new EmployeeForm();
         $form->get('submit')->setValue('Add');
        
         $request = $this->getRequest();
         if($request->isPost())
         {
             $employee = new Employee();
             $form->setInputFilter($employee->getInputFilter());
             $form->setData($request->getPost());
            
             if($form->isValid())
             {
                 $employee->exchangeArray($form->getData());
                 $this->getEmployeeTable()->saveEmployee($employee);
                 
                 return $this->redirect()->toRoute('employee');
             }
         }
         
         return array('form' => $form);
     }

     public function editAction()
     {
         $id = (int) $this->params()->fromRoute('id', 0);
         if(!$id)
         {
             return $this->redirect()->toRoute('employee', array(
                'action'=> 'add'
             ));
         }
         try
         {
             $employee = $this->getEmployeeTable()->getEmployee($id);
         }
         catch(\Exception $ex)
         {
             return $this->redirect()->toRoute('employee', array(
                 'action' => 'index'
             ));
         }
         
         $form = new EmployeeForm();
         $form->bind($employee);
         $form->get('submit')->setAttribute('value', 'Edit');
         
         $reqest = $this->getRequest();
         if($reqest->isPost())
         {
             $form->setInputFilter($employee->getInputFilter());
             $form->setData($reqest->getPost());
             
             if($form->isValid())
             {
                 $this->getEmployeeTable()->saveEmployee($employee);
                 
                 return $this->redirect()->toRoute('employee');
             }
         }
         
         return array(
             'id' => $id,
             'form' => $form,
         );
         
     }

     public function deleteAction()
     {
         $id = (int) $this->params()->fromRoute('id', 0);
         if(!$id)
         {
             return $this->redirect()->toRoute('employee');
         }
         
         $request = $this->getRequest();
         if($request->isPost())
         {
             $del = $request->getPost('del', 'No');
             
             if($del == 'Yes')
             {
                 $id = (int) $request->getPost('id');
                 $this->getEmployeeTable()->deleteEmployee($id);
             }
             return $this->redirect()->toRoute('employee');
         }
         
         return array(
             'id' => $id,
             'employee' => $this->getEmployeeTable()->getEmployee($id)
         );
     }
     public function getEmployeeTable()
     {
         if (!$this->employeeTable) {
             $sm = $this->getServiceLocator();
             $this->employeeTable = $sm->get('Employee\Model\employeeTable');
         }
         return $this->employeeTable;
     }     
 }