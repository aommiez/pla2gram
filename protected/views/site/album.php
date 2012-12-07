<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aOmMiez ( Mir4ge )
 * Date: 12/7/12 AD
 * Time: 2:35 PM
 * Email : aommiez@gmail.com
 * File Name : album.php
 */
Helper::YiiImport("GetController");
$albums = GetController::getAlbums(Yii::app()->facebook->getUser());
echo "<pre>";
print_r($albums);
echo "</pre>";


foreach($albums['data'] as $album)
{

    $photos = $facebook->api("/{$album['id']}/photos");
    foreach($photos['data'] as $photo)
    {
        echo "<img src='{$photo['source']}' />", "<br />";
    }
}