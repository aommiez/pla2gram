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
}