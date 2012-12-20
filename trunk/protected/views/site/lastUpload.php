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

        var myFlick = new Inflickity( slider1, {
            // options
            // you can overwrite these defaults as you like
            clones: 1,
            friction: 0.03,
            maxContactPoints: 3,
            offsetAngle: 0,
            onClick: aClick(),
            animationDuration: 400,
            // basically jQuery swing
            easing: function( progress, n, firstNum, diff ) {
                return ( ( -Math.cos( progress * Math.PI ) / 2 ) + 0.5 ) * diff + firstNum;
            }
        });

        window.myFlick = myFlick

        function aClick(){
            alert("a");
        }

    };

    window.addEventListener( 'DOMContentLoaded', init, false);

</script>
<div id="lastShow">
    <div id="slider1" class="slider">
        <ul class="cats">
            <?php
            Helper::YiiImport("GetController");
            $last = GetController::last_upload(10);
            foreach ( $last as $key => $value ) {
                $thumb = str_replace("photo/","",$value['link']);
                $l = Yii::app()->baseUrl."/thumb/thumb230_".$thumb;
                $i = $value['id'];

                echo <<<HTML
    <li >
    <a href="/?p={$i}" class="aLast">
        <img src="{$l}" />
    </a>
</li>
HTML;
            }
            ?>
            ?>
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