<?php
     require_once('../frame.php');
	 include('../inc/oracle_data_handler.php');
	 css_include_tag('drd/drd1','thickbox');
	 $ydh = $_POST['ydh'];
	 $hh = $_POST['hh'];
	 $cdate = $_POST['cdate'];
	 $query_type = '0';
	 //echo $ydh;
	 if($cdate){
	 	
	 }else{
	 	if(stripos($ydh,',')>0){
		 	$ydh = explode(',',$ydh);
		 }elseif(stripos($ydh,'，')>0){
		 	$ydh = explode('，',$ydh);
		 }else{
		 	$ydh = array($ydh);
		 }
	 }
	 
	 $count = $cdate ? 1 : count($ydh);
	 if($_POST['dkh'] == 0){
	 	$yd = new ydgz_info_pt();
	 }
	 else{
	 	$yd = new ydgz_info_dkh();
		$query_type = 2;
		$logo_flag = 1;
	 }
	 
	 for($i=0;$i<$count;$i++){
	 	if($cdate){
	 		$yd->get_info($hh,$cdate);	
	 	}else{
	 		$yd->get_info($ydh[$i]);	
	 	}
		if($query_type != 2 && $yd->type == '10000000000000000001'){
			$query_type = 1;
			$logo_flag = 1;
		}
		
		if(!$yd->ydbh){
			echo "<div style='margin-top:20px;line-height:20px; color:red;display:block'><b>找不到相关记录,请重新输入!</b></div>";
			continue;
		}
		if($query_type != 2){
			switch ($yd->type){
				case '20000000000000000001':$logo_flag = 3;$query_type =0;
				break;
				case '30000000000000000001':$logo_flag = 2;$query_type =0;
				break;
			}	
		}
		if($query_type == 0){ ?>
	<div class="yd_box">
		<div class="yd_title <?php echo 'yd_title' .$logo_flag;?>"></div><div style="float:left;line-height:35px;"> <span><b>运单号:<?php echo $yd->ydbh;?></b></span></div>
		<div class="title_box"><b>货物信息</b></div>
		<div class="yd_box_box">
			<table>
				<tr>
					<th width="65">运单标号</th>
					<th width="350">当前位置</th>
					<th>货物状态</th>
				</tr>
				<tr>
					<td><?php echo $yd->ydbh;?></td>
					<td align="center"><?php echo $yd->gpswz;?></td>
					<td><?php echo $yd->ydzt;?></td>
				</tr>
			</table>
		</div>
		<div class="yd_title <?php echo 'yd_title8';?>"><div class="title_box">提货网点联系方式</div></div>	
		<div class="yd_box_box">
			<div class="line">
				提货公司名称：<?php echo $yd->thgsmc; ?>
			</div>
			<div class="line">
				提货公司电话：<?php echo $yd->kfdh; ?>
			</div>
			<div class="line">
				提货公司地址：<?php echo $yd->thgsdz; ?>
			</div>
			<div class="line">
				客服电话号码：<?php echo $yd->kfdh; ?>
			</div>
		</div>			
	</div>			
			
		<?php }
		elseif($query_type == 1 || $query_type == 2){
?>
	<div class="yd_box">
		<div class="yd_title <?php echo 'yd_title' .$logo_flag;?>"></div><div style="float:left;line-height:35px;"> <span><b>运单号:<?php echo $yd->ydbh;?></b></span></div>
		<div class="title_box"><b>货物信息</b></div>
		<div class="yd_box_box">
			<div class="line">
				<div class="l_box">起运地址：<?php echo $yd->qyd; ?></div>
				<div class="l_box">目的地址：<?php echo $yd->mdd; ?></div>
			</div>
			<div class="line">
				<div class="l_box">货物名称：<?php echo $yd->hwmc; ?></div>
				<div class="l_box">包　　装：<?php echo $yd->bz; ?></div>
			</div>
			<div class="line">
				<div class="l_box">重　　量：<?php echo $yd->zl; ?></div>
				<div class="l_box">体　　积：<?php echo $yd->tj; ?></div>
			</div>
			<div class="line">
				<div class="l_box">件　　数：<?php echo $yd->js; ?></div>
				<div class="l_box">提货方式：<?php echo $yd->thfs; ?></div>
			</div>
		</div>
		<div class="yd_title <?php echo 'yd_title' .'8';?>"><div class="title_box">提货网点联系方式</div></div>
		<div class="yd_box_box">
			<div class="line">
				提货公司名称：<?php echo $yd->thgsmc; ?>
			</div>
			<div class="line">
				提货公司电话：<?php echo $yd->kfdh; ?>
			</div>
			<div class="line">
				提货公司地址：<?php echo $yd->thgsdz; ?>
			</div>
			<div class="line">
				客服电话号码：<?php echo $yd->kfdh; ?>
			</div>
		</div>
		<div class="yd_title <?php echo 'yd_title8';?>"><div class="title_box">运单跟踪信息</div></div>
		<div class="yd_box_box">
				<?php 
				$len = count($yd->gzjl);
				for($j=0;$j<$len; $j++){
				?>
				<div class="record">				
					<div class="record_item" style="width:155px;"><?php echo $yd->gzjl[$j][sj]; ?></div>
					<div class="record_item" style="width:60px;"><?php echo $yd->gzjl[$j][gs]; ?></div>
					<div class="record_item" style="width:60px;"><?php echo $yd->gzjl[$j][cp]; ?></div>
					<div class="record_item" style="width:155px;"><?php echo $yd->gzjl[$j][czy]; ?></div>
				</div>
				<?php
				}
				?>
		</div>
	</div>

<?php 
		}
		echo "<div style='display:block;border-bottom:3px dotted #F76300;height:10px;width:100%;float:left'></div>";
} 
	close_oracle_db();
?>