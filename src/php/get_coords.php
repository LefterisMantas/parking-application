<?php
session_start();
include "connectdb.php";
$result=mysqli_query($conn,"SELECT * FROM coordinates");

$json_result=array();

$msg='{  "polygons":[';

while( $row=mysqli_fetch_array($result) ) {
     $pop = $row['population'];
     $msg.=$row["coords"].",";

}

$msg=substr_replace($msg ,"]}", -1);
echo $msg;
?>
