<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="https://www.facebook.com/2008/fbml">
<?php

$photo = Yii::app()->getController();
$photo = $photo->getPhoto($p);
$id = $photo['id'];
$link = $photo['link'];
$ip = $photo['ip'];
$timeCreate = $photo['timeCreate'];
$thumb = str_replace("photo/","",$link);

$title=urlencode("PLA2GRAM.COM : Stylize your photo");
$url=urlencode("http://www.pla2gram.com/?p=".$id);
$summary=urlencode("เว็บแต่งภาพสไตล์ retro ");
$image=urlencode("http://www.pla2gram.com/thumb/thumb_".$thumb);

?>


<meta property="og:title" content="PLA2GRAM.COM : Stylize your photo" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.pla2gram.com/?p=<?php echo $id;?>" />
<meta property="og:image" content="http://pla2gram.com/thumb/thumb_<?php echo $thumb;?>" />
<meta property="og:site_name" content="PLA2GRAM.COM : Stylize your photo" />
<meta property="fb:admins" content="100000225142784" />

<a id="btn_fbshare" onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)">
   <img src="images/fb32.png"> Share
</a>


<div class="fb-like" data-href="http://www.pla2gram.com/?p=<?php echo $id;?>" data-send="true" data-width="450" data-show-faces="true"></div>
<?php
echo <<<HTML
    <div>
        <div id="photo"><img src="/{$link}" id="photo_img"></div>
        <div id="timeCreate">Upload Time : {$timeCreate}</div>
    </div>
HTML;
?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=405563946182604";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
    #photo {
        margin-top: 16px;
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

</style>