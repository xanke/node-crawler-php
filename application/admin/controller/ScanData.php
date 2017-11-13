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
        $data = $scanDataModel->getDataList();
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

        foreach ($sql as $key => $value) {
            unset($qData[$value['url']]);
        }




 
        $sql = $scanDataModel -> insertAll( $qData );

        if (!$sql) {
            return resultArray(['error' => '未增加']);
        }
 
        $res = [
            'arr' => $qData,
            'add' => $sql,
            'msg' => '添加成功'
        ];



        return resultArray(['data' => $res]);
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
 