<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE><?php echo $title;?></TITLE>
<LINK href="<?php echo base_url();?>static/css/css_menu.css" type=text/css rel=stylesheet>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<SCRIPT language=javascript>
function getObject(objectId) {
	if(document.getElementById && document.getElementById(objectId)) {
		// W3C DOM
		return document.getElementById(objectId);
	}
	else if (document.all && document.all(objectId)) {
		// MSIE 4 DOM
		return document.all(objectId);
	}
	else if (document.layers && document.layers[objectId]) {
		// NN 4 DOM.. note: this won't find nested layers
		return document.layers[objectId];
	} else {
		return false;
	}
}

function showHide(objname) {
	var obj = getObject(objname);
	if(obj.style.display == "none") {
		obj.style.display = "block";
	} else {
		obj.style.display = "none";
	}
}
</SCRIPT>
</HEAD>
<BODY>
<DIV class=menu>
<DL>
	<DT>
		<A onclick="showHide('items1');" href="#" target=_self>用户注册</A>
	</DT>
</DL>
</DIV></BODY></HTML>