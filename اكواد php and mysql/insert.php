<?php
$host="localhost";
$user="root";
$pass="";
$db="project";
$conn=mysql_connect($host,$user,$pass,$db);
$charset="utf8";
mysql_set_charset($charset,$conn);
mysql_query("SET NAMES $charset;",$conn);
mysql_select_db('project',$conn);
if($conn){
	echo"connect";
	
	
	
}else 
{
echo"no";	
}
if(isset($_POST['b'])){		
$t2=$_POST['username'];
$t3=$_POST['name'];
$t4=$_POST['stage'];
$t5=$_POST['collage'];
mysql_query("insert into users(id,name,stage,collage) values ('$t2','$t3','$t4','$t5')");

}

<?