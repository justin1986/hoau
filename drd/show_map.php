<?php
	require_once('../frame.php');
	$id = $_REQUEST['id'];
	$drd = new table_class('hoau_drdnetstate');
	$drd->find($id);
?>
	  <div id="map_canvas" style="width:570px; height:300px; float:left; display:inline;"></div>
<script>
	$(function(){
		 var map = null;
    	 var geocoder = null;
		 var address = '<?php echo $drd->address;?>';
		 var show = '<div style="width:300px; height:80px; float:left; display:inline;"><div style="width:300px;float:left;display:inline"><?php echo $drd->name;?></div><div style="width:300px;float:left;display:inline">地址：<?php echo $drd->address;?></div><div style="width:300px;float:left;display:inline">电话：<?php echo ($drd->tel!="")?$drd->teregioncode."-".$drd->tel:"暂无";?></div><div style="width:300px;float:left;display:inline">传真：<?php echo ($drd->fax!="")?$drd->teregioncode."-".$drd->fax:"暂无";?></div></div>';
		 map = new GMap2(document.getElementById("map_canvas"));
	 	 geocoder = new GClientGeocoder();
	 	 if (geocoder) {
	         geocoder.getLatLng(
	          address,
	          function(point) {
	            if (point==null) {
	              alert("不能解析: " + address);
	            } else {
	              map.setCenter(point, 14);
				  map.addControl(new GSmallMapControl());
	              var marker = new GMarker(point);
	              map.addOverlay(marker);
	              marker.openInfoWindowHtml(show);
	            }
	          }
	        );
		 }
	})
</script>