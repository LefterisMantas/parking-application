<?php

session_start();
 $con=mysqli_connect("localhost","root","", "parking");
 if( mysqli_connect_errno())
     die("Error Conecting to Database");
 
 if( $_SERVER["REQUEST_METHOD"] == "POST" ){
       
    if(  isset( $_POST['username'] ) &&  isset( $_POST['password'] ) ){
        $user=mysqli_real_escape_string( $con, $_POST['username'] );
        $pass=mysqli_real_escape_string( $con, $_POST['password'] );
        
        if( strlen($user)>0 & strlen($pass)>0 ){
     
            $result=mysqli_query($con, "SELECT * FROM admin WHERE username='$user' AND password='$pass' ");
            
            if( mysqli_num_rows($result)==1 ){
                $_SESSION['loged']=1; 
                header("location:admin.php");
            }
            else
                 header("location:admin-log.php?error=1");
        }
        else    
            header("location:admin-log.php?error=2");
        
    }   
 }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style1.css">
  </head>
  <body>
<div class="login-box">
<form method="POST" action="admin-log.php" >
  <h1>Login</h1>
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" placeholder="Username" name="username" >
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" placeholder="Password" name="password" >
  </div>

  <input type="submit" class="btn" value="Sign in">
  <div class="err_msg" >
       <span>
            <?php
                 if( isset( $_GET['error'] ) ){
                   if( $_GET["error"]==1 )
                      echo "Ο Χρήστης Δεν Βρέθηκε";
                   else if( $_GET["error"]==2 )
                      echo "Λάθος Δεδομένα";   

                 } 
            ?>
       </span>
  </div>
</form>  
</div>
  </body>
</html>