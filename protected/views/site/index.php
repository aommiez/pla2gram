<?php
$this->pageTitle=Yii::app()->name;

if ( Yii::app()->facebook->getUser() == 0) {
    return false;
}

?>
<script type = "text/javascript">
    // Define the entry point
    $(document).ready(function()
    {
        $('#goForm').submit(function() {
            var filter = $("#filter").val();
            var ext = $('#file').val().split('.').pop().toLowerCase();
            var file = $('#file').val();
            if ( file == "") {
                alert("กรุณาเลือกไฟล์รูปภาพด้วยครับ");
                return false;
            }
            if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
                alert('invalid extension!');
                return false;
            }
            if ( filter == "" ) {
                alert("กรุณาเลือก Filter ก่อนครับ");
                return false;
            }
            $("html, body").animate({ scrollTop: 0 }, "slow");
            $("#lightbox").show();
            $("body").css("overflow","hidden");
            return true;
        });

        $("#lightbox").click(function(){
            return false;
        });

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

        $("#albumFB").click(function(){
            event.preventDefault();
            document.location.href= "http://www.pla2gram.com<?php echo Yii::app()->createUrl("site/album"); ?>";
        });

    });

    function showTxt(){
        $("#capPhoto").show();
        $("#file").css('width','300px');
    }
</script>
<style>
    #capPhoto {
        height: 100px;
        padding: 8px;
        border: 1px solid #CCC;
        line-height: 130%;
        font-size: 13px;
        width: 320px;
        resize: none;
        color: gray;
        display: none;
    }
</style>
<form id="goForm" action="site/go" method="post" enctype="multipart/form-data">

    <input type="hidden" name="filter" id="filter" value="">

    <div class="headText">1. Select Image</div>

    <button id="albumFB">Choose from Album</button> <input type="file" id="file" name="file" value="" class="upload" onchange="showTxt()" >
    <div style="padding-top: 12px;">
    <textarea name="capPhoto" id="capPhoto">เพิ่มคำอธิบายรูป....</textarea>
    </div>
    <div class="headText">2. Select Filter</div>

    <div id="filters">
        <img data="lomo" alt="" src="/images/lo.JPG" style="-webkit-transform: rotate(-5deg);" class="filterList">
        <img data="nashville" alt="" src="images/vin.JPG" style="-webkit-transform: rotate(1deg);" class="filterList">
        <img data="Sod" alt="" src="images/sod.JPG" style="-webkit-transform: rotate(-4deg);" class="filterList">
        <img data="gotham" alt="" src="/images/gotham.JPG" style="-webkit-transform: rotate(-11deg);" class="filterList">
    </div>

    <div class="headText">3. Upload &amp; Process</div>
    <input type="checkbox" name="shareFB" value="shareFB"> I have a bike<br>
    <button class="button" type="submit">Go!</button>

</form>

