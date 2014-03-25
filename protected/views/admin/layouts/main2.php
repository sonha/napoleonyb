<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="icon" type="image/x-icon"
          href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico"/>
    <meta http-equiv="Content-language" content="vi"/>
    <title><?php echo $this->pageTitle; ?></title>
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<link rel="stylesheet" type="text/css"
      href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/styles.css" media="screen"/>

<script type="text/javascript">
    var baseUrl = "<?php echo Yii::app()->request->baseUrl; ?>/";
</script>

<script type="text/javascript"
        src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript"
        src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery/plupload/browserplus-min.js"></script>
<script type="text/javascript"
        src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery/plupload/plupload.full.js"></script>
<!--<script type="text/javascript" src="{$this->baseUrl}/js/jquery/fileUploader.js"></script>-->
<script type="text/javascript"
        src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery/jquery.form.js"></script>
<script type="text/javascript"
        src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery/jquery.validate.js"></script>
<script type="text/javascript"
        src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery/messages_vi.js"></script>
<script type="text/javascript"
        src="<?php echo Yii::app()->request->baseUrl; ?>/js/editor.js"></script>
<script type="text/javascript"
        src="<?php echo Yii::app()->request->baseUrl; ?>/js/facebox.js"></script>
<script type="text/javascript"
        src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin.js"></script>
</head>
<body>
<div id="container">
    <div id="header">
        <div class="div1">
            <div class="div2">
                <div class="logo"
                     onclick="location ='<?php echo Yii::app()->request->baseUrl; ?>/admin'"></div>
            </div>
            <div class="div3">
            <div id="menu">
                <?php
                $this->widget('zii.widgets.CMenu', array(
                    'activeCssClass' => 'active',
                    'activateParents' => true,
                    'items' => array(

                        array(
                            'label' => 'Thành viên',
                            'url' => array('/sonha.php/category/admin'),
                            'itemOptions' => array('id' => 'user'),
                            'linkOptions' => array('class' => 'top'),
                        ),
                        array(
                            'label' => 'Đánh giá',
                            'url' => array('/sonha.php/category/admin'),
                            'itemOptions' => array('id' => 'versionrate'),
                            'linkOptions' => array('class' => 'top'),
                        ),
                        array(
                            'label' => 'Phân phối',
                            'url' => array('/sonha.php/category/admin'),
                            'itemOptions' => array('id' => 'distribution'),
                            'linkOptions' => array('class' => 'top'),
                        ),
                    ),
                )); ?>
                <ul class="right">
                    <li id="home"><a href="<?php echo Yii::app()->request->baseUrl; ?>/" class="top"
                                     target="_blank">Trang chủ</a></li>
                    <li id="logout"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/logout"
                                       class="top">Thoát</a></li>
                </ul>
            </div>
            <!--End Menu-->
    </div>
    <!--End Header-->
    <div id="content">
        <?php echo $content; ?>
    </div>
    <!-- content -->
    <div id="footer">
        <a href="http://sohastore.vn">SohaStore</a> © 2012 VC Corporation.
        All Rights Reserved <br>Version 1.0b2
    </div>
</div>