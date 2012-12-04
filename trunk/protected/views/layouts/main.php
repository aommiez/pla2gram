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
        if ( Yii::app()->facebook->getUser() == 0 ) {
            $params = array(
                'scope' => 'email ,user_about_me, user_activities, user_likes, user_location ,user_photos, user_status, user_videos, friends_about_me, friends_likes, friends_photos, publish_actions , user_online_presence, publish_stream, offline_access , status_update , photo_upload , video_upload , publish_checkins',
                'redirect_uri' => 'http://www.pla2gram.com/'
            );
            $fbUrl = Yii::app()->facebook->getLoginUrl($params);
            echo <<<HTML
            <a href="{$fbUrl}">
              <img src="http://static.ak.fbcdn.net/rsrc.php/z2Y31/hash/cxrz4k7j.gif">
            </a>
HTML;
        } else {
            $fbID = Yii::app()->facebook->getUser();
            $results = Yii::app()->facebook->api('/me');
            $params = array( 'next' => 'https://www.pla2gram.com/' );
            $fbUrl = Yii::app()->facebook->getLogoutUrl($params);
            $fbNickname = $results['name'];
            echo <<<HTML
<div id="userZone">
    <div id="fbImg">
        <img src="http://graph.facebook.com/{$fbID}/picture"/>
    </div>
    <div id="fbNickname">
        {$fbNickname}
    </div>
    <div>
        <a href="{$fbUrl}">Log Out !</a>
    </div>
</div>
HTML;
            echo $content;
        }
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
