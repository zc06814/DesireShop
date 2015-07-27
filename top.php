<script type="text/javascript">
$(function(){
	var colorVal = $('#color').val();
	var sizeVal = $('#size').val();
	var noVal = "<?php echo $no ?>" ;
	$.ajax({
		type:'GET',
		url:"getdata.php",
		data:{ color : colorVal, 
			   no : noVal,
			   size : sizeVal},
		error: function(){
		alert("載入網頁失敗");	
		},
		success: function(data){
		var result = data.split(",");
		$('#idnum').html(result[0]);	
		$('#price').html(result[1]);
		inventory = parseInt(result[2]);
		if (inventory == 0)
		{
		$('#inventory').html("預購中");
		$("#cart").addClass("disabled");
		}
		else
		{
		$('#inventory').html(inventory);
		$("#cart").removeClass("disabled");
		}
		}
	});
	
	$('#color,#size').change(function()
	{
	var colorVal = $('#color').val();
	var sizeVal = $('#size').val();
	var noVal = "<?php echo $no?>" ;
	$.ajax({
		type:'GET',
		url:"getdata.php",
		data:{ color : colorVal, 
			   no : noVal,
			   size : sizeVal},
		error: function(){
		alert("載入網頁失敗");	
		},
		success: function(data){
		var result = data.split(",");
		$('#idnum').html(result[0]);	
		$('#price').html(result[1]);
		inventory = parseInt(result[2]);
		if (inventory == 0)
		{
		$('#inventory').html("預購中");
		$("#cart").addClass("disabled");
		}
		else
		{
		$('#inventory').html(inventory);
		$("#cart").removeClass("disabled");
		}
		}
	});
	});

	
	});
</script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="index.php">Desire Shop</a>
</div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav">

      <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">衣料品<strong class="caret"></strong></a>
          <ul class="dropdown-menu">
              <li>
                  <a href="Tshirt.php">T-SHIRT</a>
              </li>

          </ul>
      </li>
      <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">下身<strong class="caret"></strong></a>
          <ul class="dropdown-menu">
              <li>
                  <a href="Pant.php">短褲</a>
              </li>
              <li>
                  <a href="Trousers.php">長褲</a>
              </li>

          </ul>
      </li>                        
  </ul>
<form class="navbar-form navbar-left" role="search" action="Pdlist.php" method="post">
<span id="sprytextfield1"><input type="text" name="search" id="search" /></span>
<button type="submit" class="btn btn-default">送出</button>
 </form>

  <ul class="nav navbar-nav navbar-left">
  <li id="checkcart" class="divider-vertical" onmouseover="slide()" onmouseout="toggle()">
  <a href="cart.php">購物車</a>
  </li>
<li>
<a href="DS_member.php?t=orderlist">會員中心</a>
</li>                  
  </ul>
</div>


<div class="cartlist" >

  <table id="cartlist" class="table">
  <tr class="warning">
    <td>項目</td>
    <td>顏色</td>
    <td>尺寸</td>
    <td>數量</td>
    <td>單價</td>
    </tr> 
  <?php 
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
			echo "<td>".$_SESSION[$user][$i]['idnum']." ".$_SESSION[$user][$i]['product']."</td>";
			echo "<td>".$_SESSION[$user][$i]['color']."</td>";
			echo "<td>".$_SESSION[$user][$i]['size']."</td>";
			echo "<td>".$_SESSION[$user][$i]['quantity']."</td>";
			echo "<td>".$_SESSION[$user][$i]['price']."</td>";
			echo"</tr>";
		}
}
 ?>
  </table>

</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>
