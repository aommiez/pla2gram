<div id="last_upload">Last Upload</div>
<style>
    .cats {
        list-style: none;
        width: 2400px;
        margin: 0;
        padding: 0;
    }

    .cats li {
        float: left;
        width: 240px;
        height: 200px;
        overflow: hidden;
    }

    .slider {
        width: 100%;
        height: 240px;
        overflow: hidden;
    }
    .slider img {
        display: block;
    }

    .cats li:nth-child(5n+0) { background: black; }
    .cats li:nth-child(5n+1) { background: blue; }
    .cats li:nth-child(5n+2) { background: green; }
    .cats li:nth-child(5n+3) { background: orange; }
    .cats li:nth-child(5n+4) { background: red; }

    .inflickity-clone li {
        /*  border-radius: 40px;*/
    }
</style>
<script type="text/javascript">

    var init = function() {

        var slider1 = document.getElementById('slider1');

        var cats = document.getElementById('cats');

        var myFlick = new Inflickity( slider1 );

        window.myFlick = myFlick

    };

    window.addEventListener( 'DOMContentLoaded', init, false);

</script>
<div id="lastShow">
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