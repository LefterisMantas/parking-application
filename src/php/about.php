<!DOCTYPE html>
<html>
    <head>
          <meta charset="utf-8"/>
          <link href="css/mystyle1.css" rel="stylesheet" type="text/css"/>
          <script  type="text/javascript">
          $("#sign").click(function(){
              window.location.href="admin-log.php"
          });
          </script>
          <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
          <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />
          <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>


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
							<button class="dropbtn">Sign in
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
          <h3>What was our goal</h3>
  <p>- We planed to create an application that importing a kml file of a city<br>
  - gives you the potention to map the city in colors <br>
  - showing how the parking of every area is being developed through the time of the day</p>


  Copyrights: Mantas Lefteris, 2019, Patras, Greece

<p>Contact information: <a style="text-decoration:none; color:black;" href="mailto:emantas@ceid.upatras.gr"><pre>emantas@ceid.upatras.gr</pre></a>

        </div>
</body>
</html>
