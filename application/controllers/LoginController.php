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

class LoginController extends PublicController {

    private $userMode;
    
    public function __construct(){
        parent::__construct();
        $this->userMode = $this->model("User");
        
    }
    
	public function indexAction() {
	    $this->display();
	}
	
	public function loginAction(){
	    $name = $this->post("uname");
	    if(!$name){
	        Response::showMsg("请填写用户名");
	    }
	    $pwd = $this->post("pwd");
	    if(!$name){
	        Response::showMsg("请填写密码");
	    }
	    $pwd = md5($pwd);
	    $u = $this->userMode->getOne("uname='$name' AND pwd='$pwd'");
	    if($u){
	        
	        $info = [$cookieuname=>$name,$cookiesign=>"sign"];
	        $this->saveLoginInfo($info);
	    }else{
	        Response::showMsg("用户名或密码不存在!","/login/index");
	    }
	}
	
	
	
	/**
	 * 前函数(方法)
	 *
	 * @access public
	 * @return boolean
	 */
	public function init() {
	
	    //assign params
	    $this->assign(array(
	        'baseUrl'  => self::getBaseUrl()
	    ));
	
	    return true;
	}

}