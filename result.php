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
                 <?php 
                    if(isset($_GET['view'])){
                     $id = $_GET['view'];   
                       
                           $query = mysqli_query($connect, "select *from students where id='$id'");
                           $row = mysqli_fetch_array($query);
                    }
                    ?>
        <table class="table table-striped table-borderd">
            <tr>
                <th colspan="4" class="bg-primary text-white">Personal Details</th>        
            </tr>
            <tr>
                <th colspan="2"> Name</th>
                <td colspan="1"><?php echo $row['name'];?></td>
                <td rowspan="3">
                    <img src="photos/<?php echo $row['image'];?>" alt="" width="200px" height="160px" class="float-right">
                </td>
            </tr>
              <tr>
                <th colspan="2">Contact</th>
                <td colspan="1"><?php echo $row['contact'];?></td>
                
            </tr>  <tr>
                <th colspan="2">Email</th>
                <td colspan="1"><?php echo $row['email'];?></td>
                
            </tr>
            <tr>
                <th colspan="4" class="bg-success text-white" >Marks Details</th>
            </tr>
            <tr>
               <th>Subject</th>    
               <th>Total Marks</th>    
               <th>Pass Marks</th>    
               <th>Obtained Marks</th>    
                
            </tr>
            <tr>
                <td>Maths</td>
                <td>100</td>
                <td>30</td>
                <td><?php echo $row['maths'];?></td>
                
            </tr>
            
              <tr>
                <td>Science</td>
                <td>100</td>
                <td>30</td>
                <td><?php echo $row['science'];?></td>
                
            </tr> 
                <tr>
                <td>SST</td>
                <td>100</td>
                <td>30</td>
                <td><?php echo $row['sst'];?></td>
                
            </tr>
                 <tr>
                <td>Hindi</td>
                <td>100</td>
                <td>30</td>
                <td><?php echo $row['hindi'];?></td>
                
            </tr>  
               <tr>
                <td>English</td>
                <td>100</td>
                <td>30</td>
                <td><?php echo $row['eng'];?></td>
                
            </tr>
            <tr>
                <th colspan="4" class="bg-dark text-white" >Result Details</th>
            </tr>
               <tr>
                 <th colspan="2">Aggrigate Marks</th>
                <td colspan="2"><?php echo $total = $row['maths']+$row['science']+ $row['sst'] +$row['hindi']+$row['eng'];?></td>
            </tr>
            <tr>
               
               <th colspan="2">Division</th>
                <td>
                    <?php
                    if($total>=300):
                    echo "1st division";
                    elseif($total >= 250):
                    echo "2nd Division";
                    elseif($total >= 150):
                    echo "3rd division";
                    else:
                    echo "fail";
                    endif;
                    ?>
                </td>
             </tr>  
                  </table>
                </div>
            </div>
        </div>
    </body>
</html>
