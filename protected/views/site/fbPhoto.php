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
<script type="text/javascript">
    $(document).ready(function() {

    });
</script>
<div>
    <img src="<?php echo $_GET['ref']; ?>">
</div>
<div>
    <div class="headText"> Select Filter</div>
    <input type="hidden" name="filter" id="filter" value="">
    <input type="hidden" name="urlPhoto" id="urlPhoto" value="<?php echo $_GET['url']; ?>">
    <div id="filters">
        <img data="lomo" alt="" src="/images/lomo.png" style="-webkit-transform: rotate(-5deg);" class="filterList">
        <img data="gotham" alt="" src="/images/gotham.png" style="-webkit-transform: rotate(-11deg);" class="filterList">
    </div>
    <button class="button" id="go">Go!</button>
</div>
