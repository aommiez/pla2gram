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
    $("#albumList").change( function() {
        var albumID = $(this).val();
        alert(albumID);
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
<div>

</div>