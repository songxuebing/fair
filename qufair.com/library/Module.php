<?php
// amespace Library\ModuleClass;
class Module{
	/**
     * @since 13-10-23
     * @author zhang
     * @desc
     * rule:
     * model写法：
     * 获取内容的函数前面添加get
     * 更新内容的函数前面添加update
     * 删除内容的函数前面添加delete
     * 如有其他，请往这里添加
     * 
     * @var unknown_type  */
	static $DB;
	public $Db;
	protected $_table;
	public function __construct(){
		if(empty(self::$DB)){
			self::$DB=new DataBase();
		}
		$this->Db=self::$DB;
	}
	/**
     * @desc 添加一条记录
     * 
     * @param string $table
     * @param array $addField
     * @return int
     *   */
	public function add($addField){
		return $this->Db->insert($this->_table,$addField,true);
	}
	/**
     * @desc 更新一条记录
     * 
     * @param string $table
     * @param array $editField
     * @param array $where
     * @return int
     *   */
	public function update($editField,$where){
		return $this->Db->update($this->_table,$editField,$where);
	}
	/**
     * @desc 删除一条记录
     * 
     * @param string $table
     * @param array $where 
     * @return int
     *  */
	public function delete($where){
		return $this->Db->delete($this->_table,$where);
	}
	/*
	 * 分页查询数据
	* @RETURN array 单条数据数组
	*/
	public function getList($fields='*',$where=null,$limit=null,$group=null,$order=null,$output=false){
		return $this->Db->FetchAll($this->_table,$fields,$where,$limit,$group,$order,$output);
	}
	/*
     * 获取单条信息详情
     * @RETURN array 单条数据数组
     */
	public function getOneRow($fields="*",$where=null){
		if(empty($where)){return array();}
		return $this->Db->FetchOneRow($this->_table,$where,$fields,$output=false);
	}
	/*
     * 根据条件获取数据条数
     * @return int 条数
     */
	public function getRowCount($where=array()){
		if(empty($where)){return array();}
		return $this->Db->FetchOne($this->_table,$where);
	}
}