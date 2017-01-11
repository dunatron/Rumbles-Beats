<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/01/17
 * Time: 4:22 PM
 */
class Track extends DataObject
{
    private static $db = array(
        'Title' => 'Text',
        'Description' => 'HTMLText',
    );

    private static $has_one = array(
        'Album'    =>  'Album',
        'TrackFile' =>  'File'
    );

    private static $summary_fields = array(
        'Title' => 'Title',
        'Description' => 'Description'
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        return $fields;
    }
}
