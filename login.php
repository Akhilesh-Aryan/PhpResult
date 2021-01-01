  <?php

$connect = mysqli_connect('localhost','root','','resultdb') or die ("fail");
session_start();
?>
  
<!DOCTYPE html>
<html>
    <head>
        <title>result</title>
    </head>
    <link href="bootstrap.css" rel="stylesheet" type="text/css">
    <body>
        <div class="container mt-3">
            <div class="row">
                <div class="col-lg-4 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h2>Login</h2>
                            <form action="login.php" method="post">
                                <div class="form-group">
                                    <label for="contact">Contact</label>
                                    <input type="text" name="contact" class="form-control">
                                </div>
                                  <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                  <div class="form-group">
                                    <input type="submit" name="login" class="btn btn-danger btn-block">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
if(isset($_POST['login'])){
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    
    $query = mysqli_query($connect,"SELECT * from admin WHERE contact ='$contact' AND password = '$password'");
    $count = mysqli_num_rows($query);
    
    if($count > 0){
        $_SESSION['log'] = $contact;
       echo "<script>window.open('index.php', '_self')</script>";
    }
    else{
         echo "<script>alert('username and password is incorrect')</script>";
    }
}
?>