<?php
    require_once('../frame.php');
	$db = get_db();
	$sql = "select * from hoau_contraband where 1=1 and is_adopt=1 order by created_at desc";
	$record = $db->paginate($sql,10);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<?php
		css_include_tag('breadcom');
		use_jquery();
		js_include_tag('top');
	?>
	<style type="text/css">
	<!--
	.STYLE2 {
		font-size: 13px;
		font-weight: bold;
		color: #CCCCCC;
	}
	.STYLE4 {
		font-size: 13px;
		color: #666666;
	}
	.td_style{ border-bottom:1px dashed #CCCCCC; height:25px;
	}
	.STYLE6 {font-size: 13px; color: #666666; font-weight: bold; }
	
	-->
</style>
</head>
<body>
	<div id="title" style='width:586px; height:41px; padding-left:55px; line-height:30px; font-size:14px; font-weight:bolder; color:#F76300; background:url("/images/icon/khfw.gif") no-repeat; float:left; display:inline;'><div style="float:left">常见问题解答</div>
		<div class="breadcum"><a href="/" target="_parent">首页</a> > <a href="/khfw/" target="_parent">客户服务</a> > <a href="" class="a2">常见问题解答</a></div>
	</div>
    <table style="margin-left:25px;" border="0" align="left">
			  <tr bordercolor="#FFFFFF">
				<td><img src="images/untitled22.jpg" /></td>
				<td width="18" align="left" class="td_style"><span class="STYLE6">Q：</span></td>
			    <td width="557" align="left" class="td_style"><span class="STYLE6">"天地华宇"公司主要做哪些产品服务？</span></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
				<td valign="top"><img style="margin-top:2px;" src="images/untitled22.jpg" /></td>
				<td valign="top" align="left" class="STYLE4 td_style">A：</td>
			    <td align="left" class="STYLE4 td_style">天地华宇业务涵盖全国公路零担运输、"定日达"快运以及整车包车等业务。</td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
				<td><img src="images/untitled22.jpg" /></td>
				<td align="left" class="td_style STYLE4"><strong>Q：</strong></td>
			    <td align="left" class="td_style STYLE4"><strong>"天地华宇"公司可提供哪些增值服务？</strong></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
				<td valign="top" ><img style="margin-top:2px;" src="images/untitled22.jpg" /></td>
				<td align="left" valign="top"  class="STYLE4 td_style">A：</td>
			    <td align="left" class="STYLE4 td_style">天地华宇可以提供：提货、送货、打包、保价、代收货款、签单返回、进仓、超市派送、仓储等多项增值服务。 </td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td><img src="images/untitled22.jpg" /></td>
			    <td align="left" class="td_style STYLE4"><strong>Q：</strong></td>
			    <td align="left" class="td_style STYLE4"><strong>在"天地华宇"公司托运的货物可以保价吗？保价费如何收取？</strong></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td valign="top" ><img style="margin-top:2px;" src="images/untitled22.jpg" /></td>
			    <td valign="top"  align="left" class="STYLE4 td_style">A：</td>
			    <td align="left" class="STYLE4 td_style">天地华宇提供"保价运输"服务，托运人应根据货物实际价值购买保价，保价费按货物报价的3-7‰收取。</td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td><img src="images/untitled22.jpg" /></td>
			    <td align="left" class="td_style STYLE4"><strong>Q：</strong></td>
			    <td align="left" class="td_style STYLE4"><strong>所托运的货物不上保险，货物出现丢失，损坏，如何赔偿？ </strong></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td valign="top" ><img style="margin-top:2px;" src="images/untitled22.jpg" /></td>
			    <td align="left" valign="top"  class="STYLE4 td_style">A：</td>
			    <td align="left" class="STYLE4 td_style">对于未投保的货物出现丢失、损坏等情况，公司将按货物损坏或丢失部分的运费的二倍进行赔偿。</td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td><img src="images/untitled22.jpg" /></td>
			    <td align="left" class="td_style STYLE4"><strong>Q：</strong></td>
			    <td align="left" class="td_style STYLE4"><strong>运费是否可以由收货人支付？</strong></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td valign="top"><img style="margin-top:2px;" src="images/untitled22.jpg" /></td>
			    <td valign="top" align="left" class="STYLE4 td_style">A：</td>
			    <td align="left" class="STYLE4 td_style">天地华宇可以提供由收货人支付运费的到付服务。</td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td><img src="images/untitled22.jpg" /></td>
			    <td align="left" class="td_style STYLE4"><strong>Q：</strong></td>
			    <td align="left" class="td_style STYLE4"><strong>"天地华宇"公司是否可以提供代收货款服务？</strong></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td valign="top"><img style="margin-top:2px;" src="images/untitled22.jpg" /></td>
			    <td valign="top" align="left" class="STYLE4 td_style">A：</td>
			    <td align="left" class="STYLE4 td_style">天地华宇可以提供10万元以下的代收货款服务，同时会根据代收货款的金额收取一定的手续费。</td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td><img src="images/untitled22.jpg" /></td>
			    <td align="left" class="td_style STYLE4"><strong>Q：</strong></td>
			    <td align="left" class="td_style STYLE4"><strong>"天地华宇"公司是否可以加盟？ </strong></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td valign="top"><img style="margin-top:2px;" src="images/untitled22.jpg" /></td>
			    <td valign="top" align="left" class="STYLE4 td_style">A：</td>
			    <td align="left" class="STYLE4 td_style">天地华宇不提供任何形式加盟。</td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td width="11"><img src="images/untitled22.jpg" /></td>
			    <td width="18" align="left" class="td_style"><span class="STYLE6">Q：</span></td>
			    <td align="left" class="td_style STYLE4"><strong>定日达对货物有什么要求</strong></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td valign="top"><img style="margin-top:2px;" src="images/untitled22.jpg" /></td>
			    <td valign="top" align="left" class="STYLE4 td_style">A：</td>
			    <td align="left" class="STYLE4 td_style">1、货物规格要求：对货物的体积和重量是有限制的。单件货物重量不得超过100公斤，体积不得超过1.5*1*1立方空间；<br>2、收货时间：定日达货物收货截止时间为当日下午17：30之前。17：30分以后的货物视次日发货。货物需要包装的，需要另行计算运行时间。周日不收取定日达货物。</td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td><img src="images/untitled22.jpg" /></td>
			    <td align="left" class="td_style STYLE4"><strong>Q：</strong></td>
			    <td align="left" class="td_style STYLE4"><strong>普通零担货物承运有什么要求</strong></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td valign="top" ><img style="margin-top:2px;" src="images/untitled22.jpg" /></td>
			    <td align="left" valign="top"  class="STYLE4 td_style">A：</td>
			    <td align="left" class="STYLE4 td_style">1.如实申报货物的名称、性质、数量、重量、体积、规格型号、不能托运或者夹带禁运物品、假冒伪劣产品、其他贵重物品、证书、有价证券等<br>2.需要保温、保持干燥的物品应如实申报。<br>3.异型或者超重、超大、超长货物加收费用。</td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td><img src="images/untitled22.jpg" /></td>
			    <td align="left" class="td_style STYLE4"><strong>Q：</strong></td>
			    <td align="left" class="td_style STYLE4"><strong>对所托运的货物包装有什么要求？</strong></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td valign="top" ><img style="margin-top:2px;" src="images/untitled22.jpg" /></td>
			    <td  align="left" valign="top" class="STYLE4 td_style">A：</td>
			    <td align="left" class="STYLE4 td_style">为了保证您的货物能够及时、安全的抵达目的地，货物的包装必须要能够保证运输、搬运、装卸作业的安全的原则下进行内外包装。对于无包装、不符合运输要求或者包装内外瑕疵造成损坏的，是免除承运人责任的。<br>天地华宇可以提供纸箱、编织袋、木箱等材料的包装。具体包装会根据货物的体积、重量、件数、属性等因素选择适合运输的包装材料。</td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td><img src="images/untitled22.jpg" /></td>
			    <td align="left" class="td_style STYLE4"><strong>Q：</strong></td>
			    <td align="left" class="td_style STYLE4"><strong>如何办理发货事宜？</strong></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td valign="top" ><img style="margin-top:2px;" src="images/untitled22.jpg" /></td>
			    <td align="left" valign="top"  class="STYLE4 td_style">A：</td>
			    <td align="left" class="STYLE4 td_style">目前有两种方式可以帮你办理发货事宜。<br>第一种：您可以自行将货物送至距离您最近的营业网点；<br>第二种：您可以拨打全国统一客服热线或营业网点的电话进行发货预约，天地华宇可根据约定的时间、地点提供上门提货服务；</td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td><img src="images/untitled22.jpg" /></td>
			    <td align="left" class="td_style STYLE4"><strong>Q：</strong></td>
			    <td align="left" class="td_style STYLE4"><strong>如何办理提货事宜？</strong></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td valign="top"><img style="margin-top:2px;" src="images/untitled22.jpg" /></td>
			    <td valign="top" align="left" class="STYLE4 td_style">A：</td>
			    <td align="left" class="STYLE4 td_style">目前有两种方式可以帮你办理提货事宜。<br>第一种：在接到到货通知后，收货人携带本人有效证件到指定的网点提取货物。如果委托他人收货需要携带收货人及受托人的有效证件；<br>第二种：发货时向天地华宇提出要求提供送货上门服务，天地华宇可以在货物到达目的地城市后，将货物送至你收货人所在地一楼处；</td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td><img src="images/untitled22.jpg" /></td>
			    <td align="left" class="td_style STYLE4"><strong>Q：</strong></td>
			    <td align="left" class="td_style STYLE4"><strong>如何办理货物保险？</strong></td>
		      </tr>
			  <tr bordercolor="#FFFFFF">
			    <td valign="top"><img src="images/untitled22.jpg" /></td>
			    <td valign="top" align="left" class="STYLE4 td_style">A：</td>
			    <td align="left" class="STYLE4 td_style">根据您所申报的货物价值为您提供保价服务。货物出险后，您提供办理索赔的资料，可以在我司办理索赔事宜。保价方式有两种，第一种是平均保价。第二种是单件保价（就是对每一件或者某一件贵重货物进行保价）。保费是按照货物价值的千分之三至千分之七收取的。如果您的货物是贵重物品，我建议您保价。</td>
		      </tr>
		  </table>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-9272044-1");
pageTracker._trackPageview();
} catch(err) {}</script> 
</body>
</html>