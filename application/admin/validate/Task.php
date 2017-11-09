<?php

namespace app\admin\validate;
use think\Validate;
/**
* 设置模型
*/
class Task extends Validate{

	protected $rule = array(
		'title'   => 'require'
	);
	protected $message = array(
		'title.require'    => '标题必须填写'
	);
}