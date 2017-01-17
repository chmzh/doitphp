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
function compare($a, $b){
    if($a==$b){
        return 0;
    }else if($a>$b){
        return 1;
    }else{
        return -1;
    }
}
class SchemaController extends FormController {
    private $schemaModel;
    
    public function __construct(){
        parent::__construct();
        $this->schemaModel = $this->model("Schema");
    }
    
    public function listAction(){
        parent::formlist($this->schemaModel, "/schema/list");
    }

    public function bindUserAction(){
        if(!$_POST){
            $schemaid = $this->get("schemaid");
            $userModel = $this->model("User");
            $userSchemaModel = $this->model("UserSchema");
            
            $schema = $this->schemaModel->getOne("id=$schemaid");
            $userSchema = $userSchemaModel->getAll("schemaid=$schemaid");
            $ouserids = [];
            if($userSchema){
                foreach ($userSchema as $k=>$v){
                    array_push($ouserids, $v['userid']);
                }
            }
            
            $users = $userModel->getAll();
            $this->assign("schema",$schema);
            $this->assign("users",$users);
            $this->assign("ouserids",$ouserids);
            $this->display();
        }else{
            $ouserids = [];
            $userids = [];
            $o = $this->post("ouserids");
            if($o){
                $ouserids = explode(',', $o);
            }
            $n = $this->post("userid");
            if($n){
                $userids = $n;
            }
            $dels = array_udiff($ouserids, $userids, 'compare');
            
            $adds = array_udiff($userids,$ouserids, 'compare');
            
        }
    }
    
    protected function addForm()
    {
        $produceDao = $this->model("Produce");
        $produces = $produceDao->getAll();
        
        $menuModel =  $this->model("Menu");
                 
        $subMenus = $menuModel->getAll("parentid<>0");
        $parenMenus = $menuModel->getAll("parentid=0");
        
        $this->assign("parentMenus",$parenMenus);
        $this->assign("subMenus",$subMenus);
        
        $this->assign("produces",$produces);
        $this->display();
    }


    protected function delForm()
    {
        // TODO Auto-generated method stub
        
    }


    protected function doAdd()
    {
        $name = $this->post("name");
        $produceid = $this->post("produceid");
        $power = $this->post("power");
        $des = $this->post("des");
        if($power){
            $power = implode($power, ",");
        }else{
            $power='';
        }
        $datas['name'] = $name;
        $datas['produceid'] = $produceid;
        $datas['power'] = $power;
        $datas['des'] = $des;
        
        $r = $this->schemaModel->insert($datas,true);
        if($r>0){
            Response::showMsg("操作成功",$this->createUrl("schema/list"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("schema/list"));
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
        $produceid = $this->post("produceid");
        $power = $this->post("power");
        $des = $this->post("des");
        if($power){
            $power = implode($power, ",");
        }else{
            $power = '';
        }
        $datas['name'] = $name;
        $datas['produceid'] = $produceid;
        $datas['power'] = $power;
        $datas['des'] = $des;
        
        $r = $this->schemaModel->update($datas,"id=$id");
        if($r){
            Response::showMsg("操作成功",$this->createUrl("schema/list"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("schema/list"));
        }
        
    }


    protected function editForm()
    {
        $schemaid = $this->get("id");
        
        $schema = $this->schemaModel->getOne("id=$schemaid");
        $powers = [];
        if($schema){
            if($schema['power']){
                $powers = explode(",", $schema['power']);
            }
        }

        $produceDao = $this->model("Produce");
        $produces = $produceDao->getAll();
        
        $menuModel =  $this->model("Menu");
         
        $subMenus = $menuModel->getAll("parentid<>0");
        $parenMenus = $menuModel->getAll("parentid=0");
        
        $this->assign("parentMenus",$parenMenus);
        $this->assign("subMenus",$subMenus);
        
        $this->assign("produces",$produces);
        $this->assign("schema",$schema);
        $this->assign("powers",$powers);
        $this->display();
    }

       
}