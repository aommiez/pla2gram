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

$albums = GetController::getAlbums();
/*
foreach($albums['data'] as $album)
{
    $albumID = $album['id'];
    $albumName = $album['name'];
}
*/
for($i = 0;$i<count($albums['data']);$i++){
    for($j = 0;$j<count($albums['data'][$i]);$j++){
        if($albums['data'][$i]['name'] == "Cover Photos"){
            echo $facebook->api('/me/albums/'.$albums['data'][$i]['cover_photo'],'GET');
        }
    }
}
/*
echo "<pre>";
print_r($albums);
echo "</pre>";
*/