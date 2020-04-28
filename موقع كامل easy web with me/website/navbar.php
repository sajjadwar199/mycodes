<html>
<head>
    <meta charset="utf8">
 <title> easy web with me</title>   
   <style>
       *{
           
           
           font-size:17px;
      
       }
     
</style> 
    <meta content="text/html; charset=utf-8" http-equiv="ContentType" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="wstyle.css" />
</head>
<body>
<div  style="width:100%;">
<nav class="navbar navbar-expand-lg navbar-light " style="background-color:#e83e8c14;">
  <a class="navbar-brand" href="index.php"  style=" color:#da9bb8; text-shadow:10px 10px 10px #da9bb8;" >easy web with me </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<?php 
     $games="العاب"; 
    $android="اندرويد";
    $shrohat="شروحات";
    $programing="برمجة وتصميم";
    $news="اخبار";
    $programs="برامج";
    
?>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">الصفحة الرئيسية <span class="sr-only">(current)</span></a>
      </li>
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          اقسام الموقع
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="parts?part=<?php echo $games; ?>">العاب </a>
          <a class="dropdown-item" href="parts?part=<?php echo $android; ?>">اندرويد</a>
          <a class="dropdown-item" href="parts?part=<?php echo $shrohat; ?>">شروحات</a>
              <a class="dropdown-item" href="parts?part=<?php echo $programs; ?>">برامج</a>
            
                          <a class="dropdown-item" href="parts?part=<?php echo $programing; ?>">برمجة وتصميم</a>
                       <a class="dropdown-item" href="parts?part=<?php echo $news; ?>">اخبار</a>
<?php
            
?>
          
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0" action="search" method="get">
      <input class="form-control mr-sm-2" type="text" placeholder="ابحث عن اسم مقالة .." aria-label="Search" name="s"/>
      <button class="btn btn-danger my-2 my-sm-0" style="background-color:#ca4d59;margin-right:5px;padding-left:20px;padding-right:20px;" type="submit" >بحث</button>
    </form>
  </div>
</nav>
</div>
</body>



</html>