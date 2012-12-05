<div id="last_upload">Last Upload</div>
<div style="text-align: center;">
    <ul class="last_ul">
        <?php

        $last = Helper::last_upload(6);

        foreach ( $last as $key => $value ) {
            $thumb = str_replace("photo/","",$value['link']);
            $l = Yii::app()->baseUrl."thumb/thumb_".$thumb;
            $i = $value['id'];
            echo <<<HTML
            <li><a href="/?p={$i}"><img src="{$l}"></a></li>
HTML;
        }
        ?>
    </ul>
</div>