<?php


class SysMenuController extends FormController {
    private $menuDao;
    
    public function __construct(){
        parent::__construct();
        $this->menuDao = $this->model("Menu");
    }
    
    /**
     * 首页
     *
     * @access public
     * @return void
     */
    public function indexAction() {
		
        $this->display();
    }
    
    public function listAction() {
        $count = $this->menuDao->count("id","parentid=0");
        $pageNo = $_GET['page'];
        if(empty($pageNo)){
            $pageNo = 1;
        }
        $num = 20;
        $from = ($pageNo-1)*$num;
        
        $menus = $this->menuDao->order("id asc")->limit($from,$num)->getAll("parentid=0");
        
        
        //创建分页器
        $p = $this->instance('PageView');
        $p->init($count,$num,$pageNo,"/sysmenu/list");
        //生成页码
        $pageViewString = $p->echoPageAsDiv1();
        
        $this->assign("pagers",$pageViewString);
        $this->assign("datas",$menus);
        $this->display();
    }


    protected function addForm()
    {
        $id = $this->get("id");
        if(!$id){
            $id = 0;
        }
        $parentid = $id;
        $name = '';
        $model = '';
        if($id!=0){
            $menu = $this->menuDao->getOne("id=$id");
            if($menu){
                $name = $menu['name'];
                $model = $menu['model'];
            }
        }
        
        $this->assign("parentid",$parentid);
        $this->assign("name",$name);
        $this->assign("model",$model);
        
        $this->display();
        
    }


    protected function delForm()
    {
        // TODO Auto-generated method stub
        
    }


    protected function doAdd()
    {
        $parentid = $this->post("parentid");
        $name = $this->post("name");
        $model = $this->post("model");
        $action = $this->post("action");
        $visible = $this->post("visible");
        $ctype = $this->post("ctype");
        $datas['parentid'] = $parentid;
        $datas['name'] = $name;
        $datas['model'] = $model;
        $datas['action'] = $action;
        $datas['visible'] = $visible==1?true:false;
        $datas['ctype'] = $ctype;
        
        $r = $this->menuDao->insert($datas,true);
        if($r>0){
            Response::showMsg("操作成功",$this->createUrl("sysmenu/add"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("sysmenu/add"));
        }
        
    }


    protected function doDel()
    {
        // TODO Auto-generated method stub
        
    }


    protected function doEdit()
    {
        $id = $this->post("id");
        $parentid = $this->post("parentid");
        $name = $this->post("name");
        $model = $this->post("model");
        $action = $this->post("action");
        $visible = $this->post("visible");
        $ctype = $this->post("ctype");
        $datas['parentid'] = $parentid;
        $datas['name'] = $name;
        $datas['model'] = $model;
        $datas['action'] = $action;
        $datas['visible'] = $visible==1?true:false;
        $datas['ctype'] = $ctype;
        
        $r = $this->menuDao->update($datas,"id=$id");
        if($r){
            Response::showMsg("操作成功",$this->createUrl("sysmenu/add"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("sysmenu/add"));
        }
        
    }


    protected function editForm()
    {
        $id = $this->get("id");
        $menu = $this->menuDao->getOne("id=$id");
        $this->assign("menu",$menu);
        $this->display();
        
    }

    public function ajax_showmenuAction(){
        $parentid = $this->post("parentid");
        $subMenus = $this->menuDao->getAll("parentid=$parentid");
        $this->ajax(true,"",$subMenus);
    }

}