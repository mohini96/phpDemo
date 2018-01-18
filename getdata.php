<?php
$con = mysqli_connect('localhost','root','');
$database=$_GET['database'];
$table=$_GET['table'];
$str=$_GET['str'];
$a=[];
$i=0;
$qu="select $str from $database.$table ";
//echo $select1;
$da=mysqli_query($con,$qu);
while($atr=mysqli_fetch_field($da))
{
    $a[$i]=$atr->name;
    $i++;
}
if(mysqli_num_rows($da)>0) {
    while ($s1 = mysqli_fetch_array($da)) {
        for($j=0;$j<$i;$j++)
        {
            echo $s1[$a[$j]]." ";

        }
        echo "<br>";
     //   echo "<div>$s1[0]</div>";

    }
}



//$query = $con->query("select $str from $database.$table");
//
//while($d=$query->fetch_array())
//{
//   // echo $d;
////    echo "<p name=$d[0] value=$d[0]>$d[0]</p>";
//    echo $d[1];
//}
//
?>