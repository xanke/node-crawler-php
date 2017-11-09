<?php

namespace app\admin\validate;
use think\Validate;
/**
* 设置模型
*/
class TaskModel extends Validate{

	protected $rule = array(
		'data'   => 'require'
	);
	protected $message = array(
		'data.require'    => '无数据'
	);
}