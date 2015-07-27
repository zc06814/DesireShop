<?php session_start(); ?>
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
  <body>
<div id="gotop"><img src="image/glyphicons-601-chevron-up.png"></div>
    <div class="container-fluid">
    
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php include("top.php"); ?>
			</nav>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
            Desire Shop

            </div>
		</div>
	</div>    
    
	<div class="row">
		<div class="col-md-12">         
			<div class="carousel slide" id="carousel-369447"  data-ride="carousel" data-interval="4000">
				<ol class="carousel-indicators">
					<li class="active" data-slide-to="0" data-target="#carousel-369447">
					</li>
					<li data-slide-to="1" data-target="#carousel-369447">
					</li>
					<li data-slide-to="2" data-target="#carousel-369447">
					</li>
					<li data-slide-to="3" data-target="#carousel-369447">
					</li>                    
				</ol>
				<div class="carousel-inner">
					<div class="item active">
						<a href="../DesireShop/Trousers.php?no=P002"><img alt="1" src="image/1.jpg"></a>
					</div>
					<div class="item">
						<a href="../DesireShop/Tshirt.php?no=004"><img alt="2" src="image/2.jpg"></a>
					</div>
					<div class="item">
						<a href="../DesireShop/Trousers.php?no=P001"><img alt="3" src="image/3.jpg"></a>
					</div>
					<div class="item">
						<a href="../DesireShop/Tshirt.php?no=003"><img alt="4" src="image/4.jpg"></a>
					</div>                    
				</div>
                <a class="left carousel-control" href="#carousel-369447" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-369447" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
			<div class="indexAd"> <a href="../DesireShop/Trousers.php?no=P003"><img alt="AD" src="image/AD.jpg"></a></div>
		</div>
	</div>
    
	<div class="row">
		<div class="col-md-12 CenterHref">
        <div>
        <a title="Facebook" href="https://www.facebook.com/pages/Desire-Shop/136202786477460" target="_blank"><img src="image/footericon_fb.gif"><p>Facebook</p></a>
        </div>
        <div>
        <a title="奇摩拍賣" href="https://tw.bid.yahoo.com/tw/booth/Y0068865286" target="_blank"><img src="image/yahooicon.png"><p>奇摩拍賣</p></a>
        </div>
         <div>
        <a title="門市位址" href="https://www.google.com.tw/maps/place/111%E5%8F%B0%E5%8C%97%E5%B8%82%E5%A3%AB%E6%9E%97%E5%8D%80%E5%A4%A7%E5%8D%97%E8%B7%AF132%E8%99%9F/@25.0893867,121.524121,17z/data=!4m2!3m1!1s0x3442aeba8f3d241d:0xc4ea063767a0ee8d" target="_blank"><img src="image/mapicon.png"><p>門市位址</p></a>
        </div>		
 		<div>
        <a title="MAIL" href="mailto:desireshop@kimo.com" target="_blank"><img src="image/footericon_epaper.gif"><p> Mail </p></a>
        </div>			
        </div>
	</div>
    
    <div class="row">
    	<div class="col-md-12" id="footer">
        <?php
        include("footer.php");
		?>
        </div>
    </div>
    
	</div>

  </body>
</html>