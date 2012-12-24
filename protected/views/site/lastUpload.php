<div id="last_upload">Last Upload</div>
<style>
    .cats {
        list-style: none;
        position: relative;
        z-index: 0;
        width: 3000px;
    }

    .cats li {
        display: inline-block;
    }

    .slider {
        position: relative;
        z-index: 1;
        width: 100%;
        overflow: hidden;
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
    $(document).ready(function() {
        var divWidthShow = 0;
        var lastID = $('.PhotoImg').length - 1;
        $('.PhotoImg').each(function(i){
            imgLoad(this, function(img) {
                $(img).fadeIn();
                divWidthShow += $(img).width() +10;
                console.log($(img).width());
                if (i == lastID) {
                    console.log(divWidthShow);
                    $(".cats").css('width',divWidthShow+"px");
                }
            });
        });

        var clicker = false;
        var hereVal = 0;
        var MMR = false;
        $(".aLast").mousedown(function(e){
            clicker = true;
            hereVal = e.pageX;
            MMR = true;
        });

        $(document).mousemove(function(e){
            clicker = false;
            if (MMS) {
                alert(e.pageX);
            }
        });

        $(".aLast").mouseup(function(e){
            MMR = false;
            $(document).unbind('mousemove');
            if ( clicker == false ) {
                $(".aLast").click(function(e){
                    e.preventDefault();
                });
            } else {
                $(".aLast").unbind('click');
            }
        });

    });
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