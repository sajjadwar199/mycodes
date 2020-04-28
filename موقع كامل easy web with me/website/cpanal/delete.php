<?php 
require('conn.php');
session_start();
if(!isset($_SESSION['username'])) {

	header("Location:login.php");
	
	}
require('conn.php');
  $charset="utf8";
mysqli_set_charset($conn,$charset);
mysqli_query($conn,"SET NAMES $charset;");
mysqli_select_db($conn,'cpanal');
	if(isset($_GET['idd'])){
$id=$_GET['idd'];
}
$sql1="select * from art where idd=$id";

$query1=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_array($query1)){
    $image=$row['url'];
}



$sql2="delete from art where idd='$id'";
@$query2=mysqli_query($conn,$sql2);
@unlink(@$image);
    if($query2){

        echo"<script>alert(' تم الحذف بنجاح')</script>";
                echo"<script>window.open('topics.php','_self')</script>";   
    }





?>