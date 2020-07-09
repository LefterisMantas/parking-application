<!DOCTYPE html>
<html lang="en">
<head>
  <title>Car Parking</title>
  <meta charset="utf-8">  <!--encoding-->
  <meta http-equiv="x-ua-compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!--dimention and scale tou browser -->
  <link rel="stylesheet" href="my.css">
  <style>
    body{
    background-image: url(map.jpg);
    height: 100%;
    margin: 0;
    padding: 0;
    }
        #map {
          height: 100%;
        }
      </style>
      <script>
      $("title").click(function(){
          window.location.href="admin.php"
      });
      </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <h1><a style="text-decoration: none; color:white;" href="index.php">Smart Parking</a></h1><br><br>
    <ul>
      <li><a href="sintetagmenes.php">Upload File</a></li>
      <li><a href='delete_coord.php'>Delete File</a></li>
      <li><a href="show_map.php">Map/Simulate Data</a></li>
      <li style="float:right"><a href='logout.php'>Logout</a></li>
    </ul>
</body>
</html>
