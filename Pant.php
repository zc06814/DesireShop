<?php session_start(); 
if(isset($_GET["no"]))
{
	$no = $_GET["no"];//獲取id
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Desire Shop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
	<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>    
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script></head>

<body>
<?php require("connect.php");

?>
<div id="gotop"><img src="image/glyphicons-601-chevron-up.png"></div>
<div class="container">

    <div class="row">
    <div class="col-md-12 show" id="content-body">
    <nav class="navbar  navbar-inverse navbar-fixed-top" role="navigation">
    <?php include("top.php"); ?>
    </nav>
	</div>
	</div>  
 <?php

if(isset($_GET["no"]))
{
	
	$no = $_GET["no"];
	$sql = "Select name,num from item where id='{$no}'";
    $result = $db->query($sql);    
    $row = $result->fetch(PDO::FETCH_OBJ);
        //PDO::FETCH_OBJ 指定取出資料的型態
     $name = $row->name;  
     $num = $row->num;
    
	?>
	<div class="row" style="margin-bottom:8%">
    <div class="col-md-6 show text-right" style="width:50%; height:auto; min-width:40%;">  
        <div class="goods">
        <div><img src="image/Pant/<?php echo $no?>/1.jpg" /></div>
        </div>
    </div>
    <div class="col-md-6 show text-left" style="width:50%; height:auto; min-width:40%;">      
        <div class="intro">
        <div><h3><b><span id="product"><?php echo $name; ?></span></b></h3></div>
        <div class="price">商品編號：<span id="idnum"></span></div>
        
        
        <div class="price">售價：<a style="font-size:16px; color:red;">$</a><span id="price"></span></div>
        <div class="price">庫存量：<span id="inventory"></span></div>
        <div class="price">
        數量：<select id="quantity" name="quantity">
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
        </select>
        <select name="color" id="color">
        <?php
        $sql="Select color from item where id='{$no}' ORDER BY num";
        $result=$db->query($sql);
         while($row=$result->fetch(PDO::FETCH_OBJ))
            {    
            //PDO::FETCH_OBJ 指定取出資料的型態
        ?>		  
         <option value="<?php echo $row->color; ?>"><?php echo $row->color;?></option>
       <?php } ?>
        </select>
        <select id="size" name="size">
         <?php
        $sql="Select size From inventory Where id='{$num}' Order By size DESC";
        $result=$db->query($sql);
         while($row=$result->fetch(PDO::FETCH_OBJ))
            {   
            ?>
         <option value="<?php echo $row->size; ?>"><?php echo $row->size; ?></option>
       <?php } ?>
        </select>
        <button onclick="checkcart()" id="cart" class="btn btn-small btn-info">加入購物車</button>
        </div>
        </br>
        <div class="note">
     <div>產品說說明及注意事項</div>
    ＊每件商品皆擁有獨一無二的自然水洗顏色!</br>
    1.深淺色請分開洗滌。<br />
    2.洗滌時，水溫請低於30 °C；請使用中性洗劑；勿長時間浸泡。<br />
    3.請勿使用漂白劑、螢光增白劑，以免破壞布料。<br />
    4.不可濕放，以免衣物染色；不可烘乾，以免衣物縮水。<br />
    產地：中國&nbsp;&nbsp;
    </div>
        </div>
    </div>
    </div>    
    

  
 	<div class="row">
    <div class="col-md-12">    
     <div class="goodshow">
    <img src="image/Pant/<?php echo $no?>/2.jpg"/>
    </div>
    <div class="goodshow">
    <img src="image/Pant/<?php echo $no?>/3.jpg" />
    </div>
    </div>
    </div>

    
    <?php
	
}
else
{	

?>
<div class="row">
<div class="col-md-12">  
<img src="image/Pant/P.jpg" width="80%" style="margin:3% 10% 0 10%"/>
</div>
</div>

<div class="row" style="margin-left:10%; margin-right:10%">
<?php 
$sql = "Select DISTINCT id from item Where type='Pant'";
$result=$db->query($sql);
while($row=$result->fetch(PDO::FETCH_OBJ))
{
$id = $row->id;

$SellSql = "Select sell from item where id='{$id}'";//算銷售量的總數
$SellResult=$db->query($SellSql);
$sell = "";//把銷售量清空,不然迴圈會累加
while($row=$SellResult->fetch(PDO::FETCH_OBJ))
{
	
	$sell += $row->sell;
}

$sql = "Select name,price from item where id='{$id}'";
$row = getquery($sql,$db);
$name = $row->name;
$price = $row->price;

?>
    <div class="col-md-4 picdiv">
    <ul class="item-show01">
		<li><a href="Pant.php?no=<?php echo $id;?>">
		<img src="image/Pant/<?php echo $id;?>/1.jpg" alt="<?php echo $id;?>">
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
?>      
</div>

</div>
<div class="row">
    <div class="col-md-12" id="footer">
    <?php
    include("footer.php");
    ?>
    </div>
</div>



</body>
</html>
