<?php
Yii::app()->getController();
Helper::YiiImport("GetController");
$photo = GetController::getPhoto($p);
$id = $photo['id'];
$link = $photo['link'];
$ip = $photo['ip'];
$timeCreate = $photo['timeCreate'];
$thumb = str_replace("photo/","",$link);
$user = GetController::getUser($photo['fbid']);
$name = $user['name'];
$mid = str_replace("photo/","",$photo['link']);
$mid = Yii::app()->baseUrl."thumb/thumb320_".$thumb;
/*
$title=urlencode("PLA2GRAM.COM : Stylize your photo");
$url=urlencode("http://www.pla2gram.com/?p=".$id);
$summary=urlencode("เว็บแต่งภาพสไตล์ retro ");
$image=urlencode("http://www.pla2gram.com/thumb/thumb_".$thumb);
*/
?>

<?php
echo <<<HTML
    <div style="text-align: center;color: white;text-align: left;">
        <div id="showPhotoDiv">
            <div id="photo"><img src="/{$mid}" id="photo_img"></div>
        </div>
        <div id="showDetail">
            <div>Photo By : {$name}</div>
            <div>Upload Time : {$timeCreate}</div>
            <div class="fb-like" data-send="true" data-width="300" data-show-faces="true"></div>
        </div>
    </div>
HTML;

echo $this->renderPartial('lastUpload');
?>



<style>
    #photo_img {
        -moz-box-shadow: 0 0 5px #888;
        -webkit-box-shadow: 0 0 5px#888;
        box-shadow: 0 0 5px #888;
        max-width: 340px;
    }
    #photo , #timeCreate {
        text-align: center;
    }
    #photo {

    }
    #timeCreate {
        margin-top: 10px;
        margin-top: 10px;
        text-shadow: 1px 1px 4px black;
        font-size: 14px;
        color: white;
    }


    a{
        text-decoration: none;
    }
    #btn_fbshare {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;
        color: #3B5998;
        padding: 10px 8px;
        background: -moz-linear-gradient( top, white 0%, white);
        background: -webkit-gradient( linear, left top, left bottom, from(white), to(white));
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        border-radius: 5px;
        border: 0px solid black;
        -moz-box-shadow: 0px 1px 3px rgba(000,000,000,0.5), inset 0px 0px 0px rgba(076,189,255,0);
        -webkit-box-shadow: 0px 1px 3px rgba(000, 000, 000, 0.5), inset 0px 0px 0px rgba(076, 189, 255, 0);
        box-shadow: 0px 1px 3px rgba(000, 000, 000, 0.5), inset 0px 0px 0px rgba(076, 189, 255, 0);
        text-shadow: 0px -1px 3px rgba(255, 255, 255, 0.8), 0px 1px 0px rgba(255, 255, 255, 0.3);
        line-height: 29px;
        vertical-align: bottom;
        font-size: 20px;
    }
    #showPhotoDiv {
        display: inline-block;
        width: 550px;
    }
    #showDetail {
        display: inline-block;
        width: 300px;
        vertical-align: top;
    }
</style>