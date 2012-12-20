<?php
Helper::register("inflickity.js");
?>
<div id="last_upload">Last Upload</div>
<style>
    .slider {
        width: 100%;
        height: 240px;
        overflow: hidden;
    }
</style>
<script type="text/javascript">
    var init = function() {

        var slider1 = document.getElementById('slider1');

        var myFlick = new Inflickity( slider1 );


        window.myFlick = myFlick

    };

    window.addEventListener( 'DOMContentLoaded', init, false);
</script>
<div id="slider1" class="slider">
    <ul class="cats">
        <li><img src="http://placekitten.com/240/200/" /></li>
        <li><img src="http://placekitten.com/241/200/" /></li>
        <li><img src="http://placekitten.com/242/200/" /></li>
        <li><img src="http://placekitten.com/243/200/" /></li>
        <li><img src="http://placekitten.com/244/200/" /></li>
        <li><img src="http://placekitten.com/245/200/" /></li>
        <li><img src="http://placekitten.com/246/200/" /></li>
        <li><img src="http://placekitten.com/247/200/" /></li>
        <li><img src="http://placekitten.com/248/200/" /></li>
        <li><img src="http://placekitten.com/249/200/" /></li>
    </ul>
</div>
<?php
/*
Helper::YiiImport("GetController");
$last = GetController::last_upload(10);
foreach ( $last as $key => $value ) {
    $thumb = str_replace("photo/","",$value['link']);
    $l = Yii::app()->baseUrl."/thumb/thumb230_".$thumb;
    $i = $value['id'];

    echo <<<HTML
    <li class="touchcarousel-item">
    <a class="item-block" href="/?p={$i}">
        <img src="{$l}" />

    </a>
</li>
HTML;
}
*/
?>