<?php
// +----------------------------------------------------------------------
// | Description: 用户组
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honraytech.com>
// +----------------------------------------------------------------------

namespace app\admin\model;

use app\admin\model\Common;

class ScanData extends Common 
{
    /**
     * 为了数据库的整洁，同时又不影响Model和Controller的名称
     * 我们约定每个模块的数据表都加上相同的前缀，比如微信模块用weixin作为数据表前缀
     */
	protected $name = 'ScanData';
	/**
	 * [getDataList 获取列表]
	 * @linchuangbin
	 * @DateTime  2017-02-10T21:07:18+0800
	 * @return    [array]                         
	 */
	public function getDataList($where, $page = 0, $limit = 30)
	{
		// $cat = new \com\Category('ScanData', array('id', 'title'));
		// $data = $cat->getList('', 0, 'id');
		$data = model('ScanData') -> where($where) -> page($page, $limit) -> select();
		
		return $data;
	}

	public function countById($id) {

		$count = model('ScanData') -> where(['wid' => $id]) -> count();
		$sync = model('ScanData') -> where(['wid' => $id, 'sync' => 1]) -> count();

		$data = [
			'scan_num' => $count,
			'sync_num'  => $sync,
		];
		return $data;
	}


}