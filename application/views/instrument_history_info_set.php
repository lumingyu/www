<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE><?php echo $title;?></TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK href="<?php echo base_url();?>static/css/css_body.css" type=text/css rel=stylesheet>
<script type="text/javascript" src="<?php echo base_url();?>static/js/jquery.js"></script>
<META content="MSHTML 6.00.3790.4275" name=GENERATOR>
</HEAD>
<BODY>
<DIV class=bodytitle>
<DIV class=bodytitleleft></DIV>
<DIV class=bodytitletxt>仪表天然气组分赋值</DIV>
<div class=bodytitletxt2></div></div>
<form action="<?php echo base_url();?>index.php/transfer_data/set_data" method="POST" enctype="multipart/form-data">
	<table width="40%" border=0 align=center cellpadding="5" cellspacing=1 class=tbtitle style="background: #cad9ea;" id="myTable">
		<tr bgcolor="#f5fafe">
			<td width="20%" align="center">甲烷(CH4):</td>
			<td align="center"><input type="text" name="component1" id="component1" value=0></td>
			<td width="20%" align="center">氮气(N2):</td>
			<td align="center"><input type="text" name="component2" id="component2" value=0></td>
		</tr>
		<tr bgcolor="#f5fafe">
			<td width="20%" align="center">二氧化碳(CO2):</td>
			<td align="center"><input type="text" name="component3" id="component3" value=0></td>
			<td width="20%" align="center">乙烷(C2H6):</td>
			<td align="center"><input type="text" name="component4" id="component4" value=0></td>
		</tr>
		<tr bgcolor="#f5fafe">
			<td width="20%" align="center">丙烷(C3H8):</td>
			<td align="center"><input type="text" name="component5" id="component5" value=0></td>
			<td width="20%" align="center">水蒸气(H2O):</td>
			<td align="center"><input type="text" name="component6" id="component6" value=0></td>
		</tr>			
		<tr bgcolor="#f5fafe">
			<td width="20%" align="center">硫化氢(H2S):</td>
			<td align="center"><input type="text" name="component7" id="component7" value=0></td>
			<td width="20%" align="center">氢气(H2):</td>
			<td align="center"><input type="text" name="component8" id="component8" value=0></td>
		</tr>
		<tr bgcolor="#f5fafe">
			<td width="20%" align="center">一氧化碳(CO):</td>
			<td align="center"><input type="text" name="component9" id="component9" value=0></td>
			<td width="20%" align="center">氧气(O2):</td>
			<td align="center"><input type="text" name="component10" id="component10" value=0></td>
		</tr>
		<tr bgcolor="#f5fafe">
			<td width="20%" align="center">异丁烷(i-C4H10):</td>
			<td align="center"><input type="text" name="component11" id="component11" value=0></td>
			<td width="20%" align="center">正丁烷(n-C4H10):</td>
			<td align="center"><input type="text" name="component12" id="component12" value=0></td>
		</tr>
		<tr bgcolor="#f5fafe">
			<td width="20%" align="center">异戊烷(i-C5H12):</td>
			<td align="center"><input type="text" name="component13" id="component13" value=0></td>
			<td width="20%" align="center">正戊烷(n-C5H12):</td>
			<td align="center"><input type="text" name="component14" id="component14" value=0></td>
		</tr>
		<tr bgcolor="#f5fafe">
			<td width="20%" align="center">正己烷(n-C6H14):</td>
			<td align="center"><input type="text" name="component15" id="component15" value=0></td>
			<td width="20%" align="center">正庚烷(n-C7H16):</td>
			<td align="center"><input type="text" name="component16" id="component16" value=0></td>
		</tr>
		<tr bgcolor="#f5fafe">
			<td width="20%" align="center">正辛烷(n-C8H18):</td>
			<td align="center"><input type="text" name="component17" id="component17" value=0></td>
			<td width="20%" align="center">正壬烷(n-C9H20):</td>
			<td align="center"><input type="text" name="component18" id="component18" value=0></td>
		</tr>
		<tr bgcolor="#f5fafe">
			<td width="20%" align="center">C10及以上同分异构体:</td>
			<td align="center"><input type="text" name="component19" id="component19" value=0></td>
			<td width="20%" align="center">氦气(He):</td>
			<td align="center"><input type="text" name="component20" id="component20" value=0></td>
		</tr>
		<tr bgcolor="#f5fafe">
			<td width="20%" align="center">氩气(Ar):</td>
			<td align="center"><input type="text" name="component21" id="component21" value=0></td>
			<td width="20%" align="center" colspan=2><input type="submit" value="仪表数据赋值" /></td>
		</tr>
		
	</table>


</BODY>
</HTML>
