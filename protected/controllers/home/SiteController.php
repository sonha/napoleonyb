<?php

class SiteController extends HomeController
{
    public function actionIndex()
    {
        $this->pageTitle = 'YFA Company Limited';
        $company_info = CompanyInfo::getCompanyInfo();
        $service = Service::getAllService();
        $label = 'READ MORE';
        $this->render('home', array(
            'label' => $label,
            'service' => $service,
            'company_info' => $company_info
        ));
    }

    public function actionAbout()
    {
        $this->pageTitle = 'About';
        $lasttestNew = News::getLastestNews();
        $this->render('about', array('lasttestNew' => $lasttestNew));
    }

    public function actionService()
    {
        $this->pageTitle = 'Service';
        $label = 'READ MORE';
        $this->render('service', array(
            'label' => $label,
        ));
    }

    public function actionProject()
    {
        $this->pageTitle = 'Project';
        $owner = Partner::getPartnerByType(0);
        $abroad = Partner::getPartnerByType(1);
        $join = Partner::getPartnerByType(2);
        $this->render('project', array(
            'owner' => $owner,
            'abroad' => $abroad,
            'join' => $join
        ));
    }

    public function actionDetail($id) {
        $this->pageTitle = 'Detail';
        $product = Product::getDetailProduct($id);
        $this->render('detail', array(
            'product' => $product
        ));
    }

    public function actionContact()
    {
        $this->pageTitle = 'Contact';
        $this->render('contact');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

}