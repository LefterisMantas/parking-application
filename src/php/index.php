<!DOCTYPE html>
<html>
    <head>
          <meta charset="utf-8"/>
          <link href="css/mystyle1.css" rel="stylesheet" type="text/css"/>
          <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
          <script type="text/javascript"></script>
          <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />
          <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
          <!--<style>
            #map {position: absolute; top: 0; bottom: 0; left: 0; right: 0;}
          </style>-->
          <script type="text/javascript">
            function create_map( coordinates ){
                    var map = L.map('map').setView([40.64, 22.93], 13);

                    L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=IyhXrAFs9S0EWcWCv6LB',{
                        attribution:'<a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a>',
                    }).addTo(map);

                  var my_obj=JSON.parse(coordinates);

                  for( i in my_obj.polygons ){
                      var my_arr=new Array( my_obj.polygons[i].spots.length );
                      for( j in my_obj.polygons[i].spots ){
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

                $("#sign").click(function(){
                    window.location.href="admin-log.php"
                });
                $("#sp1").click(function(){
                    window.location.href="index.php"
                });
            });
         </script>
</head>
<body>
       <div id="wrapper" >
	      <div id="header" >
				 <div id="in_header" >
					<table>
					    <tr>
								  <td>
							<div id="logo" >
							  <span id="sp1" >SmartParking</span>
							</div>
							</td>
							<td>
							<div class="navbar">
							<a href="index.php">Home</a>
  							<a href="about.php">About us</a>
							<div class="dropdown">
							<button class="dropbtn">Signin
							<i class="fa fa-caret-down"></i>
							</button>
							<div class="dropdown-content">
							<a href="#s" id="sign">Admin-Signin</a>

							</div>
							</div>
							</div>
						</td>
						</tr>
			  </table>
			</div>
        </div>
       </div>
        <div id="main_page" >
            <div id="map" >

            </div>
        </div>
</body>
</html>
