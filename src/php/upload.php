<?php
include "connectdb.php";
include "admin.php";
echo'<h2> Import here your file </h2>
<form action="upload.php" method="post" enctype="multipart/form-data" style="padding:30px; background-color:#333;">
    <br><br>
    <label style="color:white;" for="fkml">Import here your KML File:</label>
    <input type="file" name="fkml">
    <input type="text" name="ceid">
   <input type="submit" value="ceid">
</form>';
$flag = False;
$allowed_ext= "kml";
$error ="";
  if(isset($_POST('ceid'))){
    if ($_POST('ceid')=="ceid"){
        $file_name = $_FILES['fkml']['name'];
        $file_type=$_FILES['fkml']['type'];
        $file_tmp =$_FILES['fkml']['tmp_name'];
        if(move_uploaded_file($_FILES(['fkml']['file_name'],'mykml.kml')){
          $file = simplexml_load_file('mykml.kml');
          foreach($syn->Document->Folder->Placemark as $place){
            $desc = $place->description;
            $temp1 = explode("Population</span>:</strong> <span class=\"atr-value\">",$desc); //xwrizw se 2 merh metaksi twn opoiwn einai to pop
            $temp2 = explode("</span>",@$temp1[1]); //diaxwrizw apo to deutero kommati

            $population=0;
            if( @$temp2[0]) { //se kapoia tetragona den yparxei population
               $population=$temp2[0];
            }
             $x = @$place->MultiGeometry->Polygon->outerBoundaryIs->LinearRing->coordinates;
             $pieces = explode(" ", $x);
             $places='{ "spots":[';


             for( $i=0; $i<sizeof($pieces); $i++ ){
                  $pieces2=explode(",",$pieces[$i]);
                  @$new_str='{ "x":'.$pieces2[1].', "y":'.$pieces2[0].'},';
                  $places.=$new_str;

             }
             if( $places =='{ "spots":[{ "x":, "y":},' )
                   continue;
             $places=substr_replace($places ,"]}", -1);
             $sql="INSERT INTO coordinates(coords, population) VALUES ( '$places','$population' ) ";
             mysqli_query($conn,$sql);

             $result=mysqli_query($conn,"SELECT * FROM coordinates");
             $json_result=array();
             $msg='{  "polygons":[';

             while( $row=mysqli_fetch_array($result) ) {
                  $msg.=$row["coords"].",";
             }
          }
        }
      }
    }


?>
