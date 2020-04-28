<?php

 
function Insertdata($table,$field,$data)
{
    $field_values= implode(",",$field);
    $data_values=implode(",",$data); 

    $sql= "INSERT INTO $table (".$field_values.") VALUES (".$data_values.")";
    @$result=mysql_query($sql);
  
}
 
/* طريقة استدعاء دالة الأضافة
$table = "country";
$field = array("country_name","status");
$data = array("'usa'","'1'");
$result = Insertdata($table,$field,$data,$conn);
*/
function selectdata($table,$feild,$value,$data){
 $sql=mysql_query("SELECT * FROM $table WHERE $feild=$value");
while($result=mysql_fetch_array($sql)){
echo $result[$data];

}

}














?>
