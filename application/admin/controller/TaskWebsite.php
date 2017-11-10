<?php
// +----------------------------------------------------------------------
// | Description: 用户组
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honraytech.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;

class TaskWebsite extends ApiCommon
{
    
    public function index()
    {   
        $taskWebsiteModel = model('TaskWebsite');
        $param = $this->param;
        $data = $taskWebsiteModel->getDataList();
        return resultArray(['data' => $data]);
    }

    public function read()
    {   
        $taskWebsiteModel = model('TaskWebsite');
        $param = $this->param;
        $data = $taskWebsiteModel->getDataById($param['id']);
        if (!$data) {
            return resultArray(['error' => $taskWebsiteModel->getError()]);
        } 
        return resultArray(['data' => $data]);
    }

    public function save()
    {
        $taskWebsiteModel = model('TaskWebsite');

        $param = $this->param;


        $data = $taskWebsiteModel->addTask($param['tid'], $param['wid']);

        if (!$data) {
            return resultArray(['error' => $taskWebsiteModel->getError()]);
        }


        return resultArray(['data' => '添加成功']);
    }

    public function update($id)
    {
        $taskWebsiteModel = model('TaskWebsite');
        $param = $this->param;

        $data = $taskWebsiteModel->updateDataById($param, $param['id']);
        if (!$data) {
            return resultArray(['error' => $taskWebsiteModel->getError()]);
        }
        return resultArray(['data' => '编辑成功']);
    }

    public function delete()
    {
        $taskWebsiteModel = model('TaskWebsite');
        $param = $this->param;
        $data = $taskWebsiteModel->delDataById($param['id'], true);       
        if (!$data) {
            return resultArray(['error' => $taskWebsiteModel->getError()]);
        } 
        return resultArray(['data' => '删除成功']);    
    }

    public function deletes()
    {
        $taskWebsiteModel = model('TaskWebsite');
        $param = $this->param;
        $data = $taskWebsiteModel->delDatas($param['ids'], true);  
        if (!$data) {
            return resultArray(['error' => $taskWebsiteModel->getError()]);
        } 
        return resultArray(['data' => '删除成功']); 
    }

    public function enables()
    {
        $taskWebsiteModel = model('TaskWebsite');
        $param = $this->param;
        $data = $taskWebsiteModel->enableDatas($param['ids'], $param['status'], true);  
        if (!$data) {
            return resultArray(['error' => $taskWebsiteModel->getError()]);
        } 
        return resultArray(['data' => '操作成功']);         
    }
}
 