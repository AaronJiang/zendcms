<?php

class SearchController extends Zend_Controller_Action
{

    public function init ()
    {
        /* Initialize action controller here */
    }

    public function indexAction ()
    {
        // action body
    }

    public function buildAction ()
    {
        // create the index
        $index = Zend_Search_Lucene::create(APPLICATION_PATH . '/indexes');
        
        // fetch all of the current pages
        $mdlPage = new Model_Page();
        $currentPage = $mdlPage->fetchAll();
        if ($currentPage->count() > 0) {
            // Create a new search document for each page
            foreach ($currentPage as $p) {
                $page = new CMS_Content_Item_Page($p->id);
                $doc = new Zend_Search_Lucene_Document();
                // you use an unindexed field for the id because you want the id
                // to be included in the search results but not searchable
                $doc->addField(
                        Zend_Search_Lucene_Field::unIndexed('page_id', 
                                $page->id));
                // you use text fields here because you want the content to be
                // searchable and to be returned in search results
                $doc->addField(
                        Zend_Search_Lucene_Field::text('page_name', $page->name));
                $doc->addField(
                        Zend_Search_Lucene_Field::text('page_headline', 
                                $page->headline));
                $doc->addField(
                        Zend_Search_Lucene_Field::text('page_description', 
                                $page->description));
                $doc->addField(
                        Zend_Search_Lucene_Field::text('page_content', 
                                $page->content));
                $index->addDocument($doc);
            }
        }
        
        $index->optimize();
        $this->view->indexSize = $index->numDocs();
    }
}



