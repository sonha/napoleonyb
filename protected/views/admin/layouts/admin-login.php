<?php $themeAdmin = Yii::app()->getBaseUrl(true).'/themes/admin/' ?>
<!DOCTYPE html>
<!--[if IE 7 ]>   <html lang="en" class="ie7 lte8"> <![endif]--> 
<!--[if IE 8 ]>   <html lang="en" class="ie8 lte8"> <![endif]--> 
<!--[if IE 9 ]>   <html lang="en" class="ie9"> <![endif]--> 
<!--[if gt IE 9]> <html lang="en"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--[if lte IE 9 ]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->

<!-- iPad Settings -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" /> 
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, width=device-width" />
<!-- iPad End -->

<title><?php echo CHtml::encode($this->pageTitle); ?></title>

<link rel="shortcut icon" href=<?php echo Yii::app()->getBaseUrl(true); ?>/favicon.ico" />

<!-- STYLESHEETS -->

<link rel="stylesheet" media="screen" href="<?php echo $themeAdmin; ?>css/reset.css" />
<link rel="stylesheet" media="screen" href="<?php echo $themeAdmin; ?>css/grids.css" />
<link rel="stylesheet" media="screen" href="<?php echo $themeAdmin; ?>css/style.css" />
<link rel="stylesheet" media="screen" href="<?php echo $themeAdmin; ?>css/jquery.uniform.css" />
<link rel="stylesheet" media="screen" href="<?php echo $themeAdmin; ?>css/themes/lightblue/style.css" />

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

<!-- jQplot CSS -->
<link rel="stylesheet" media="screen" href="<?php echo $themeAdmin; ?>lib/jqplot/jquery.jqplot.min.css" />
<!-- jQplot CSS END -->

<style type = "text/css">
    #loading-container {position: absolute; top:50%; left:50%;}
    #loading-content {width:800px; text-align:center; margin-left: -400px; height:50px; margin-top:-25px; line-height: 50px;}
    #loading-content {font-family: "Helvetica", "Arial", sans-serif; font-size: 18px; color: black; text-shadow: 0px 1px 0px white; }
    #loading-graphic {margin-right: 0.2em; margin-bottom:-2px;}
    #loading {background-color: #eeeeee; height:100%; width:100%; overflow:hidden; position: absolute; left: 0; top: 0; z-index: 99999;}
</style>

<!-- STYLESHEETS END -->

<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<script type="text/javascript" src="<?php echo $themeAdmin; ?>js/selectivizr.js"></script>
<![endif]-->

<?php Yii::app()->getClientScript()->registerCoreScript('jquery');?>

</head>
<body class="login" style="overflow: hidden;">
    <div id="loading"> 
        <script type = "text/javascript"> 
            document.write("<div id='loading-container'><p id='loading-content'>" +
                           "<img id='loading-graphic' width='16' height='16' src='<?php echo $themeAdmin; ?>images/ajax-loader-eeeeee.gif' /> " +
                           "Loading...</p></div>");
        </script> 

    </div> 

    <div class="login-box">
    	<section class="portlet login-box-top">
            <header>
                <h2 class="ac">Login</h2>
            </header>
            <section>                
                <?php echo $content; ?>                 
            </section>
    	</section>
	</div>    
    
    <!-- MAIN JAVASCRIPTS -->    
    <script>window.jQuery || document.write("<script src='<?php echo $themeAdmin; ?>js/jquery.min.js'>\x3C/script>")</script>
    <script type="text/javascript" src="<?php echo $themeAdmin; ?>js/jquery.tools.min.js"></script>
    <script type="text/javascript" src="<?php echo $themeAdmin; ?>js/jquery.uniform.min.js"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?php echo $themeAdmin; ?>js/PIE.js"></script>
    <script type="text/javascript" src="<?php echo $themeAdmin; ?>js/ie.js"></script>
    <![endif]-->

    <script type="text/javascript" src="<?php echo $themeAdmin; ?>js/global.js"></script>
    <!-- MAIN JAVASCRIPTS END -->

    <!-- LOADING SCRIPT -->
    <script>
    $(window).load(function(){
        $("#loading").fadeOut(function(){
            $(this).remove();
            $('body').removeAttr('style');
        });
    });
    </script>
    <!-- LOADING SCRIPT -->
    
    <!-- jQplot SETUP -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="lib/jqplot/excanvas.js"></script>
    <![endif]-->
    <script type="text/javascript" src="<?php echo $themeAdmin; ?>lib/jqplot/jquery.jqplot.min.js"></script>
    <script type="text/javascript" src="<?php echo $themeAdmin; ?>lib/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script type="text/javascript" src="<?php echo $themeAdmin; ?>lib/jqplot/plugins/jqplot.barRenderer.min.js"></script>
    
    <!-- jQplot SETUP END -->
</body>
</html>
