<?php
class PageController extends Controller
{
    public function indexAction(){
        $pageNo = $_GET['page'];
        if(empty($pageNo)){
            $pageNo = 1;
        }
        //分页数据
        $pageData = [];
        //取得总行数
        $count = 1000;
        //创建分页器
        $p = $this->instance('PageView'); //new PageView($count['0']['TOTAL'],$pageSize,$pageNo,$pageData);
        $p->init($count,10,$pageNo,"/page/index");
        //生成页码
        $pageViewString = $p->echoPageAsDiv();
        //echo $pageViewString;
        $this->assign("pagers",$pageViewString);
        $this->display();
    }
    
    public function index1Action(){
        $pageNo = $_GET['page'];
        if(empty($pageNo)){
            $pageNo = 1;
        }
        //取得总行数
        $count = 1000;
        //创建分页器
        $p = $this->instance('PageView'); //new PageView($count['0']['TOTAL'],$pageSize,$pageNo,$pageData);
        $p->init($count,10,$pageNo,"/page/index1");
        //生成页码
        $pageViewString = $p->echoPageAsDiv1();
        //echo $pageViewString;
        $this->assign("pagers",$pageViewString);
        $this->display();
    }
}

?>