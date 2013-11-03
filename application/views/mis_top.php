<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE><?php echo $title;?></TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK href="<?php echo base_url();?>static/css/css_top.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.3790.4275" name=GENERATOR></HEAD>
<BODY>
<DIV class=topnav>
	<DIV class=sitenav>
		<DIV class=welcome>你好:<?php echo $username; ?><SPAN class=username></SPAN>,欢迎您登陆。 </DIV>
		<DIV class=sitelink><a href="<?php echo base_url();?>" target="_blank">网站首页</a></DIV>
	</DIV>
	<DIV class=leftnav>
		<UL>
			<LI class=navleft></LI>
			<?php
			foreach($navi_title as $value)
			{
				echo "<LI id=d1><a href=\"".base_url()."index.php/system_navi/load_navi_subtitle/".$value["title_id"]."\" target=\"left\">".$value["title_name"]."</LI>";
			}
			?>
			<LI class=navright></LI>
		</UL>
	</DIV>
</DIV>
</BODY>
</HTML>