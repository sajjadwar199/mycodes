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
include_once 'conn.php';
include 'arabicdate.php';
$date=ArabicDate();
if(!is_dir('upload')){
mkdir('upload');

}
    $charset="utf8";
mysqli_set_charset($conn,$charset);
mysqli_query($conn,"SET NAMES $charset;");
mysqli_select_db($conn,'cpanal');

if(isset($_POST['insert'])){
if(isset($_POST['name-art'])){
    
    $nameart=$_POST['name-art'];
    strip_tags($_POST['name-art']);
}

if(isset($_POST['name-topic'])){
   strip_tags($nametopic=$_POST['name-topic']);
}
if(isset($_POST['writer'])){
   strip_tags($writer=$_POST['writer']);
}
if(isset($_POST['image'])){
    $image=$_POST['image'];
}
if(isset($_POST['top'])){
 strip_tags(@$topic=$_POST['top']);

 }
    if(isset($_POST['part'])){
 strip_tags(@$part=$_POST['part']);

 }   
@$filename=$_FILES['image']['name'];
@$filetembname=$_FILES['image']['tmp_name'];
@$size=$_FILES['image']['size'];
@$type=$_FILES['image']['type'];
@$error=$_FILES['image']['error'];
@$folder='upload/';
$path='upload/'.$filename;
 @$type=array('jpg','png','jpge','gif','jfif');
 @$test_type=strtolower(end(explode('.',$filename)));
    if(in_array($test_type,$type) and  @$_FILES['image']['size'] <1000000){
       move_uploaded_file($filetembname,$folder.$filename);   
    }else{

        echo"<script>alert('الرجاء اضافة صورة بصيغة مدعومة اقل من 1 ميغا بايت!لم تتم الاضافة ')</script>";
                echo"<script>window.open('insert_art.php','_self')</script>"; 
  exit;   
    }
   
   
    

     if(empty($filename)){
              echo '<script language="javascript">';
  echo 'alert("الرجاء اضافة صورة " )'; 
  echo '</script>';
           
          

 
  exit;
          include 'insert-art.php'; 
    }
 
    if($nameart !=="" and $nametopic !=="" and $writer !=="" and $path !=="" and $topic !=="" and $part !==""){
$sql="INSERT INTO `art`( `artname`, `topicname`, `writer`, `url`,`topic`,`date`,`part`) VALUES ('$nameart','$nametopic','$writer','$path','$topic','$date','$part')";
    }
    @$query=mysqli_query($conn,$sql);

    if($query){

     header('location:alert.php');
           echo"<script>alert('تمت الاضافة بنجاح')</script>";
                echo"<script>window.open('topics.php','_self')</script>"; 
    }

    } 
?>






<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
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
      <a class="nav-item nav-link" href="topics.php">المقالات</a>
        <a class="nav-item nav-link active" onclick="return confirm('هل انت متاكد من تسجيل الخروج?')" href="login_out.php"> تسجيل الخروج  <span class="sr-only">(current)</span></a>
      
    </div>
  </div>
</nav>

    <form action="insert_art.php" method="post" enctype="multipart/form-data"  >
        <h3 class="alert alert-primary" align="center" >يجب ان تملئ جميع البيانات لكي تتم الاضافة والا لا يضاف اي شئ</h3>
<div style="width:50%; margin-right:25%;margin-top:100px;">
<input class="form-control" type="text" placeholder="اسم المقالة" name="name-art"   required>
  
 
    
    
    

<br>
<input class="form-control" type="text" placeholder="اسم الموضوع " name="name-topic" required>

<br>
<input class="form-control" type="text" placeholder="الكاتب" name="writer"  required>
    <br>
    <h4>اختر القسم</h4>
<select class="form-control" name="part" required>
     <option></option>
  <option>اندرويد</option>
<option>العاب</option>
 <option>برمجة وتصميم</option>
<option>شروحات</option>
    <option>برامج</option>
    <option>اخبار</option>
</select>
    
<br>
  <input id="fileUpload" type="file"  name="image" / required>

<div id="image-holder"  ></div> 


    </div>
          
  <textarea  class="tinymce"  name="top"   cols="86" rows ="20"   ></textarea>

     <button type="submit" class="btn btn-primary" style="margin-top:4%; margin-left:45%;" name="insert">اضافة</button>
    </form>
 
     <script src=" tinymce/tinymce.min.js"></script>
    <script src="tinymce/init-tinymce.js"></script>
    <script src="tinymce/jquery.tinymce.min"></script>
<script>
    $("#fileUpload").on('change', function () {

     //Get count of selected files
     var countFiles = $(this)[0].files.length;

     var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     var image_holder = $("#image-holder");
     image_holder.empty();

     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "jfif")  {
         if (typeof (FileReader) != "undefined") {

             //loop for each file selected for uploaded.
             for (var i = 0; i < countFiles; i++) {

                 var reader = new FileReader();
                 reader.onload = function (e) {
                     $("<img />", {
                         "src": e.target.result,
                             "class": "thumb-image"
                     }).appendTo(image_holder);
                 }

                 image_holder.show();
                 reader.readAsDataURL($(this)[0].files[i]);
             }

         } else {
             alert("هاذا الملف غير مدعوم");
         }
     } else {
         alert("لا ترفع ملف او صيغة غير مدعومة لصورة!!!");
     }
 });
</script>

 </body>

</html>
