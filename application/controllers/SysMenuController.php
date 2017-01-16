<?php
/**
 * 演示实例
 *
 * @author tommy
 * @copyright Copyright (C) www.doitphp.com All rights reserved.
 * @version $Id: Index.php 1.0 2013-11-29 18:55:39Z tommy $
 * @package Controller
 * @since 1.0
 */

class SysMenuController extends PublicController {
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
    
    private function _addForm(){
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
    private function _doAdd(){
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
    public function addAction() {
        if(!$_POST){
            $this->_addForm();
        }else{
            $this->_doAdd();
        }
        
    }
    
    
    
    public function editAction() {
    
        $this->display();
    }

}