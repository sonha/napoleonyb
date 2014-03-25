<?php

class WidgetProductList extends CWidget {

    public $_params;

    public function init() {
        parent::init();
        $this->registerClientFile();
    }

    public function run() {
            $this->render('productList',array(
                    'items' => $this->_params['items'],
                    'title' => $this->_params['title'],
                    'last' => ''
                )
            );
    }
    
    
    private function registerClientFile()
    {
            $url = Yii::app()->getAssetManager()->publish( Yii::getPathOfAlias('ext.widget.productList.assets'));
            //Yii::app()->clientScript->registerScriptFile($url.'/prdlist.js');		            
    }

}

?>