

<style>
    body{
        background-color: #f8f9fa!important;
    }

</style>





<?php
session_start();

if(!isset($_SESSION['username'])) {
	
	header("Location:login.php");
	
	}
?>
<?php 
require('conn.php');
if(!is_dir('upload')){
mkdir('upload');

}




?>


<html>
<head>
    <style>
 
    
    
    
    </style>
<meta content="text/html; charset=utf-8"  />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"  />
<script src="bootstrap/jquery-3.3.1.slim.min.js" ></script>
<script src="bootstrap/popper.min.js" ></script>
<script src="bootstrap/bootstrap.min.js" ></script>
<link type="text/css"  rel="stylesheet" href="bootstrap/bootstrap-rtl.css"/>
<title>لوحة التحكم</title>
<link href="cstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
 
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="cpanal.php">لوحة التحكم</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="insert_art.php">اضافة مقالة
                        

          <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="topics.php">المقالات</a>
   <a class="nav-item nav-link active" onclick="return confirm('هل انت متاكد من تسجيل الخروج?')" href="login_out.php"> تسجيل الخروج  <span class="sr-only">(current)</span></a>
      
    </div>
  </div>
</nav>
<body>
    <div style="width:100%;">
     <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">اسم المقالة</th>
      <th scope="col">اسم الموضوع</th>
      <th scope="col">الكاتب</th>
      <th scope="col">الصورة</th>
      <th scope="col">التاريخ</th>
      <th scope="col">القسم</th>
     <th scope="col">التعديل</th>
    <th scope="col">الحذف</th>
          <th scope="col">الموضوع كاملا</th>



    </tr>
      <tr>
               
        
      </tr>
  </thead>
 
<?php 
    
    
   require('conn.php');
      $charset="utf8";
mysqli_set_charset($conn,$charset);
mysqli_query($conn,"SET NAMES $charset;");
mysqli_select_db($conn,'cpanal');
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }
    if(isset($_GET['per_page'])){
       $per_page=$_GET['per_page'];
    }else{
        $per_page=5;
    }
    $start=$per_page * $page - $per_page;
    $sql="SELECT * FROM `art`  order by idd asc limit {$start},{$per_page}";
     
         
         
      
    $query=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($query)){
    
@$id=$row['idd'];
@$nameart=$row['artname'];
@$nametopic=$row['topicname'];
@$writer=$row['writer'];
@$url=$row['url'];
@$topic=$row['topic'];
@$date=$row['date'];
 @$part=$row['part']; 
     
        
    ?>
    
    
  <tbody>
      
    <tr>
        
      <th scope="row"><?php echo $id;?></th>
      <td><?php echo $nameart;?></td>
      <td><?php echo $nametopic;?></td>
      <td><?php echo $writer;?></td>
        <td><a href="<?php echo $url;?>"><img src="<?php echo $url;?>" height="70" width="140"/></a></td>
        <td><?php echo  $date;?></td>
            <td><?php echo  $part;?></td>
        <td><button type="button" class="btn btn-success" ><a href="update.php?idd=<?php echo $id;?>" style="    text-decoration: 
none;color:white;">تعديل</a> </button></td>
           <td><button type="button" class="btn btn-danger" ><a    onclick="return confirm('هل انت متاكد من الحذف?')"       href="delete.php?idd=<?php echo $id;?>"  style="    text-decoration: 
none;color:white;"  >حذف</a></button></td>
           <td><button type="button" class="btn btn-info" ><a href="show_topic.php?idd=<?php echo $id;?>"  style="    text-decoration: 
none;color:white;"  >عرض الموضوع</a>

               </button></td>
        
        <?php 
       
        
    }
    
        
        
        ?>
    </tr>
 

  </tbody>
</table>
  

  <nav aria-label="Page navigation example">
  <ul class="pagination">
     
      <div class="alert alert-dark">
	  
<?php

include 'conn.php';
$sql6="select * from art";
@$query7=mysqli_query($conn,$sql6);
$number=mysqli_num_rows($query7);

$number_p =$number/5 +0.9;
@$number_page=trim((int) $number_p ) ; 

         

?>


<?php

?>

 &nbsp;    &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;    &nbsp;    &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;    &nbsp;    &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;    &nbsp;    &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;    &nbsp;    &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;    &nbsp;    &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;   
          
<h5>
   <p     >عدد الصفحات: <?php  echo $number_page;     ?>
   &nbsp;    &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;   
عدد المقالات: <?php  echo $number;    ?>
    
          </p>
                 
          

          
</h5>

          
          
<?php




?>



<select onchange="location=this.value;" class="custom-select custom-select-lg mb-3" align="center" style="width:20%;margin-left:100%;"        >
    
    
     <option selected >
         
         
         
 
    <h4 align="right" style="margin-bottom:100px;" >
                        صفحة رقم
    <?php 
        echo $page;  
      
      ?>
        </h4>
    
    
    </option>
    <?php 
  
    $sql2="SELECT * FROM `art`";
      $query2=mysqli_query($conn,$sql2);
     $rows=mysqli_num_rows($query2);
    $pages=ceil($rows/$per_page);
       
    for($i=1;$i<=$pages;$i++){
      ?>
  


<option   value="?page=<?php echo $i;?>&per_page=<?php echo $per_page;?>      ">
    
  
      <?php echo $i; ?>
    
</option>
   
       <a href="?page=<?php echo $i;?>&per_page=<?php echo $per_page;?>" style="color:white ;"  ><?php echo $i; ?></a> 
    
 
   
    <div style="float:left;margin100px;" >
     
    </div>
    <?php
    }
      
       


      ?>
      
       </select>
          </div>
        <?php
          $sql2="SELECT * FROM `art`";
      $query2=mysqli_query($conn,$sql2);
     $rows=mysqli_num_rows($query2);
         if($rows==0){
             ?>
      
         <div class="alert alert-danger alert-dismissible fade show" role="alert"  class="container" style="width:100%;">
  <strong>الجدول فارغ!</strong> لا توجد اي بيانات
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
          <?PHP
         }
        ?>


     </ul>
</nav>
    
    <br>
    
    
    
    <br>
        
   </div>
 </body>

</html>
