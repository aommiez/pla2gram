<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aOmMiez ( Mir4ge )
 * Date: 12/5/12 AD
 * Time: 1:58 PM
 * Email : aommiez@gmail.com
 * File Name : index.php
 */
require 'instagraph.php';
try
{
    $instagraph = Instagraph::factory('test.JPG', 'test_output.JPG');
}
catch (Exception $e)
{
    echo $e->getMessage();
    die;
}
$instagraph->toaster(); // name of the filter

?>
<img src="test.JPG"><br>
<img src="test_output.JPG">