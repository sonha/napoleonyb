<?php
/**
 * User: hoangnguyenquang
 * Date: 1/24/13
 * Time: 3:17 PM
 * @var $this AdminController
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico"/>
    <title>Shoe Shop Version1.0</title>
    <?php Yii::app()->bootstrap->register(); ?>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/styles_v2.css"
          media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/grey.css"
          media="screen"/>
    <script type="text/javascript">
    </script>
</head>
<body>
<div id="header">
    <h1>
        <a href="<?php echo Yii::app()->request->baseUrl; ?>">
            Shoe Shop Version 1.0 - Place to buy
        </a></h1>
</div>
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav btn-group">
        <?php if (Yii::app()->user->isGuest) { ?>
            <li>
                <a href="javascript:void(0)" rel="nofollow"
                   onclick="openMyModal('{$this->baseUrl}/home/MingidRequest',500,400);" class="ming_id">
                    Đăng nhập
                </a>
            </li>
            <li>
                <a href="javascript:void(0)" rel="nofollow"
                   onclick="openMyModal('{$this->baseUrl}/home/MingidRequest?task=register',500,450);"
                   class="ming_id">
                    Đăng ký
                </a>
            </li>
        <?php } else { ?>
            <li class="btn btn-inverse">
                <a title="" href="<?php echo Yii::app()->createAbsoluteUrl('/developer/account'); ?>">
                    <i class="icon icon-user"></i>
                    <span class="text">Xin chào, hason61vn@gmail.com</span>
                </a>
            </li>
            <li class="btn btn-inverse">
                <a title="" href="<?php echo Yii::app()->createAbsoluteUrl('/site/logout'); ?>">
                    <i class="icon icon-share-alt"></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        <?php }?>
    </ul>
</div>
<div id="sidebar">
    <?php $this->widget('bootstrap.widgets.TbMenu', array(
        'stacked' => false,
        'items' => array(
            array(
                'label' => 'Trang chủ',
                'url' => array('/site/index'),
                'icon' => 'icon-home',
            ),
            array(
                'label' => 'Giới thiệu',
                'url' => '#',
                'icon' => 'info-sign',
            ),
            array(
                'label' => 'Quản lý chuyên mục',
                'url' => array('/category/admin'),
                'icon' => 'book'
            ),
            array(
                'label' => 'Quản lý sản phẩm',
                'url' => array('/product/admin'),
                'icon' => 'user',
            ),
            array(
                'label' => 'Quản lý đối tác',
                'url' => array('/partner/admin'),
                'icon' => 'user',
            ),
            array(
                'label' => 'Tổng quan',
                'url' => array('/statistic/dashboard'),
                'icon' => 'icon-minus'
            ),
        ),
    )); ?>
</div>
<div id="content">
    <div id="content-header">
        <h1><?php echo $this->heading;?></h1>
    </div>
    <?php
    if (isset($this->breadcrumbs)) {
        $this->widget('zii.widgets.CBreadcrumbs', array(
            'links' => $this->breadcrumbs,
            'separator' => null,
            'htmlOptions' => array(
                'id' => 'breadcrumb'
            )
        ));
    }
    ?>
    <div class="container-fluid">
        <?php echo $content; ?>
    </div>
    <div class="row-fluid">
        <div id="footer" class="span12">
            <p>2012 © SonHA.</p>

            <p>Hotline: 0936 456 190 ( hoặc 0169.988.3185)</p>

            <p>Email: sonhaanh@vccorp.vn</p>
        </div>
    </div>
</div>
</body>
</html>