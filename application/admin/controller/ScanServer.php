<?php
// +----------------------------------------------------------------------
// | Description: 采集服务器管理
// +----------------------------------------------------------------------

namespace app\admin\controller;

class ScanServer extends ApiCommon
{
    
    public function index()
    {   
        $scanServerModel = model('scanServer');
        $param = $this->param;
        $data = $scanServerModel->getDataList();
        return resultArray(['data' => $data]);
    }

    public function read()
    {   
        $scanServerModel = model('scanServer');
        $param = $this->param;
        $data = $scanServerModel->getDataById($param['id']);
        if (!$data) {
            return resultArray(['error' => $scanServerModel->getError()]);
        } 
        return resultArray(['data' => $data]);
    }

    public function save()
    {
        $scanServerModel = model('scanServer');

        $param = $this->param;


        $data = $scanServerModel->addTask($param['tid'], $param['wid']);

        if (!$data) {
            return resultArray(['error' => $scanServerModel->getError()]);
        }


        return resultArray(['data' => '添加成功']);
    }

    public function update($id)
    {
        $scanServerModel = model('scanServer');
        $param = $this->param;

        $data = $scanServerModel->updateDataById($param, $param['id']);
        if (!$data) {
            return resultArray(['error' => $scanServerModel->getError()]);
        }
        return resultArray(['data' => '编辑成功']);
    }

    public function delete()
    {
        $scanServerModel = model('scanServer');
        $param = $this->param;
        $data = $scanServerModel->delDataById($param['id'], true);       
        if (!$data) {
            return resultArray(['error' => $scanServerModel->getError()]);
        } 
        return resultArray(['data' => '删除成功']);    
    }

    public function deletes()
    {
        $scanServerModel = model('scanServer');
        $param = $this->param;
        $data = $scanServerModel->delDatas($param['ids'], true);  
        if (!$data) {
            return resultArray(['error' => $scanServerModel->getError()]);
        } 
        return resultArray(['data' => '删除成功']); 
    }

    public function enables()
    {
        $scanServerModel = model('scanServer');
        $param = $this->param;
        $data = $scanServerModel->enableDatas($param['ids'], $param['status'], true);  
        if (!$data) {
            return resultArray(['error' => $scanServerModel->getError()]);
        } 
        return resultArray(['data' => '操作成功']);         
    }
}
 