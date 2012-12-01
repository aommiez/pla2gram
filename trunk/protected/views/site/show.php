<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aOmMiez ( Mir4ge )
 * Date: 11/29/12 AD
 * Time: 12:23 PM
 * Email : aommiez@gmail.com
 * File Name : show.php
 */

$photo = Yii::app()->getController();
$photo = $photo->getPhoto($p);
$id = $photo['id'];
$link = $photo['link'];
$ip = $photo['ip'];
$timeCreate = $photo['timeCreate'];
echo <<<HTML
    <div>
        <div id="photo"><img src="/{$link}" id="photo_img"></div>
        <div id="timeCreate">Upload Time : {$timeCreate}</div>
    </div>
HTML;
?>
<style>
    #photo_img {
        -moz-box-shadow: 0 0 5px #888;
        -webkit-box-shadow: 0 0 5px#888;
        box-shadow: 0 0 5px #888;
        max-width: 900px;
    }
    #photo , #timeCreate {
        text-align: center;

    }
    #timeCreate {
        margin-top: 10px;
        margin-top: 10px;
        text-shadow: 1px 1px 4px black;
        font-size: 14px;
        color: white;
    }
</style>