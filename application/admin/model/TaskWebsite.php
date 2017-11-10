<?php
// +----------------------------------------------------------------------
// | Description: 用户组
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honraytech.com>
// +----------------------------------------------------------------------

namespace app\admin\model;

use app\admin\model\Common;

class TaskWebsite extends Common 
{
    /**
     * 为了数据库的整洁，同时又不影响Model和Controller的名称
     * 我们约定每个模块的数据表都加上相同的前缀，比如微信模块用weixin作为数据表前缀
     */
	protected $name = 'task_website';

	/**
	 * [getDataList 获取列表]
	 * @linchuangbin
	 * @DateTime  2017-02-10T21:07:18+0800
	 * @return    [array]                         
	 */
	public function getDataList()
	{
		// $cat = new \com\Category('website', array('id', 'title'));
		// $data = $cat->getList('', 0, 'id');

		$data = $this -> select();
		
		return $data;
	}


	public function addTask($tid, $wid) {

		$param = [
			'tid' => $tid,
			'wid' => $wid
		];

		$data = $this -> where($param) -> find();

		if (!$data) {
			$this -> createData($param);

			//数据递增
			model('task') -> where(['id' => $tid]) ->setInc('website_num', 1);
		}

		return true;
	}
}