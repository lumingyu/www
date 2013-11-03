<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE><?php echo $title;?></TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK href="<?php echo base_url();?>static/css/css_body.css" type=text/css rel=stylesheet>
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>static/css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>static/css/buttons.css">
<script type="text/javascript" src="<?php echo base_url();?>static/js/jquery.js"></script>
<script type="text/javascript">

$(function(){
	 $("#user_name").blur(function(){
		var user_name = $("#user_name").val();
		$.get("<?php echo base_url();?>index.php/system_register/check_user_name", {user_name:user_name},function(data){
		$("#user_name_tip").html(data);})
		})
	
     $("#password").blur(function(){//用户名文本框失去焦点触发验证事件
		reg=/^[0-9a-zA-Z]{5,17}$/;
        if($("#password").val() == "")
		{
			$("#password_tip").html("<font color='red'>密码不能为空</font>");
			return;
		}else if(!reg.test($("#password").val()))//只处验证不能为空并且只能为英文、数字或者下划线组成的２－１５个字符
		{
			$("#password_tip").html("<font color='red'>密码仅由大于六位英文、数字组成</font>");
			return;
		}
		if($("#re_password").val() != "" && $("#re_password").val()!= $("#password").val())//只处验证不能为空并且只能为英文、数字或者下划线组成的２－１５个字符
		{
			$("#re_password_tip").html("<font color='red'>两次密码输入不一致</font>");
			return;
		}
		$("#password_tip").html("");
     })
	 $("#re_password").blur(function(){//用户名文本框失去焦点触发验证事件
        if($("#re_password").val() == "")
		{
			$("#re_password_tip").html("<font color='red'>密码不能为空</font>");
			return;
		}else if($("#re_password").val()!= $("#password").val())//只处验证不能为空并且只能为英文、数字或者下划线组成的２－１５个字符
		{
			$("#re_password_tip").html("<font color='red'>两次密码输入不一致</font>");
			return;
		}else
		{
			$("#re_password_tip").html("两次密码输入一致");
			return;
		}
     })
	 $(".user_type").change(function(){//用户名类型失去焦点触发验证事件
		var type = $('input[name=user_type]:checked');
		if(type.val() == 1)
		{
			$("#company_info").show();
		}else
		{
			$("#company_info").hide();
		}
     })
	 $("#phone").blur(function(){//电话失去焦点触发验证事件
		reg=/^(((13[0-9]{1})|(15[0-9]{1}))+\d{8})$/;
		reg2=/^\d{3,4}-?\d{7,9}$/;
		if($("#phone").val() == "")
		{
			$("#phone_tip").html("<font color='red'>电话号码不能为空</font>");
			return;
		}else if($("#phone").val().length != 11 || !reg.test($("#phone").val()))//手机电话只能为11位
		{
			if(!reg2.test($("#phone").val()))
			{
				$("#phone_tip").html("<font color='red'>电话号码不符合格式要求</font>");
				return;
			}else
			{
				$("#phone_tip").html("");
				return;
			}
		}else
		{
			$("#phone_tip").html("");
			return;
		}
     })
	 $("#email").blur(function(){//邮件失去焦点触发验证事件
		reg=/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
		if($("#email_tip").val() == "")
		{
			$("#email_tip").html("<font color='red'>电话号码不能为空</font>");
			return;
		}
		if($("#email").val().length != 11 || !reg.test($("#email").val()))//手机电话只能为11位
		{
			$("#email_tip").html("<font color='red'>电子邮件地址不符合格式要求</font>");
			return;
		}else
		{
			$("#email_tip").html("");
			return;
		}
     })
	 $("#company_name").blur(function(){//公司名称失去焦点触发验证事件
		
		if($("#company_name").val() == "")
		{
			$("#company_name_tip").html("<font color='red'>公司名称不能为空</font>");
			return;
		}
		else
		{
			$("#company_name_tip").html("");
			return;
		}
     })
	})


</script>
<META content="MSHTML 6.00.3790.4275" name=GENERATOR>
</HEAD>
<BODY>
<DIV class=bodytitle>
<DIV class=bodytitleleft></DIV>
<DIV class=bodytitletxt>用户注册</DIV>
<div class=bodytitletxt2></div></div>
<form action="<?php echo base_url();?>index.php/transfer_data/set_data" method="POST" enctype="multipart/form-data">
	<table width="50%" border=0 align=center cellpadding="5" cellspacing=1 class=tbtitle style="background: #cad9ea;" id="myTable">
		<tr bgcolor="#f5fafe">
			<td colspan=2>用户注册信息</td>
		</tr>
		<tr bgcolor="#f5fafe">
			<td align="center" width="20%">用&nbsp;户&nbsp;名</td>
			<td><input type="text" size=40 name="user_name" id="user_name">&nbsp;&nbsp;&nbsp;<span id="user_name_tip">用户名长度不超过20个字符</span>
		</tr>
		<tr bgcolor="#f5fafe">
			<td align="center" width="20%">密&nbsp;&nbsp;&nbsp;&nbsp;码</td>
			<td><input type="password" size=40 name="password" id="password">&nbsp;&nbsp;&nbsp;<span id="password_tip">密码不少于6位英文字符及数字组成</span>
		</tr>
		<tr bgcolor="#f5fafe">
			<td align="center" width="20%">确认密码</td>
			<td><input type="password" size=40 name="re_password" id="re_password">&nbsp;&nbsp;&nbsp;<span id="re_password_tip">再次输入密码</span>
		</tr>
		<tr bgcolor="#f5fafe">
			<td align="center" width="20%">电&nbsp;&nbsp;&nbsp;&nbsp;话</td>
			<td><input type="text" size=40 name="phone" id="phone">&nbsp;&nbsp;&nbsp;<span id="phone_tip">手机或座机号码,区号-电话</span>
		</tr>
		<tr bgcolor="#f5fafe">
			<td align="center" width="20%">E-Mail</td>
			<td><input type="text" size=40 name="email" id="email">&nbsp;&nbsp;&nbsp;<span id="email_tip">用户名@邮件服务器域名</span>
		</tr>
		<tr bgcolor="#f5fafe">
			<td align="center" width="20%">注册类型</td>
			<td align="center"><input type="radio" class="user_type" name="user_type"  value="0" checked=true"/>个人用户&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="user_type" name="user_type"  value="1"/>公司用户
		</tr>
	</table>
	<table width="50%" border=0 align=center cellpadding="5" cellspacing=1 class=tbtitle style="background: #cad9ea; display: none" id="company_info">
		<tr bgcolor="#f5fafe">
			<td colspan=2>公司注册信息</td>
		</tr>
		<tr bgcolor="#f5fafe">
			<td align="center" width="20%">公司名称</td>
			<td><input type="text" size=40 name="company_name" id="company_name"  onblur="verify_user_name()">&nbsp;&nbsp;&nbsp;<span id="company_name_tip">填写完整公司名称</span>
		</tr>
		<tr bgcolor="#f5fafe">
			<td align="center" width="20%">公司地址</td>
			<td><input type="text" size=40 name="company_address" id="company_address">&nbsp;&nbsp;&nbsp;<span id="company_address_tip">省+市+县(区)+道路+门牌号</span>
		</tr>
	</table>
	<table width="50%" border=0 align=center cellpadding="5" cellspacing=1 class=tbtitle style="background: #cad9ea;" id="myTable">
		<tr bgcolor="#f5fafe">
			<td align="right" colspan=2><button class="button button-rounded button-primary button-small">注册</button></td>
		</tr>
	</table>

</BODY>
</HTML>
