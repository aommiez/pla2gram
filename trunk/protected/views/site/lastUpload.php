<?php
Helper::register("jquery.touchcarousel-1.0.min.js");
Helper::register("jquery.ba-hashchange.min.js");
Helper::register("dimsemenov-preview-pack.css");
?>
<div id="last_upload">Last Upload</div>

<script type="text/javascript">
    jQuery(function($) {
        carouselInstance = $("#carousel-image-and-text").touchCarousel({
            pagingNav: false,
            snapToItems: false,
            itemsPerMove: 4,
            scrollToLast: false,
            loopItems: false,
            scrollbar: true
        }).data('touchCarousel');
    });


</script>
<div id="carousel-image-and-text" class="touchcarousel grey-blue">
    <ul class="touchcarousel-container">
        <?php
        Helper::YiiImport("GetController");
        $last = GetController::last_upload(12);
        foreach ( $last as $key => $value ) {
            $thumb = str_replace("photo/","",$value['link']);
            $l = Yii::app()->baseUrl."thumb/thumb_".$thumb;
            $i = $value['id'];
            $fb = GetController::getUser($value['fbid']);
            echo <<<HTML
            <li class="touchcarousel-item">
            <a class="item-block" href="/?p={$i}">
                <img src="{$l}" width="170" height="230" />
                <h4>test</h4>
                <p>like</p>
            </a>
        </li>

HTML;
        }
        ?>
    </ul>
</div>
