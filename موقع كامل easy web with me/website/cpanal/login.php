<?php 
session_start();
require('conn.php');
if(isset($_POST['login'])){
if(isset($_POST['username'])){
		$username=$_POST['username'];
}
if(isset($_POST ['password'])){
		$password=$_POST['password'];
}
if($username !=="" and $password !==""){
$sql="SELECT * FROM `users` where username='$username' and password='$password'";
$query=mysqli_query($conn,$sql);
@$num=mysqli_num_rows($query);
if($num==1){
   $_SESSION['username']="username";
    $_SESSION['password']="password";
    header('location:cpanal.php');
}
else{
    ?>
<div class="alert alert-danger">
 اسم المستخدم او الباسورد غير صحيحين 
</div>
<?php
}


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








<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  
                </li>
            </ul>

        </div>
    </div>
</nav>
<br>


<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">تسجيل الدخول الى لوحة التحكم</div>
                    <div class="card-body">
                        <form action="login.php" method="post">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">اسم المستخدم</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="username" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">باسوورد</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                  
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="login" style="margin-right:100px;">
                                    تسجيل الدخول 
                                </button>
                                <a href="#" class="btn btn-link">
                                 
                                </a>
                            </div>
         
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>





