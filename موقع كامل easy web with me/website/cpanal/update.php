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
if(isset($_GET['idd']))	{
$id=$_GET['idd'];
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

if(isset($_POST['update'])){
if(isset($_POST['name-art'])){
    $nameart=$_POST['name-art'];
}

if(isset($_POST['name-topic'])){
    $nametopic=$_POST['name-topic'];
}
if(isset($_POST['writer'])){
    $writer=$_POST['writer'];
}
if(isset($_POST['image'])){
    $image=$_POST['image'];
}
if(isset($_POST['top'])){
 @$topic=$_POST['top'];

 }
    if(isset($_POST['part'])){
 @$part=$_POST['part'];

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

        echo"<script>alert('الرجاء اضافة صورة بصيغة مدعومة اقل من 1 ميغا بايت!لم يتم التعديل ')</script>";
                echo"<script>window.open('topics.php','_self')</script>"; 
  exit;   
    }
   
   
   
    

     if(empty($filename)){
  echo"<script>alert('الرجاء اضافة صورة ')</script>";
                echo"<script>window.open('topics.php','_self')</script>";  
exit;
          

 
  exit;
    }
    
    if(isset($_GET['idd'])){
        $id=$_GET['idd'];
        
    }

    $sql1="select * from art where idd=$id";

$query1=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_array($query1)){
    $image=$row['url'];
}
    if($filename==$image){
 echo " ";
    }else 
    {
           @unlink($image);
    }
    if($nameart !=="" and $nametopic !=="" and $writer !=="" and $path !=="" and $topic !=="" and $part !=="" ){
$sql="UPDATE `art` SET `artname`='$nameart',`topicname`='$nametopic',`writer`='$writer',`url`='$path',`topic`='$topic',`date`='$date',`part`='$part' WHERE idd='$id'";
    }
    @$query=mysqli_query($conn,$sql);
    if($query){

        echo"<script>alert('تم التعديل بنجاح')</script>";
                echo"<script>window.open('topics.php','_self')</script>";   
    }


    } 

?>
    





























<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"  />
<script src="bootstrap/jquery-3.3.1.slim.min.js" ></script>
<script src="bootstrap/popper.min.js" ></script>
<script src="bootstrap/bootstrap.min.js" ></script>
<link type="text/css"  rel="stylesheet" href="bootstrap/bootstrap-rtl.css"/>
<title>لوحة التحكم</title>
<link href="cstyle.css" rel="stylesheet" type="text/css" />


  <form action="<?php $php_self ;?>" method="post" enctype="multipart/form-data"  >
        <?php
    @$sql="select * from art where idd='$id'";
   $query=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($query)){
    

@$nameart=$row['artname'];
@$nametopic=$row['topicname'];
@$writer=$row['writer'];
@$url=$row['url'];
@$topic=$row['topic'];
@$date=$row['date'];
 @$part=$row['part']; 
     
        
    ?>
    
      
      
      
      
        <h3 class="alert alert-danger" align="center" >يجب ان تملئ جميع البيانات لكي تتم التعديل والا لا يتم تعديل اي شئ</h3>
<div style="width:50%; margin-right:25%;margin-top:100px;">
    <lable >اسم المقالة</lable>
<input class="form-control" type="text"      value="<?php echo $nameart; ?> " name="name-art" >

    
    

<br>
    <lable >اسم الموضوع</lable>
<input class="form-control" type="text" value="<?php echo $nametopic; ?> " name="name-topic"   required>

<br>
    <lable >الكاتب</lable>
<input class="form-control" type="text" value="<?php echo $writer; ?> " name="writer"  required>
    <br>
    <h4>تعديل القسم</h4>
<select      required class="form-control" name="part"  >
     <option><?php echo $part; ?></option>
     <option    ></option>
  <option>اندرويد</option>
<option>العاب</option>
 <option>برمجة وتصميم</option>
<option>شروحات</option>
    <option>برامج</option>
    <option>اخبار</option>
</select>
    
<br>
  <input id="fileUpload" type="file"  name="image" value="<?php echo $url; ?>"  required />
   
<img src="<?php echo $url; ?>"/>
     <hr>
<div id="image-holder"  ></div> 


    </div>
          
  <textarea   required class="tinymce"  name="top"  cols="86" rows ="20" ><?php echo $topic;  ?></textarea>

     <button type="submit" class="btn btn-danger" style="margin-top:4%; margin-left:45%;" name="update">تعديل</button>
    </form>
<?php
    }
        
        ?>
 
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

     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
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
