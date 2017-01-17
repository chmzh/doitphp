<?php


class OrgTypeController extends FormController {
    private $orgtypeModel;
    
    public function __construct(){
        parent::__construct();
        $this->orgtypeModel = $this->model("OrgType");
    }
    
    public function listAction(){
        parent::formlist($this->orgtypeModel, "orgtype/list");
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
        $r = $this->orgtypeModel->insert($datas,true);
        if($r>0){
            Response::showMsg("操作成功",$this->createUrl("orgtype/list"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("orgtype/list"));
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
        $r = $this->orgtypeModel->update($datas,"id=$id");
        if($r){
            Response::showMsg("操作成功",$this->createUrl("orgtype/list"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("orgtype/list"));
        }
    }

    protected function editForm()
    {
        $id = $this->get("id");
        $data = $this->orgtypeModel->getOne("id=$id");
        $this->assign("data",$data);
        $this->display();
        
    }


    

}