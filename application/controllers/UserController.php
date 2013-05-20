<?php

class UserController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function createAction()
    {
        $userForm = new Form_UserForm();
                if ($this->_request->isPost()) {
                    if ($userForm->isValid($_POST)) {
                        $userModel = new Model_User();
                        $userModel->createUser(
                                $userForm->getValue('username'), 
                                $userForm->getValue('password'), 
                                $userForm->getValue('first_name'), 
                                $userForm->getValue('last_name'), 
                                $userForm->getValue('role')
                        );
                        return $this->_forward('list');
                    }
                }
                $userForm->setAction('/user/create');
                $this->view->form = $userForm;
    }

    public function listAction()
    {
        $currentUsers = Model_User::getUsers();
        if ($currentUsers->count()>0){
            $this->view->users = $currentUsers;
        } else {
            $this->view->users = null;
        }
    }


}





