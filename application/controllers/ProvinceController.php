<?php


class ProvinceController extends FormController {
    private $provinceModel;
    private $countryModel;
    public function __construct(){
        parent::__construct();
        $this->provinceModel = $this->model("Province");
        $this->countryModel = $this->model("Country");
    }
    
    public function listAction(){
        parent::formlist($this->provinceModel, "province/list");
    }
    
    protected function addForm()
    {
        $countrys = $this->countryModel->getAll();
        $this->assign("countrys",$countrys);
        $this->display();
    }


    protected function delForm()
    {
        // TODO Auto-generated method stub
        
    }


    protected function doAdd()
    {
        $countryid = $this->post("countryid");
        $name = $this->post("name");
        
        $datas['countryid'] = $countryid;
        $datas['name'] = $name;
        $r = $this->provinceModel->insert($datas,true);
        if($r>0){
            Response::showMsg("操作成功",$this->createUrl("province/list"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("province/list"));
        }
        
    }


    protected function doDel()
    {
        // TODO Auto-generated method stub
        
    }


    protected function doEdit()
    {
        $id = $this->post("id");
        $name = $this->post("name");
        $countryid = $this->post("countryid");
        
        $datas['countryid'] = $countryid;
        $datas['name'] = $name;
        $r = $this->provinceModel->update($datas,"id=$id");
        if($r){
            Response::showMsg("操作成功",$this->createUrl("province/list"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("province/list"));
        }
    }

    protected function editForm()
    {
        $id = $this->get("id");
        $province = $this->provinceModel->getOne("id=$id");
        
        $countrys = $this->countryModel->getAll();
        $this->assign("countrys",$countrys);
        $this->assign("province",$province);
        $this->display();
        
    }

    public function jsonAction(){
        $countryid = $this->post("countryid");
        $provinces = $this->provinceModel->getAll("countryid=$countryid");
        $this->ajax(true,"",$provinces);
    }
    

}