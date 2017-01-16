<?php
/**
 * 
 *
 * @author 
 * @copyright Copyright (C)  All rights reserved.
 * @version $Id: UserController.php 1.0 2017-01-13 11:22:34Z  $
 * @package Controller
 * @since 1.0
 */

class UserController extends PublicController {
    private $userMode;
    public function __construct(){
        parent::__construct();
        $this->userMode = $this->model("User");
    }
    
	/**
	 * 列表
	 *
	 * @access public
	 * @return void
	 */
	public function listAction() {
        $count = $this->userMode->count();
        $pageNo = $_GET['page'];
        if(empty($pageNo)){
            $pageNo = 1;
        }
        $num = 20;
        $from = ($pageNo-1)*$num;
 
        $user = $this->userMode->order("id asc")->limit($from,$num)->getAll();

        
        //创建分页器
        $p = $this->instance('PageView');
        $p->init($count,$num,$pageNo,"/user/list");
        //生成页码
        $pageViewString = $p->echoPageAsDiv1();

        $this->assign("pagers",$pageViewString);
        $this->assign("datas",$user);
	    $this->display();
	}

	/**
	 * 添加
	 *
	 * @access public
	 * @return void
	 */
	public function addAction() {
	    if(! $_POST){
	        $this->display();
	        return;
	    }
	    $uname = $this->post("uname");
	    $pwd = $this->post("pwd");
	    $enabled = $this->post("enabled");
	    $datas = [];
	    $datas['uname'] = $uname;
	    $datas['pwd'] = md5($pwd);
	    $datas['enabled'] = $enabled;
        $r = $this->userMode->insert($datas,true);
        if($r>0){
            Response::showMsg("操作成功",$this->createUrl("user/add"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("user/add"));
        }
	}

	/**
	 * 编辑
	 *
	 * @access public
	 * @return void
	 */
	public function editAction() {
        if(! $_POST){
            $id = $this->get("id");
            $data = $this->userMode->getOne("id=$id");
            $this->assign("data",$data);
            $this->display();
            return;
        }
        
        $id = $this->post("id");
        $uname = $this->post("uname");
        $oldpwd = $this->post("oldpwd");
        $pwd = $this->post("pwd");
        if($oldpwd){
            if(!pwd){
                Response::showMsg("请输入新密码!",$this->createUrl("user/edit?id=$id"));
                return;
            }
            $oldpwd = md5($oldpwd);
            $one = $this->userMode->getOne("uname='$uname' AND pwd='$oldpwd'");
            if(!$one){
                Response::showMsg("旧密码错误!",$this->createUrl("user/edit?id=$id"));
                return;
            }
        }
        //如果输入新密码，则需要验证密码是否正确，如果不是管理员则只能修改自己的密码
        $enabled = $this->post("enabled");
        
        $datas = [];
        //$datas['id'] = $id;
        $datas['uname'] = $uname;
        $datas['pwd'] = md5($pwd);
        $datas['enabled'] = $enabled;
        
        $r = $this->userMode->update($datas,"id=$id");
        if($r){
            Response::showMsg("操作成功",$this->createUrl("user/add"));
        }else{
            Response::showMsg("操作失败",$this->createUrl("user/add"));
        }
	}

	/**
	 * 删除
	 *
	 * @access public
	 * @return void
	 */
	public function delAction() {

	}
	
	public function powerAction(){
	    if(! $_POST){
	        $userid = $this->get("userid");
	        $produceid = $this->get("produceid");
	        $produceDao = $this->model("Produce");
	        $produces = $produceDao->getAll();
	        
	        $userPowerModel = $this->model("UserPower");
	        $menuModel =  $this->model("Menu");
	        
	        $powers = $userPowerModel->getOne("userid=$userid");
	        $power = [];
	        if(!empty($powers['powers'])){
	           $power = explode(',', $powers['powers']);
	        }
	        
	        $subMenus = $menuModel->getAll("parentid<>0");
	        $parenMenus = $menuModel->getAll("parentid=0");

	        $this->assign("parentMenus",$parenMenus);
	        $this->assign("subMenus",$subMenus);
	        $this->assign("power",$power);
	        
	        $this->assign("produces",$produces);
	        $this->assign("userid",$userid);
	        $this->assign("produceid",$produceid);
	        $this->display();
	    }else{
	        $this->_savePower();
	    }
	}

	private function _savePower(){
	    $userid = $this->post("userid");
	    $produceid = $this->post("produceid");
	    $powers = $this->post("powers");
	    $userPowerModel = $this->model("UserPower");
	    $data['powers'] = implode(',',$powers);
        
	    $one = $userPowerModel->getOne("userid=$userid AND produceid=$produceid");
	    if($one){
	        $r = $userPowerModel->update($data,"userid=$userid AND produceid=$produceid");
	        if($r){
	            Response::showMsg("操作成功",$this->createUrl("user/list"));
	        }else{
	            Response::showMsg("操作失败",$this->createUrl("user/list"));
	        }
	    }else{
	        $data['userid'] = $userid;
	        $data['produceid'] = $produceid;
	        $r = $userPowerModel->insert($data,true);
	        if($r>0){
	            Response::showMsg("操作成功",$this->createUrl("user/list"));
	        }else{
	            Response::showMsg("操作失败",$this->createUrl("user/list"));
	        }
	    }
	    
	}
}