<?php
Helper::register('jquery-1.8.3.min.js');
 ?>
<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/facebook.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>

<body>

<div id="logoz">
    <div class="body">
        <div class="cloud">
            <div class="gear">
                <div class="tooth a"></div>
                <div class="tooth b"></div>
                <div class="tooth c"></div>
                <div class="tooth d"></div>
            </div>
        </div>
    </div>
</div>

<div class="container" id="page">

    <div id="logo"><a href="<?php echo "/";?>" style="color: #ffffff;text-decoration: none;">PLA2GRAM.COM</a></div>
    <?php
            echo $this->renderPartial('menutop');
    ?>
	<?php
            echo $content;
    ?>
    <?php
            echo $this->renderPartial('lastUpload');
    ?>

    <div id="footer">Copyright © 2011-2012 Pla2.Com All Rights Reserved ( Powered By Pla2.Com )</div>
</div><!-- page -->

</body>
</html>
