<?php
require_once 'Zend/Db/Table/Abstract.php';
require_once APPLICATION_PATH . '/models/ContentNode.php';

class Model_Page extends Zend_Db_Table_Abstract
{

    protected $_name = 'pages';

    protected $_dependentTables = array(
            'Model_ContentNode'
    );

    protected $_referenceMap = array(
            'Page' => array(
                    'columns' => array(
                            'parent_id'
                    ),
                    'refTableClass' => 'Model_Page',
                    'refColumns' => array(
                            'id'
                    ),
                    'onDelete' => self::CASCADE,
                    'onUpdate' => self::RESTRICT
            )
    );

    public function createPage ($name, $namespace, $parentId = 0)
    {
        // create the new page
        $row = $this->createRow();
        $row->name = $name;
        $row->namespace = $namespace;
        $row->date_created = time();
        $row->save();
        
        $id = $this->_db->lastInsertId();
        return $id;
    }

    public function updatePage ($id, $data)
    {
        // find the page
        $row = $this->find($id)->current();
        if ($row) {
            // update each of the columns in db
            $row->name = $data['name'];
            $row->parent_id = $data['parent_id'];
            $row->save();
            // unset saved data
            unset($data['id']);
            unset($data['name']);
            unset($data['parent_id']);
            // set other fields in content_nodes table
            if (count($data) > 0) {
                $mdlContentNode = new Model_ContentNode();
                foreach ($data as $key => $value) {
                    $mdlContentNode->setNode($id, $key, $value);
                }
            }
        } else {
            throw new Zend_Exception('Could not open page to update!');
        }
    }

    public function deletePage ($id)
    {
        $row = $this->find($id)->current();
        if ($row) {
            $row->delete();
            return true;
        } else {
            throw new Zend_Exception(
                    'Delete function failed; could not find page!');
        }
    }

    public function getRecentPages ($count = 10, $namespace = 'page')
    {
        $select = $this->select();
        $select->order('date_created ASC');
        $select->where('namespace = ?', $namespace);
        $select->limit($count);
        $results = $this->fetchAll($select);
        if ($results->count() > 0) {
            $pages = array();
            foreach ($results as $result) {
                $pages[$result->id] = new CMS_Content_Item_Page($result->id);
            }
            return $pages;
        } else {
            return null;
        }

    }
}