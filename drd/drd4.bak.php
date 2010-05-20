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
	<script src="http://maps.google.cn/maps?file=api&amp;v=2.x&amp;key=ABQIAAAABwnBDPbSNIbjRoBr72hE5BQHNOcxkocWKUK7jtuqKWIJVor8ahQzvVdq_MFYnCTloVzXyts26uKuHQ&hl=zh-CN" type="text/javascript"></script>
	<?php
		css_include_tag('drd/drd4','thickbox');
		use_jquery();
		js_include_tag('top','thickbox');
	?>
</head>
<body style="">
	<div id="title">定日达网点查询</div>
	<div id="search_box">
		请输入要查询的关键字
		<input type="text" id="search">
	</div>
	<div id="flash">
		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="600px" height="465px">
	      <param name=movie value="/flash/alumniHTML_rebuild_done12.swf">
	      <param name=quality value=high>
	      <param name="wmode" value="opaque">
	      <embed src="/flash/alumniHTML_rebuild_done12.swf" quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="600" height="465" wmode="opaque"></embed>
	    </object>
	</div>
</body>
</html>

<script>
	$(function(){
		$("#search").keypress(function(event){
			if (event.keyCode == 13&&$("#search").val()!='') {
				tb_show('搜索结果', 'show_drdnetstate.php?height=340&width=580&search='+encodeURI($("#search").val()), false);
			}
		})
		
		$('#but').click(function(){
			link("2");
		});
	})
	
	function link(id){
		tb_show('显示地图', 'show_map.php?height=340&width=580&id='+id, false);
	}
</script>