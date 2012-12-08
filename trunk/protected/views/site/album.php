<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aOmMiez ( Mir4ge )
 * Date: 12/7/12 AD
 * Time: 2:35 PM
 * Email : aommiez@gmail.com
 * File Name : album.php
 */
Helper::YiiImport("GetController");

$albums = GetController::getAlbums();

?>
<script>
    jQuery(function($) {
            $("#albumList").change( function() {
                var albumID = $(this).val();
                FB.api("/"+albumID+"/photos",function(response){
                    var photos = response["data"];
                    document.getElementById("photos_header").innerHTML = "Photos("+photos.length+")";
                    for(var v=0;v<photos.length;v++) {
                        var image_arr = photos[v]["images"];

                        var subImages_text1 = "Photo "+(v+1);

                        //this is for the small picture that comes in the second column
                        var subImages_text2 = '<img src="'+image_arr[(image_arr.length-1)]["source"]+'" />';

                        //this is for the third column, which holds the links other size versions of a picture
                        var subImages_text3 = "";

                        //gets all the different sizes available for a given image
                        for(var j = 0 ;j<image_arr.length;j++) {
                            subImages_text3 += '<a target="_blank" href="'+image_arr[j]["source"]+'">Photo('+image_arr[j]["width"]+"X"+image_arr[j]["height"]+')</a><br/>';
                        }
                        addNewRow(subImages_text1,subImages_text2,subImages_text3);
                    }
                });
            });
    });
</script>
<select id="albumList">
        <option value="0" selected>เลือกอัลบัม</option>
    <?php
    foreach($albums['data'] as $album)
    {
        $albumID = $album['id'];
        $albumName = $album['name'];
        echo <<<HTML
        <option value="{$albumID}">{$albumName}</option>
HTML;
    }
    ?>
</select>
<div id="photos_header">

</div>