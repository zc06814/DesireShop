


$(function(){
    $("#gotop").click(function(){
        jQuery("html,body").animate({
            scrollTop:0
        },500);
    });
    $(window).scroll(function() {
        if ( $(this).scrollTop() > 300){
            $('#gotop').fadeIn("fast");
        } else {
            $('#gotop').stop().fadeOut("fast");
        }
    });
});

function slide(){
$("div.cartlist").slideDown(300);
};
function toggle(){
$("div.cartlist").slideUp();
};

function checkcart(){

	var productVal = $('#product').html();
	var colorVal = $('#color').val();
	var sizeVal = $('#size').val();
	var priceVal = $('#price').html();
	var quantityVal = $('#quantity').val();
	var idnumVal = $('#idnum').html();
	var invent = $('#inventory').html();
	
	$.ajax({
		type:'GET',
		url:"addcart.php",
		data:{ 
			   product : productVal,
			   color : colorVal, 
			   size : sizeVal,
			   price :priceVal,
			   quantity : quantityVal,
			   idnum : idnumVal,
			   invent: Number(invent)},
			   
		error: function(){
		alert("購物清單中，無任何商品!");	
		},
		success: function(data)
		{
	
		 $('.cartlist').html(data);
		 $("div.cartlist").slideDown(300);
		 setTimeout("$('div.cartlist').css('display','none')",3000);   
		}
	});
	};
	
	
	function checkData(form1) {

		try{
			if(document.form1.region.value.indexOf("Taiwan")<0)
				changeDropdown(document.form1.region);
		}catch(e){}
		var Today=new Date();
		var msg;

		if (form1.userid.value == "") {
			msg = "請輸入您的帳號！";
			alert(msg);
			form1.userid.focus();
			return false;
		}
		if(!check_mail(form1.userid.value))
			return false;
		
		if (form1.pwd1.value == "") {
			msg = "登入密碼尚未輸入！";
			alert(msg);
			form1.pwd1.focus();
			return false;
		}

		if (form1.pwd2.value == "") {
			msg = "第二個登入密碼檢查資料尚未輸入！";
			alert(msg);
			form1.pwd2.focus();
			return false;
		}

		if ((form1.pwd1.value.length < 4) || (form1.pwd1.value.length > 16)) {
			msg = "密碼需為 4 ~ 16 碼！";
			alert(msg);
			form1.pwd1.focus();
			return false;
		}

		if (form1.pwd1.value != form1.pwd2.value) {
			alert("密碼與密碼檢查資料不一樣，請重新輸入！");
			form1.pwd1.value = ""
			form1.pwd2.value = ""
			form1.pwd1.focus();
			return false;
		}


		if (form1.name.value == "") {
			msg = "請輸入您的姓名！";
			alert(msg);
			form1.name.focus();
			return false;
		}

		if ((form1.byear.value == "") || (form1.bmonth.value == "") || (form1.bday.value == "")) {
			msg = "請輸入您的生日！";
			alert(msg);
			form1.byear.focus();
			return false;
		}
		if ((form1.byear.value < 1911) || (form1.byear.value >  Today.getFullYear()) ) {
			msg = "年份錯誤，請重新輸入！";
			alert(msg);
			form1.byear.focus();
			return false;
		}		

	}

	function check_mail(email) {
		var ck = checkEmailFormat(email);

		if (ck == -1) {
			alert("您的電子郵件地址還沒填呢 !");
			return false;
		}
		else if (ck == -3) {
			alert("您的電子郵件地址只能是數字,英文字母及'-','_'等符號,其他的符號都不能使用 !");
			return false;
		}
		else if (ck == -4) {
			alert("您的電子郵件地址不合法 !");
			return false;
		}
		else if (ck == -5) {
			alert("您的電子郵件地址不完全 !");
			return false;
		}
		return true;
	}

	function checkEmailFormat(email) {
		var len = email.length;
		var ck = 0;
		if (len == 0)
			return (-1);
		for (var i = 0; i < len; i++) {
			var c = email.charAt(i);//返回字符
			if (!((c >= "A" && c <= "Z") || (c >= "a" && c <= "z") || (c >= "0" && c <= "9") || (c == "-") || (c == "_") || (c == ".") || (c == "@")))
				return (-3);
		}
		if ((email.indexOf("@") == -1) || (email.indexOf("@") == 0) || (email.indexOf("@") == (len - 1)))
			return (-4);
		if ((email.indexOf("@") != -1) && (email.substring(email.indexOf("@") + 1, len).indexOf("@") != -1))
			return (-4);
		if ((email.indexOf(".") == -1) || (email.indexOf(".") == 0) || (email.lastIndexOf(".") == (len - 1)))
			return (-5);
		return (0);
	}
	

function cmdlogin(){
	var userid;
	var password;
	userid = document.formlogin.userid.value;
	password = document.formlogin.password.value;
	if ((userid == "") || (password == "")){
		alert('請輸入會員帳號及密碼！');
		return false;
	}
	else{
		document.formlogin.submit();	
	}
}


	function checkMemberData(member) {
if (member.name.value == "") {
			msg = "請輸全名！";
			alert(msg);
			member.name.focus();
			return false;
		}
if (member.UpdatePassword.value != member.UpdatePassword2.value) {
			alert("密碼與密碼檢查資料不一樣，請重新輸入！");
			member.UpdatePassword.value = ""
			member.UpdatePassword2.value = ""
			member.UpdatePassword.focus();
			return false;
		}
if ((member.UpdatePassword.value.length < 4) || (member.UpdatePassword.value.length > 16)) {
			msg = "密碼需為 4 ~ 16 碼！";
			alert(msg);
			member.UpdatePassword.focus();
			return false;
		}
}

   function checkSendData(formcheck) 
   {
		var msg;

		if (formcheck.city.value == "") {
			msg = "請選擇您的郵遞區號！";
			alert(msg);
			return false;
		}
		if (formcheck.name.value == "") {
			msg = "請輸入您的姓名！";
			alert(msg);
			formcheck.name.focus();
			return false;
		}
		if (formcheck.address.value == "") {
			msg = "請輸入您的地址！";
			alert(msg);
			formcheck.address.focus();
			return false;
		}	
		if (formcheck.phonenum.value == "") {
			msg = "請輸入您的手機號碼！";
			alert(msg);
			formcheck.phonenum.focus();
			return false;
		}
		if (!confirm('訂單送出後將無法修改內容，請確認內容無誤!'))	
			return false;		

	}
	
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none");