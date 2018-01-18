<?php
$con = mysqli_connect('localhost','root','');
$id=$_GET['id'];

$query = $con->query("show tables from $id");
echo "<select>";
while($d=$query->fetch_array())
{
    echo "<option name=$d[0] value=$d[0]>$d[0]</option>";
}
echo "</select>";



?>