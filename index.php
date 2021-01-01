  <?php
$connect = mysqli_connect('localhost','root','','resultdb') or die ("fail");
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
    <body>
      <?php
        include "nav.php";
        ?>
        <div  class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Total_Marks</th>
                            <th>Action</th>             
                        </tr> 
                    <?php 
                        
                        if(isset($_GET['find'])){
                             $search = $_GET['search'];
                             $calling =mysqli_query($connect, "select * from students where id ='$search' or name like '%$search%'");
                        }
                        else{    
                       $calling =mysqli_query($connect, "select * from students");
                        }
                        while($row = mysqli_fetch_array($calling)){
    
                        ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['contact'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['maths']+ $row['science'] + $row['sst'] + $row['hindi'] + $row['eng'];?></td>
                            <td>
                            <a href ="insert.php?edit=<?php echo $row['id'];?>" class="btn btn-success btn-sm">Edit</a>
                            <a href = "result.php?view=<?php echo $row['id'];?>"class="btn btn-info btn-sm">View</a>
                            <a href="delete.php?del=<?php echo $row['id'];?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
