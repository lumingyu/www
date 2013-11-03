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
<DIV class=bodytitletxt>公司信息</DIV>
<div class=bodytitletxt2></div></div>
<table width="96%" border=0 align=center cellpadding="5" cellspacing=1 class=tbtitle style="background: #cad9ea;" id="myTable">
	<thead>
		<tr bgcolor="#f5fafe">
			<th align="center">公司编号</th>
			<th align="center">公司名称</th>
			<th align="center">地区编号</th>
			<th align="center">气源</th>
			<th align="center">公司仪表数量</th>
			<th align="center">公司位置</th>
			<th align="center">公司状态</th>
			
		</tr>
	</thead>
	<tbody>
	<?php foreach($line as  $value) {
		echo '
		<tr bgcolor="#ffffff">
			<td align="center">'.$value['company_id'].'</td>
			<td align="center">'.$value['company_name'].'</td>
			<td align="center">'.$value['region'].'</td>
			<td align="center">'.$value['ng_source'].'</td>
			<td align="center">'.$value['instrument_count'].'</td>
			<td align="center">'.$value['position'].'</td>
			<td align="center">'.$value['status'].'</td>

			
		</tr>';
	}?>
	</tbody>
</table>
</BODY>
</HTML>
