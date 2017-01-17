<?php


class CountryController extends FormController {
    private $countryModel;
    
    public function __construct(){
        parent::__construct();
        $this->countryModel = $this->model("Country");
    }
    
    public function listAction(){
        parent::formlist($this->countryModel, "country/list");
    }
    
    protected function addForm()
    {
        $this->display();
    }


    protected function delForm()
    {
        // TODO Auto-generated method stub
        
    }


    protected function doAdd()
    {
        $name = $this->post("name");
        
        $datas['name'] = $name;
        $r = $this->countryModel->insert($datas,true);
        if($r>0){
            Response::showMsg("操作成功",$this->createUrl("country/list"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("country/list"));
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
        $datas['name'] = $name;
        $r = $this->countryModel->update($datas,"id=$id");
        if($r){
            Response::showMsg("操作成功",$this->createUrl("country/list"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("country/list"));
        }
    }

    protected function editForm()
    {
        $id = $this->get("id");
        $country = $this->countryModel->getOne("id=$id");
        $this->assign("country",$country);
        $this->display();
        
    }


    

}