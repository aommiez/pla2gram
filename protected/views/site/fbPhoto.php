<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aOmMiez ( Mir4ge )
 * Date: 12/17/12 AD
 * Time: 11:11 AM
 * Email : aommiez@gmail.com
 * File Name : fbPhoto.php
 */
if ( isset($_GET['ref'])) {

}
?>
<script type="text/javascript">
    $(document).ready(function() {

        $(".filterList").click(function(){
            var filter = $(this).attr("data");
            $(".filterList").css("border","0px dashed #DBDBDB");
            $(".filterList").css("opacity","0.8");
            $(".filterList").css("padding","0px");
            $(this).css("opacity","1");
            $(this).css("border","1px dashed #DBDBDB");
            $(this).css("padding","6px");
            $("#filter").val(filter);
            return true;
        });


        $("#capPhoto").click(function(){
            var textInBox = $(this).val();
            if ( textInBox != "เพิ่มคำอธิบายรูป...." ) {
                return true;
            } else {
                $(this).val("");
                $(this).css("color","#333");
                return true
            }
        });

        $('#goPhotoFBForm').submit(function() {
            var filter = $("#filter").val();
            var urlPhoro = $("#urlPhoto").val();
            var capPhoto = $("#capPhoto").val();
            if ( filter == "" ) {
                alert("กรุณาเลือก Filter ก่อนครับ");
                return false;
            } else if ( urlPhoro == "" ) {
                return false;
            }
            $("html, body").animate({ scrollTop: 0 }, "slow");
            $("#lightbox").show();
            $("html, body").css("overflow","hidden");
            return true;
        });
        $("#lightbox").click(function(){
            return false;
        });
    });
</script>
<style>
    #capPhoto {
        height: 100px;
        padding: 8px;
        border: 1px solid #CCC;
        line-height: 130%;
        font-size: 13px;
        display: block;
        width: 320px;
        resize: none;
        color: gray;
    }
</style>
    <form id="goPhotoFBForm" action="goPhotoFB" method="post" enctype="multipart/form-data">
<div>
    <div class="headText"> Photo From Facebook Album</div>
    <img src="<?php echo $_GET['ref']; ?>" style="margin-bottom: 20px;">
    <textarea name="capPhoto" id="capPhoto">เพิ่มคำอธิบายรูป....</textarea>
</div>
<div>
    <div class="headText"> Select Filter</div>
    <input type="hidden" name="filter" id="filter" value="">
    <input type="hidden" name="urlPhoto" id="urlPhoto" value="<?php echo $_GET['url']; ?>">
    <div id="filters">
        <img data="lomo" alt="" src="/images/lomo.png" style="-webkit-transform: rotate(-5deg);" class="filterList">
        <img data="nashville" alt="" src="images/nashville.png" style="-webkit-transform: rotate(1deg);" class="filterList">
        <img data="gotham" alt="" src="/images/gotham.png" style="-webkit-transform: rotate(-11deg);" class="filterList">
    </div>
    <div class="headText">Process</div>
    <button class="button" id="go" type="submit">Go!</button>
</div>
    </form>