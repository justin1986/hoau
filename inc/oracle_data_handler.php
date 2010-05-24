<?php
	function get_oracle_db() {
		global $oracle_db;
		if(!is_object($oracle_db)){
			$oracle_db = OCILogon('hoau_web', 'wtnt2008', '//10.39.109.1/hydb');
		}
		return $oracle_db;				
	}
	
	function close_oracle_db(){
		global $oracle_db;
		if(is_object($oracle_db)){
			ocilogoff($oracle_db);
		}
	}
	
	
	function query_oracle($sql){
		$db = get_oracle_db();
		if(!$db){
			return false;
		}
		
		$r = oci_parse($db, $sql);
		if ($r === false){
			close_oracle_db();
			return false;
		}
		
		$qresult =  ociexecute($r);
		if ($qresutl === false){
			close_oracle_db();
			unset($r);
			 return false;
		}
		oci_fetch_all($r, $result);
		close_oracle_db();
		unset($r);
		return $result;
	}
	
	function query_oracle_array($sql){
		$db = get_oracle_db();
		if(!$db){
			return false;
		}
		
		$r = oci_parse($db, $sql);
		if ($r === false){
			close_oracle_db();
			return false;
		}
		
		$qresult =  ociexecute($r);
		if ($qresutl === false){
			close_oracle_db();
			return false;
		}
		close_oracle_db();
		return oci_fetch_array($r);
	}
	
	/*
	 * 签约客户登录,如果登录失败,返回false,如果登录成功,返回一个数组,数组第一个元素为"客户名称",第二个字段为判断是否为大客户,1为大客户
	 */
	function kh_login($user, $pwd) {
		#echo "SELECT SFNRDKHGL,KHMC FROM HYDATA.LD_KHXX WHERE SWID='$user' AND MM='$pwd'";
		$r = query_oracle("SELECT KHMC,SFNRDKHGL FROM HYDATA.LD_KHXX WHERE SWID='$user' AND MM='$pwd'");
		if($r=== false || empty($r[KHMC]) ) return false;

		return $r;
	}	
	
	class ydgz_info {
		public $qyd;
		public $mdd;
		public $hwmc;
		public $bz;
		public $zl;
		public $tj;
		public $js;
		public $thfs;		
		public $gzjl = array();
		public $thgsmc;
		public $thgsdh;
		public $thgsdz;
		public $kfdh;
		function get_goods_info(){
			$num = func_num_args();
			if ($num <=0) return false;
			$params = func_get_args();
			$sql = "SELECT a.YD_FCBH,a.CYRQZ,a.TYRQ,a.HH,a.YDBH,a.QYDMC,a.MDDMC,a.SHFS,a.HWMC,a.JS,a.BZBH,a.ZL,a.TJ,a.YDZT,a.FSZT,a.DHCDH,b.GSJC,b.DH,b.ZS, c.GSJC as GPSWZ FROM HYDATA.LD_YD a LEFT JOIN HYDATA.LD_GS b ON a.MDDZBH=b.GSBH LEFT JOIN HYDATA.LD_GS c on a.YDWZ = c.GSBH";
			//$sql = "SELECT * FROM "
			if($num==1){
				//根据运单编号查询			
				$sql .= " WHERE YDBH='{$params[0]}'";
			}else if($num == 2){
				//$a = explode('-', $params[0]);
				$sql .= " WHERE HH='{$params[0]}' AND to_char(TYRQ,'yyyy-mm-dd') = '{$params[1]}'";
			}
			//echo $sql;
			$ret = query_oracle($sql);
			if($ret === false || count($ret)<= 0) return false;
			$this->thfs = $ret[SHFS][0];
			$this->thgsmc = iconv('GBK','UTF-8',$ret[GSJC][0]);
			$this->qyd = iconv('GBK','UTF-8',$ret[QYDMC][0]);
			$this->mdd = iconv('GBK','UTF-8',$ret[MDDMC][0]);
			$this->hwmc = iconv('GBK','UTF-8',$ret[HWMC][0]);
			$this->bz = iconv('GBK','UTF-8',$ret[BZBH][0]);
			$this->zl = $ret[ZL][0];
			$this->tj = $ret[TJ][0];
			$this->js = $ret[JS][0];
			$this->thgsdh = $ret[DHCDH][0];
			$this->thgsdz = iconv('GBK','UTF-8',$ret[ZS][0]);
			$this->kfdh = $ret[DH][0];
			$this->ydbh = $ret[YDBH][0];
			$this->type = iconv('GBK','UTF-8',$ret[CYRQZ][0]);
			$this->fcbh = $ret[YD_FCBH][0];
			$this->ydzt = $this->translate_ydzt($ret[YDZT][0]);
			//$tmp = query_oracle_array("SELECT * from HYDATA.LD_GPSJL where FCBH='{$this->fcbh}' order by JLBH DESC");
			$this->gpswz = iconv('GBK','UTF-8',$ret[GPSWZ][0]);
			//echo $ret[TYRQ][0];
			return $ret[YDBH][0];
		}
		function translate_ydzt($state){
			switch ($state) {
				case 0:$ret = '在途';
				break;
				case 1:$ret = '在库';
				break;
				case 2:$ret = '送达';
				break;
				case 3:$ret = '呆货';
				break;
				case 4:$ret = '死货';
				break;
				case 5:$ret = '注销';
				break;
				case 6:$ret = '异常';
				break;
				case 7:$ret = '已提走';
				break;
				case 8:$ret = '提货中';
				break;
				case 9:$ret = '送货中';
				break;
				default:
					$ret = '未知';
				break;
			}
			return $ret;
		}
		function get_info() {
			$num = func_num_args();
			if ($num == 1){
				$param1 = func_get_arg(0);
				$ydbh = $this->get_goods_info($param1);
			}else if($num == 2){
				$param1 = func_get_arg(0);
				$param2 = func_get_arg(1);
				$ydbh = $this->get_goods_info($param1,$param2);				
			}
			if($ydbh){
				$this->_get_info($ydbh);			
			}
		    $ret = query_oracle($sql);
			if($ret === false || count($ret)<= 0) return false;
		}
		
	}
	
	class dkh_yd {
		public $ydbh;
		public $js;
		public $tj;
		public $hwmc;
		public $qydmc;
		public $mmdmc;
		public $tyrq;
		public $tyrmc;
		public $tyrbh;
		public $tyrlxdy1;
		public $tyrdz;
		public $shrmc;
		public $shrlxr;
		public $shrlxdy1;
		public $shrdz;
		public $khddh;
		public $gzhjdyid;
		public $rq;
		public $czr;
		public $sm;
		public $gsjc;
		public $ssjtgs;
		public $dsfkhbh;
		function get_info(){
			$num = func_num_args();
			if ($num <=0) return false;
			$params = func_get_args();
			$sql = "select * from hydata.ld_yd_dkh";
			if($params[0]==1){
				$sql .= " where YDBH=".$params[1];
			}else{
				$sql .= " where KHDDH=".$params[1];
			}
		}
	}
	
	class ydgz_info_pt extends ydgz_info{
		function _get_info($bh) {	
			$tmp1 = query_oracle("SELECT * FROM HYDATA.LD_YDGZJLNEW WHERE YDBH='{$bh}'");
			$tmp1 = iconv('GBK','UTF-8',$tmp1[GZNR][0]);			
			$array1 = explode(chr(10),$tmp1);
			$this->gzjl = array();
			$record_name = array('sj','gs','cp','czy');
			foreach ($array1 as $v) {
				$items = explode('	',$v);
				@array_push($this->gzjl, array_combine($record_name, $items));
			}
		}

	}
	
	class ydgz_info_dkh extends ydgz_info{
		function _get_info($bh) {
			$this->gzjl = array();
			//$this->gzjl = query_oracle("SELECT * FROM LD_YDGZJL_DKH WHERE YDBH={$bh}");
			$sql = "select to_char(rq,'yyyy-mm-dd hh:mi:ss') as rq,gzhjdyid,gsjc,czr from hydata.ld_dkh_cx_v where ydbh='{$bh}'";
			//echo $sql;
			$a = query_oracle($sql);
			$len = count($a[RQ]);
			for($i=0;$i < $len ;$i++){
				array_push($this->gzjl, array('rq' => $a[RQ][$i] ,'gzhjdyid' => iconv('GBK','UTF-8',$a[GZHJDYID][$i]),'gsjc' => iconv('GBK','UTF-8',$a[GSJC][$i]),'czy' => iconv('GBK','UTF-8',$a[CZY][$i])));
			}
		}
	}
?>
