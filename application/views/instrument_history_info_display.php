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
<DIV class=bodytitletxt>仪表状态信息数据</DIV>
<div class=bodytitletxt2><a href="<?php echo base_url();?>index.php/transfer_data/instrument_history_info_find">仪表实时查询</a></div></div>
<table width="96%" border=0 align=center cellpadding="5" cellspacing=1 class=tbtitle style="background: #cad9ea;" id="myTable">
	<thead>
		<tr bgcolor="#f5fafe">
			<th align="center" nowrap>记录编号</th>
			<th align="center" nowrap>机顶盒编号</th>
			<th align="center" nowrap>仪表编号</th>
			<th align="center" nowrap>更新时间</th>
			<th align="center" nowrap>温度</th>
			<th align="center" nowrap>压力</th>
			<th align="center" nowrap>标况体积流量</th>
			<th align="center" nowrap>能量</th>
			<th align="center" nowrap>标况体积累积量</th>
			<th align="center" nowrap>能量累积量</th>                                    
			<th align="center" nowrap>甲烷(CH4)</th>
			<th align="center" nowrap>氮气(N2)</th>
			<th align="center" nowrap>二氧化碳(CO2)</th>
			<th align="center" nowrap>乙烷(C2H6)</th>
			<th align="center" nowrap>丙烷(C3H8)</th>
			<th align="center" nowrap>水蒸气(H2O)</th>
			<th align="center" nowrap>硫化氢(H2S)</th>
			<th align="center" nowrap>氢气(H2)</th>
			<th align="center" nowrap>一氧化碳(CO)</th>
			<th align="center" nowrap>氧气(O2)</th>
			<th align="center" nowrap>异丁烷(i-C4H10)</th>
			<th align="center" nowrap>正丁烷(n-C4H10)</th>
			<th align="center" nowrap>异戊烷(i-C5H12)</th>
			<th align="center" nowrap>正戊烷(n-C5H12)</th>
			<th align="center" nowrap>正己烷(n-C6H14)</th>
			<th align="center" nowrap>正庚烷(n-C7H16)</th>
			<th align="center" nowrap>正辛烷(n-C8H18)</th>
			<th align="center" nowrap>正壬烷(n-C9H20)</th>
			<th align="center" nowrap>C10及以上同分异构体</th>
			<th align="center" nowrap>氦气(He)</th>
			<th align="center" nowrap>氩气(Ar)</th>
			
		</tr>
	</thead>
	<tbody>
	<?php foreach($line as  $value) {
		echo '
		<tr bgcolor="#ffffff">
			<td align="center">'.$value['id'].'</td> 
			<td align="center">'.$value['stb_id'].'</td> 
			<td align="center">'.$value['instrument_id'].'</td> 
			<td align="center" nowrap>'.$value['collect_time'].'</td> 
			<td align="center">'.number_format($value['temperature'],1).'</td> 
			<td align="center">'.number_format($value['pressure'],3).'</td>    
			<td align="center">'.number_format($value['volume_flow'],3).'</td> 
			<td align="center">'.number_format($value['energy'],3).'</td> 
			<td align="center">'.number_format($value['accumulation_flow'],1).'</td> 
			<td align="center">'.number_format($value['accumulation_energy'],1).'</td> 
			<td align="center">'.number_format($value['component1'],4).'</td>
			<td align="center">'.number_format($value['component2'],4).'</td>
			<td align="center">'.number_format($value['component3'],4).'</td>
			<td align="center">'.number_format($value['component4'],4).'</td>
			<td align="center">'.number_format($value['component5'],4).'</td>
			<td align="center">'.number_format($value['component6'],4).'</td>
			<td align="center">'.number_format($value['component7'],4).'</td>
			<td align="center">'.number_format($value['component8'],4).'</td>
			<td align="center">'.number_format($value['component9'],4).'</td>
			<td align="center">'.number_format($value['component10'],4).'</td>
			<td align="center">'.number_format($value['component11'],4).'</td>
			<td align="center">'.number_format($value['component12'],4).'</td>
			<td align="center">'.number_format($value['component13'],4).'</td>
			<td align="center">'.number_format($value['component14'],4).'</td>	
			<td align="center">'.number_format($value['component15'],4).'</td>
			<td align="center">'.number_format($value['component16'],4).'</td>
			<td align="center">'.number_format($value['component17'],4).'</td>
			<td align="center">'.number_format($value['component18'],4).'</td>
			<td align="center">'.number_format($value['component19'],4).'</td>
			<td align="center">'.number_format($value['component20'],4).'</td>
			<td align="center">'.number_format($value['component21'],4).'</td>
		</tr>';
	}?>
	</tbody>
</table>
</BODY>
</HTML>
