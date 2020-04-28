 <nav style=""> 
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="parts.php?page=<?php if(($page-1) > 0) {echo $page-1; } else{ echo '1'; }  ?>&&part=<?php echo  $parts; ?>">الاحدث</a></li>           
<?php 
             
$sql2="select * from art  where part='$parts' " ;           
$query3=mysqli_query($conn,$sql2);
@$number_topics=mysqli_num_rows(@$query3);
    
$total_page=ceil($number_topics/$number_page);
 for(@$i=1;$i<=$total_page;@$i++){            
?>

    <li class="page-item"><a class="page-link" href="parts.php?page=<?php echo $i; ?>&&part=<?php  echo $parts;  ?>"><?php echo $i;?></a></li>     
<?php
}
      
?>
    <li class="page-item"><a class="page-link" href="parts.php?page=<?php if(($page+1) < $total_page ) {echo $page+1; } elseif(($page+1) >= $total_page) echo $total_page;   ?>&&part=<?php echo  $parts; ?>">الاقدم</a></li>
  </ul>
</nav>
            
    </nav>        