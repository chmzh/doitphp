<?php


class CategoryController extends FormController {
    private $categoryModel;
    
    public function __construct(){
        parent::__construct();
        $this->categoryModel = $this->model("Category");
    }
    
    public function listAction(){
        
        
        $count = $this->categoryModel->count("parentid=0");
        $pageNo = $_GET['page'];
        if(empty($pageNo)){
            $pageNo = 1;
        }
        $num = 20;
        $from = ($pageNo-1)*$num;
        
        $user = $this->categoryModel->order("id asc")->limit($from,$num)->getAll("parentid=0");
        
        
        //创建分页器
        $p = $this->instance('PageView');
        $p->init($count,$num,$pageNo,"category/list");
        //生成页码
        $pageViewString = $p->echoPageAsDiv1();
        
        $this->assign("pagers",$pageViewString);
        $this->assign("datas",$user);
        $this->display();
    }
    
    protected function addForm()
    {
        $id = $this->get("id");
        $name = "";
        if($id){
            $one = $this->categoryModel->getOne("id=$id");
            if($one){
                $name = $one['name'];
            }
        }else{
            $id = 0;
        }
        $this->assign("parentid",$id);
        $this->assign("name",$name);
        $this->display();
    }


    protected function delForm()
    {
        // TODO Auto-generated method stub
        
    }


    protected function doAdd()
    {
        $name = $this->post("name");
        $parentid = $this->post("parentid");
        $datas['name'] = $name;
        $datas['parentid'] = $parentid;
        $r = $this->categoryModel->insert($datas,true);
        if($r>0){
            Response::showMsg("操作成功",$this->createUrl("category/list"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("category/list"));
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
        $parentid = $this->post("parentid");
        $datas['name'] = $name;
        $datas['parentid'] = $parentid;
        $r = $this->categoryModel->update($datas,"id=$id");
        if($r){
            Response::showMsg("操作成功",$this->createUrl("category/list"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("category/list"));
        }
    }

    protected function editForm()
    {
        $id = $this->get("id");
        $category = $this->categoryModel->getOne("id=$id");
        $this->assign("category",$category);
        $this->display();
        
    }

    public function jsonAction(){
        $bigid = $this->post("bigid");
        $datas = $this->categoryModel->getAll("parentid=$bigid");
        $this->ajax(true,"",$datas);
    }
    

}