      <style>
div.pagination {
	padding: 3px;
	margin: 3px;
}

div.pagination a {
	padding: 2px 5px 2px 5px;
	margin: 2px;
	border: 1px solid #AAAADD;
	
	text-decoration: none; /* no underline */
	color: white;
}
div.pagination a:hover, div.pagination a:active {
	border: 1px solid blue;

	color: blue;
}
div.pagination span.current {
	padding: 2px 5px 2px 5px;
	margin: 2px;
		border: 1px solid #000099;
		border-radius: 10px;
		font-weight: bold;
		background-color: #000099;
		color: #FFF;
	}
	div.pagination span.disabled {
		padding: 2px 5px 2px 5px;
		margin: 2px;
		border: 1px solid #EEE;
	
		color: #DDD;
	}
	


</style>        








<?php 
          
      include 'cpanal/conn.php';
     @$search=$_GET['s'];

$nameart="artname";
$nametopic="topicname";
$topic="topic";
$date="date";
   $sql="select * from art  where  $nameart   LIKE '%".$search."%' or $nametopic  LIKE '%".$search."%' or $topic  LIKE '%".$search."%' or $date  LIKE '%".$search."%'";
  $query=mysqli_query($conn,$sql);
  @$num=mysqli_num_rows($query);


          
          
    header('search.php');      
          
    ?>

<body  style="background-color:#ececec;"   >

<?php


include 'include-bootstrab.php';
include 'navbar.php';



?>
    
 <?php   
if($num == 0 ){
   ?>
  <h5 style="background-color:white;height:100px;padding-top:20px;" align="center" > !عذرا لم يتم العثور على "<?php     echo $search;?>"  </h5>  
    
        
    
    <br>
      <br>
      <br>
      <br>
      <br>
      <br>
    <?php 
 include 'footer.php';   
    
    
?>  
    <?php 
 
}else{
     
?>
  <h5 style="background-color:white;height:100px;padding-top:20px;" align="center" > تم وجود   "<?php echo $num;      ?>" من نتائج البحث .... </h5>  
    
      
    
    
       
  
      <br>

    
    
    
    <?php 
	/*
		Place code to connect to your DB here.
	*/
	$connect=mysqli_connect('localhost','root','','cpanal');	// include your code to connect to DB.
@$parts=$_GET['part'];
	$tbl_name="art";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
$charset="utf8";
mysqli_set_charset($connect,$charset);
mysqli_query($connect,"SET NAMES $charset;");
mysqli_select_db($connect,'cpanal');
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name where  $nameart   LIKE '%".$search."%' or $nametopic  LIKE '%".$search."%' or $topic  LIKE '%".$search."%' or $date  LIKE '%".$search."%' limit 2";
	$total_pages = mysqli_fetch_array(mysqli_query($connect,$query));
	@$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "search.php"; 	//your file name  (the name of this file)
	$limit = 5; 								//how many items to show per page
	@$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM $tbl_name where  $nameart   LIKE '%".$search."%' or $nametopic  LIKE '%".$search."%' or $topic  LIKE '%".$search."%' or $date  LIKE '%".$search."%' LIMIT $start, $limit";
	$result = mysqli_query($connect,$sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a  class='btn btn-primary' href=\"$targetpage?page=$prev&&part=$parts\">« السابق</a>";
		else
			$pagination.= "<span class=\"disabled\">« السابق</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a class='btn btn-primary' href=\"$targetpage?page=$counter&&part=$parts\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a class='btn btn-primary' href=\"$targetpage?page=$counter&&part=$parts\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a class='btn btn-primary' href=\"$targetpage?page=$lpm1&&part=$parts\">$lpm1</a>";
				$pagination.= "<a  class='btn btn-primary' href=\"$targetpage?page=$lastpage&&part=$parts\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a class='btn btn-primary' href=\"$targetpage?page=1&&part=$parts\">1</a>";
				$pagination.= "<a class='btn btn-primary' href=\"$targetpage?page=2&&part=$parts\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a  class='btn btn-primary'href=\"$targetpage?page=$counter&&part=$parts\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a class='btn btn-primary' href=\"$targetpage?page=$lpm1&&part=$parts\">$lpm1</a>";
				$pagination.= "<a class='btn btn-primary' href=\"$targetpage?page=$lastpage&&part=$parts\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a class='btn btn-primary' href=\"$targetpage?page=1&&part=$parts\">1</a>";
				$pagination.= "<a class='btn btn-primary' href=\"$targetpage?page=2&&part=$parts\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a class='btn btn-primary' href=\"$targetpage?page=$counter&&part=$parts\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a class='btn btn-primary'  href=\"$targetpage?page=$next&&part=$parts\">اللاحق »</a>";
		else
			$pagination.= "<span class=\"disabled\">اللاحق »</span>";
		$pagination.= "</div>\n";		
	}
?>

	<?php
		while(@$row = mysqli_fetch_array($result))
		{
	
		// Your while loop here
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
             
             
             
             
    
    <div class="container" >
	<div class="row" style='direction:rtl;'>
		<div class="card w-100 mb-2">
            <div class="row">
            <div class="col-md-3">
                <img class="m-1 w-100 img-fluid" style="max-height: 200px;border-radius:10px;" src="http://localhost/website/cpanal/<?php  echo @$url; ?>" >
            </div>
            <div class="card-body text-right col-md-9">
                <h5 class="card-title rtl"><a href="show.php?idd=<?php echo $id; ?>"><?php echo @$nametopic ; ?></a> </h5>
                <p><?php echo $date;?></p>
                <p>القسم: <?php echo $part;  ?></p> 
                                <p> <?php echo $last_arts;  ?> </p>                        

                
                </div>
                 <button  style="margin-right:20px;margin-bottom:10px;" class="btn btn-warning"><a style="text-decoration:none;color:white;" href="show.php?idd=<?php echo $id; ?>">قراءة المزيد</a>
                    
            </div><!--.row-->
        </div>
             </div>
 </div>
   </div>

            	
<?php
};

?>


<div style="margin-right:40%;">
             <?=@$pagination?>

    
    
</div>
	      
             
    
    
    
    
    
 <?php
            
 include 'footer.php';   
    
    
 
}
 
    ?>

