<?php
class AdminController extends CController
{
    public $heading='';
    public $layout='main_napo';
    public $menu=array();
    public $breadcrumbs=array();

    //Set action default for admin
    public $defaultAction='admin';

    public function filters()
    {
        return array(
            'accessControl',
        );
    }
    public function accessRules()
    {
        return array(
            array('allow',
                'users'=>array('*'),
                'actions'=>array('login'),
            ),
            array('allow',
                'users'=>array('@'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }
    public function renderHelp($content, $direction = 'right', $title = '')
    {
        return '<span data-placement="' . $direction . '" data-content="' . $content . '" class="popover_wrapper"><i class="icon-help" data-title="Trợ giúp"></i></span>';
    }
}