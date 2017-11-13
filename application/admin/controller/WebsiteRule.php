<?php
// +----------------------------------------------------------------------
// | Description: 网站规则
// +----------------------------------------------------------------------

namespace app\admin\controller;

class WebsiteRule extends ApiCommon
{
    
    public function index()
    {   
        $websiteRuleModel = model('WebsiteRule');
        $param = $this->param;
        $data = $websiteRuleModel->getDataList();
        return resultArray(['data' => $data]);
    }

    public function read()
    {   
        $websiteRuleModel = model('WebsiteRule');
        $param = $this->param;
        $data = $websiteRuleModel->getDataById($param['id']);
        if (!$data) {
            return resultArray(['error' => $websiteRuleModel->getError()]);
        } 
        return resultArray(['data' => $data]);
    }

    public function save()
    {
        $websiteRuleModel = model('WebsiteRule');
        $param = $this->param;



        $data = $websiteRuleModel->createData($param);
        if (!$data) {
            return resultArray(['error' => $websiteRuleModel->getError()]);
        } 
        return resultArray(['data' => '添加成功']);
    }

    public function update($id)
    {
        $websiteRuleModel = model('WebsiteRule');
        $param = $this->param;

        $data = $websiteRuleModel->updateDataById($param, $param['id']);
        if (!$data) {
            return resultArray(['error' => $websiteRuleModel->getError()]);
        } 
        return resultArray(['data' => '编辑成功']);
    }

    public function delete()
    {
        $websiteRuleModel = model('WebsiteRule');
        $param = $this->param;
        $data = $websiteRuleModel->delDataById($param['id'], true);       
        if (!$data) {
            return resultArray(['error' => $websiteRuleModel->getError()]);
        } 
        return resultArray(['data' => '删除成功']);    
    }

    public function deletes()
    {
        $websiteRuleModel = model('WebsiteRule');
        $param = $this->param;
        $data = $websiteRuleModel->delDatas($param['ids'], true);  
        if (!$data) {
            return resultArray(['error' => $websiteRuleModel->getError()]);
        } 
        return resultArray(['data' => '删除成功']); 
    }

    public function enables()
    {
        $websiteRuleModel = model('WebsiteRule');
        $param = $this->param;
        $data = $websiteRuleModel->enableDatas($param['ids'], $param['status'], true);  
        if (!$data) {
            return resultArray(['error' => $websiteRuleModel->getError()]);
        } 
        return resultArray(['data' => '操作成功']);         
    }
}
 