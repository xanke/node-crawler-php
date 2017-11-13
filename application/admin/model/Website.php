<?php
// +----------------------------------------------------------------------
// | Description: 用户组
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honraytech.com>
// +----------------------------------------------------------------------

namespace app\admin\model;

use app\admin\model\Common;

class Website extends Common 
{
    /**
     * 为了数据库的整洁，同时又不影响Model和Controller的名称
     * 我们约定每个模块的数据表都加上相同的前缀，比如微信模块用weixin作为数据表前缀
     */
	protected $name = 'website';

	/**
	 * [getDataList 获取列表]
	 * @linchuangbin
	 * @DateTime  2017-02-10T21:07:18+0800
	 * @return    [array]                         
	 */
	
	public function getDataById($id = '')
	{
		$data = $this->get($id);




		if (!$data) {
			$this->error = '暂无此数据';
			return false;
		}


		// $data['runle_list'] = [];

		$data['rule_list'] = model('website') ->alias('website') -> join('website_rule', 'website.id = website_rule.wid') -> where(['website_rule.wid' => $id])  -> select();
		
		

		return $data;
	}


	public function getDataList()
	{
		// $cat = new \com\Category('website', array('id', 'title'));
		// $data = $cat->getList('', 0, 'id');

		$data = model('website') -> select();
		
		return $data;
	}
}