<?php

namespace app\admin\validate;
use think\Validate;
/**
* 设置模型
*/
class TaskWebsite extends Validate{

	protected $rule = array(
		'wid'   => 'require',
		'tid'   => 'require'
	);
	protected $message = array(
		'wid.require'    => '缺少wid',
		'tid.require'    => '缺少tid'
	);
}