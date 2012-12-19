<?php
/*
$cache_expire = 60*60*24*365;
header("Pragma: public");
header("Cache-Control: max-age=".$cache_expire);
header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$cache_expire) . ' GMT');
*/
if ( isset($_GET['code'])) {
    Helper::redir("http://www.pla2gram.com",0);
}
?>
<html xmlns:fb="http://ogp.me/ns/fb#">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <meta name="apple-mobile-web-app-capable" content="yes" />

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
    <!--<script type="text/javascript" src="/js/facebook.js"></script>-->
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>
<body>
<script type="text/javascript">
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        window.addEventListener("load", setTimeout( function(){ window.scrollTo(0, 1) }, 0));
    }
</script>

<div class="container" id="page">

    <div id="logo"><a href="<?php echo "/";?>" style="color: #ffffff;text-decoration: none;"><img src="/images/pla2gram_logo.png" style="width: 600px;"> </a></div>
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
