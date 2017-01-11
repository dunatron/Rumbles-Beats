<?php
class Page extends SiteTree {

	private static $db = array(
	);

	private static $has_one = array(
	);

}
class Page_Controller extends ContentController {

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
	private static $allowed_actions = array (
	    'AddTrackForm'
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

        $fields = new FieldList(
            $trackTitle,
            $trackDescription,
            $trackFile
        );

        $actions = new FieldList(
            FormAction::create('processAddTrack', 'Submit')->setAttribute('v-on:click.prevent', 'addTrack')
        );

        $form = new Form($this, 'AddTrackForm', $fields, $actions);

        return $form;

    }


	public function init() {
		parent::init();
		// You can include any CSS or JS required by your project here.
		// See: http://doc.silverstripe.org/framework/en/reference/requirements
	}

}
