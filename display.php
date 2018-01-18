<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>



  <script>
 $(document).ready(function() {
     $('#example').DataTable();
 } );
  </script>
</head>
<body>
<center>
<?php


require_once("db.php");

 $dataselect="call demo_select_flag()";
 $result=mysqli_query($GLOBALS['con'],$dataselect);
//$sql = "SELECT * FROM demo";
//$result = $con->query($sql);

?>
<table border="1" id="example" class="display" cellpadding="1" cellspacing="1"  width="100%">
<thead>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>City</th>
    <th>State</th>
    <th>Date Of birth</th>
    <th>Edit</th>
    <th>Delete</th>

</tr>
 </thead>
<tbody>

    <?php          if($result->num_rows > 0)
            {
               while($rows=$result->fetch_assoc())
               {
                    ?>
                    <tr>
                    <td><?php echo $rows['id']; ?></td>
                    <td><?php echo $rows['name']; ?></td>
                    <td><?php echo $rows['city']; ?></td>
                    <td><?php echo $rows['state']; ?></td>
                    <td><?php echo $rows['dob']; ?></td>
                    <td><a href="update.php?id=<?php  echo $rows['id'];?>">EDIT</a></td>
                    <td><a href="delete.php?id=<?php echo $rows['id'];?>">DELETE</a></td>

                    <tr>
                    <?php
               }

            }
    ?>
</tr>
</tbody>

</table>
</center>
</body>
</html>