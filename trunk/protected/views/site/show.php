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

?>
<meta property="og:title" content="PLA2GRAM.COM" />
<meta property="og:description" content="Read the Static FBML Bible and Rejoice!" />
<meta property="og:image" content="http://www.pla2gram.com/<?php echo $link; ?>" />

<div id="share">
    <fb:share-button class="meta">
        <meta name="title" content="PLA2GRAM.COM"/>
        <meta name="description" content="Read the Static FBML Bible and Rejoice!"/>
        <link rel="image_src" href="http://www.pla2gram.com/<?php echo $link; ?>"/>
        <link rel="target_url" href="http://www.pla2gram.com/?p=<?php echo $id; ?>"/>
    </fb:share-button>
</div>

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
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1"; // appId must be valid
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

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