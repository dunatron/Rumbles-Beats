<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/01/17
 * Time: 4:01 PM
 */
class LandingPage extends Page
{

    private static $singular_name        = "LandingPage";
    private static $plural_name          = "LandingPages";
    private static $db = array();
    
    static $defaults = array (
	    'ShowInMenus' => false,
	    'ShowInSearch' => false
    );
    
    private static $has_one = array();

    private static $has_many = array();

    private static $many_many = array();

    private static $belongs_many_many = array();

    private static $many_many_extraFields = array();

    private static $casting = array();

    private static $default_sort = '';

    private static $field_labels = array();

    private static $summary_fields = array();

    private static $required_fields = array(); //enforced through the "validate" method

    private static $searchable_fields = array();

    private static $default_child = "";

    private static $can_be_root = true;

    private static $hide_ancestor = null;
    
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();


        
        return $fields;
    }
    
}
class LandingPage_Controller extends Page_Controller
{

    /**
     * array (
     *     'action', // anyone can access this action
     *     'action' => true, // same as above
     *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
     *     'action' => '->checkAction' // you can only access this action if >checkAction() returns true
     * );
     * @var array
     */
    private static $allowed_actions = array(
        'getAllAlbums',
        'show'
    );

    public function getAllAlbums()
    {
        $f = new JSONDataFormatter();
        $albums = Album::get();

        $convert = $f->convertDataObjectSet($albums);
        return $convert;
    }

    public function albumLink()
    {
        return '/album/';
    }

    public function show(SS_HTTPRequest $request) {
        $album = Album::get()->byID($request->param('ID'));
        $tracks = Track::get()->filter('AlbumID', $album->ID);
	    
        return array (
            'Album' => $album,
            'Tracks' => $tracks
        );
    }

    public function init()
    {
        parent::init();
    }
}


