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
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>

<body>


<div class="container" id="page">

    <div id="logo"><a href="<?php echo "/";?>" style="color: #ffffff;text-decoration: none;">PLA2GRAM.COM</a></div>

	<?php
        echo Yii::app()->facebook->getUser();
        //echo $content;
    ?>
    <div>
        <div id="last_upload">Last Upload</div>
        <div style="text-align: center;">
            <ul class="last_ul">
            <?php

        $last = Helper::last_upload(6);

        foreach ( $last as $key => $value ) {
            $thumb = str_replace("photo/","",$value['link']);
            $l = Yii::app()->baseUrl."thumb/thumb_".$thumb;
            $i = $value['id'];
            echo <<<HTML
            <li><a href="/?p={$i}"><img src="{$l}"></a></li>
HTML;
        }
?>
           </ul>
        </div>
    </div>
    <div id="footer">Copyright © 2011-2012 Pla2.Com All Rights Reserved ( Powered By Pla2.Com )</div>
</div><!-- page -->

</body>
</html>
