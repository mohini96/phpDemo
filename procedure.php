<?php

$con=mysqli_connect("localhost","root","","phpdemo");

if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

print "<h2>MySQL: Creating Stored Procedure</h2>";
$qry = "create procedure user() select * from demo";
$sql=mysql_query($con,$qry);

print "<h2>MySQL: Calling Stored procedure</h2>";
$res = mysql_query($con,"call user()");
while($row=mysql_fetch_array($res))
{
 echo $row['id'] ." ". $row['name'] . " " . $row['password']. " ".$row['city']." ".$row['state'];
 echo "<br/>";
}

mysql_close($con);
?>