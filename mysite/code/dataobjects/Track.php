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
        'trackTitle' => 'Text',
        'trackDescription' => 'HTMLText',
    );

    private static $has_one = array(
        'Album'    =>  'Album',
        'TrackFile' =>  'File'
    );

    private static $summary_fields = array(
        'trackTitle' => 'trackTitle',
        'trackDescription' => 'trackDescription'
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        return $fields;
    }

    public function canView($member = null) {
        return true;
    }

    public function canEdit($member = null) {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canDelete($member = null) {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }

    public function canCreate($member = null) {
        return Permission::check('CMS_ACCESS_CMSMain', 'any', $member);
    }
}
