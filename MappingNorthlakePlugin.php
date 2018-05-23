<?php

/**
 * Extensions for the Mapping Northlake project.
 */
define('MAPPING_NORTHLAKE_DIR', dirname(__FILE__));

/**
 * Mapping Northlake plugin main class.
 */
class MappingNorthlakePlugin extends Omeka_Plugin_AbstractPlugin
{

    protected $_filters = array(
        'collections_browse_default_sort',
        'exhibits_browse_default_sort',
        'items_browse_default_sort',
        'neatline_exhibits_browse_params',
    );

    protected $_recordTitleSort = array('Dublin Core,Title', 'ASC');

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

    /**
     * Sort Neatline Exhibit browsing results by title.
     *
     * Note: using neatline_exhibits_browse_default_sort will not work because
     * Neatline sets the sort direction prior to that filter, and the filter
     * does not run if a sort field is set. This is a neatline bug that should
     * probably be fixed. TODO: File a Neatline bug for this.
     *
     * @param Array $params
     * @return Array
     */
    public function filterNeatlineExhibitsBrowseParams($params)
    {
        $params['sort_field'] = 'title';
        $params['sort_dir'] = 'a';
        return $params;
    }

}
