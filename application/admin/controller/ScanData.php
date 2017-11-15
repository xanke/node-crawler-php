<?php
// +----------------------------------------------------------------------
// | Description: 用户组
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honraytech.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;

class ScanData extends ApiCommon
{
    
    public function index()
    {   
        $scanDataModel = model('ScanData');
        $param = $this->param;

        $where = [];
        if (!empty($param['wid'])) {
            $where['wid'] = $param['wid'];
        }

        if (!empty($param['oid'])) {
            $where['oid'] = $param['oid'];
        }


        $page     = !empty($param['page']) ? $param['page']: '';
        $limit    = !empty($param['limit']) ? $param['limit']: '';

        $data = $scanDataModel->getDataList($where, $page, $limit);
        return resultArray(['data' => $data]);
    }

    public function read()
    {   
        $scanDataModel = model('ScanData');
        $param = $this->param;
        $data = $scanDataModel->getDataById($param['id']);
        if (!$data) {
            return resultArray(['error' => $scanDataModel->getError()]);
        } 
        return resultArray(['data' => $data]);
    }

    public function save()
    {
        $scanDataModel = model('ScanData');

        $param = $this->param;
        $data = $param['data'];

        $where = [];
        $qData = [];

        foreach ($data as $key => $value) {
            array_push($where, $value['url']);
            $qData[$value['url']] = $value;
        }

        $where = implode('" or url="', $where);
        $where = 'url="' . $where . '"';
        $sql = $scanDataModel -> where($where) -> select();

        //去除重复
        foreach ($sql as $key => $value) {
            unset($qData[$value['url']]);
        }

        //插入所有数据 
        $sql = $scanDataModel -> insertAll( $qData );

        // if (!$sql) {
        //     return resultArray(['data' => $res]);
        //     // return resultArray(['error' => '未增加']);
        // }

        $wid = $param['wid'];

        $websiteModel = model('Website');
        $data = $websiteModel -> updateDataById(['run_time' => time()], $wid);

 
        $res = [
            'arr' => $qData,
            'add' => $sql,
            'msg' => '添加成功'
        ];

        return resultArray(['data' => $res]);
    }

    //采集统计操作
    public function count($id) 
    {
        $param = $this->param;
        $scanDataModel = model('ScanData');
        $data = $scanDataModel -> countById($param['id']);


        $websiteModel = model('Website');
        $wData = $websiteModel -> updateDataById($data, $param['id']);

        if (!$wData) {
            return resultArray(['error' => $websiteModel->getError()]);
        }

        if (!$data) {
            return resultArray(['error' => $scanDataModel->getError()]);
        }
        return resultArray(['data' => $data]);
    }

    public function update($id)
    {
        $scanDataModel = model('ScanData');
        $param = $this->param;

        $data = $scanDataModel->updateDataById($param, $param['id']);
        if (!$data) {
            return resultArray(['error' => $scanDataModel->getError()]);
        }
        return resultArray(['data' => '编辑成功']);
    }

    public function delete()
    {
        $scanDataModel = model('ScanData');
        $param = $this->param;
        $data = $scanDataModel->delDataById($param['id'], true);       
        if (!$data) {
            return resultArray(['error' => $scanDataModel->getError()]);
        } 
        return resultArray(['data' => '删除成功']);    
    }

    public function deletes()
    {
        $scanDataModel = model('ScanData');
        $param = $this->param;
        $data = $scanDataModel->delDatas($param['ids'], true);  
        if (!$data) {
            return resultArray(['error' => $scanDataModel->getError()]);
        } 
        return resultArray(['data' => '删除成功']); 
    }

    public function enables()
    {
        $scanDataModel = model('ScanData');
        $param = $this->param;
        $data = $scanDataModel->enableDatas($param['ids'], $param['status'], true);  
        if (!$data) {
            return resultArray(['error' => $scanDataModel->getError()]);
        } 
        return resultArray(['data' => '操作成功']);         
    }
}
 