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
<style>
    .fbPhoto {
        margin-top: 10px;
        -moz-box-shadow: 0 0 5px #888;
        -webkit-box-shadow: 0 0 5px#888;
        box-shadow: 0 0 5px #888;
        margin-right: 16px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
            $("#albumList").change( function() {
                $("#photoCount").html("");
                $("#photoAlbum").html("");
                var albumID = $(this).val();
                var count = $(this).find("option[value="+albumID+"]").attr("count");
                FB.api("/"+albumID+"/photos?offset=0&limit="+count+"",function(response){
                    var photos = response["data"];
                    //document.getElementById("photoCount").innerHTML = "Photos("+photos.length+")";
                    for(var v=0;v<photos.length;v++) {
                        var image_arr = photos[v]["images"];

                        var subImages_text1 = "Photo "+(v+1);

                        //this is for the small picture that comes in the second column
                        var subImages_text2 = '<img src="'+image_arr[6]["source"]+'" class="fbPhoto"/> ';

                        //this is for the third column, which holds the links other size versions of a picture
                        var subImages_text3 = "";

                        //gets all the different sizes available for a given image

                        for(var j = 0 ;j<image_arr.length;j++) {
                            subImages_text3 += '<img src="'+image_arr[j]["source"]+'" class="fbPhoto"/>';
                            subImages_text3 += '<a target="_blank" href="'+image_arr[j]["source"]+'">Photo('+image_arr[j]["width"]+"X"+image_arr[j]["height"]+')</a><br/>';
                        }
                        addNewRow(subImages_text1,subImages_text2,subImages_text3);
                    }
                });


            });

            function addNewRow(subImages_text1,subImages_text2,subImages_text3,paging ) {
                $("#photoAlbum").append(subImages_text2);

                $('.fbPhoto').bind("click", function(){
                    var urlPhoto = $(this).attr("src");
                    document.location.href= "http://www.pla2gram.com<?php echo Yii::app()->createUrl("site/fbPhoto"); ?>?ref="+urlPhoto;
                    return false;
                });

            }



            $("#albumSync").click(function(){
               alert("Sync");
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

        if ( isset($album['count'])) {
            $count = $album['count'];
        } else {
            $count = 0;
        }
        echo <<<HTML
        <option value="{$albumID}" count="{$count}">{$albumName} ({$count})</option>
HTML;
    }
    ?>
</select>
<button id="albumSync">Sync Facebook Now</button>
<div id="photoCount"></div>

<div id="photoAlbum" style="margin-left: 20px;"></div>