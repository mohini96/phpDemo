<?php
require_once("db.php");
if(isset($_POST['update']))
{
    //echo "call";
$name=$_POST['name'];
$city=$_POST['city'];
$password=$_POST['password'];
$state=$_POST['state'];
$dob=$_POST['dob'];
$uid=$_GET['id'];
 $datadelete="call demo_update_flag('".$id."')";
     $deletequery=mysqli_query($GLOBALS['con'],$datadelete);
$ad="call demo_update('".$uid."','".$name."','".$password."','".$city."','".$state."','".$dob."',)";
 $updatequery=mysqli_query($GLOBALS['con'],$updatequery);
//$ad="update demo set name=?,password=?,city=?,state=?,dob=? where id=?";
//echo $ad;
//$stmt=$con->prepare($ad);
//$stmt->bind_param('sssssi',$name,$password,$city,$state,$dob,$uid);
//$stmt->execute();
//$stmt->close();
//echo "<script>alert('Data updated Successfully');</script>" ;
	header('location:display.php');
}

?>
	<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
    </head>
    <body>
    <?php
    $id=$_GET['id'];
    $ret = "select * from demo where id=?";
    $stmt2 =$con->prepare($ret);
    $stmt2->bind_param('i',$id);
    $stmt2->execute();
    $res=$stmt2->get_result();
    $cnt=1;
    while($row=$res->fetch_object())
    {
    ?>

<center>
<form name="stmt" method="post">
<table>
<tr>
<td>Name :</td>
<td><input type="text" name="name" value="<?php echo $row->name;?>" required="required" /> </td>
</tr>
<tr>
<td>Password :</td>
<td><input type="password" name="password" value="<?php echo $row->password;?>" required="required" /></td>
</tr>
<tr>
<td>city. :</td>
<td><input type="text" name="city" value="<?php echo $row->city; ?>" required="required" /></td>
</tr>
<tr>
<td>State :</td>
<td><input type="text" name="state" value="<?php echo $row->state; ?>" required="required" /></td></tr>
<tr>
<tr>
<td>Date Of Birth. :</td>
<td><input type="text" name="dob" value="<?php echo $row->dob; ?>" required="required" /></td>
</tr>
<td></td>
<td><input type="submit" name="update" value="Submit" /></td>

</tr>
</center>
</table>
</form>
<?php } ?>

</body>
</html>