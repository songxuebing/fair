<?php
// amespace Library\DataBaseClass;
class DataBase{
	public $_Config=array();
	public $_Db=array();
	public $_Link=array();
	public function __construct(){
		$this->_Config=Config::GetDb();
		if(empty($this->_Link['slave'])){
			$this->Connect('slave');
		}
	}
	public function Connect($choose='slave'){
		$Function=$this->_Config[$choose]['type']."_Class";
		$this->_Db[$choose]=new $Function();
		$this->_Link[$choose]=$this->_Db[$choose]->Connect($this->_Config[$choose]);
		if(!empty($this->_Db[$choose]->_Error)){
			ErrorMsg::Debug("Can't connect to MySQL Server. Errorcode:".$this->_Db[$choose]->_Error);
		}
		$Version=$this->_Db[$choose]->FetchRow("SELECT version() AS v");
		if(!empty($this->_Db[$choose]->_Error)){
			ErrorMsg::Debug("Can't version to MySQL Server. Errorcode:".$this->_Db[$choose]->_Error);
		}
		if($Version['v']>'4.1'){
			$this->Query("SET NAMES '".$this->_Config[$choose]['charset']."'");
		}
		if(!empty($this->_Db[$choose]->_Error)){
			ErrorMsg::Debug("Can't SET NAMES to MySQL Server. Errorcode:".$this->_Db[$choose]->_Error);
		}
		if($Version['v']>'5.0'){
			$this->Query("SET sql_mode='NO_AUTO_VALUE_ON_ZERO,NO_ENGINE_SUBSTITUTION,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
			if(!empty($this->_Db[$choose]->_Error)){
				ErrorMsg::Debug("Can't SET sql_mode to MySQL Server. Errorcode:".$this->_Db[$choose]->_Error);
			}
			// $this->db->query("SET sql_mode='REAL_AS_FLOAT,STRICT_TRANS_TABLES'");
			// $this->db->query("SET sql_mode='NO_AUTO_VALUE_ON_ZERO,REAL_AS_FLOAT,STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
			$this->Query("SET character_set_client='".$this->_Config[$choose]['charset']."',character_set_connection='".$this->_Config[$choose]['charset']."',character_set_results='".$this->_Config[$choose]['charset']."'");
			if(!empty($this->_Db[$choose]->_Error)){
				ErrorMsg::Debug("Can't SET character to MySQL Server. Errorcode:".$this->_Db[$choose]->_Error);
			}
		}
		$this->Query("SET sql_mode='NO_AUTO_VALUE_ON_ZERO,NO_ENGINE_SUBSTITUTION,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
		if(!empty($this->_Db[$choose]->_Error)){
			ErrorMsg::Debug("Can't SET sql_mode to MySQL Server. Errorcode:".$this->_Db[$choose]->_Error);
		}
	}
	public function Query($sql,$choose='slave'){
		if(empty($this->_Link[$choose])){
			$this->Connect($choose);
		}
		$Query=$this->_Db[$choose]->Query($sql);
		if(!empty($this->_Db[$choose]->_Error)){
			ErrorMsg::Debug("Can't query MySQL Server. Errorcode:".$this->_Db[$choose]->_Error);
		}
		return $Query;
	}
	public function FetchOne($table,$where=null,$fields='COUNT(1)',$output=false){
		$sql=$this->select($table,$fields,$where,'1');
		if($output==true){return $sql;}
		$Row=$this->_Db['slave']->FetchRow($sql);
		if(!empty($this->_Db['slave']->_Error)){
			ErrorMsg::Debug("Can't fetch one MySQL Server. Errorcode:".$this->_Db['slave']->_Error);
		}
		return empty($Row[$fields]) ? $Row[0] : $Row[$fields];
	}
	public function FetchOneRow($table,$where=null,$fields='*',$output=false){
		$sql=$this->select($table,$fields,$where,'1');
		if($output==true){return $sql;}
		$Row=array();
		$Row=$this->_Db['slave']->FetchRow($sql);
		if(!empty($this->_Db['slave']->_Error)){
			ErrorMsg::Debug("Can't fetch all MySQL Server. Errorcode:".$this->_Db['slave']->_Error);
		}
		return $Row;
	}
        
	public function FetchRow($table,$fields='*',$where=null,$group=null,$order=null,$output=false){
		$sql=$this->select($table,$fields,$where,'1',$group,$order);
		if($output==true){return $sql;}
		$Row=array();
		$Row=$this->_Db['slave']->FetchRow($sql);
		if(!empty($this->_Db['slave']->_Error)){
			ErrorMsg::Debug("Can't fetch all MySQL Server. Errorcode:".$this->_Db['slave']->_Error);
		}
		return $Row;
	}
	public function FetchAll($table,$fields='*',$where=null,$limit=null,$group=null,$order=null,$output=false){
		$sql=$this->select($table,$fields,$where,$limit,$group,$order);
		if($output==true){return $sql;}
		$Row=$this->_Db['slave']->FetchAll($sql);
		if(!empty($this->_Db['slave']->_Error)){
			ErrorMsg::Debug("Can't fetch all MySQL Server. Errorcode:".$this->_Db['slave']->_Error);
		}
		return $Row;
	}
        public function FetchQuery($sql){
                $Row=$this->_Db['slave']->FetchAll($sql);
		if(!empty($this->_Db['slave']->_Error)){
			ErrorMsg::Debug("Can't fetch all MySQL Server. Errorcode:".$this->_Db['slave']->_Error);
		}
		return $Row;
        }
	public function select($table,$fields='*',$where=null,$limit=null,$group=null,$order=null){
		$sql='SELECT';
		if(!empty($fields)){
			$sql.=' '.$this->FieldsJoin($fields);
		}else{
			$fields='* ';
		}
		$sql.=" FROM `".$this->_Config['slave']['prcode']."{$table}`";
		if(!empty($where)){
			$sql.=' WHERE '.$this->WhereJoin($where);
		}
		if(!empty($group)){
			$sql.=' GROUP BY '.$this->GroupJoin($group);
		}
		if(!empty($order)){
			$sql.=' ORDER BY '.$this->OrderJoin($order);
		}
		if(!empty($limit)){
			$sql.=' LIMIT '.$this->LimitJoin($limit);
		}
		return $sql;
	}
	public function insert($table,$row,$returnid=false,$output=false){
		// foreach($row AS $key=>$value){
		// $row[addslashes($key)] = addslashes($value);
		// }
		if(empty($this->_Link['master'])){
			$this->Connect('master');
		}
		$sql="INSERT INTO `".$this->_Config['master']['prcode']."{$table}` (`".implode('`,`',array_keys($row))."`) VALUES('".implode("','",array_values($row))."')";
		if($output==true){return $sql;}
		$Query=$this->_Db['master']->insert($sql);
		if(!empty($this->_Db['master']->_Error)){
			ErrorMsg::Debug("Can't insert MySQL Server. Errorcode:".$this->_Db['master']->_Error);
		}
		if($returnid==true){return $this->_Db['master']->GetInsertId();}
		return $Query;
	}
	public function replace($table,$row,$returnid=false,$output=false){
		// foreach($row AS $key=>$value){
		// $row[addslashes($key)] = addslashes($value);
		// }
		if(empty($this->_Link['master'])){
			$this->Connect('master');
		}
		$sql="REPLACE INTO `".$this->_Config['master']['prcode']."{$table}` (`".implode('`,`',array_keys($row))."`) VALUES('".implode("','",array_values($row))."')";
		if($output==true){return $sql;}
		$Query=$this->_Db['master']->insert($sql);
		if(!empty($this->_Db['master']->_Error)){
			ErrorMsg::Debug("Can't insert MySQL Server. Errorcode:".$this->_Db['master']->_Error);
		}
		if($returnid==true){return $this->_Db['master']->GetInsertId();}
		return $Query;
	}
	public function update($table,$row,$where,$output=false){
		if(empty($this->_Link['master'])){
			$this->Connect('master');
		}
		$sql="UPDATE `".$this->_Config['master']['prcode']."{$table}` SET ";
		if(is_array($row)){
			$r=array();
			foreach($row as $key=>$value){
				// $r[] = "`".addslashes($key)."`='".addslashes($value)."'";
				$r[]="`{$key}`='{$value}'";
			}
			$sql.=implode(',',$r);
		}
		if(!empty($where)){
			$sql.=' WHERE '.$this->WhereJoin($where);
		}
		if($output==true){return $sql;}
		$Query=$this->_Db['master']->update($sql);
		if(!empty($this->_Db['master']->_Error)){
			ErrorMsg::Debug("Can't insert MySQL Server. Errorcode:".$this->_Db['master']->_Error);
		}
		return $Query;
	}
	public function delete($table,$where,$output=false){
		if(empty($this->_Link['master'])){
			$this->Connect('master');
		}
		$sql="DELETE FROM `".$this->_Config['master']['prcode']."{$table}`";
		if(!empty($where)){
			$sql.=' WHERE '.$this->WhereJoin($where);
		}
		if($output==true){return $sql;}
		$Query=$this->_Db['master']->delete($sql);
		if(!empty($this->_Db['master']->_Error)){
			ErrorMsg::Debug("Can't insert MySQL Server. Errorcode:".$this->_Db['master']->_Error);
		}
		return $Query;
	}
	public function Close($choose='slave'){
		$this->_Db[$choose]->Close();
		if(!empty($this->_Db[$choose]->_Error)){
			ErrorMsg::Debug("Can't close MySQL Server. Errorcode:".$this->_Db[$choose]->_Error);
		}
	}
	public function FieldsJoin($fields){
		$f=array();
		if(is_array($fields)){
			foreach($fields as $key=>$value){
				if(is_string($key)){
					$f[]="`{$value}`.`{$key}`";
				}else{
					$f[]=$this->FieldsJoin($value);
				}
			}
		}else if(preg_match('/^(.*?\(.*?\))\s+AS\s+(.+)$/i',$fields,$match)){
			$f[]="{$match[1]} AS `{$match[2]}`";
		}else if(preg_match('/^(.+)\s+AS\s+(.+)$/i',$fields,$match)){
			$f[]="`{$match[1]}` AS `{$match[2]}`";
		}else if(preg_match('/^.*?\(.*?\)$/i',$fields,$match)){
			$f[]=$fields;
		}else if($fields=='*'){
			$f[]=$fields;
		}else{
			$f[]="`{$fields}`";
		}
		return implode(",",$f);
	}
	public function WhereJoin($where){
		$w=array();
		if(is_array($where)){
			foreach($where as $key=>$value){
				if(is_array($value)){
					$w[]='('.preg_replace('/(\?)/i',"'".implode("','",$value)."'",$key).')';
				}else{
					$w[]='('.preg_replace('/(\?)/i',"'".$value."'",$key).')';
				}
			}
		}else{
			$w[]="({$where})";
		}
		return implode(" AND ",$w);
	}
	public function GroupJoin($group){
		$g=array();
		if(is_array($group)){
			foreach($group as $key=>$value){
				if(is_string($key)){
					if(strstr($group,'`')){
						$g[]="{$value}.{$key}";
					}else{
						$g[]="`{$value}`.`{$key}`";
					}
				}else{
					$g[]=$this->GroupJoin($value);
				}
			}
		}else{
			if(strstr($group,'`')){
				$g[]=$group;
			}else{
				$g[]="`{$group}`";
			}
		}
		return implode(",",$g);
	}
	public function OrderJoin($order){
		$o=array();
		if(is_array($order)){
			foreach($order as $key=>$value){
				if(is_string($key)){
					if(preg_match('/^(.+)\s+(DESC|ASC)$/i',$key,$match)){
						if(strstr($match[1],'`')){
							$o[]="`{$value}`.{$match[1]} {$match[2]}";
						}else{
							$o[]="`{$value}`.`{$match[1]}` {$match[2]}";
						}
					}else{
						if(strstr($value,'`')){
							$o[]="{$value}.{$key}";
						}else{
							$o[]="`{$value}`.{$key}";
						}
					}
				}else{
					$o[]=$this->OrderJoin($value);
				}
			}
		}else{
			if(preg_match('/^(.+)\s+(DESC|ASC)$/i',$order,$match)){
				if(strstr($match[1],'`')){
					$o[]="{$match[1]} {$match[2]}";
				}else{
					$o[]="`{$match[1]}` {$match[2]}";
				}
			}else{
				if(strstr($order,'`')){
					$o[]=$order;
				}else{
					$o[]="`{$order}`";
				}
			}
		}
		return implode(",",$o);
	}
	public function LimitJoin($limit){
		$page=empty($limit[0]) ? '1' : intval($limit[0]);
		$rowCount=empty($limit[1]) ? 1 : intval($limit[1]);
		return ($rowCount*($page-1)).','.$rowCount;
	}
}
class mysql_Class{
	var $_Link;
	var $_Error;
	public function Connect($db){
		// $this->_Link = mysqli("{$db['host']}:{$db['port']}",$db['user'],$db['password'],$db['dbname']);
		$this->_Link=mysql_connect("{$db['host']}:{$db['port']}",$db['user'],$db['password']);
		mysql_select_db($db['dbname']);
		if(mysql_errno()){
			$this->_Error=mysql_error();
		}
		return $this->_Link;
	}
	public function Query($sql){
		$Query=mysql_query($this->_Link,$sql);
		if(mysql_errno()){
			$this->_Error=mysql_error();
		}
		return $Query;
	}
	public function GetInsertId(){
		return mysql_insert_id($this->_Link);
	}
	public function FetchRow($sql){
		$Row=array();
		if(false!=($Query=$this->Query($sql))){
			if(false!=($Row=mysql_fetch_assoc($Query))){
				mysql_free_result($Query);
			}
			if(mysql_errno()){
				$this->_Error=mysql_error();
			}
		}
		return $Row;
	}
	public function FetchAll($sql){
		$Row=array();
		if(false!=($Query=$this->Query($sql))){
			while(false!=($value=mysql_fetch_assoc($Query))){
				$Row[]=$value;
			}
			mysql_free_result($Query);
			if(mysql_errno()){
				$this->_Error=mysql_error();
			}
		}
		return $Row;
	}
	public function insert($sql){
		return $this->Query($sql);
	}
	public function update($sql){
		return $this->Query($sql);
	}
	public function delete($sql){
		return $this->Query($sql);
	}
	public function Close($sql){
		mysql_close($this->_Link);
		if(mysql_errno()){
			$this->_Error=mysql_error();
		}
	}
}
class mysqli_Class{
	var $_Link;
	var $_Error;
	public function Connect($db){
		// $this->_Link = mysqli("{$db['host']}:{$db['port']}",$db['user'],$db['password'],$db['dbname']);
		$this->_Link=mysqli_connect("{$db['host']}:{$db['port']}",$db['user'],$db['password'],$db['dbname'],$db['port'],$db['pconnect']);
		if(mysqli_connect_errno()){
			$this->_Error=mysqli_connect_error();
		}
		return $this->_Link;
	}
	public function Query($sql){
		$Query=mysqli_query($this->_Link,$sql);
		if(mysqli_connect_errno()){
			$this->_Error=mysqli_connect_error();
		}
		return $Query;
	}
	public function GetInsertId(){
		return mysqli_insert_id($this->_Link);
	}
	public function FetchRow($sql){
		$Row=array();
		if(false!=($Query=$this->Query($sql))){
			if(false!=($Row=mysqli_fetch_assoc($Query))){
				mysqli_free_result($Query);
			}
			if(mysqli_connect_errno()){
				$this->_Error=mysqli_connect_error();
			}
		}
		return $Row;
	}
	public function FetchAll($sql){
		$Row=array();
		if(false!=($Query=$this->Query($sql))){
			while(false!=($value=mysqli_fetch_assoc($Query))){
				$Row[]=$value;
			}
			mysqli_free_result($Query);
			if(mysqli_connect_errno()){
				$this->_Error=mysqli_connect_error();
			}
		}
		return $Row;
	}
	public function insert($sql){
		return $this->Query($sql);
	}
	public function update($sql){
		return $this->Query($sql);
	}
	public function delete($sql){
		return $this->Query($sql);
	}
	public function Close($sql){
		mysqli_close($this->_Link);
		if(mysqli_connect_errno()){
			$this->_Error=mysqli_connect_error();
		}
	}
}
class pdo_mysql_Class{
	var $_Link;
	var $_Error;
	public function Connect($db){
		$this->_Link=new PDO("mysql:type={$db['type']};host={$db['host']};dbname={$db['dbname']};prcode={$db['prcode']};pconnect={$db['pconnect']};port={$db['port']};charset={$db['charset']}",$db['user'],$db['password'],array(
			'1002' => "SET NAMES '{$db['charset']}'"
		));
		$this->_Link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $this->_Link;
	}
	public function Query($sql,$mod="query"){
		if($mod!='query'){
			$Query=$this->_Link->$mod($sql);
		}else{
			$Query=$this->_Link->$mod($sql);
			$Query->setFetchMode(PDO::FETCH_BOTH);
		}
		return $Query;
	}
	public function GetInsertId(){
		return $this->_Link->lastInsertId();
	}
	public function FetchRow($sql){
		$Query=$this->Query($sql);
		$Row=$Query->fetch();
		return empty($Row) ? array() : $Row;
	}
	public function FetchAll($sql){
		$Query=$this->Query($sql);
		$Row=$Query->fetchAll();
		return empty($Row) ? array() : $Row;
	}
	public function insert($sql){
		return $this->Query($sql,'query');
	}
	public function update($sql){
		return $this->Query($sql,'exec');
	}
	public function delete($sql){
		return $this->Query($sql,'exec');
	}
	public function Close($sql){
		$this->_Link=null;
	}
}