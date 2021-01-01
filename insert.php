<?php
$connect = mysqli_connect('localhost','root','','resultdb') or die ("fail");
$cond= isset($_GET['edit']);
session_start();
if(!isset($_SESSION['log'])){
    echo "<script>window.open('login.php','_self')</script>";
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>result</title>
    </head>
    <link href="bootstrap.css" rel="stylesheet" type="text/css">
    <body class="bg-secondary">
       <?php
        include "nav.php";
        ?>
        <div  class="container mt-3">
             <?php
                
                    if(isset ($_POST['send'])){
                    $name = $_POST['name'];
                    $contact = $_POST['contact'];    
                    $email = $_POST['email'];
                    $maths = $_POST['maths'];
                    $science = $_POST['science'];
                    $sst = $_POST['sst'];
                    $hindi = $_POST['hindi'];
                    $eng = $_POST['eng'];
                        
                   //image works
                        
                    $image = $_FILES['image']['name'];
                    $tmp_image = $_FILES['image']['tmp_name'];
                    
                    move_uploaded_file($tmp_image,"photos/$image");        
                        $id = $_GET['edit'];
                        
                        if($cond){
                   $sql_query = "update students set
                   name='$name',contact='$contact',email='$email',image='$image',
                   maths='$maths',science='$science',sst='$sst',hindi='$hindi',eng='$eng' where id='$id'";
                        }
                        else{
                            
                             $sql_query = "INSERT INTO students(name,contact,email,image,maths,science,sst,hindi,eng) value      ('$name','$contact','$email','$image','$maths','$science','$sst','$hindi','$eng')";
                        }
                        $run = mysqli_query($connect,$sql_query);
                        
                        if($run){
                            
                            echo "<script>window.open('insert.php','_self')</script>";
                        }
                        else{
                            
                            echo "<div class='alert bg-danger text-white'>something went wrong try again!</div>";
                        }
                    }
                ?>
            <div class="row">
                <div class="col-lg-9 mx-auto card card-body bg-light">
                    <center> <h5 class="text-dark"><?= ($cond)? "update ": "insert ";?>Records</h5></center>
                    <?php
                    
                    if($cond){
                        $id =$_GET['edit'];
                        $query = mysqli_query($connect,"select *from students where id ='$id'");
                        $row = mysqli_fetch_array($query);
                    }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class ="form-control" value="<?= ($cond)? $row['name']: '';?>"> 
                        </div> 
                        
                         <div class="form-group">
                            <label for="contact">Contact</label>
                     <input type="text" name="contact" id="contact" class ="form-control" value="<?= ($cond)? $row['contact']: '';?>">
                        </div>
                        
                         <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class ="form-control" value="<?= ($cond)? $row['email']: '';?>">
                        </div>
                        
                        <div class="form-group">
                           <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control" value="<?= ($cond)? $row['image']: '';?>">
                        </div> 
    
                        <div class="form-group">
                            <label for="maths">Mathematics</label>
                        <input type="number" name="maths" id="maths" class="form-control" value="<?= ($cond)? $row['maths']: '';?>"> 
                        </div>
                          <div class="form-group">
                            <label for="science">Science</label>
                      <input type="number" name="science" id="science" class="form-control" value="<?= ($cond)? $row['science']: '';?>">
                        </div>
                         
                          <div class="form-group">
                            <label for="sst">SST</label>
                            <input type="number" name="sst" id="sst" class="form-control" value="<?= ($cond)? $row['sst']: '';?>">   
                        </div>
                         
                          <div class="form-group">
                            <label for="hindi">HIndi</label>
                            <input type="number" name="hindi" id="hindi" class="form-control" value="<?= ($cond)? $row['hindi']: '';?>">
                        </div>
                          <div class="form-group">
                            <label for="eng">English</label>
                            <input type="number" name="eng" id="eng" class="form-control" value="<?= ($cond)? $row['eng']: '';?>">   
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="send" class="btn btn-success" value="<?= ($cond)? 'Update': 'Insert';?>">
                        </div>
                        </div>
                 </form>
              </div>
            </div>
        </div>
    </body>    
</html>
 