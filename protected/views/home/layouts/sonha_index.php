<?php
/**
 * Created by SonHA
 * User: SonHA
 * Date: 02/05/13
 * Time: 2:29 PM
 */
/* @var $this SiteController */
?>
<!doctype html>
<html lang="en-US">
<?php $this->renderPartial('/site/_head_tag')?>
<body id="m_page" cz-shortcut-listen="true">
<div class="top_bg">
    <div class="glow">
        <div class="main">
            <?php $this->renderPartial('/site/_header')?>
            <div class="container_24">
                <?php
                if (Yii::app()->controller->action->id == 'index') {
                    ?>
                    <?php $this->renderPartial('/site/_slider') ?>
                <?php } ?>
                <?php
                echo $content;
                ?>
                <?php $this->renderPartial('/site/_footer')?>
            </div>
        </div>
    </div>

    <script type="text/javascript">/* CloudFlare analytics upgrade */
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                animationLoop: true,
                itemMargin: 5
            });
        });
    </script>
</body>
</html>