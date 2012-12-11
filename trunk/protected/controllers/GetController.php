<?php

class GetController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public static function  getFbUser () {
        $fbID = Yii::app()->facebook->getUser();
        $apiFbKey = md5(trim("Yii::app()->facebook->api($fbID)"));
        if ( Yii::app()->cache->get($apiFbKey) == false ) {
            $results = Yii::app()->facebook->api($fbID);
            Yii::app()->cache->set($apiFbKey,$results,1800);
            GetController::fbSync($fbID);
            return $results;
        } else {
            return Yii::app()->cache->get($apiFbKey);
        }
    }

    public static function last_upload ($limit){
        $lastUploadKey = md5(trim("Photo::model()->findAll(array('limit' => $limit, 'order' => 'id DESC'))"));
        if ( Yii::app()->cache->get($lastUploadKey) == false ) {
            $photo = Photo::model()->findAll(array('limit' => $limit, 'order' => 'id DESC'));
            Yii::app()->cache->set($lastUploadKey,$photo,300);
            return $photo;
        } else {
            return Yii::app()->cache->get($lastUploadKey);
        }
    }

    public static function fbSync ($fbID) {
        $fbCheckID = Facebook::model()->count("id = '".$fbID."' ");
        if ( $fbCheckID == 0 ) {
           $fbInfo = Yii::app()->facebook->api($fbID);
           $facebook = new Facebook;
           $facebook->id = $fbID;
           $facebook->name = $fbInfo['name'];
           $facebook->first_name = $fbInfo['first_name'];
           $facebook->last_name = $fbInfo['last_name'];
           //$facebook->link = $fbInfo['link'];
           $facebook->email = $fbInfo['email'];
           $facebook->username = $fbInfo['username'];
           $facebook->save();
        } else {
           $fbInfo = Yii::app()->facebook->api($fbID);
           $facebook = Facebook::model()->findByPk($fbID);
           $facebook->name = $fbInfo['name'];
           $facebook->first_name = $fbInfo['first_name'];
           $facebook->last_name = $fbInfo['last_name'];
           //$facebook->link = $fbInfo['link'];
           $facebook->email = $fbInfo['email'];
           $facebook->username = $fbInfo['username'];
           $facebook->save();
        }
    }

    public static function getPhoto($id) {
        $photo = Photo::model()->find("id = ".$id);
        return $photo;
    }

    public static function getUser($id){
        $user = Facebook::model()->find("id = ".$id);
        return $user;
    }

    public static function FbLogin ($link){
        $params = array(
            'scope' => 'email ,user_about_me, user_activities, user_likes, user_location ,user_photos, user_status, user_videos, friends_about_me, friends_likes, friends_photos, publish_actions ,  publish_stream, offline_access , status_update , photo_upload , video_upload , publish_checkins',
            'redirect_uri' => $link
        );
        $fbUrl = Yii::app()->facebook->getLoginUrl($params);
        $user_id = null;
        echo "<script type='text/javascript'>top.location.href = '$fbUrl';</script>";
    }

    public static function getAlbums (){
        /*
         $access = Yii::app()->facebook->getAccessToken();
         $albumSyncKey = md5(trim('/'.Yii::app()->facebook->getUser().'/albums?access_token='.$access));
         if ( Yii::app()->cache->get($albumSyncKey) == false ) {
            $albums = Yii::app()->facebook->api('/'.Yii::app()->facebook->getUser().'/albums?access_token='.$access);
            Yii::app()->cache->set($albumSyncKey,$albums,60*15,900);
            return $albums;
         } else {
            return Yii::app()->cache->get($albumSyncKey);
         }
        }
        */
        $access = Yii::app()->facebook->getAccessToken();
        $albums = Yii::app()->facebook->api('/'.Yii::app()->facebook->getUser().'/albums?access_token='.$access);
        return $albums;
    }


}