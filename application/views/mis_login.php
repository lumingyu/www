<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>static/css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>static/css/buttons.css">
<title><?php echo $title;?></title>
<style type="text/css">
<!--
*{
	padding:0px;
	margin:0px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
}
body {
	margin: 0px;
	font-size:12px;
	color: #888;
}
input {
	vertical-align:middle;
}
img {
	border:none;
	vertical-align:middle;
}
a {
	color:#2366A8;
	text-decoration: none;
}
a:hover {
	color:#2366A8;
	text-decoration:underline;
}
.main {
	width:900px;
	background:#FFF;
	padding-bottom:10px;
	margin-top: 120px;
	margin-right: auto;
	margin-bottom: 0px;
	margin-left: auto;
}
.main .title {
	width:700px;
	height:80px;
	text-indent:326px;
	letter-spacing:2px;
	background-image: url(<?php echo base_url();?>static/images/bg_title.png);
	background-repeat: no-repeat;
	background-position: center center;
	margin-top: 0px;
	margin-right: auto;
	margin-bottom: 0px;
	margin-left: auto;
}
.main .login {
	width:700px;
	overflow:hidden;
	background-image: url(<?php echo base_url();?>static/images/login_input_hr.gif);
	background-repeat: repeat;
	background-position: center top;
	margin-top: 10px;
	margin-right: auto;
	margin-bottom: 0px;
	margin-left: auto;
	padding-top: 20px;
}
.main .login .inputbox {
	width:700px;
	height: 50px;
	padding-left: 40px;
}
.main .login .inputbox dl {
	height:28px;
	float: left;
}
.main .login .inputbox dl dt {
	float:left;
	height:25px;
	line-height:25px;
	text-align:right;
	padding-right: 3px;
	padding-left: 3px;
}
.main .login .inputbox dl dd {
	float:left;
	padding-right: 3px;
	padding-left: 3px;
	line-height: 25px;
	height: 25px;
}
.main .login .inputbox .table dl dd input {
	font-size:12px;
	border:1px solid #dcdcdc;
	background:url(<?php echo base_url();?>static/images/login_input_bg.gif) left top no-repeat;
	height: 18px;
	line-height: 18px;
	padding-right: 2px;
	padding-left: 2px;
}

.main .login .butbox {
}
.main .login .butbox dl {
}
.main .login .butbox dl dt {
	height:30px;
}
.main .login .butbox dl dd {
	height:21px;
	line-height:21px;
	text-align: center;
}
.main .msg {
	line-height:18px;
	border:1px solid #DCDCDC;
	color:#888;
	background-color: #FFFFFF;
	width: 155px;
	margin-top: 3px;
	padding-left: 2px;
}
.copyright {
	width:640px;
	text-align:center;
	font-size:12px;
	color:#555;
	font-family: Arial;
	margin-top: 10px;
	margin-right: auto;
	margin-bottom: 10px;
	margin-left: auto;
}
.copyright a {
	color:#2366a8;
	text-decoration:none;
}
.copyright a:hover {
	text-decoration: underline;
}
-->
</style>
</head>
<body>
	<div class="main">
    <div class="title">
			&nbsp;
	  </div>
		<div class="login">
	            <div class="inputbox">
					<table class="table">
						<tr>
					<dl>
						<form action="<?php echo base_url();?>index.php/mis/login" method="POST" onSubmit="return loginok(this)">
						<td>
					  	<dd>
					  		用户名：
					  	</dd>
						</td>
						<td>
						<dd>
							<input type="text" name="username" id="username" size="25" onfocus="this.style.borderColor='#fc9938'" onblur="this.style.borderColor='#dcdcdc'" />
						</dd>
						</td>
						<td>
						<dd>
							密码：
						</dd>
						</td>
						<td>
						<dd>
							<input type="password" name="password" size="25" onfocus="this.style.borderColor='#fc9938'" onblur="this.style.borderColor='#dcdcdc'" />
						</dd>
						</td>
						<td>
			            <dd>
			            	&nbsp;<button class="button button-rounded button-primary button-small">登陆</button>
	                  	</dd>
						</td>
						</form>
						<td>
						<dd>
							<input type="button" class="button button-rounded button-primary button-small" onclick="window.location.href='<?php echo base_url();?>index.php/system_register/register'" value="注册"/>
	                  	</dd>
						</td>
						
	              </dl>
					</tr>
				  </table>
	         	</div>
	         	<center></center>
	            <div class="butbox"></div>
	            <div style="clear:both"></div>
		</div>
	</div>
	
	<div class="copyright">
		Copyright &copy;2013 Powered by <?php echo $title;?> 
	</div>
<script type="text/javascript" language="javascript">
<!--
function loginok(form) {
	if(form.username.value=="") {
		alert("用户名不能为空！");
		form.username.focus();
		return (false);
	}
	if(form.password.value=="") {
		alert("密码不能为空！");
		form.password.focus();
		return (false);
	}
	return (true);
}
function func()
{
	alert("ahahhahahahah！");
}
-->
</script>
</body>
</html>