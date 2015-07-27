<?php 

session_start();
header('Content-type: text/html; charset=utf-8');
require("connect.php");
$product = $_GET["product"];
$color = $_GET["color"];
$size = $_GET["size"];
$price = $_GET["price"];
$idnum = $_GET["idnum"];
$quantity = $_GET["quantity"];//數量
$inven = $_GET["invent"];//庫存量
$idnum = trim("$idnum");//把前面的空白字元刪掉

if( $quantity > $inven )//選擇的數量大於庫存
{	
			?>
            <script>
			alert('庫存量不足，請重新選擇數量!');
			</script>
            <?php
			$change = false;//不加入新的SESSION 之後直接傳回原本的SESSION
			
}
else
{
$sql = "SELECT id,type FROM item WHERE num = '{$idnum}'";
$result = getquery($sql,$db);
$id = $result->id;
$type = $result->type;



//建立SESSION
if(!isset($_SESSION['userid']))
{
$_SESSION['userid'] = session_id();
}

$user = $_SESSION['userid'];
$value = count($_SESSION[$user]);//取得加入購物車的數量
$change = true;//加入session預設為true


if($value != 0){ //兩筆以上的購物車就比對是否有重複商品,如果有數量就累加
for($i = 0 ; $i < $value ; $i++)
{	

	$IncartIdnum = $_SESSION[$user][$i]['idnum'];
	$IncartSize = $_SESSION[$user][$i]['size'];
	if($IncartIdnum == $idnum && $IncartSize == $size)//比對購物車內的資料
	{	
		$allquantity = $_SESSION[$user][$i]['quantity']+$quantity;
		if( $allquantity > $inven )//總數量大於庫存
		{	
			?>
            <script>
			alert('庫存量不足，請重新選擇數量!');
			</script>
            <?php
			$change = false;//不加入新的SESSION 之後直接傳回原本的SESSION
			break;
			}
		else
		{	
		$_SESSION[$user][$i]['quantity'] += $quantity;//同商品同SIZE,累計數量
		$change = false;//已改變數量,不需要執行下方的加入SESSION
		}
	}

}

}
}

if($change == true)
{
$_SESSION[$user][] = array("product" => $product,"color" => $color,"price" => $price,"size" => $size,
 "idnum" => $idnum,"id" =>$id,"type" => $type,"quantity" => $quantity);	
}

echo   '<table id="cartlist" class="table">
  <tr class="warning">
    <td>項目</td>
    <td>顏色</td>
    <td>尺寸</td>
    <td>數量</td>
	<td>單價</td>
    </tr>';
if(!isset($_SESSION['userid']))
{
$_SESSION['userid'] = session_id();
}
$user = $_SESSION['userid'];
$value = count($_SESSION[$user]);//購物車數量
if($value != 0){
 	for($i = 0 ; $i < $value ; $i++)
		{
			echo"<tr>";
			echo "<td>".$_SESSION[$user][$i]['id'].$_SESSION[$user][$i]['idnum']." ".$_SESSION[$user][$i]['product']."</td>";
			echo "<td>".$_SESSION[$user][$i]['color']."</td>";
			echo "<td>".$_SESSION[$user][$i]['size']."</td>";
			echo "<td>".$_SESSION[$user][$i]['quantity']."</td>";
			echo "<td>".$_SESSION[$user][$i]['price']."</td>";
			echo"</tr>";
		}
}
 
echo '</table>';

?>
