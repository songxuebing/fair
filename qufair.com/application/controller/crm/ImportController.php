<?php
class ImportController extends Controller{
	public $Module='crm';
	public $Controller='import';
	public $Action='index';
	public $UserConfig=array();
        
        public function IndexAction(){
                
        }
        public function CategoryAction(){
                ini_set('max_execution_time',30000000);
		// 赋值
		$this->Config=Config::GetConfig();
		$this->Assign('Config',$this->Config);
		$this->UserConfig=Cookie::GetMember('User');
		$this->Assign('UserConfig',$this->UserConfig);
                
		$this->SetView($this->Module.'/common');
		$this->AddView($this->Module.'/'.$this->Controller);
                //直接导入
                $this->LoadResurces('excelreader/reader');
                $data = new Spreadsheet_Excel_Reader();
                $data->setOutputEncoding('utf-8');
                $data->read('category.xls');

                for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
                        for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                                //echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";
                                $row[$i][$j]=$data->sheets[0]['cells'][$i][$j];
                        }
                        //echo "\n";

                }
                die();
                $data=array();
                $x=0;
                $y=0;
                $z=0;
                $this->LoadHelper('goods/GoodsHelper');
                $GoodsHelper=new GoodsHelper();
                foreach($row as $k=>$v){
                    if(!empty($v[1])){
                        $data=array(
                            'parent_id'=>0,
                            'cat_name'=>$v[1]
                        );
                        $x=$GoodsHelper->CatSave($data);
                    }
                    if(!empty($v[2])){
                        $data=array(
                            'parent_id'=>$x,
                            'cat_name'=>$v[2]
                        );
                        $y=$GoodsHelper->CatSave($data);
                    }
                    if(!empty($v[3])){
                        $data=array(
                            'parent_id'=>$y,
                            'cat_name'=>$v[3]
                        );
                        $GoodsHelper->CatSave($data);
                    }
                }
                echo('导入完成');
        }
        //客户分类导入
        public function CuscatAction(){
                ini_set('max_execution_time',30000000);
		// 赋值
		$this->Config=Config::GetConfig();
		$this->Assign('Config',$this->Config);
		$this->UserConfig=Cookie::GetMember('User');
		$this->Assign('UserConfig',$this->UserConfig);
                
		$this->SetView($this->Module.'/common');
		$this->AddView($this->Module.'/'.$this->Controller);
                //直接导入
                $this->LoadResurces('excelreader/reader');
                $data = new Spreadsheet_Excel_Reader();
                $data->setOutputEncoding('utf-8');
                $data->read('category.xls');

                for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
                        for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                                //echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";
                                $row[$i][$j]=$data->sheets[0]['cells'][$i][$j];
                        }
                        //echo "\n";

                }
                $data=array();
                $x=0;
                $y=0;
                $this->LoadHelper('member/MemberListHelper');
                $MemberListHelper=new MemberListHelper();
                foreach($row as $k=>$v){
                    if(!empty($v[1])){
                        $data=array(
                            'parent'=>0,
                            'name'=>$v[1]
                        );
                        $x=$MemberListHelper->CuscatSave($data);
                    }
                    if(!empty($v[2])){
                        $data=array(
                            'parent'=>$x,
                            'name'=>$v[2]
                        );
                        $y=$MemberListHelper->CuscatSave($data);
                    }
                }
                echo('导入完成');
                
        }
        //产品
        public function GoodsAction(){
                ini_set('max_execution_time',30000000);
		// 赋值
		$this->Config=Config::GetConfig();
		$this->Assign('Config',$this->Config);
		$this->UserConfig=Cookie::GetMember('User');
		$this->Assign('UserConfig',$this->UserConfig);
                
		$this->SetView($this->Module.'/common');
		$this->AddView($this->Module.'/'.$this->Controller);
                //直接导入
                $this->LoadResurces('excelreader/reader');
                $data = new Spreadsheet_Excel_Reader();
                $data->setOutputEncoding('utf-8');
                $data->read('goods.xls');

                for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
                        for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                                //echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";
                                $row[$i][$j]=$data->sheets[0]['cells'][$i][$j];
                        }
                        //echo "\n";

                }
                $this->LoadHelper('goods/GoodsHelper');
                $GoodsHelper=new GoodsHelper();
                
                $this->LoadHelper('brand/BrandHelper');
                $BrandHelper=new BrandHelper();
                die();
                foreach($row as $k=>$v){
                    //查找是否有当前的品牌
                    $brand=$BrandHelper->BrandWhere(array('`brand_name` = ?'=>$v[7]));
                    if(empty($brand)){
                        $brand_id=$BrandHelper->Save(array('brand_name'=>$v[7]));
                    }else{
                        $brand_id=$brand['brand_id'];
                    }
                    $data=array(
                        'bn'=>$v[1],
                        'bar_code'=>$v[2],
                        'name'=>$v[3],
                        'unit'=>$v[4],
                        'specifications'=>$v[5],
                        'cat_id'=>0,
                        'brand'=>$v[7],
                        'brand_id'=>$brand_id,
                        'bought_price'=>$v[8],
                        'cost_price'=>$v[9],
                        'wholesale_price'=>$v[10],
                        'agency_price'=>$v[11],
                        'branch_price'=>$v[12],                        
                        'join_price'=>$v[13],
                        'store'=>$v[14]
                    );
                    $GoodsHelper->GoodsSave($data);
                }
                echo('导入完成');
                
        }
       //供应商导入
        public function SupplierAction(){
                ini_set('max_execution_time',30000000);
		// 赋值
		$this->Config=Config::GetConfig();
		$this->Assign('Config',$this->Config);
		$this->UserConfig=Cookie::GetMember('User');
		$this->Assign('UserConfig',$this->UserConfig);
                
		$this->SetView($this->Module.'/common');
		$this->AddView($this->Module.'/'.$this->Controller);
                //直接导入
                $this->LoadResurces('excelreader/reader');
                $data = new Spreadsheet_Excel_Reader();
                $data->setOutputEncoding('utf-8');
                $data->read('supplier.xls');

                for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
                        for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                                //echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";
                                $row[$i][$j]=$data->sheets[0]['cells'][$i][$j];
                        }
                        //echo "\n";

                }
                $this->LoadHelper('purchase/PurchaseHelper');
                $PurchaseHelper=new PurchaseHelper();
                die();
                foreach($row as $k=>$v){
                    //查找分类
                    $category=$PurchaseHelper->SuppcatRow(array('`name` = ?'=>$v[1]));
                    $data=array(
                        'name'=>$v[3],
                        'cat_id'=>empty($category) ? 0 : $category['id'],
                        'number'=>$v[2],
                        'company_tel'=>$v[5],
                        'company_fax'=>$v[6],
                        'contact_name'=>$v[7],
                        'contact_tel'=>$v[8],
                        'contact_fax'=>$v[9]
                    );
                    $PurchaseHelper->SupplierSave($data);
                }
                echo('导入完成');
        }
        //导入客户资料
        public function CustomerAction(){
                ini_set('max_execution_time',30000000);
		// 赋值
		$this->Config=Config::GetConfig();
		$this->Assign('Config',$this->Config);
		$this->UserConfig=Cookie::GetMember('User');
		$this->Assign('UserConfig',$this->UserConfig);
                
		$this->SetView($this->Module.'/common');
		$this->AddView($this->Module.'/'.$this->Controller);
                //直接导入
                $this->LoadResurces('excelreader/reader');
                $data = new Spreadsheet_Excel_Reader();
                $data->setOutputEncoding('utf-8');
                $data->read('cq.xls');
                $cuscat_id=58;
                for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
                        for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                                //echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";
                                $row[$i][$j]=$data->sheets[0]['cells'][$i][$j];
                        }
                        //echo "\n";

                }
                
                $this->LoadHelper('member/MemberListHelper');
                $MemberListHelper=new MemberListHelper();
                
                $this->LoadHelper('member/MemberDetailHelper');
                $MemberDetailHelper=new MemberDetailHelper();
                
                foreach($row as $k=>$v){
                    $rank=unserialize(RANK);
                    foreach($rank as $key=>$val){
                        if($val==$v[7]){
                            $u_rank=$key;
                            break;
                        }
                    }
                    $rnd_code=StringCode::RandomCode(6);
                    $data=array(
                        'cuscat_id'=>$cuscat_id,
                        'username'=>$v[2],
                        'signing'=>$v[1]=='未签约' ? 0 : 1,
                        'password'=>md5(md5('111111').$rnd_code),
                        'salt'=>$rnd_code,
                        'company'=>CORPOTATION,
                        'name'=>$v[3],
                        'mobile'=>$v[4],
                        'fax'=>$v[5],
                        'remark'=>$v[6],
                        'rank'=>$u_rank,
                        'settlement'=>$v[8],
                        'credit_days'=>empty($v[9]) ? 0 : $v[9],
                        'credit_money'=>empty($v[10]) ? 0 : $v[10],
                        'group'=>6,
                        'salesman'=>$v[11]
                        
                    );
                    $MemberDetailHelper->Save($data,TRUE);
                }
                echo('导入完成');
        }
        //
        public function StoreImportAction(){
                die();
                $this->LoadHelper('goods/GoodsHelper');
                $GoodsHelper=new GoodsHelper();
                $this->LoadHelper('store/StoreHelper');
                $StoreHelper=new StoreHelper();
                $goods_data=$GoodsHelper->GoodsWhere(array('`goods_id` > ?'=>0));
                foreach($goods_data as $k=>$v){
                    $data=array();
                    $data[]=array(
                        'product_id'=>$v['goods_id'],
                        'number'=>5000,
                        'explain'=>'初始库存',
                        'house_id'=>1
                    );
                    $StoreHelper->InStore($data);
                }
                echo('初始库存成功');
        }
        //更新客户资料的业务员专用
        public function CustomerSalerAction(){
                die();
                ini_set('max_execution_time',30000000);
                
                $this->LoadHelper('member/MemberListHelper');
                $MemberListHelper=new MemberListHelper();
                
                $this->LoadHelper('member/MemberDetailHelper');
                $MemberDetailHelper=new MemberDetailHelper();
		// 赋值
		$this->Config=Config::GetConfig();
		$this->Assign('Config',$this->Config);
		$this->UserConfig=Cookie::GetMember('User');
		$this->Assign('UserConfig',$this->UserConfig);
                
		$this->SetView($this->Module.'/common');
		$this->AddView($this->Module.'/'.$this->Controller);
                //直接导入
                $this->LoadResurces('excelreader/reader');
                $data = new Spreadsheet_Excel_Reader();
                $data->setOutputEncoding('utf-8');
                $data->read('customer.xls');
                for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
                        for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                                //echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";
                                $row[$i][$j]=$data->sheets[0]['cells'][$i][$j];
                        }
                        //echo "\n";

                }
                $x=0;
                foreach($row as $k=>$v){
                    $saler=$v[11];
                    $customer=$v[2];
                    $cus_member=$MemberListHelper->GetMemberRow(array('`username` = ?'=>$customer));
                    if(!empty($cus_member)){
                        $cus_saler=$MemberListHelper->GetMemberRow(array('`username` = ?'=>$saler,'`group` != ?'=>6));
                        if(!empty($cus_saler)){
                            $MemberDetailHelper->Update(array('salesman'=>$cus_saler['id']), $cus_member['id']);
                            $x++;
                        }else{
                            echo('未找到业务员<br>');
                        }
                    }else{
                        echo('未找到客户<br>');
                    }
                }
                echo $x.'个更新成功<br>';
        }
}