<?php

namespace app\admin\validate;
use think\Validate;
/**
* 设置模型
*/
class ScanData extends Validate{

	protected $rule = array(
		// 'url'   => 'require'
	);
	protected $message = array(
		// 'url.require'    => 'Url必须填写'
	);
}