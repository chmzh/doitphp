<?php


class UserController extends FormController {
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
        parent::formlist($this->userMode, "/user/list");
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
 /* (non-PHPdoc)
     * @see FormController::addForm()
     */
    protected function addForm()
    {
        $this->display();
    }

 /* (non-PHPdoc)
     * @see FormController::delForm()
     */
    protected function delForm()
    {
        // TODO Auto-generated method stub
        
    }

 /* (non-PHPdoc)
     * @see FormController::doAdd()
     */
    protected function doAdd()
    {
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

 /* (non-PHPdoc)
     * @see FormController::doDel()
     */
    protected function doDel()
    {
        
        
    }

 /* (non-PHPdoc)
     * @see FormController::doEdit()
     */
    protected function doEdit()
    {
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

 /* (non-PHPdoc)
     * @see FormController::editForm()
     */
    protected function editForm()
    {
        $id = $this->get("id");
        $data = $this->userMode->getOne("id=$id");
        $this->assign("data",$data);
        $this->display();
        
    }

}