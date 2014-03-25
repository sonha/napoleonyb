<?php

    class NapoleonController extends AdminController
    {

        public $defaultAction='napoleon';
        /**
         * Lists all models.
         */
        public function actionIndex()
        {
            $dataProvider = new CActiveDataProvider('Product');
            $this->render('index', array(
                'dataProvider' => $dataProvider,
            ));
        }

        /**
         * Manages all models.
         */
        public function actionNapoleon()
        {
            $model = new Product('search');
            $model->unsetAttributes(); // clear any default values
            if (isset($_GET['Product']))
                $model->attributes = $_GET['Product'];

            $this->render('napoleon', array(
                'model' => $model,
            ));
        }
    }
