<?php


class ActivityController extends FormController {
    private $activityModel;
    
    public function __construct(){
        parent::__construct();
        $this->activityModel = $this->model("Activity");
    }
    
    public function listAction(){
        parent::formlist($this->activityModel, "activity/list");
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
        $sdate = $this->post('sdate');
        $edate = $this->post('edate');
        $address = $this->post('address');
        $participants = $this->post('participants');
        $title = $this->post('title');
        $content = $this->post('content');
        $imgsrc = $this->post('imgsrc');
        
        $datas[sdate] = $sdate;
        $datas[edate] = $edate;
        $datas[address] = $address;
        $datas[participants] = $participants;
        $datas[title] = $title;
        $datas[content] = $content;
        $datas[imgsrc] = $imgsrc;
        $r = $this->activityModel->insert($datas,true);
        if($r>0){
            Response::showMsg("操作成功",$this->createUrl("activity/list"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("activity/list"));
        }
        
    }


    protected function doDel()
    {
        // TODO Auto-generated method stub
        
    }


    protected function doEdit()
    {
        $id = $this->post('id');
        $sdate = $this->post('sdate');
        $edate = $this->post('edate');
        $address = $this->post('address');
        $participants = $this->post('participants');
        $title = $this->post('title');
        $content = $this->post('content');
        $imgsrc = $this->post('imgsrc');

        $datas[sdate] = $sdate;
        $datas[edate] = $edate;
        $datas[address] = $address;
        $datas[participants] = $participants;
        $datas[title] = $title;
        $datas[content] = $content;
        $datas[imgsrc] = $imgsrc;
        $r = $this->activityModel->update($datas,"id=$id");
        if($r){
            Response::showMsg("操作成功",$this->createUrl("activity/list"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("activity/list"));
        }
    }

    protected function editForm()
    {
        $id = $this->get("id");
        $activity = $this->activityModel->getOne("id=$id");
        $this->assign("activity",$activity);
        $this->display();
        
    }


    

}