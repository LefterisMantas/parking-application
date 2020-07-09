<?php
session_start();
include "connectdb.php";
include "admin.php";
//@unlink("mykml.kml");  //diagrafh arxeiou
mysqli_query($conn,"delete from coordinates");
echo "<br><br> Your file was deleted <br> Do you want to upload another one?";
?>
