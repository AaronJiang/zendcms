<?php

class FeedController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function rssAction()
    {
        // build the feed array
        $feedArray = array();
        
        // the title and link are required
        $feedArray['title'] = 'Recent Pages';
        $feedArray['link'] = 'http://jianglong.org';
        
        // the published timestamp is optional
        $feedArray['published'] = Zend_Date::now()->toString(Zend_date::TIMESTAMP);
        $feedArray['charset'] = 'UTF8';
    }


}



