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
            $(".filterList").css("opacity","0.8");
            $(this).css("opacity","1");
            $("#filter").val(filter);
            return true;
        });

        $("#go").click(function(){
           var filter = $("#filter").val();
           var urlPhoro = $("#urlPhoto").val();
           if ( filter == "" ) {
               alert("กรุณาเลือก Filter ก่อนครับ");
               return false;
           }

           document.location.href= "http://www.pla2gram.com<?php echo Yii::app()->createUrl("site/goPhotoFB"); ?>?filter="+filter+"&urlPhoro="+urlPhoro;

        });
    });
</script>
<style>
    #capPhoto {

    }
</style>
<div>
    <div class="headText"> Photo From Facebook Album</div>
    <img src="<?php echo $_GET['ref']; ?>">
    <textarea id="capPhoto">เพิ่มคำอธิบายรูป</textarea>
</div>
<div>
    <div class="headText"> Select Filter</div>
    <input type="hidden" name="filter" id="filter" value="">
    <input type="hidden" name="urlPhoto" id="urlPhoto" value="<?php echo $_GET['url']; ?>">
    <div id="filters">
        <img data="lomo" alt="" src="/images/lomo.png" style="-webkit-transform: rotate(-5deg);" class="filterList">
        <img data="gotham" alt="" src="/images/gotham.png" style="-webkit-transform: rotate(-11deg);" class="filterList">
    </div>
    <div class="headText">Process</div>
    <button class="button" id="go">Go!</button>
</div>
