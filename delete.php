<?php
$connect = mysqli_connect('localhost','root','','resultdb') or die ("fail");
         if(isset($_GET['del'])){
                $id = $_GET['del'];
                $query = mysqli_query($connect, "delete from students where id='$id'");
                echo "<script>window.open('index.php','_self')</script>";
           }
session_start();
if(!isset($_SESSION['log'])){
    echo "<script>window.open('login.php','_self')</script>";
    
}
    ?>