<?php


class LoginController extends Controller {

    private $userMode;
    
    public function __construct(){
        parent::__construct();
        $this->userMode = $this->model("User");
        
    }
    
	public function indexAction() {
	    Auth::isLogin();
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
	        
	        $info = [Auth::cookieuname=>$name,Auth::cookiesign=>"sign"];
	        Auth::saveLoginInfo($info);
	    }else{
	        Response::showMsg("用户名或密码不存在!","/login/index");
	    }
	}
	
	
	
	

}