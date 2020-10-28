<?php include 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>    
    <link rel="icon" href="assets/pemkot.png"/>
    <title>LOGIN</title>    
    <link href="assets/css/cerulean-bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/general.css" rel="stylesheet"/>   
  </head>
  <body style="background-color: #ffffff">
<br /><br /> <br />
<div class="container-fluid">
<ul class="nav nav-pills">
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <div class="panel panel-danger">
    <div class="panel-heading" align="center" style="background-color: #ffffff">
    <img src="assets/images/pemkot.png" class="img-responsive" /> 
              <form class="form-signin" action="?m=login" method="post">        
                <h2 class="form-signin-heading">Silahkan masuk</h2>
                <?php            
                    if($_POST) {
                        include 'aksi.php';  
                    }
                ?>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Usernames</label>
                    <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="user" autofocus />
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" /> 
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>        
              </form>      
            </div>
        </div>
    </div>
</html>
