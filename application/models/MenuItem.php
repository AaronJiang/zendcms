<?php
require_once 'Zend/Db/Table/Abstract.php';

class Model_MenuItem extends Zend_Db_Table_Abstract
{

    protected $_name = 'menu_items';

    protected $_referenceMap = array(
            'Menu' => array(
                    'columns' => array(
                            'menu_id'
                    ),
                    'refTableClass' => 'Model_Menu',
                    'refColumns' => array(
                            'id'
                    ),
                    'onDelete' => self::CASCADE,
                    'onUpdate' => self::RESTRICT
            )
    );

    public function getItemsByMenu ($menuId)
    {
        $select = $this->select();
        $select->where('menu_id = ?', $menuId);
        $select->order('position');
        $items = $this->fetchAll($select);
        if ($items->count() > 0) {
            return $items;
        } else {
            return null;
        }
    }

    public function addItem ($menuId, $label, $pageId = 0, $link = null)
    {
        $row = $this->createRow();
        $row->menu_id = $menuId;
        $row->label = $label;
        $row->page_id = $pageId;
        $row->link = $link;
        $row->position = $this->_getLastPosition($menuId) + 1;
        return $row->save();
    }

    private function _getLastPosition ($menuId)
    {
        $select = $this->select();
        $select->where('menu_id = ?', $menuId);
        $select->order('position DESC');
        $row = $this->fetchRow($select);
        if ($row) {
            return $row->position;
        } else {
            return 0;
        }
    }
}