<div id="last_upload">Last Upload</div>
<style>
    .cats {
        list-style: none;
        margin: 0;
        padding: 0;
        width: 3000px;
    }

    .cats li {
        float: left;
        overflow: hidden;
    }

    .slider {
        width: 100%;
        height: 240px;
        overflow: hidden;
        position: relative;
        z-index: 1;
    }

        /*
        .cats li:nth-child(5n+0) { background: black; }
        .cats li:nth-child(5n+1) { background: blue; }
        .cats li:nth-child(5n+2) { background: green; }
        .cats li:nth-child(5n+3) { background: orange; }
        .cats li:nth-child(5n+4) { background: red; }
    */
    .inflickity-clone li {
        /*  border-radius: 40px;*/
    }
    #lastShow {
        position: relative;
        z-index: 2;
    }
    .PhotoImg {
        display: none;
    }


</style>
<script type="text/javascript">

    var init = function() {

        var slider1 = document.getElementById('slider1');

        var cats = document.getElementById('cats');

        var myFlick = new Inflickity( slider1);

        var clicker = false;

        $(".aLast").mousedown(function(){
            clicker = true;
        });

        $(document).mousemove(function(){
            clicker = false;
        });

        $(".aLast").mouseup(function(e){
            if ( clicker == false ) {
                $(".aLast").click(function(e){
                    e.preventDefault();
                });
            } else {
                $(".aLast").unbind('click');

            }
        });

        $(".aLast").bind('touchstart',function(){
            clicker = true;
        });

        $(document).bind('touchmove',function(){
            clicker = false;
        });

        $(".aLast").bind('touchend',function(e){
            if ( clicker != false) {
                var url = $(this).attr("href");
                window.location.href = "http://www.pla2gram.com/"+url;
            }
        });


        window.myFlick = myFlick

        var divWidthShow = 0;
        var lastID = $('.PhotoImg').length - 1;
        $('.PhotoImg').each(function(i){
            imgLoad(this, function(img) {
                $(img).fadeIn();
                divWidthShow += $(img).width() +2;
                console.log($(img).width());
                if (i == lastID) {
                    console.log(divWidthShow);
                    $(".cats").css('width',divWidthShow+"px");
                }
            });
        });
    };



    window.addEventListener( 'DOMContentLoaded', init, false);

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