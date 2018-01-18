<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<center>
<?php
		require_once("db.php");
        $name=$_POST['firstname'];
         $password=$_REQUEST['password'];
         $city=$_REQUEST['city'];
         $state=$_REQUEST['state'];
         $DOB=$_REQUEST['dob'];
         echo 'hi';
          function insert($name,$password,$city,$state,$DOB)
             {
                 echo 'inside insert function';
                  $insert="call demo_insertALL('".$name."','".$password."','".$city."','".$state."','".$DOB."','.1.')";
                    $insertquery=mysqli_query($GLOBALS['con'],$insert);
                   // echo  $insertquery;
                    if($insertquery)
                    {
                         return "1";
                         	header('location:display.php');
                     }
                     {
                         return "0";
                    }
             }

   $res=insert($name,$password,$city,$state,$DOB);
     	header('location:display.php');

if (isset($_POST['submit']))
{
    echo 'inside submit';

            /*
        		$sql = $con->prepare("INSERT INTO demo (name,password,city,state,dob) VALUES (?, ?, ?,?,?)");
        		$sql->bind_param("sssss",  $name, $password,$city,$state,$DOB);
        		$r=$sql->execute();
        		if($r) {

        			header('location:display.php');

        		} else {
        			$error_message = "Problem in Adding New Record";
        		}
        	*/

	}
?>
</center>
</body>
</html>