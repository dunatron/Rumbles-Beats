<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/01/17
 * Time: 4:28 PM
 */
class AlbumAdmin extends ModelAdmin
{
    /**
     * @var array
     */
    private static $managed_models = array('Album');

    /**
     * @var string
     */
    private static $url_segment = 'Albums';

    /**
     * @var string
     */
    private static $menu_title = 'Albums';

    /**
     * @param null $id
     * @param null $fields
     * @return \Form
     */
    public function getEditForm($id = null, $fields = null)
    {
        $form = parent::getEditForm($id, $fields);

        $gridField = $form->Fields()
            ->fieldByName($this->sanitiseClassName($this->modelClass));

        $config = $gridField->getConfig();

        $config->getComponentByType('GridFieldPaginator')->setItemsPerPage(20);
        $config->getComponentByType('GridFieldDataColumns')
            ->setDisplayFields(array(
                'Title'  => 'Title',
                'Description' => 'Description'
            ));


        return $form;
    }
}