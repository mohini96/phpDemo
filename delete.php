<?php
require_once("db.php");
function mydelete($id)
{
    $datadelete="call demo_update_flag('".$id."')";
     $deletequery=mysqli_query($GLOBALS['con'],$datadelete);
   echo  $deletequery;
}
$res=mydelete($_GET['id']);
echo $res;
header('location:display.php');
      /*
$sql = $con->prepare("DELETE  FROM demo WHERE id=?");
	$sql->bind_param("i", $_GET["id"]);
	$sql->execute();
	$sql->close();
	$con->close();
	header('location:display.php');*/
	?>
