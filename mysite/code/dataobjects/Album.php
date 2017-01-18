<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/01/17
 * Time: 4:21 PM
 */
class Album extends DataObject
{
    private static $db = array(
        'albumTitle' => 'Text',
        'albumDescription' => 'HTMLText',
    );

    private static $has_many = array(
        'Tracks'    =>  'Track'
    );

    private static $summary_fields = array(
        'Title' => 'Title',
        'Description' => 'Description'
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $test = TextField::create('test', 'testig')->set;

        $fields->addFieldToTab('Root.Tracks', GridField::create(
            'Tracks',
            'Code under this holder',
            $this->Tracks(),
            GridFieldConfig_RecordEditor::create()
        ));

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
