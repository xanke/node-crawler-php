<?php
// +----------------------------------------------------------------------
// | Description: 用户组
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honraytech.com>
// +----------------------------------------------------------------------

namespace app\admin\model;

use app\admin\model\Common;

class Task extends Common 
{
    /**
     * 为了数据库的整洁，同时又不影响Model和Controller的名称
     * 我们约定每个模块的数据表都加上相同的前缀，比如微信模块用weixin作为数据表前缀
     */
	protected $name = 'task';

	/**
	 * [getDataList 获取列表]
	 * @linchuangbin
	 * @DateTime  2017-02-10T21:07:18+0800
	 * @return    [array]                         
	 */
	public function getDataList()
	{
		// $cat = new \com\Category('task', array('id', 'title'));
		// $data = $cat->getList('', 0, 'id');

		$data = model('task') -> select();
		
		return $data;
	}

	public function getDataById($id = '')
	{
		$data = $this->get($id);

		$data['websiteList'] = [];

		if ($data['website_num'] > 0) {
			$websiteList = model('task_website') ->alias('task_website') -> join('website', 'website.id = task_website.wid') -> where(['task_website.tid' => $id]) -> select();
			$data['websiteList'] = $websiteList;
		}

		if (!$data) {
			$this->error = '暂无此数据';
			return false;
		}
		return $data;
	}

}