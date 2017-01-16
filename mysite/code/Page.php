<?php

class Page extends SiteTree
{

    private static $db = array();

    private static $has_one = array();

}

class Page_Controller extends ContentController
{

    /**
     * An array of actions that can be accessed via a request. Each array element should be an action name, and the
     * permissions or conditions required to allow the user to access it.
     *
     * <code>
     * array (
     *     'action', // anyone can access this action
     *     'action' => true, // same as above
     *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
     *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
     * );
     * </code>
     *
     * @var array
     */
    private static $allowed_actions = array(
        'AddTrackForm',
        'processAddAlbum'
    );

    public function AddTrackForm()
    {
        $trackTitle = TextField::create('Title', 'Add a track title')
            ->setAttribute('v-model', 'newTrackTitle');
        $trackDescription = TextareaField::create('Description', 'Add track description ')
            ->setAttribute('v-model', 'newTrackDescription')
            ->setAttribute('t-ron', 'this shows')
            ->setAttribute('t-model', 'this shows too');

        $trackFile = UploadField::create('TrackFile', 'Add the file G');

        $chooseAlbum = DropdownField::create('AlbumID', 'Choose album',
            Album::get()->map('ID', 'albumTitle')->toArray(),
            null,
            true
        );

        $fields = new FieldList(
            $trackTitle,
            $trackDescription,
            $trackFile,
            $chooseAlbum
        );

        $actions = new FieldList(
            FormAction::create('processAddTrack', 'Submit')->setAttribute('v-on:click.prevent', 'addTrack')
        );

        $form = new Form($this, 'AddTrackForm', $fields, $actions);

        return $form;

    }

    /**
     * Add New album Form
     */
    public function AddAlbumForm()
    {
        // Fields
        $albumTitle = TextField::create('Title', 'Add Album Title')
            ->setAttribute('v-model', 'albumForm.newAlbumTitle');
        $albumDescription = HtmlEditorField::create('Description', 'Add Album Description')
            ->setAttribute('v-model', 'albumForm.newAlbumDescription');

        // Actions
        $submitAction = FormAction::create('processAddAlbum', 'Submit');

        $fields = FieldList::create(
            $albumTitle,
            $albumDescription
        );

        $actions = FieldList::create(
            $submitAction
        );

        $form = Form::create($this, 'AddAlbumForm', $fields, $actions);
        $form->setAttribute('@submit.prevent', 'onAlbumSubmit');

        return $form;
    }

    /**
     * Process Add Album Form
     */
    public function processAddAlbum(SS_HTTPRequest $request)
    {
        $newAlbum = Album::create();

        $vars = $request->getBody();
        $decode = json_decode($vars);

        $newAlbum->albumTitle = $decode->newAlbumTitle;
        $newAlbum->albumDescription = $decode->newAlbumDescription;

        $newAlbum->write();
        return $this->redirectBack();
    }


    public function init()
    {
        parent::init();
        // You can include any CSS or JS required by your project here.
        // See: http://doc.silverstripe.org/framework/en/reference/requirements
    }

}
