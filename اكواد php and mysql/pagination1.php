<?php
if(isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    $page=1;
}
$number_page=5;
    @$from=($page-1)*$number_page;
?>