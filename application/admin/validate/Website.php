<?php

namespace app\admin\validate;
use think\Validate;
/**
* 设置模型
*/
class Website extends Validate{

	protected $rule = array(
		'title'   => 'require',
		'url'     => 'require'
	);
	protected $message = array(
		'title.require'    => '标题必须填写',
		'url.require'      => 'Url必须填写'
	);
}