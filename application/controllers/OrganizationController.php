<?php


class OrganizationController extends FormController {
    private $orgModel;
    private $countryModel;
    private $provinceModel;
    private $cityModel;
    public function __construct(){
        parent::__construct();
        $this->orgModel = $this->model("Organization");
        $this->provinceModel = $this->model("Province");
        $this->countryModel = $this->model("Country");
        $this->cityModel = $this->model("City");
    }
    
    public function listAction(){
        parent::formlist($this->orgModel, "organization/list");
    }
    
    protected function addForm()
    {
        $countrys = $this->countryModel->getAll();
        $provinces = $this->provinceModel->getAll("countryid=".$countrys[0]['id']);
        $citys = $this->cityModel->getAll("provinceid=".$provinces[0]['id']);
        $orgtypes = $this->orgModel->getAll();
        $this->assign("countrys",$countrys);
        $this->assign("provinces",$provinces);
        $this->assign("citys",$citys);
        $this->assign("orgtypes",$orgtypes);
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
        $cityid = $this->post("cityid");
        $orgtypeid = $this->post("orgtypeid");
        $minage = $this->post("minage");
        $maxage = $this->post("maxage");
        $name = $this->post("name");
        $startDate = $this->post("startDate");
        $origin = $this->post("origin");
        $shops = $this->post("shops");
        $content = $this->post("content");
        $pdate = time();
        
        $datas['countryid'] = $countryid;
        $datas['provinceid'] = $provinceid;
        $datas['cityid'] = $cityid;
        $datas['orgtypeid'] = $orgtypeid;
        $datas['minage'] = $minage;
        $datas['maxage'] = $maxage;
        $datas['name'] = $name;
        $datas['startDate'] = $startDate;
        $datas['origin'] = $origin;
        $datas['shops'] = $shops;
        $datas['content'] = $content;
        $datas['pdate'] = $pdate;
        
        
        $datas['name'] = $name;
        $r = $this->orgModel->insert($datas,true);
        if($r>0){
            Response::showMsg("操作成功",$this->createUrl("organization/list"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("organization/list"));
        }
        
    }


    protected function doDel()
    {
        // TODO Auto-generated method stub
        
    }


    protected function doEdit()
    {
        $id = $this->post("id");
        $countryid = $this->post("countryid");
        $provinceid = $this->post("provinceid");
        $cityid = $this->post("cityid");
        $orgtypeid = $this->post("orgtypeid");
        $minage = $this->post("minage");
        $maxage = $this->post("maxage");
        $name = $this->post("name");
        $startDate = $this->post("startDate");
        $origin = $this->post("origin");
        $shops = $this->post("shops");
        $content = $this->post("content");
        $pdate = time();
        
        $datas['countryid'] = $countryid;
        $datas['provinceid'] = $provinceid;
        $datas['cityid'] = $cityid;
        $datas['orgtypeid'] = $orgtypeid;
        $datas['minage'] = $minage;
        $datas['maxage'] = $maxage;
        $datas['name'] = $name;
        $datas['startDate'] = $startDate;
        $datas['origin'] = $origin;
        $datas['shops'] = $shops;
        $datas['content'] = $content;
        $datas['pdate'] = $pdate;
        
        
        $r = $this->orgModel->update($datas,"id=$id");
        if($r){
            Response::showMsg("操作成功",$this->createUrl("organization/list"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("organization/list"));
        }
        
    }

    protected function editForm()
    {
        $id = $this->get("id");
        $country = $this->orgModel->getOne("id=$id");
        $this->assign("country",$country);
        $this->display();
        
    }


    

}