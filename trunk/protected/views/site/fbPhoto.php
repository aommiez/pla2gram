<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aOmMiez ( Mir4ge )
 * Date: 12/17/12 AD
 * Time: 11:11 AM
 * Email : aommiez@gmail.com
 * File Name : fbPhoto.php
 */
?>
<div>
    <img src="<?php echo $_GET['ref']; ?>">
</div>
<div>
    <div class="headText"> Select Filter</div>
    <input type="hidden" name="filter" id="filter" value="">
    <div id="filters">
        <img data="lomo" alt="" src="/images/lomo.png" style="-webkit-transform: rotate(-5deg);" class="filterList">
        <!--<img data="nashville" alt="" src="images/nashville.png" style="-webkit-transform: rotate(1deg);" class="filterList">-->
        <!--<<img data="kelvin" alt="" src="images/kelvin.png" style="-webkit-transform: rotate(-4deg);" class="filterList">-->
        <!--<<img data="toaster" alt="" src="images/toaster.png" style="-webkit-transform: rotate(11deg);" class="filterList">-->
        <img data="gotham" alt="" src="/images/gotham.png" style="-webkit-transform: rotate(-11deg);" class="filterList">
        <!--<<img data="tilt_shift" alt="" src="images/tilt_shift.png" style="-webkit-transform: rotate(8deg);" class="filterList">-->
    </div>
    <button class="button">Go!</button>
</div>
