<?php


class CityController extends FormController {
    private $countryModel;
    private $provinceModel;
    private $cityModel;
    public function __construct(){
        parent::__construct();
        $this->provinceModel = $this->model("Province");
        $this->countryModel = $this->model("Country");
        $this->cityModel = $this->model("City");
    }
    
    public function listAction(){
        parent::formlist($this->cityModel, "city/list");
    }
    
    protected function addForm()
    {
        $countrys = $this->countryModel->getAll();
        $provinces = $this->provinceModel->getAll("countryid=".$countrys[0]['id']);
        $this->assign("countrys",$countrys);
        $this->assign("provinces",$provinces);
        $this->display();
    }


    protected function delForm()
    {
        // TODO Auto-generated method stub
        
    }


    protected function doAdd()
    {
        $countryid = $this->post("countryid");
        $provinceid = $this->post("provinceid");
        $name = $this->post("name");
        
        $datas['countryid'] = $countryid;
        $datas['provinceid'] = $provinceid;
        $datas['name'] = $name;
        $r = $this->cityModel->insert($datas,true);
        if($r>0){
            Response::showMsg("操作成功",$this->createUrl("city/list"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("city/list"));
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
        $provinceid = $this->post("provinceid");
        
        $datas['provinceid'] = $provinceid;
        $datas['countryid'] = $countryid;
        $datas['name'] = $name;
        $r = $this->cityModel->update($datas,"id=$id");
        if($r){
            Response::showMsg("操作成功",$this->createUrl("city/list"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("city/list"));
        }
    }

    protected function editForm()
    {
        $id = $this->get("id");
        $city = $this->cityModel->getOne("id=$id");
        $countrys = $this->countryModel->getAll();
        $provinces = $this->provinceModel->getAll("countryid=".$city['countryid']);
        $this->assign("city",$city);
        $this->assign("countrys",$countrys);
        $this->assign("provinces",$provinces);
        $this->display();
        
    }

    public function jsonAction(){
        $countryid = $this->post("countryid");
        $provinceid = $this->post("provinceid");
        $citys = $this->cityModel->getAll("countryid=$countryid AND provinceid=$provinceid");
        $this->ajax(true,"",$citys);
    }
    

}