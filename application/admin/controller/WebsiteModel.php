<?php
// +----------------------------------------------------------------------
// | Description: 网站模型
// +----------------------------------------------------------------------

namespace app\admin\controller;

class WebsiteModel extends ApiCommon
{
    
    public function index()
    {   
        $websiteModel = model('WebsiteModel');
        $param = $this->param;
        $data = $websiteModel->getDataList();
        return resultArray(['data' => $data]);
    }

    public function read()
    {   
        $websiteModel = model('WebsiteModel');
        $param = $this->param;
        $data = $websiteModel->getDataById($param['id']);
        if (!$data) {
            return resultArray(['error' => $websiteModel->getError()]);
        } 
        return resultArray(['data' => $data]);
    }

    public function save()
    {
        $websiteModel = model('WebsiteModel');
        $param = $this->param;



        $data = $websiteModel->createData($param);
        if (!$data) {
            return resultArray(['error' => $websiteModel->getError()]);
        } 
        return resultArray(['data' => '添加成功']);
    }

    public function update($id)
    {
        $websiteModel = model('WebsiteModel');
        $param = $this->param;

        $data = $websiteModel->updateDataById($param, $param['id']);
        if (!$data) {
            return resultArray(['error' => $websiteModel->getError()]);
        } 
        return resultArray(['data' => '编辑成功']);
    }

    public function delete()
    {
        $websiteModel = model('WebsiteModel');
        $param = $this->param;
        $data = $websiteModel->delDataById($param['id'], true);       
        if (!$data) {
            return resultArray(['error' => $websiteModel->getError()]);
        } 
        return resultArray(['data' => '删除成功']);    
    }

    public function deletes()
    {
        $websiteModel = model('WebsiteModel');
        $param = $this->param;
        $data = $websiteModel->delDatas($param['ids'], true);  
        if (!$data) {
            return resultArray(['error' => $websiteModel->getError()]);
        } 
        return resultArray(['data' => '删除成功']); 
    }

    public function enables()
    {
        $websiteModel = model('WebsiteModel');
        $param = $this->param;
        $data = $websiteModel->enableDatas($param['ids'], $param['status'], true);  
        if (!$data) {
            return resultArray(['error' => $websiteModel->getError()]);
        } 
        return resultArray(['data' => '操作成功']);         
    }
}
 