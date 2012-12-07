<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aOmMiez ( Mir4ge )
 * Date: 12/5/12 AD
 * Time: 10:55 AM
 * Email : aommiez@gmail.com
 * File Name : menutop.php
 */
/*
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
    $apiFbKey = md5(trim("Yii::app()->facebook->api($fbID)"));
    if ( Yii::app()->cache->get($apiFbKey) == false ) {
        $results = Yii::app()->facebook->api($fbID);
        Yii::app()->cache->set($apiFbKey,$results,1800);
        $fbInfo = $results;
    } else {
        $fbInfo = Yii::app()->cache->get($apiFbKey);
    }
    $params = array( 'next' => 'http://www.pla2gram.com/' );
    $fbUrl = Yii::app()->facebook->getLogoutUrl($params);
    $fbNickname = $fbInfo['name'];
    echo <<<HTML
<div id="userZone">
    <div id="fbImg">
        <img src="https://graph.facebook.com/{$fbID}/picture"/>
    </div>
    <div id="fbNickname">
        {$fbNickname}
    </div>
    <div>
        <a href="{$fbUrl}">Log Out !</a>
    </div>
</div>
HTML;
}
*/


$user_id = Yii::app()->facebook->getUser();
if($user_id) {

    // We have a user ID, so probably a logged in user.
    // If not, we'll get an exception, which we handle below.
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
        {$fbNickname}
    </div>
    <div id="userMenu">
        <span><a href="{$albumLink}">Albums</a></span>
    </div>
</div>
HTML;

    } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $params = array(
            'scope' => 'email ,user_about_me, user_activities, user_likes, user_location ,user_photos, user_status, user_videos, friends_about_me, friends_likes, friends_photos, publish_actions , user_online_presence, publish_stream, offline_access , status_update , photo_upload , video_upload , publish_checkins',
            'redirect_uri' => 'http://www.pla2gram.com/'
        );
        $fbUrl = Yii::app()->facebook->getLoginUrl($params);
        echo <<<HTML
    <div id="facebook-login-btb">
		<a href="{$fbUrl}">login with <span>facebook</span></a>
	</div>
HTML;
    }
} else {

    $params = array(
        'scope' => 'email ,user_about_me, user_activities, user_likes, user_location ,user_photos, user_status, user_videos, friends_about_me, friends_likes, friends_photos, publish_actions , user_online_presence, publish_stream, offline_access , status_update , photo_upload , video_upload , publish_checkins',
        'redirect_uri' => 'http://www.pla2gram.com/'
    );
    $fbUrl = Yii::app()->facebook->getLoginUrl($params);
    echo <<<HTML
    <div id="facebook-login-btb">
		<a href="{$fbUrl}">login with <span>facebook</span></a>
	</div>
HTML;

}





/*

if ( Yii::app()->facebook->getUser() == 0 ) {
    $params = array(
        'scope' => 'email ,user_about_me, user_activities, user_likes, user_location ,user_photos, user_status, user_videos, friends_about_me, friends_likes, friends_photos, publish_actions , user_online_presence, publish_stream, offline_access , status_update , photo_upload , video_upload , publish_checkins',
        'redirect_uri' => 'http://www.pla2gram.com/'
    );
    $fbUrl = Yii::app()->facebook->getLoginUrl($params);
    echo <<<HTML
    <div id="facebook-login-btb">
		<a href="{$fbUrl}">login with <span>facebook</span></a>
	</div>
HTML;
} else {
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
        {$fbNickname}
    </div>
    <div id="userMenu">
        <span><a href="{$albumLink}">Albums</a></span>
    </div>
</div>
HTML;
}*/

?>
