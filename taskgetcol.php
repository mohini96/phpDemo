<?php

$tableid=$_GET['tableid'];
$database=$_GET['id'];
$con = mysqli_connect('localhost','root');

$query = $con->query("SHOW COLUMNS FROM $tableid FROM $database");
//echo "<select>";
while($d1=$query->fetch_array())
{
    echo "<li  name=$d1[0] value=$d1[0]>$d1[0]</li>";
}
//echo "</select>";
?>
<script>
    $( function() {
        $( "#sortable1, #sortable2" ).sortable({
            connectWith: "#sortable1, #sortable2"
        }).disableSelection();
    } );
</script>
