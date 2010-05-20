<?php
    require_once('../frame.php');
	$db = get_db();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<meta http-equiv=Content-Language content=zh-CN>
	<title>天地华宇-中国公路快运领导者</title><meta name="Keywords" content="天地华宇,天地华宇物流,天地华宇物流查询,华宇,华宇物流,华宇物流查询,天地华宇俱乐部,华宇俱乐部"/><meta name="Description" content="天地华宇-中国公路快运领导者"/>
	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAA7ORAIMcMd3c4M9J2KUWTmRTmtcUOMtLV6thTWthvN7YzvU3cUhT7fSIBnjtKjNYdhmBsMf8Bjhi5OQ" type="text/javascript"></script>
	<?php
		css_include_tag('thickbox','breadcom','drd/drd4');
		use_jquery();
		js_include_tag('top','thickbox');
	?>
</head>
<body>
	<div id="title">网点查询</div>
	<div id="search_box">
		<?php
			$record = $db->query("select * from hoau_new_province");
		?>
		<div class="div1">省份</div><select id="start_province" value="<?php echo $_GET['province'];?>" style="border:1px solid #FF9900; float:left;display:inline;">
			<option value="">--请选择--</option>
			<?php for($i=0;$i<count($record);$i++){?>
			<option value="<?php echo $record[$i]->PID;?>"><?php echo $record[$i]->PMC;?></option>
			<?php } ?>
		</select>
		<div class="div1">城市</div><select id="start_city" style="border:1px solid #FF9900; float:left;display:inline;" value="<?php echo $_GET['city'];?>">
			<option value="">--请选择--</option>
		</select>
		<div class="div1">类型</div><select id="tiaojian" style="border:1px solid #FF9900;float:left;display:inline;"><option value="0">全部</option><option value="code">网点代码</option><option value="name">公司名称</option></select>
		<div class="div1">关键字</div><input type="text" id="search" style="border:1px solid #FF9900; width:60px;float:left;display:inline;" value="<?php echo $_GET['wdbh'];?>">
		<div class="div1">业务范围</div><select id="ywfw" style="border:1px solid #FF9900; float:left;display:inline;"><option value="0">--请选择--</option><option value="cz">整车</option><option value="drd">定日达</option><option value="ld">零担</option></select>
		<button id="cxtj"></button>
	</div>
	<div id="flash">
		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="660px" height="520px">
	      <param name=movie value="/flash/alumniHTML_rebuild_done12.swf">
	      <param name=quality value=high>
	      <param name="wmode" value="opaque">
	      <embed src="/flash/alumniHTML_rebuild_done12.swf" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="660" height="520" wmode="opaque"></embed>
	    </object>
	</div>
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

<script>
	$(function(){
		<?php if($_REQUEST['province']!=''||$_REQUEST['city']!=''||$_REQUEST['wdbh']!=''){
			$url = 'show_drdnetstate.php?height=340&width=580';
			if($_REQUEST['province']!=''){
				$url .= '&province='.urlencode($_REQUEST['province']);
			}
			if($_REQUEST['city']!=''){
				$url .= '&city='.urlencode($_REQUEST['city']);
			}
			if($_REQUEST['wdbh']!=''){
				$url .= '&search='.urlencode($_REQUEST['wdbh']);
			}
			if($_REQUEST['wdid']!=''){
				$url .= '&wdid='.urlencode($_REQUEST['wdid']);
			}
		?>
		var url = '<?php echo $url;?>';
		tb_show('搜索结果', url, false);
		<?php } ?>
		
		$("#start_province").change(function(){
			$.post('/branch/show_city.php',{'p_id':$("#start_province").val()},function(data){
				$("#start_city").html(data);		
			})
		})
		
		$("#search").keypress(function(event){
			if (event.keyCode == 13&&$("#search").val()!='') {
				var url = 'show_drdnetstate.php?height=340&width=580&search='+encodeURI($("#search").val());
				if($("#tiaojian").val()!='0'){
				url = url+'&tiaojian='+encodeURI($("#tiaojian").val());
				}
				if($("#ywfw").val()!='0'){
					url = url+'&ywfw='+encodeURI($("#ywfw").val());
				}
				if($("#start_province").val()!=''){
					url = url+'&province='+encodeURI($("start_province").val());
				}
				if($("#start_city").val()!=''){
					url = url+'&city='+encodeURI($("start_city").val());
				}
				tb_show('搜索结果', url, false);
			}
		})
		
		$("#cxtj").click(function(){
			var url = 'show_drdnetstate.php?height=340&width=580&search='+encodeURI($("#search").val());
			if($("#tiaojian").val()!='0'){
				url = url+'&tiaojian='+encodeURI($("#tiaojian").val());
			}
			if($("#ywfw").val()!='0'){
				url = url+'&ywfw='+encodeURI($("#ywfw").val());
			}
			if($("#start_province").val()!=''){
				url = url+'&province='+encodeURI($("#start_province").val());
			}
			if($("#start_city").val()!=''){
				url = url+'&city='+encodeURI($("#start_city").val());
			}
			tb_show('搜索结果', url, false);
		})
	})
	
	function link(id){
		tb_show('显示地图', 'show_map.php?height=340&width=580&id='+id, false);
	}
</script>