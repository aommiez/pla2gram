<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<form action="site/go" method="post" enctype="multipart/form-data">
    <input type="hidden" name="filter" value="">

    <div class="headText">1. Select Image</div>

    <input type="file" name="file" value="" class="upload" onchange="this.style.width = '100%';" >

    <div class="headText">2. Select Filter</div>

    <div id="filters">
        <img data-filter="lomo" alt="" src="images/lomo.png" style="-webkit-transform: rotate(-5deg);">
        <img data-filter="nashville" alt="" src="images/nashville.png" style="-webkit-transform: rotate(1deg);">
        <img data-filter="kelvin" alt="" src="images/kelvin.png" style="-webkit-transform: rotate(-4deg);">
        <img data-filter="toaster" alt="" src="images/toaster.png" style="-webkit-transform: rotate(11deg);">
        <img data-filter="gotham" alt="" src="images/gotham.png" style="-webkit-transform: rotate(-11deg);">
        <img data-filter="tilt_shift" alt="" src="images/tilt_shift.png" style="-webkit-transform: rotate(8deg);">
    </div>

    <div class="headText">3. Upload &amp; Process</div>

    <button class="button" type="submit">Go!</button>

</form>