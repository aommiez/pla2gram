<div id="last_upload">Last Upload</div>
<style>
    .cats {

    }

    .cats li {

    }

    .slider {

    }

    /*
    .cats li:nth-child(5n+0) { background: black; }
    .cats li:nth-child(5n+1) { background: blue; }
    .cats li:nth-child(5n+2) { background: green; }
    .cats li:nth-child(5n+3) { background: orange; }
    .cats li:nth-child(5n+4) { background: red; }
*/
    #lastShow {

    }
    .PhotoImg {

    }


</style>
<script type="text/javascript">


</script>

<div id="lastShow">
    <div id="slider1" class="slider">
        <ul class="cats" id="cats">
            <?php
            Helper::YiiImport("GetController");
            $last = GetController::last_upload(11);
            foreach ( $last as $key => $value ) {
                $thumb = str_replace("photo/","",$value['link']);
                $l = Yii::app()->baseUrl."/thumb/thumb230_".$thumb;
                $i = $value['id'];

                echo <<<HTML
    <li >
    <a href="/?p={$i}" class="aLast">
        <img src="{$l}" class="PhotoImg"/>
    </a>
</li>
HTML;
            }
            ?>
        </ul>
    </div>
</div>

<div id="theater">
    <div id="theaterPhoto">
        <img src="data" id="theaterPhotoSrc">
    </div>
    <div id="theaterConntent">
        test
    </div>
</div>