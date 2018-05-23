<?php

/**
 * Extensions for the Mapping Northlake project.
 */
define('MAPPING_NORTHLAKE_DIR', dirname(__FILE__));

/**
 * Experimental Beijing plugin main class.
 */
class MappingNorthlakePlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = array(
        'public_home',
    );

    protected $_filters = array(
        'items_browse_default_sort',
        'collections_browse_default_sort',
        'exhibits_browse_default_sort',
    );

    protected $_recordTitleSort = array('Dublin Core,Title', 'ASC');


    public function hookPublicHome($args)
    {
        $view = $args['view'];
        // maybe do $view->partial('index/tiled_nav.php');
    }

    /**
     * Sort Item browsing results by Title by default.
     *
     * @param Array $sortArray
     * @return Array
     */
    public function filterItemsBrowseDefaultSort($sortArray)
    {
        return $this->_recordTitleSort;
    }

    /**
     * Sort Collections browsing results by Title by default.
     *
     * @param Array $sortArray
     * @return Array
     */
    public function filterCollectionsBrowseDefaultSort($sortArray)
    {
        return $this->_recordTitleSort;
    }

    /**
     * Sort Collections browsing results by Title by default.
     *
     * @param Array $sortArray
     * @return Array
     */
    public function filterExhibitsBrowseDefaultSort($sortArray, $args)
    {
        return array('title', 'ASC');
    }

}
