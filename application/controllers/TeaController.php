<?php


class TeaController extends FormController {
    private $teaModel;
    private $categoryModel;
    public function __construct(){
        parent::__construct();
        $this->teaModel = $this->model("Tea");
        $this->categoryModel = $this->model("Category");
    }
    
    public function listAction(){
        parent::formlist($this->teaModel, "tea/list");
    }
    
    protected function addForm()
    {
        $categorys = $this->categoryModel->getAll("parentid=0");
        $this->assign("categorys",$categorys);
        $this->display();
    }


    protected function delForm()
    {
        // TODO Auto-generated method stub
        
    }


    protected function doAdd()
    {

        $categoryid = $this->post('categoryid');
        $name = $this->post('name');
        $imgsrc = $this->post('imgsrc');
        $price = $this->post('price');
        $des = $this->post('des');

        $datas[ categoryid] = $categoryid;
        $datas[name] = $name;
        $datas[imgsrc] = $imgsrc;
        $datas[price] = $price;
        $datas[des] = $des;
        $r = $this->teaModel->insert($datas,true);
        if($r>0){
            Response::showMsg("操作成功",$this->createUrl("tea/list"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("tea/list"));
        }
        
    }


    protected function doDel()
    {
        // TODO Auto-generated method stub
        
    }


    protected function doEdit()
    {
        $id = $this->post('id');
        $categoryid = $this->post('categoryid');
        $name = $this->post('name');
        $imgsrc = $this->post('imgsrc');
        $price = $this->post('price');
        $des = $this->post('des');
        $datas[ categoryid] = $categoryid;
        $datas[name] = $name;
        $datas[imgsrc] = $imgsrc;
        $datas[price] = $price;
        $datas[des] = $des;
        $r = $this->teaModel->update($datas,"id=$id");
        if($r){
            Response::showMsg("操作成功",$this->createUrl("tea/list"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("tea/list"));
        }
    }

    protected function editForm()
    {
        $id = $this->get("id");
        $tea = $this->teaModel->getOne("id=$id");
        $categorys = $this->categoryModel->getAll("parentid=0");
        $this->assign("categorys",$categorys);
        $this->assign("tea",$tea);
        $this->display();
        
    }


    

}