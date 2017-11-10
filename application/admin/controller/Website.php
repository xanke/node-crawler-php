<?php
// +----------------------------------------------------------------------
// | Description: 用户组
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honraytech.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;

class Website extends ApiCommon
{
    
    public function index()
    {   
        $websiteModel = model('Website');
        $param = $this->param;
        $data = $websiteModel->getDataList();
        return resultArray(['data' => $data]);
    }

    public function read()
    {   
        $websiteModel = model('Website');
        $param = $this->param;
        $data = $websiteModel->getDataById($param['id']);
        if (!$data) {
            return resultArray(['error' => $websiteModel->getError()]);
        } 
        return resultArray(['data' => $data]);
    }

    public function save()
    {
        $websiteModel = model('Website');

        $taskWebsiteModel = model('TaskWebsite');

        $param = $this->param;


        $wid = $websiteModel->createData($param);

        if (!$wid) {
            return resultArray(['error' => $websiteModel->getError()]);
        }

        if ($param['tid']) {
            $tid = $param['tid'];
        }

        $data = $taskWebsiteModel->addTask($tid, $wid);

        return resultArray(['data' => '添加成功']);
    }

    public function update($id)
    {
        $websiteModel = model('Website');
        $param = $this->param;

        $data = $websiteModel->updateDataById($param, $param['id']);
        if (!$data) {
            return resultArray(['error' => $websiteModel->getError()]);
        }
        return resultArray(['data' => '编辑成功']);
    }

    public function delete()
    {
        $websiteModel = model('Website');
        $param = $this->param;
        $data = $websiteModel->delDataById($param['id'], true);       
        if (!$data) {
            return resultArray(['error' => $websiteModel->getError()]);
        } 
        return resultArray(['data' => '删除成功']);    
    }

    public function deletes()
    {
        $websiteModel = model('Website');
        $param = $this->param;
        $data = $websiteModel->delDatas($param['ids'], true);  
        if (!$data) {
            return resultArray(['error' => $websiteModel->getError()]);
        } 
        return resultArray(['data' => '删除成功']); 
    }

    public function enables()
    {
        $websiteModel = model('Website');
        $param = $this->param;
        $data = $websiteModel->enableDatas($param['ids'], $param['status'], true);  
        if (!$data) {
            return resultArray(['error' => $websiteModel->getError()]);
        } 
        return resultArray(['data' => '操作成功']);         
    }
}
 