<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<?php
require("connect.php");
$update = $_POST['update'];//更改個人資料
$name = $_POST["name"];//姓名
$email = $_POST["userid"];//帳號
$UpdatePassword = $_POST['UpdatePassword'];//更改個人資料的密碼

$pwd = $_POST["pwd1"];//註冊畫面傳的密碼

$birthday = $_POST["byear"]."-".$_POST["bmonth"]."-".$_POST["bday"];

if(isset($update))//更新
{
$sql = "UPDATE member SET name = :name, pwd = :pwd WHERE email = '{$email}'";
$execute = array(':name' => $name,
				 ':pwd'  => sha1($UpdatePassword)
					 );
$result = insertdata($sql,$execute,$db);
if(!$result)
{
$arr = $result->errorInfo();
print_r($arr);
echo "寫入失敗";
exit;
}
else 
{
$_SESSION['username'] = $name;
?>
	<script type="text/javascript">
	alert('資料修改成功!');
	window.location.href='DS_member.php?t=orderlist'
	</script>
<?php
exit;
}

}
//檢查是否有帳號重複
$select = "SELECT email FROM member WHERE email = :email";
$sth = $db->prepare($select); 
$sth->bindValue(':email',$email);
// 使用 execute()，會自動 quote $where 的參數
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);
if($result)
{
	?>
	<script lanuage='javascript'>
	alert('此帳號已被使用，請重新註冊!');
	window.location="member.php";
	</script>
	<?php
}
else
	{

$sql = "INSERT INTO member (email,name,pwd,birthday)VALUES(:email,:name,:pwd,:birthday)";

$stmt = $db->prepare($sql);
$stmt->execute(array(':email' => $email,
					 ':name'  => $name,
					 ':pwd'	  => sha1($pwd),
					 ':birthday' => $birthday
					 ));
						
if($stmt == true)
{
?>
<script lanuage='javascript'>
alert('加入會員成功，請重新登入!');
window.location="member.php";
</script>
<?php
}
else
{
echo "\nPDO::errorInfo():\n";
print_r($db->errorInfo());	
	}

}
?>

</body>
</html>