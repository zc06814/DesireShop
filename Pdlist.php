<?php session_start(); ?>
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
    <script src="js/scripts.js"></script>
</head>

<body>
<?php require("connect.php");?>
<div id="gotop"><img src="image/glyphicons-601-chevron-up.png"></div>

<div class="container">
	<div class="row">
      <div class="col-md-12">
      <nav class="navbar  navbar-inverse navbar-fixed-top " role="navigation">
        <?php include("top.php"); ?>
        </nav>
       </div>
    </div>
    
 <div class="row">
	<div class="col-md-12 show" id="content-body">
    <div><h2 style="font-family: 微軟正黑體;">搜尋結果</h2></div>
    <div><hr /></div>

<?php 
$findpd = $_POST['search'];
$sql = "Select DISTINCT id from item Where name LIKE :findpd";
$execute = array(':findpd' => "%$findpd%");
$stmt = $db->prepare($sql);
$result = $stmt->execute($execute);

if(!$result)
{
	$arr = $stmt->errorInfo();
	print_r($arr);
	echo "錯誤!";
	exit;
}
else
{

while($row = $stmt->fetch(PDO::FETCH_OBJ)){

$id = $row->id;
$sql = "Select name,sell,price,type from item where id='{$id}'";

$row=getquery($sql,$db);

	if($row)
	{
	$name = $row->name;	
	$sell = $row->sell;
	$price = $row->price;
	$type = $row->type;
	}
?>
 <div class="col-md-4 picdiv">
    <ul class="item-show01">
		<li><a href="<?php echo $type;?>.php?no=<?php echo $id;?>">
		<img src="image/<?php echo $type;?>/<?php echo $id;?>/1.jpg" alt="<?php echo $id;?>">
        <p><?php echo $name;?><br></p></a></li>
		<li>
				<p>已銷售 <span><?php echo $sell;?></span> 件</p>
				<p>
					<span>NT. <?php echo $price;?></span>
				</p>
			
		</li>
		<li></li>
	</ul>

     </div>
<?php
}
}
if($id == "")
{
?>    

<div class="text-center" style="margin-top:150px; margin-bottom:35%;"><i class="glyphicon glyphicon-search" style="font-size:20px; margin-right:5px"></i> <span style="font-size:16px; color:#c14948; font-family: 微軟正黑體;">查無此商品</span></div>
<?php } ?>

	</div>
	</div>
    
</div>

  


<div id="footer">
<?php require("footer.php")?>
</div>
</body>
</html>
