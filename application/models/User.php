<?php
require_once 'Zend/Db/Table/Abstract.php';

class Model_User extends Zend_Db_Table_Abstract
{

    protected $_name = 'users';

    public function createUser ($username, $password, $firstName, $lastName, 
            $role)
    {
        // create a new row
        $rowUser = $this->createRow();
        if ($rowUser) {
            // update the row values
            $rowUser->username = $username;
            $rowUser->password = md5($password);
            $rowUser->first_name = $firstName;
            $rowUser->last_name = $lastName;
            $rowUser->role = $role;
            $rowUser->save();
            return $rowUser;
        } else {
            throw new Zend_Exception('Could not create user!');
        }
    }

    public static function getUsers ()
    {
        $userModel = new self();
        $select = $userModel->select();
        $select->order(array(
                'last_name',
                'first_name'
        ));
        return $userModel->fetchAll($select);
    }
}
