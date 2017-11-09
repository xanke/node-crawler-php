<?php
// +----------------------------------------------------------------------
// | Description: 用户组
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honraytech.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;

class Tasks extends ApiCommon
{
    
    public function index()
    {   
        $taskModel = model('Task');
        $param = $this->param;
        $data = $taskModel->getDataList();
        return resultArray(['data' => $data]);
    }

    public function read()
    {   
        $taskModel = model('Task');
        $param = $this->param;
        $data = $taskModel->getDataById($param['id']);
        if (!$data) {
            return resultArray(['error' => $taskModel->getError()]);
        } 
        return resultArray(['data' => $data]);
    }

    public function save()
    {
        $taskModel = model('Task');
        $param = $this->param;



        $data = $taskModel->createData($param);
        if (!$data) {
            return resultArray(['error' => $taskModel->getError()]);
        } 
        return resultArray(['data' => '添加成功']);
    }

    public function update($id)
    {
        $taskModel = model('Task');
        $param = $this->param;

        $data = $taskModel->updateDataById($param, $param['id']);
        if (!$data) {
            return resultArray(['error' => $taskModel->getError()]);
        } 
        return resultArray(['data' => '编辑成功']);
    }

    public function delete()
    {
        $taskModel = model('Task');
        $param = $this->param;
        $data = $taskModel->delDataById($param['id'], true);       
        if (!$data) {
            return resultArray(['error' => $taskModel->getError()]);
        } 
        return resultArray(['data' => '删除成功']);    
    }

    public function deletes()
    {
        $taskModel = model('Task');
        $param = $this->param;
        $data = $taskModel->delDatas($param['ids'], true);  
        if (!$data) {
            return resultArray(['error' => $taskModel->getError()]);
        } 
        return resultArray(['data' => '删除成功']); 
    }

    public function enables()
    {
        $taskModel = model('Task');
        $param = $this->param;
        $data = $taskModel->enableDatas($param['ids'], $param['status'], true);  
        if (!$data) {
            return resultArray(['error' => $taskModel->getError()]);
        } 
        return resultArray(['data' => '操作成功']);         
    }
}
 