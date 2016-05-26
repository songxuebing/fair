<?php
// amespace Library\CallbackClass;
class Callback{
	public static function JavaScriptPacker($matches){
		$packer=new JavaScriptPacker($matches[2],'Normal',true,false);
		return "<script{$matches[1]}>".$packer->pack()."</script>";
	}
	public static function EvalCode($matches){
		return eval($matches[1]);
	}
}