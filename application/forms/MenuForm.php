<?php

class Form_MenuForm extends Zend_Form
{

    public function init ()
    {
        $this->setMethod('post');
        
        // create new element
        $id = $this->createElement('hidden', 'id');
        $id->setDecorators(array(
                'ViewHelper'
        ));
        $this->addElement($id);
        
        $name = $this->createElement('text', 'name');
        $name->setLabel('Name: ');
        $name->setRequired(TRUE);
        $name->setAttrib('size', 40);
        $name->addFilter('StripTags');
        $this->addElement($name);
        
        $submit = $this->addElement('submit', 'submit', 
                array(
                        'label' => 'Submit'
                ));
    }
}