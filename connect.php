<?php 

$host = "localhost";
$dbname = "desire";
$user = "root";
$password = "1234";


		//connect to the db
		try {
		$connect = "mysql:dbname=".$dbname.";host=".$host;
		$db = new PDO($connect,$user,$password);
		$result = $db->exec("set names utf8");//設定UTF8 不然中文會變亂碼
		}
		catch (PDOException $e)
			{
		echo "Error".$e->getMessage()."<br/>";
			}


function getquery($sql,$db){
$result = $db->query($sql);
if ($db->errorCode() != 00000)
{
 print_r($db->errorInfo());
　exit;
}
$row = $result->fetch(PDO::FETCH_OBJ);
return $row;
}

function insertdata($sql,$execute,$db){
$stmt = $db->prepare($sql);
if ($db->errorCode() != 00000)
{
 print_r($db-＞errorInfo());
　exit;
}
$result = $stmt->execute($execute);
return $result;
}

function getnum($sql,$db){
$row = $db->query($sql);

if ($db->errorCode() != 00000)
{
 print_r($db-＞errorInfo());
　exit;
}

$rows = $row->fetchAll();
$rowcount = count($rows);
return $rowcount;
}


?>