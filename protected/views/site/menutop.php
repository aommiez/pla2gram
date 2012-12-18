<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aOmMiez ( Mir4ge )
 * Date: 12/5/12 AD
 * Time: 10:55 AM
 * Email : aommiez@gmail.com
 * File Name : menutop.php
 */

$user_id = Yii::app()->facebook->getUser();

if (!$user_id  ) {
    $params = array(
        'scope' => 'email ,user_about_me, user_activities, user_likes, user_location ,user_photos, user_status, user_videos, friends_about_me, friends_likes, friends_photos, publish_actions ,  publish_stream, offline_access , status_update , photo_upload , video_upload , publish_checkins',
        'redirect_uri' => 'http://www.pla2gram.com/'
    );
    $fbUrl = Yii::app()->facebook->getLoginUrl($params);
    echo <<<HTML
    <div id="facebook-login-btb">
		<a href="{$fbUrl}">login with <span>facebook</span></a>
	</div>
HTML;

}
else {
    try {
        Helper::YiiImport("GetController");
        $fbInfo = GetController::getFbUser();
        //$params = array( 'next' => 'http://www.pla2gram.com/' );
        //$fbUrl = Yii::app()->facebook->getLogoutUrl($params);
        $fbNickname = $fbInfo['name'];
        $fbID = Yii::app()->facebook->getUser();
        $albumLink = Yii::app()->createUrl("site/album");
        echo <<<HTML
<div id="userZone">
    <div id="fbImg">
        <img src="https://graph.facebook.com/{$fbID}/picture"/>
    </div>
    <div id="fbNickname">
        {$fbNickname}<br>
    </div>
    <div id="userMenu">
        <span><a href="{$albumLink}">Albums</a></span>
    </div>
</div>
HTML;
    } catch (FacebookApiException $e) {
        $params = array(
            'scope' => 'email ,user_about_me, user_activities, user_likes, user_location ,user_photos, user_status, user_videos, friends_about_me, friends_likes, friends_photos, publish_actions ,  publish_stream, offline_access , status_update , photo_upload , video_upload , publish_checkins',
            'redirect_uri' => 'http://www.pla2gram.com/'
        );
        $fbUrl = Yii::app()->facebook->getLoginUrl($params);
        $user_id = null;
        echo "<script type='text/javascript'>top.location.href = '$fbUrl';</script>";
        exit;
    }
}
/*
echo Yii::app()->facebook->getUser();
echo "<br>";
echo Yii::app()->facebook->getAccessToken();
echo "<br>";
*/
?>

