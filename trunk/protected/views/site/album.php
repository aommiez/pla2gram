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
echo $albums;
/*
foreach($albums['data'] as $album)
{
    $albumID = $album['id'];
    $albumName = $album['name'];
    echo $albumName."<br>";
}
*/

/*
echo "<pre>";
print_r($albums);
echo "</pre>";
*/