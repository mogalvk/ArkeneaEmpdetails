<?php
 namespace Employee\Model;
 
 use Zend\InputFilter\InputFilter;
 use Zend\InputFilter\InputFilterAwareInterface;
 use Zend\InputFilter\InputFilterInterface;

 class Employee
 {
     public $id;
     public $name;
     public $address;
     public $email_add;
     public $phone;
     public $dob;
     public $image;
     protected $inputFilter;

     public function exchangeArray($data)
     {
         $this->id     = (!empty($data['id'])) ? $data['id'] : null;
         $this->name = (!empty($data['name'])) ? $data['name'] : null;
         $this->address  = (!empty($data['address'])) ? $data['address'] : null;
         $this->email_add    = (!empty($data['email_add'])) ? $data['email_add'] : null;
         $this->phone    = (!empty($data['phone'])) ? $data['phone'] : null;
         $this->dob         = (!empty($data['dob'])) ? $data['dob'] : null;
//         $this->image         = (!empty($data['image'])) ? $data['image'] : null;
         if(!empty($data['image'])) { 
         if(is_array($data['image'])) { 
            $this->imagepath = str_replace("./public", "", 
               $data['image']['tmp_name']); 
         } else { 
            $this->imagepath = $data['image']; 
         } 
      } else { 
         $data['image'] = null; 
      } 
   
     }
     public function getArrayCopy()
     {
         return get_object_vars($this);
     }     
     
     public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }

     public function getInputFilter()
     {
         if (!$this->inputFilter) {
             $inputFilter = new InputFilter();
/*
             $inputFilter->add(array(
                 'name'     => 'id',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Int'),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'name',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'address',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             ));
             $inputFilter->add(array(
                 'name'     => 'email_add',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             ));
             $inputFilter->add(array(
                 'name'     => 'phone',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             ));             
             $inputFilter->add(array(
                 'name'     => 'dob',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                     array('name' => 'Int'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'digits',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             ));
         $file = new FileInput('image'); 
         $file->getValidatorChain()->attach(new UploadFile()); 
         $file->getFilterChain()->attach( 
            new RenameUpload([ 
               'target'    => './public/tmpuploads/file', 
               'randomize' => true, 
               'use_upload_extension' => true 
            ])); 
            $inputFilter->add($file); 
 * 
 */
             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
     }
     
 }
