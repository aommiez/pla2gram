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
    <script type="text/javascript" src="/js/jquery-1.8.3.min.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>

<body>

<script>
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            // the user is logged in and has authenticated your
            // app, and response.authResponse supplies
            // the user's ID, a valid access token, a signed
            // request, and the time the access token
            // and signed request each expire
            var uid = response.authResponse.userID;
            var accessToken = response.authResponse.accessToken;
            alert(accessToken);
        } else if (response.status === 'not_authorized') {
            // the user is logged in to Facebook,
            // but has not authenticated your app
            alert("not_authorized");
        } else {
            // the user isn't logged in to Facebook.
            alert("notlogin");
        }
    });
</script>

<div class="container" id="page">

    <div id="logo"><a href="<?php echo "/";?>" style="color: #ffffff;text-decoration: none;">PLA2GRAM.COM</a></div>
    <?php
            $this->renderPartial('menutop');
    ?>
	<?php
            echo $content;
    ?>

    <?php
            if( Yii::app()->request->requestUri == '/site/album' ) {
                return false;
            } else {
                $this->renderPartial('lastUpload');
            }
    ?>
    <div id="footer">Copyright © 2012-2013 Pla2.Com All Rights Reserved ( Powered By Pla2.Com )</div>
</div><!-- page -->

</body>
</html>
