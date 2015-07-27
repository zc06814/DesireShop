<?php session_start(); 
include("connect.php"); 
if(!isset($_SESSION['userid'])|| $_SESSION['userid'] == session_id())//未登入會員就轉址
{	
header("Location:member.php");
exit;
	
}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DesireShop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
	<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script></head>

<body>
<div id="gotop"><img src="image/glyphicons-601-chevron-up.png"></div>

<div class="container">
 <div class="row">
  <div class="col-md-12">
  <nav class="navbar  navbar-inverse navbar-fixed-top " role="navigation">
    <?php include("top.php"); ?>
    </nav>
   </div>
 </div>

  <div class="row"  style="margin-bottom:25%;">
  	<div class="col-md-2 show text-left" id="content-body">
	</br>
       <div>
       親愛的
       <b><font style="color:#C6C"><?php echo $_SESSION['username'];?></font></b> 您好 
   	   </div>
       </br>
	   <div>
      <table class="table table-condensed table-hover">
      <tr>
      <td><a href="DS_member.php?t=orderlist">訂單查詢</a></td>
      </tr>
      <tr>
      <td><a href="DS_member.php?t=modify">修改個人資料及密碼</a></td>
      </tr>
      <tr>
      <td><a href="logout.php">登出會員中心</a></td>
      </tr>
      </table>
       </div>
	</div>
      <div class="col-md-10 show"  id="content-body">
 			<h3>Member Center 會員中心</h3> 
      <?php
		if($_GET["t"] == "modify")
		{
		$email = $_SESSION['userid'];
		$name = $_SESSION['username'];	  
	  ?>
		<div><hr></div>       

		<div><i style="font-size:25px" class="glyphicon glyphicon-user"></i>修改個人資料</div>
        <div style="margin-bottom:2%;">
        <form method="POST" class="form-horizontal" action="join.php" name="member" onsubmit="return checkMemberData(this)">
        <input type="hidden" name="update" value="update" />
             <div>
         <label for="name">會員姓名</label>
         <input type="text" name="name" id="name" value="<?php echo $name;?>" />
         </div> 
            <br />
            <div>
              <label for="userid">E-Mail帳號</label>
              <input name="userid" type="text" id="userid" value="<?php echo $email;?>" readonly="readonly" />
             </div>
            <br />
            <div>
              <label for="UpdatePassword">修改密碼</label>
              <input type="password" name="UpdatePassword" id="password"/></div><br />
            <div>
        
              <label for="UpdatePassword2">密碼確認</label>
              <input type="password" name="UpdatePassword2" id="checkPassword2"/></div>
        
            <div class="controls text-left"><button type="submit" class="btn">送 出</button></div> 
        </form>
		  </div>
		  
	<?php
		  
	  }
	  else if ($_GET["t"] == "orderlist")
	  {
	  ?>
      <div>
      <table class="table text-center" style="margin-bottom:26%;">
      <tr  style="background-color:#CCC">
      <td>訂購日期</td>
      <td>訂單編號</td>
      <td>付款方式</td>
      <td>處理進度</td>
      <td>預計出貨日期</td>
      <td>應付金額</td>
      </tr>
	<?php
		$email = $_SESSION['userid'];
		$sql = "Select * from order_form Where email='{$email}'";
		$result=$db->query($sql);
		while($row=$result->fetch(PDO::FETCH_OBJ))
		{
		$num = $row->num;//訂單編號
		$date = $row->date;//訂購日期
		$email = $row->email;//Email
		$type = $row->type;//付款方式
		$process = $row->process;//處理進度
		$price = $row->price;//應付金額
		
		$timestamp = strtotime($date);//取得申請日期的時間戳
		$sendstamp = mktime(0, 0, 0, date("m",$timestamp)  , date("d",$timestamp)+2, date("Y",$timestamp));//取得兩天後的時間戳
		$senddate = date("Y-m-d",$sendstamp);
		?>
        <tr>
        <td><?php echo $date;?></td>
        <td><?php echo $num;?></td>
        <td><?php echo $type;?></td>
        <td><?php echo $process;?></td>
        <td><?php echo $senddate;?></td>
        <td><?php echo $price;?></td>
        <tr>
		<?php
        }
        ?>
       </table>
       </div>
        <?php
        }
        ?>
      
      </div>
      </div>
 
 </div>

<div class="row">
      <div class="col-md-12" id="footer">
      <?php include("footer.php"); ?>
      </div>
</div>

</body>
</html>