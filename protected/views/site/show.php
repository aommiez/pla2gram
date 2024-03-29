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
Yii::app()->facebook->ogTags['og:image'] = "http://www.pla2gram.com/thumb/thumb_".$thumb;
if ( isset($_GET['theater'])) {
    $theater = 1;
} else {
    $theater = 0;
}
?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#photo_img").click(function(){
            $("html, body").animate({ scrollTop: 0 }, "slow");
            $("html, body").css("overflow","hidden");
            $("#lightBoxPhoto").show();
        });

        $("#lightBoxPhoto").click(function(){
            $("html, body").css("overflow","auto");
            $("#lightBoxPhoto").hide();
        });

        $("#PhotoShowLightBox").click(function(e){
            e.preventDefault();
            e.stopPropagation();
            return false;
        });
    });
</script>

<?php
if ( isset($_GET['theater'])) {
    $theater = 1;
} else {
    $theater = 0;
}

if ( $theater == 1 ) {
?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#photo_img").click();
    });
</script>
<?php
}
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
        </div>
    </div>
HTML;


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
    #lightBoxPhoto {
        position: absolute;
        background-color: rgba(0, 0, 0, 0.9);
        width: 100%;
        height: 100%;
        top: 0px;
        left: 0px;
        z-index: 10;
        display: none;
        padding-top: 6%;
        text-align: center;
    }
    #PhotoShowLightBox {
        position: relative;
        z-index: 11;
        max-height: 680px;
        max-width: 1200px;
    }
</style>
<div id="lightBoxPhoto">
    <div>
        <img src="/<?php echo $link; ?>" id="PhotoShowLightBox">
    </div>
</div>