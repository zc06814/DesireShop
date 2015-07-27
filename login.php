<?php session_start();
require("connect.php");
$cookie = $_POST["checkmyacc"];
$uid = $_POST["userid"];
$pwd = $_POST["password"];
$select = "SELECT name FROM member WHERE email = :email AND pwd = :pwd";
$sth = $db->prepare($select);
$where = array(':email' => $uid, ':pwd' => sha1($pwd));

// 使用 execute()，會自動 quote $where 的參數
$result = $sth->execute($where);
$username = $sth->fetchColumn();

if($username == "")
{
?>
<script lanuage='javascript'>
alert('查無此帳號資料，請重新登入!');
window.location="member.php";
</script>
<?php
}
else
{

//登入前已經加入購物車的商品資料帶入該會員的購物車內
$NoLoginUser = $_SESSION['userid'];
$_SESSION[$uid] = $_SESSION[$NoLoginUser]; //把未登入前的購物車傳入新的購物車

$_SESSION['userid'] = $uid;	//把信箱設成userid 
$_SESSION["username"] = $username;//姓名設成username
?>
<script lanuage='javascript'>
alert('登入成功!');
window.location="index.php";
</script>
<?php
}

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>