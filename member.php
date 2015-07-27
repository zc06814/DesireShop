<?php session_start(); 
if(isset($_SESSION['userid'])&& $_SESSION['userid'] != session_id())//已登入會員就轉址
{	
	
	header("Location:DS_member.php" );
	exit();
}

?>
<!DOCTYPE html>
<html>
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
    <script src="js/scripts.js"></script>
  </head>


<body class="backgd">

<div id="gotop"><img src="image/glyphicons-601-chevron-up.png"></div>
<div class="container-fluid">
<div class="row">
    <div class="col-md-12" id="content-body">
    <nav class="navbar  navbar-inverse navbar-fixed-top " role="navigation">
    <?php include("top.php"); ?>
    </nav>
    </div>
</div>

<div class="row">
    <div class ="col-md-6 screenleft">
	<h1>CREATE AN ACCOUNT</h1>
        <h2>加入會員</h2>
<form method="POST" class="form-horizontal" action="join.php" name="form1" onsubmit="return checkData(this)">
  
    <div>
    <label class="control-label" for="inputnum">E-mail Address / 電子信箱  </label>
         <input type="text" id="userid" name="userid" />
         <br>
         <small>(此為日後之登入帳號)</small>
    </div>
    <div>
     <label class="control-label" for="inputPassword">PASSWOAD / 會員密碼  </label>
      <input type="password" id="pwd1" name="pwd1">
    </div>
       </br>
    <div>
    <label class="control-label" for="checkPassword">Confirm Password / 密碼確認  </label>
      <input type="password" id="pwd2" name="pwd2">
    </div>
       </br>
     <div>
    <label class="control-label" for="name">Name / 會員姓名 </label>
      <input type="text" id="name" name="name">
    </div>
       </br>
    <span>
    <label class="control-label" for="birthday">Birthday / 生日 </label>
    <input name="byear" type="text" size="4" maxlength="4">年</span>
				<span>
					<select size="1" name="bmonth">
						<option value="">請選擇</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
					</select>
				月</span>
				<span>
					<select size="1" name="bday">
						<option value="">請選擇</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
					</select>
				日</span>
    <div class="controls text-right" style="margin-top:1%" ><button type="submit" class="btn">註 冊</button></div> 
</form>                
    </div>
    
	<div class ="col-md-6 screenright">
    <div><h1>SIGN IN</h1><h2>會員登入</h2>如果您是第一次來請先加入會員喔！</div>
        
	<form method="post" class="form-horizontal" action="login.php" name="formlogin" onSubmit="return cmdlogin();">
  
    <div>
    <label class="control-label" for="inputnum">ACCOUNT NUNMER / 會員帳號  </label>
      <input type="text" name="userid">
       </div>
    </br>
    <div>
     <label class="control-label" for="inputPassword" value=""> PASSWOAD / 會員密碼  </label>
     <input type="password" name="password" value=""/>
    </div>

    <div class="controls" style=" margin-top:1%; margin-left:40%">
      <button type="submit" class="btn">登 入</button>
    </div> 

	</form>   
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
