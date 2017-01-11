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
        'Title' => 'Text',
        'Description' => 'HTMLText',
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

        $fields->addFieldToTab('Root.Tracks', GridField::create(
            'Tracks',
            'Code under this holder',
            $this->Tracks(),
            GridFieldConfig_RecordEditor::create()
        ));

        return $fields;
    }

}