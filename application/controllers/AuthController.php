<?php
/**
 * 共用Controller
 *
 * 提供登陆判断等共用类方法
 *
 * @author tommy <tommy@doitphp.com>
 * @link http://www.doitphp.com
 * @copyright Copyright (C) Copyright (c) 2012 www.doitphp.com All rights reserved.
 * @license New BSD License.{@link http://www.opensource.org/licenses/bsd-license.php}
 * @version $Id: Public.php 1.0 2013-01-11 21:53:32Z tommy <tommy@doitphp.com> $
 * @package Controller
 * @since 1.0
 */

class AuthController extends Controller {
    
	protected function _getPowerMenu(){
		$userPowerModel = $this->model("UserPower");
		$menuModel =  $this->model("Menu");
		
		$powers = $userPowerModel->getOne("userid=1");
		$power = $powers['powers'];
		
		$menus = $menuModel->getAll("id in($power)");
		$parentids = [];
		foreach ($menus as $k=>$v){
			//if(!array_key_exists($v['parentid'], $parentids)){
				array_push($parentids, $v['parentid']);
			//}
		}
		//in_array($needle, $haystack)
		$parentids = array_unique($parentids);
		//print_r($parentids);
		$parenMenus = $menuModel->getAll("id in(".implode($parentids,",").")");
		//echo implode($parentids,",");
		//print_r($parenMenus);
		$this->assign("parentMenus",$parenMenus);
		$this->assign("menus",$menus);
	}

	protected function validPower(){
	    $powers = $this->model("UserPower")->getOne("userid=1");
	    $power = $powers['powers'];
	    $menus = $this->model("Menu")->getAll("id in($power)");
	    
	    $controller = Doit::getControllerName();
	    $action = Doit::getActionName();
	    
	    $ignor = [['ctr'=>'index','action'=>'index']];
	    foreach ($ignor as $k=>$v){
	        if($v['ctr'] == $controller && $v['action']==$action){
	            return;
	        }
	    }
	    if(!$menus){
	        return;
	    }
	    $bol = false;	    
	    foreach ($menus as $k=>$v){
	        if($v['model'] == $controller && $v['action']==$action){
	            return;
	        }
	    }
	    if(!$bol){
	        Response::showMsg("该页不存在,请联系管理员！");
	    }
	}
    
	/**
	 * 登陆验证
	 *
	 * @access protected
	 * @return boolean
	 */
	protected function _parseLogin() {

		$loginStatus = $this->getCookie(Configure::get('loginCookieName'));
		if (!$loginStatus) {
			if (substr(Doit::getActionName(), 0, 4) == 'ajax') {
				$this->ajax(false, '对不起，您没有登陆或登陆Cookie已过期，请重新登陆！');
			}
			//将当前网址存贮在cookie中
			$this->setCookie(Configure::get('gotoUrlCookieName'), $_SERVER['REQUEST_URI']);

			//跳转到登陆页面
			$this->redirect($this->createUrl('login/index'));
		}

		return true;
	}

	/**
	 * 前函数(方法)
	 *
	 * @access public
	 * @return boolean
	 */
	protected final function init() {

	    $this->validPower();
		//分析是否登陆
// 		$this->_parseLogin();

		//设置layout视图
// 		$this->setLayout('main');

		//assign params
// 		$this->assign(array(
// 		'baseImageUrl'  => $this->getAssetUrl('images'),
// 		'baseScriptUrl' => $this->getAssetUrl('js'),
// 		));
		$this->assign(array(
				'baseUrl'  => self::getBaseUrl()
		));
		return true;
	}

	/**
	 * 判断是否创建项目目录
	 *
	 * @access protected
	 * @return boolean
	 */
	protected function _parseWebAppRoot() {

		//分析webapp目录是否存在
		$webappPath = rtrim(WEB_APP_PATH, '/').DS;
		if (!is_dir($webappPath)) {
			$errorMsg = "对不起！项目目录：{$webappPath} 不存在！请创建项目根目录";

			$this->showMsg($errorMsg);
		}

		//分析应用目录
		if (!is_dir($webappPath . 'application')) {
			$errorMsg = "对不起！您还没有创建WebApp目录。请进行如下操作:WebApp管理->创建WebApp目录";

			$this->showMsg($errorMsg);
		}

		return true;
	}

}