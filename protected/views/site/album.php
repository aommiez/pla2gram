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

foreach($albums['data'] as $album)
{
    echo $album['id'].$album['name']."<br>";
}
echo "<pre>";
print_r($albums);
echo "</pre>";