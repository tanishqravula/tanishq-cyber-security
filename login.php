<?php
    include_once("header.php");
    include_once("connectionfactory.php");
  session_start();
  if(isset($_POST['user_login'])){
            $sel="select * from users where email='".$_POST['email']."' and password='".$_POST['password']."' ";
            $exe=mysqli_query($conn,$sel);
            $total=mysqli_num_rows($exe);
			// Login Success
            if($total==1){
                  $fetch=mysqli_fetch_array($exe, MYSQLI_BOTH);
                  $_SESSION['USERID']=$fetch['id'];
                  $_SESSION['USERNAME']=$fetch['username'];
				  $_SESSION['user_id'] = $fetch['id'];
				  $_SESSION['user_auth'] = "yes";
          echo header("Location: index.php"); 
          // echo '<script>window.location="quizBeginners.php"</script>'; 
         
            }
            else{
              echo'<div class="col-md-4 col-md-offset-4" style="margin-top:20px;"><div class="alert alert-dismissible alert-danger">
             <button type="button" class="close" data-dismiss="alert">×</button>
          <a href="javascript:void(0)" class="alert-link">Invalid Email Id or Password</a>
          </div></div>';
        }
      }

  ?>
<!DOCTYPE HTML>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="css/index.css" rel="stylesheet" type="text/css"/>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <script src="js/jquery-1.10.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Material design -->
  <link href="css/material/bootstrap-material-design.css" rel="stylesheet">
  <link href="css/material/ripples.min.css" rel="stylesheet">
  <script src="js/material/material.min.js"></script>
  <script src="js/material/ripples.min.js"></script>


  <script>
  $(document).ready(function(){
    $.material.init();
    $("select").dropdown();
  });
  </script>
</head>
<body>
  
  <div class="container-fluid">
    <div class="row">
      <div class=" col-sm-offset-3 col-sm-6 col-xs-12 col-md-offset-4 col-md-4" style="margin-top:50px;margin-bottom:50px;">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <p class="panel-title" style="text-align: center; font-size: 36px; line-height: 1.5;">
              <i class="material-icons" style="font-size: 48px;">school</i><br>
              LOGIN</p>
            </div>
            <div class="panel-body">
              <form action="" method="POST" style="margin-top: 12px;">
                <div class="form-group label-floating">
                  <div class="input-group margin-bottom-sm">
                    <span class="input-group-addon"><i class="material-icons">email</i></span>
                    <label for="email" class="control-label">Email</label>
                    <input class="form-control" type="email" name="email" maxlength="255" style="font-size:18px;" pattern="([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)" required>
                    <p class="help-block" style="font-size:16px;">Enter a valid email address</p>
                  </div>
                </div>
                <div class="form-group label-floating">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                    <label for="password" class="control-label">Password</label>
                    <input class="form-control" type="password" name="password" maxlength="60" style="font-size:18px;" required>
                  </div>
                </div>
                <button type="submit" class="btn btn-raised btn-primary pull-right" name="user_login">Login</button>
              </form>
              <div class="clearfix"></div>
              <div>
                <p style="text-align: center;font-size:16px;">Don't have and account yet?<a href="signup.php" style="color: #2196f3;font-size:16px;" > Register</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php   include("footer.php");?>   
               
  </body>
