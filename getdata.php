
<?php 

require("connect.php");
$color = $_GET["color"];
$size = $_GET["size"];
$no = $_GET["no"];


$sql = "Select num,price from item where id = '{$no}' and color = '{$color}'";
$result = $db->query($sql);    
$row = $result->fetch(PDO::FETCH_OBJ);
$num = $row->num; 
//取得ID序號
$price = $row->price;


$sql = "Select inventory from inventory where id = '{$num}' and size = '{$size}'";
$result=$db->query($sql);    
$row=$result->fetch(PDO::FETCH_OBJ);
$inventory = $row->inventory; 


echo $num.",".$price.",".$inventory;
?>
