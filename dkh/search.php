<?php
	@header('Content-type: text/html;charset=UTF-8');
    require_once('../frame.php');
	if(empty($_SESSION['dkh'])){
		echo "<tr><td>登录已过期，请刷新页面后重新登录</td></tr>";
		die();
	}
	include('../inc/oracle_data_handler.php');
	$ids = array();
	$ids = explode('%0A', $_POST['order']);
	$type = $_POST['type'];
	if($type=='yd'){
		$key = 'YDBH';
	}elseif($type=='dd'){
		$key = 'KHDDH';
	}else{
		die();
	}
?>
<tr>
	<td style="height: 20px;" align="center" valign="top"> <span id="Label2"><b><font color="Red" size="6">运单跟踪查询</font></b></span> </td>
</tr>
<tr>
	<td align="center"> <span id="result" disabled="disabled"><b>运单跟踪查询结果</b></span></td>
</tr>
<?php foreach($ids as $v){
	$v = trim(urldecode($v));
	if($type=='yd'&&strlen($v)!='8'&&!empty($v)){
		echo '<tr><td>未找到相应运单信息</td></tr>';
	}else if(strlen($v)>20){
		echo '<tr><td>未找到相应运单信息</td></tr>';
	}else if(empty($v)){
	}else{
		$fcbhs = array();
		$name = $_SESSION['dkh'];
		if($_SESSION['dkh_admin'] !='TRUE'){
			$sql = "select to_char(RQ,'yyyy-mm-dd hh:mi:ss') as RQ,to_char(TYRQ,'yyyy-mm-dd hh:mi:ss') as TYRQ,YDBH,KHDDH,JS,TJ,HWMC,QYDMC,MDDMC,GZHJDYID,GSJC,SM,SHRMC,SHRLXR,SHRLXDH1,SHRDZ from hydata.ld_dkh_cx_v where $key='$v' and SSJTGS='$name'";
		}else{
			$sql = "select to_char(RQ,'yyyy-mm-dd hh:mi:ss') as RQ,to_char(TYRQ,'yyyy-mm-dd hh:mi:ss') as TYRQ,YDBH,KHDDH,JS,TJ,HWMC,QYDMC,MDDMC,GZHJDYID,GSJC,SM,SHRMC,SHRLXR,SHRLXDH1,SHRDZ from hydata.ld_dkh_cx_v where $key='$v'";
		}
		
		$ret = query_oracle($sql);
		$count =  count($ret);
		$ydh = $ret[YDBH][0];
		$sql = "select FHDBH from hydata.ld_fhdmx where YDBH='$ydh' order by record_date desc";
		$fhdbh = query_oracle($sql);
		$fhdbh = $fhdbh[FHDBH][0];
		$sql = "select FCBH from hydata.ld_fhd where FHDBH='$fhdbh'";
		$fcbh = query_oracle($sql);
		$fcbh = iconv('GBK','UTF-8',$fcbh[FCBH][0]);
		array_push($fcbhs, $fcbh);
		if($ret === false || $count<= 0) {
			echo '<tr><td>未找到相应运单信息</td></tr>';
		}else{
?>
<tr>
	<td>
		<div style="float:left;">
			<div><font color="Black" size=2><b>运单号：<?php echo $ret[YDBH][0];?></b></font></div>
			<div><font color="Black" size=2><b>订单号：<?php echo $ret[KHDDH][0];?></b></font></div>
		</div>
		<div style="float:left; padding-top:5px; padding-left:50px;"><a href="http://211.144.218.37/gps/Track.aspx?fccode=URLEncode(<?php echo $fcbh;?>)"><img src="image/gps1.gif" border=0></a></div>
	</td>
</tr>
<tr>
	<td align="center">
		<table style="font-size: 12px;" bgcolor="LightGoldenrodYellow" border="0" bordercolor="Tan" cellpadding="2" cellspacing="0" width="872">
			<tbody>
				<tr bgcolor="E46C0A">
					<td align="left" colspan=10><font color="Black" size=3>　运单信息</font></td>
				</tr>
				<tr bgcolor="Tan">
					<td width="5%"><font color="Black"><b>件数</b></font></td>
					<td width="5%"><font color="Black"><b>体积</b></font></td>
					<td width="10%"><font color="Black"><b>货物名称</b></font></td>
					<td width="5%"><font color="Black"><b>起运地</b></font></td>
					<td width="10%"><font color="Black"><b>目的地</b></font></td>
					<td width="15%"><font color="Black"><b>托运时间</b></font></td>
					<td width="15%"><font color="Black"><b>收货人单位</b></font></td>
					<td width="5%"><font color="Black"><b>收货人</b></font></td>
					<td width="10%"><font color="Black"><b>收货人电话</b></font></td>
					<td width="20%"><font color="Black"><b>收货人地址</b></font></td>
				</tr>
				<tr>
					<td><font color="Black"><?php echo $ret[JS][0];?></font></td>
					<td><font color="Black"><?php echo $ret[TJ][0];?></font></td>
					<td><font color="Black"><?php echo iconv('GBK','UTF-8',$ret[HWMC][0]);?></font></td>
					<td><font color="Black"><?php echo iconv('GBK','UTF-8', $ret[QYDMC][0]);?></font></td>
					<td><font color="Black"><?php echo iconv('GBK','UTF-8',$ret[MDDMC][0]);?></font></td>
					<td><font color="Black"><?php echo iconv('GBK','UTF-8',$ret[RQ][0]);?></font></td>
					<td><font color="Black"><?php echo iconv('GBK','UTF-8',$ret[SHRMC][0]);?> </font></td>
					<td><font color="Black"><?php echo iconv('GBK','UTF-8',$ret[SHRLXR][0]);?></font></td>
					<td><font color="Black"><?php echo iconv('GBK','UTF-8',$ret[SHRLXDH1][0]);?></font></td>
					<td><font color="Black"><?php echo iconv('GBK','UTF-8',$ret[SHRDZ][0]);?></font></td>
				</tr>
				<tr bgcolor="E46C0A">
					<td align="left" colspan=10><font color="Black" size=3>　运单跟踪信息</font></td>
				</tr>
				<tr bgcolor="Tan">
					<td colspan=3><font color="Black"><b>时间</b></font></td>
					<td><font color="Black"><b>事件</b></font></td>
					<td><font color="Black"><b>事件公司</b></font></td>
					<td colspan=5><font color="Black"><b>跟踪信息</b></font></td>
				</tr>
				<?php
				for($i=0;$i<$count;$i++){
					if($ret[RQ][$i]){
				?>
				<tr <?php if($i%2==1)echo 'bgcolor="#EEE8AA"';?>>
					<td colspan=3><font color="Black"><?php echo  iconv('GBK','UTF-8',$ret[TYRQ][$i]);?></font></td>
					<td><font color="Black"><?php echo  iconv('GBK','UTF-8',$ret[GZHJDYID][$i]);?></font></td>
					<td><font color="Black"><?php echo  iconv('GBK','UTF-8',$ret[GSJC][$i]);?></font></td>
					<td colspan=5><font color="Black"><?php echo  iconv('GBK','UTF-8',$ret[SM][$i]);?></font></td>
				</tr>
				<?php }}?>
			</tbody>
		</table>
		</td>
</tr>
<?php
		}
	}
?>
<tr><td><div style="border-bottom: 3px dotted #ff9900; height:10px;"></div><div style="height:10px;">&nbsp; </div></td><tr>
<?php }?>
<tr>
	<td align="right"><font face="宋体"> &nbsp;&nbsp;</font></td>
</tr>
<tr>
	<td align="right"><a href="http://211.144.218.37/gps/Track.aspx?fccode=URLEncode(<?php echo implode(',',$fcbhs);?>)"><img src="image/gps2.gif" border=0></a></td>
</tr>
<tr>
	<td align="center"><font face="宋体"> &nbsp;&nbsp;</font> <font face="宋体">&nbsp; </font>&nbsp; <font face="宋体">&nbsp; </font></td>
</tr>
<tr>
	<td class="WelContent" align="left">&nbsp; </td>
</tr>