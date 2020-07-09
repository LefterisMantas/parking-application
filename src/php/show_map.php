<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
          <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />
          <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
          <style>
            #map {height:100%;}
          </style>
          <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
          <script type="text/javascript">
            function create_map( coordinates ){
                    var map = L.map('map').setView([40.64, 22.93], 13);

                    L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=IyhXrAFs9S0EWcWCv6LB',{
                        attribution:'<a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a>',
                    }).addTo(map);

                  var my_obj=JSON.parse(coordinates);
                  for( i in my_obj.polygons ){  //prospelash twn polygons
                      var my_arr=new Array( my_obj.polygons[i].spots.length );
                      for( j in my_obj.polygons[i].spots ){  //prospelash twn spots
                          my_arr[j]=new Array(2);

                          my_arr[j][0]=my_obj.polygons[i].spots[j].x;
                          my_arr[j][1]=my_obj.polygons[i].spots[j].y;
                      }
                      var polygon = L.polygon(my_arr).addTo(map);
                      polygon.setStyle({
                          color: 'grey'
                      });
                      polygon.bindPopup("Population:");
                  }
            }

            $(document).ready( function(){
                $.ajax({
                        url:"get_coords.php",
                        cache:false,
                        success:function(response){
                           create_map( response );
                        }
                });
            });
         </script>

  </head>
  <body>
    <?php
    include "admin.php";
    ?>
    <div id = "map"></div>

  </body>
</html>
