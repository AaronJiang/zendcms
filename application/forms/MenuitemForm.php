<?php

class Form_MenuitemForm extends Zend_Form
{

    public function init ()
    {
        $this->setMethod('post');
        
        $id = $this->createElement('hidden', 'id');
        $id->setDecorators(array(
                'ViewHelper'
        ));
        $this->addElement($id);
        
        $menuId = $this->createElement('hidden', 'menu_id');
        $menuId->setDecorators(array(
                'ViewHelper'
        ));
        $this->addElement($menuId);
        
        $label = $this->createElement('text', 'label');
        $label->setLabel('Label: ');
        $label->setRequired(TRUE);
        $label->addFilter('StripTags');
        $label->setAttrib('size', 40);
        $this->addElement($label);
        
        $pageId = $this->createElement('select', 'page_id');
        $pageId->setRequired(true);
        
        // populate this with the pages
        $mdlPage = new Model_Page();
        $pages = $mdlPage->fetchAll(null, 'name');
        $pageId->addMultiOption(0, 'None');
        if ($pages->count() > 0) {
            foreach ($pages as $page) {
                $pageId->addMultiOption($page->id, $page->name);
            }
        }
        $this->addElement($pageId);
        
        $link = $this->createElement('text', 'link');
        $link->setLabel('or specify a link: ');
        $link->setRequired(false);
        $link->setAttrib('size', 50);
        $this->addElement($link);
        $submit = $this->addElement('submit', 'submit', 
                array(
                        'label' => 'Submit',
                        'class' => 'btn'
                ));
    }
}