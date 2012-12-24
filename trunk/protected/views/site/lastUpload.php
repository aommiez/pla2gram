<div id="last_upload">Last Upload</div>
<style>
    .cats {
        list-style: none;
        position: relative;
        z-index: 0;
        width: 2600px;
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
        var m = false;
        if (navigator.userAgent.match(/Android/i) ||
                navigator.userAgent.match(/webOS/i) ||
                navigator.userAgent.match(/iPhone/i) ||
                navigator.userAgent.match(/iPad/i) ||
                navigator.userAgent.match(/iPod/i) ||
                navigator.userAgent.match(/BlackBerry/) ||
                navigator.userAgent.match(/Windows Phone/i) ||
                navigator.userAgent.match(/ZuneWP7/i)
                ) {
            $('.slider').css("overflow",'scroll').css('-webkit-overflow-scrolling','touch');
            m = true;
        }

        var divWidthShow = 0;
        var lastID = $('.PhotoImg').length - 1;
        $('.PhotoImg').each(function(i){
            imgLoad(this, function(img) {
                $(img).fadeIn();
                if ( m == true ) {
                    divWidthShow += $(img).width() +8;
                } else {
                    divWidthShow += $(img).width() +20;
                }

                console.log($(img).width());
                if (i == lastID) {
                    console.log(divWidthShow);
                    $(".cats").css('width',divWidthShow+"px");
                }
            });
        });

        var clicker = false;
        var hereVal = 0;
        var mms = false;
        var scVal = 0;
        $(".aLast").mousedown(function(e){
            e.preventDefault();
            clicker = true;
            hereVal = e.pageX;
            scVal =  $('.slider').scrollLeft();
            mms = true;
            $(document).bind('mousemove',function(e){
                clicker = false;
                if ( mms != false ) {
                    var newVal = e.pageX;
                    var LR = 0;
                    if ( hereVal > newVal ) {
                        LR = hereVal - newVal;
                        $('.slider').scrollLeft(scVal+LR);
                    } else if ( newVal > hereVal ) {
                        LR = newVal - hereVal;
                        $('.slider').scrollLeft(scVal-LR);
                    }
                    $('#theater').html(e.pageX +', '+ e.pageY + ', ' + LR + ',' + scVal);

                }
            });
        });


        $(document).mouseup(function(e){
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

</div>