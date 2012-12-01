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

?>
<a href="http://www.facebook.com/sharer.php?u=http://www.pla2gram.com/p?=<?php echo $id; ?>&t=PhotoID:<?php echo $id; ?>" target=”_blank”>
Share this post/page title
</a>

<?php
echo <<<HTML
    <div>
        <div id="photo"><img src="/{$link}" id="photo_img"></div>
        <div id="timeCreate">Upload Time : {$timeCreate}</div>
    </div>
HTML;
?>

<meta name=”title” content=”Powered By PLA2GRAM.COM” />
<meta name=”description” content=”Pla2gram.com ” />
<link rel=”image_src” href=”http://www.pla2gram.com/<?php echo $link; ?>” />

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