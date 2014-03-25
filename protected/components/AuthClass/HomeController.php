<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class HomeController extends CController
{

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/sonha_index';


    /**
     * Ham lay feature product de hien thi ngoai trang chu
     * @author :SonHA
     * @date: 6/5/2013
     * @return array|CActiveRecord|mixed|null
     */
    public function getFeatureProducts()
    {
        $feature = Product::model()->findAll(array(
            'condition' => 'status=1 AND feature=1',
            'order' => 'rank DESC',
            'limit' => 3
        ));
        return $feature;
    }

    /**
     * Ham lay list category
     * @author: SonHA
     * @date: 6/5/2013
     * @return array|CActiveRecord|mixed|null
     */
    public function getCategory()
    {
        $categories = Category::model()->findAll();
        return $categories;
    }

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
}