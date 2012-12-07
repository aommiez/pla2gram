<?php

class GetController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public static function  getFbUser () {
        $fbID = Yii::app()->facebook->getUser();
        $token =  GetController::setAccessToken();
        $apiFbKey = md5(trim("Yii::app()->facebook->api(/$fbID?access_token=$token)"));
        if ( Yii::app()->cache->get($apiFbKey) == false ) {
            $results = Yii::app()->facebook->api("/".$fbID."?access_token=".$token);
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

    public static function getAlbums (){
        $token =  GetController::setAccessToken();
        $albums = Yii::app()->facebook->api('/me/albums?access_token='.$token);
        return $albums;
    }

    public static function setAccessToken() {
        $token =  Yii::app()->facebook->getAccessToken();
        Yii::app()->facebook->setAccessToken($token);
        return $token;
    }


}