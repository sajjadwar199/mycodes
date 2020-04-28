<style>
    body{
        background-color: beige;
    }
.thumb-contenido{
    
    margin-bottom:1%;
    margin-left: 0px;
    padding-left: 0px;
   @import url(https://fonts.googleapis.com/css?family=Open+Sans);
#circle-shape-example { 
  font-family: Open Sans, sans-serif; 
  margin: 2rem; 
}
#circle-shape-example p { 
  line-height: 1.8; 
}
#circle-shape-example .curve { 
  width: 33%; height: auto;
  min-width: 150px;
  float: left;
  margin-right:2rem; 
  border-radius: 50%;
  -webkit-shape-outside:circle();
  shape-outside:circle();
} 
    
    
    
}


</style>



<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="bootstrap/bootstrap.min.css"  />
<script src="bootstrap/jquery-3.3.1.slim.min.js" ></script>
<script src="bootstrap/popper.min.js" ></script>
<script src="bootstrap/bootstrap.min.js" ></script>
<link type="text/css"  rel="stylesheet" href="bootstrap/bootstrap-rtl.css"/>
<title>لوحة التحكم</title>
<link href="cstyle.css" rel="stylesheet" type="text/css" />


  <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
            <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
            <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
     <body style="background-color:#dee2e6;">
       <br>
         
         
         
         <?php
        
         require 'conn.php';
         
         $charset="utf8";
         mysqli_set_charset($conn,$charset);
mysqli_query($conn,"SET NAMES $charset;");
mysqli_select_db($conn,'cpanal');
         $idd=$_GET['idd'];
     
         $sql="select * from art where idd="."$idd"." ";
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
    <div  class="container"  style="      
background-color: white; 
 ; border-radius:7px;">
    <div class="well"> 
        <div class="row">
             <div class="col-md-12">
                 <div   >
                <h4  class="hiden-xs hidden-sm" style="margin-right:100px; margin-left:44%;margin-top:10px; "  ><?php echo $nameart; ?></h4>
                     </div>
                 
                 <small style="padding:10px;"><strong>القسم:<?php  echo $part; ?></strong></small>
                      <img src='http://localhost/website/cpanal/<?php echo $url;   ?>'   width="100%" style="min-height:300px;"   
                           
                           
                           class="rounded-sm"/>
 
                 <div class="pull-left col-md-4 col-xs-12 thumb-contenido" style="width:100%;height:200"></div>
                 <div class="">
                    
                    
                     <small style="margin-left:50%; margin-top:20px;"><strong> تاريخ نشر المقالة : <?php echo $date; ?> </strong></small><br>
                    
                     
                    <br>
                     
                     <small style="margin-left:50%; margin-top:20px;"><strong> الكاتب: <?php echo $writer; ?> </strong></small><br>
                     
                     <hr>
                        
                   <h4 class="text-center" style="margin-right:20%;" ><?php echo $nametopic; ?></h4>
                     <p class="text-justify" align="center">
                     
                     <?php echo $topic;  ?>
            
            
            
            
            
            
                     </p></div>
             </div>
        </div>
    </div>
        
        <div>


</div>

        
        
        
</div>

<center>
<h3  style="color:gray;">  تعليقك يسعدنا </h3>
    </center>
<div  align="center" class="container">
<div id="fb-root" class="container">
<script      async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3"></script>
    </div>
    </div>

<div class="fb-comments" data-href="http://localhost/website/cpanal/show_topic.php?idd=<?php echo $idd;     ?>"   style="min-width:100%;"  data-numposts="100" data-width="1000" align="center"></div>

        
<?php 
            
            
         }      
            
            
            
            ?>
</body>






























