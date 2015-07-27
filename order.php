<?php session_start()?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>


<?php
include("connect.php");
$email = $_SESSION['userid'];
$name = $_SESSION['username'];
$city = $_POST['city'];
$address = $_POST['address'];
$phonenum = $_POST['phonenum'];
$paytype = $_POST['paytype'];
$total = $_POST['total'];
$order_date = date("Y-m-d H:i A");
$id = mktime();//Unix 時間戳當作單號
$msg = "單號：".$id."<br>下單日期".$order_date."<br>付款方式：".$paytype."<br>姓名:".$name."<br>帳號:".$email."<br>住址:".$city.$address."<br>手機:".$phonenum."<br>";

$user = $_SESSION['userid'];
$value = count($_SESSION[$user]);//取得加入購物車的數量
for($i = 0 ; $i < $value ; $i++)
{

	$IncartIdnum = $_SESSION[$user][$i]['idnum'];
	$IncartProduct = $_SESSION[$user][$i]['product'];
	$IncartSize = $_SESSION[$user][$i]['size'];
	$IncartColor = $_SESSION[$user][$i]['color'];
	$IncartQuantity = $_SESSION[$user][$i]['quantity'];

$msg .= "<br>訂單第".($i+1)."筆<br>"."序號 ".$IncartIdnum."<br>"."品名 ".$IncartProduct."<br>"."尺寸 ".$IncartSize."<br>"
		."顏色 ".$IncartColor."<br>". "數量 ".$IncartQuantity."<br>";
		
	//更改資料庫的庫存和銷售量

	$NowInSql = "SELECT inventory FROM inventory WHERE id = '{$IncartIdnum}' and size = '{$IncartSize}'";//取得現有庫存量
	$NowRow = getquery($NowInSql,$db);
	$OldSellSql = "SELECT sell FROM item WHERE num = '{$IncartIdnum}'";//取得銷售量
	$OldSellRow = getquery($OldSellSql,$db);
	if ($NowRow && $OldSellRow)
	{
	$inventory = $NowRow->inventory;//庫存量
	$sell = $OldSellRow->sell;//銷售量	
	$NewInventory = ($inventory - $IncartQuantity);//取得新的存貨數量
	$NewSell = ($sell + $IncartQuantity);//取得新的銷貨數量

	$UpdateInSql = "UPDATE inventory SET inventory = :newinventory WHERE id = '{$IncartIdnum}' 
	                and size = '{$IncartSize}'";//更新存量
	$execute = array(':newinventory' => $NewInventory);
	$UpdateInResult = insertdata($UpdateInSql,$execute,$db);
	
	$SellSql = "UPDATE item SET sell = :NewSell WHERE num = '{$IncartIdnum}'";//更新銷量
	$execute = array(':NewSell' =>$NewSell);
	$UpdateSellResult = insertdata($SellSql,$execute,$db);	
	

		if(!($UpdateSellResult && $UpdateInResult))
		{
		echo "更新資料庫數量失敗";
		exit;
		}
	
	}
	else
	{
		echo "獲取庫存&銷售量失敗";
		exit;
	}

}

//寄送訂單的功能
$MailTitle = "會員：".$name."的訂單";//信件標題
$MailFrom = $name;//信件寄件者
$MailTo = 'DesireShop';//信件收件者
$MailTitle = "=?UTF8?B?".base64_encode($MailTitle)."?="; //設定主旨,同樣為 utf-8 編碼

$MailTo  = 'zc06814@yahoo.com.tw';
$headers  = 'MIME-Version: 1.0' . "\r\n";//內文設定成HTML格式
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$headers .= "From:zc06814@yahoo.com.tw". "\r\n";
$MailMsg = $msg; // 信件內容

mail($MailTo,$MailTitle,$MailMsg,$headers);

//把訂單加入資料庫
$sql = "insert into order_form (num,date,email,type,process,price)VALUES(:order_id,:order_date,:email,:order_type,:process,:order_price)";
$execute = array(':order_id' => $id,
				 ':order_date'  => date("Y-m-d"),
				 ':email'  => $email,
			     ':order_type'	  => $paytype,
				 ':process' => "處理中",
				 ':order_price' => $total,
					 );

$result = insertdata($sql,$execute,$db);

if(!$result)
{
$arr = $result->errorInfo();
print_r($arr);
echo "插入訂單資料庫失敗";
exit;
}
else 
{
$user = $_SESSION['userid'];	
unset ($_SESSION[$user]);//清空購物車
?>
	<script type="text/javascript">
	window.location.href='DS_member.php?t=orderlist'
	</script>
<?php
}

?>
</body>
</html>