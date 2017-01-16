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

class UserController extends Controller {
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
        $num = 1;
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
	    $datas['pwd'] = $pwd;
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
            $this->display();
            return;
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

}