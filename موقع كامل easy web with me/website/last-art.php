

    <h1 align="center" style="color:gray;">احدث المقالات</h1>
<h1 align="center"><?php echo @$parts; ?></h1> 
<?php
include 'cpanal/conn.php';
 $charset="utf8";

mysqli_set_charset($conn,$charset);
mysqli_query($conn,"SET NAMES $charset;");
mysqli_select_db($conn,'cpanal');
$sql="select * from art order by idd desc limit 10   ";
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

$size_last=400;
if(strlen($topic) > $size_last) {
 $last_arts= substr($topic,0,$size_last);
}else{
    $last_arts=$topic;
}



?>






     
    <div class="container">
	<div class="row" style='direction:rtl;'>
		<div class="card w-100 mb-2">
            <div class="row">
            <div class="col-md-3">
                <img class="m-1 w-100 img-fluid" style="max-height: 200px; border-radius:10px;" src="http://localhost/website/cpanal/<?php  echo @$url; ?>" >
            </div>
            <div class="card-body text-right col-md-9">
                <h5 class="card-title rtl"><a href="show.php?idd=<?php echo $id; ?>"><?php echo @$nametopic ; ?></a> </h5>
                                <p>اخر تحديث:<?php echo $date;?></p>
                                <p> القسم: <?php echo $part;?></p>

                <p><?php echo $last_arts;  ?></p> </div>
                <button  style="margin-right:20px; margin-bottom:10px;"  class="btn btn-warning"><a style="text-decoration:none;color:white;" href="show.php?idd=<?php echo $id; ?>">قراءة المزيد</a></button>
            </div><!--.row-->
        </div>

		
<?php
};

?>
                        
                        
     