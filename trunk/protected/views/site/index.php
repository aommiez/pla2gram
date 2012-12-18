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
            return true;
        });

        $(".filterList").click(function(){
           var filter = $(this).attr("data");
           $(".filterList").css("opacity","0.8");
           $(this).css("opacity","1");
           $("#filter").val(filter);
            return true;
        });
    });
</script>

<form id="goForm" action="site/go" method="post" enctype="multipart/form-data">

    <input type="hidden" name="filter" id="filter" value="">

    <div class="headText">1. Select Image</div>

    <input type="file" id="file" name="file" value="" class="upload" onchange="this.style.width = '100%';" >

    <div class="headText">2. Select Filter</div>

    <div id="filters">
        <img data="lomo" alt="" src="/images/lomo.png" style="-webkit-transform: rotate(-5deg);" class="filterList">
        <!--<img data="nashville" alt="" src="images/nashville.png" style="-webkit-transform: rotate(1deg);" class="filterList">-->
        <!--<<img data="kelvin" alt="" src="images/kelvin.png" style="-webkit-transform: rotate(-4deg);" class="filterList">-->
        <!--<<img data="toaster" alt="" src="images/toaster.png" style="-webkit-transform: rotate(11deg);" class="filterList">-->
        <img data="gotham" alt="" src="/images/gotham.png" style="-webkit-transform: rotate(-11deg);" class="filterList">
        <!--<<img data="tilt_shift" alt="" src="images/tilt_shift.png" style="-webkit-transform: rotate(8deg);" class="filterList">-->
    </div>

    <div class="headText">3. Upload &amp; Process</div>

    <button class="button" type="submit">Go!</button>

</form>

