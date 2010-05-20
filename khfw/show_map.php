<?php
	require_once('../frame.php');
	$id = $_REQUEST['id'];
	$drd = new table_class('hoau_yywd');
	$drd->find($id);
	$flag = 0;
?>
	  <div id="map_canvas" style="width:570px; height:300px; float:left; display:inline;"></div>
<script>
	$(function(){
		 var flag = <?php echo $flag;?>;
		 var map = null;
    	 var geocoder = null;
		 var address = '<?php echo $drd->ZS;?>';
		 var show = '<div style="width:300px; height:70px; float:left; display:inline;"><div style="width:300px;float:left;display:inline"><?php echo $drd->QYMC;?></div><div style="width:300px;float:left;display:inline">地址：<?php echo $drd->ZS;?></div><div style="width:300px;float:left;display:inline">电话：<?php echo ($drd->DH!="")?$drd->DH:"暂无";?></div><div style="width:300px;float:left;display:inline">传真：<?php echo ($drd->CZ!="")?$drd->CZ:"暂无";?></div></div>';
		 map = new GMap2(document.getElementById("map_canvas"));
		 if (flag == 1) {
		 	var point_x = <?php echo ($drd->point_x!='')?$drd->point_x:'1';?>;
		 	var point_y = <?php echo ($drd->point_y!='')?$drd->point_y:'1';?>;
		 	if (point_x != 'null') {
		 		map.setCenter(new GLatLng(point_x, point_y), 14);
		 		map.addControl(new GSmallMapControl());
		 		var marker = new GMarker(new GLatLng(point_x, point_y));
		 		map.addOverlay(marker);
		 		marker.openInfoWindowHtml(show);
		 	}
		 	else {
		 		$("#map_canvas").html('不能解析');
		 	}
		 }
		 else {
		 	geocoder = new GClientGeocoder();
		 	if (geocoder) {
		 		geocoder.getLatLng(address, function(point){
		 			if (point == null) {
		 				alert("不能解析: " + address);
		 			}
		 			else {
		 				map.setCenter(point, 14);
		 				map.addControl(new GSmallMapControl());
		 				var marker = new GMarker(point);
		 				map.addOverlay(marker);
		 				marker.openInfoWindowHtml(show);
		 			}
		 		});
		 	}
		 }
	})
</script>