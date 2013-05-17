<?php

class MenuController extends Zend_Controller_Action
{

    public function init ()
    {
        /* Initialize action controller here */
    }

    public function indexAction ()
    {
        $mdlMenu = new Model_Menu();
        $this->view->menus = $mdlMenu->getMenus();
    }

    public function createAction ()
    {
        $frmMenu = new Form_MenuForm();
        if ($this->getRequest()->isPost()) {
            if ($frmMenu->isValid($_POST)) {
                $menuName = $frmMenu->getValue('name');
                $mdlMenu = new Model_Menu();
                $result = $mdlMenu->createMenu($menuName);
                if ($result) {
                    $this->_redirect('/menu/index');
                }
            }
        }
        
        $frmMenu->setAction('/menu/create');
        $this->view->form = $frmMenu;
    }

    public function editAction ()
    {
        $this->_request->getParam('id');
    }
}





