<?php

class MenuitemController extends Zend_Controller_Action
{

    public function init ()
    {
        /* Initialize action controller here */
    }

    public function indexAction ()
    {
        $menu = $this->_request->getParam('menu');
        $mdlMenu = new Model_Menu();
        $mdlMenuItem = new Model_MenuItem();
        $this->view->menu = $mdlMenu->find($menu)->current();
        $this->view->items = $mdlMenuItem->getItemsByMenu($menu);
    }

    public function addAction ()
    {
        $menu = $this->_request->getParam('menu');
        $mdlMenu = new Model_Menu();
        $this->view->menu = $mdlMenu->find($menu)->current();
        $frmMenuItem = new Form_MenuitemForm();
        if ($this->_request->isPost()) {
            if ($frmMenuItem->isValid($_POST)) {
                $data = $frmMenuItem->getValues();
                $mdlMenuItem = new Model_MenuItem();
                $mdlMenuItem->addItem($data['menu_id'], $data['label'], 
                        $data['page_id'], $data['link']);
                $this->_request->setParam('menu', $data['menu_id']);
                $this->_forward('index');
            }
        }
        $frmMenuItem->populate(
                array(
                        'menu_id' => $menu
                ));
        $this->view->form = $frmMenuItem;
    }
}



