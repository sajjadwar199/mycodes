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
  <a class="navbar-brand" >لوحة التحكم</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="insert_art.php">اضافة مقالة  <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="topics.php">المقالات</a>
          <a class="nav-item nav-link active"  onclick="return confirm('هل انت متاكد من تسجيل الخروج?')" href="login_out.php"> تسجيل الخروج  <span class="sr-only">(current)</span></a>
      
    </div>
  </div>
</nav>

<div class="alert alert-primary">
    <h1 align="center"> اهلا وسهلا بك في لوحة تحكم الموقع </h1>
    </div>


    
    
    <footer><p align="center" class="alert alert-info">   تصميم وبرمجة بواسطة :سجاد عبد الكريم  </p>
    
    </footer>

 </body>

</html>
