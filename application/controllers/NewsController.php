<?php


class NewsController extends FormController {
    private $newsModel;
    private $categoryModel;
    public function __construct(){
        parent::__construct();
        $this->newsModel = $this->model("News");
        $this->categoryModel = $this->model("Category");
    }
    
    public function listAction(){
        parent::formlist($this->newsModel, "news/list");
    }
    
    protected function addForm()
    {
        $bigs = $this->categoryModel->getAll("parentid=0");
        if($bigs[0]){
            $smalls = $this->categoryModel->getAll("parentid=".$bigs[0]['id']);
        }
        $this->assign("bigs",$bigs);
        $this->assign("smalls",$smalls);
        $this->display();
    }


    protected function delForm()
    {
        // TODO Auto-generated method stub
        
    }


    protected function doAdd()
    {
        $title = $this->post("title");
        $imgsrc = $this->post("imgsrc");
        $bigid = $this->post("bigid");
        $smallid = $this->post("smallid");
        $content = $this->post("content");
        $des = $this->post("des");

        $recommend = $this->post("recommend");
        $pdate = date('Y-m-d H:i:s',time());
            
        $datas['title'] = $title;
        $datas['imgsrc'] = $imgsrc;
        $datas['bigid'] = $bigid;
        $datas['smallid'] = $smallid;
        $datas['content'] = $content;
        $datas['des'] = $des;
        $datas['recommend'] = $recommend;
        $datas['pdate'] = $pdate;
        $r = $this->newsModel->insert($datas,true);
        if($r>0){
            Response::showMsg("操作成功",$this->createUrl("news/list"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("news/list"));
        }
        
    }


    protected function doDel()
    {
        // TODO Auto-generated method stub
        
    }


    protected function doEdit()
    {
        $id = $this->post("id");
        $title = $this->post("title");
        $imgsrc = $this->post("imgsrc");
        $bigid = $this->post("bigid");
        $smallid = $this->post("smallid");
        $content = $this->post("content");
        $des = $this->post("des");

        $recommend = $this->post("recommend");
        $pdate = date('Y-m-d H:i:s',time());
        $datas['title'] = $title;
        $datas['imgsrc'] = $imgsrc;
        $datas['bigid'] = $bigid;
        $datas['smallid'] = $smallid;
        $datas['content'] = $content;
        $datas['des'] = $des;

        $datas['recommend'] = $recommend;
        $datas['pdate'] = $pdate;
        $r = $this->newsModel->update($datas,"id=$id");
        if($r){
            Response::showMsg("操作成功",$this->createUrl("news/list"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("news/list"));
        }
    }

    protected function editForm()
    {
        $id = $this->get("id");
        $news = $this->newsModel->getOne("id=$id");
        
        $bigs = $this->categoryModel->getAll("parentid=0");
        $smalls = $this->categoryModel->getAll("parentid=".$news['bigid']);
        $this->assign("bigs",$bigs);
        $this->assign("smalls",$smalls);
        
        $this->assign("news",$news);
        $this->display();
        
    }


    

}