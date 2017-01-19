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

class IndexController extends AuthController {

    /**
     * 首页
     *
     * @access public
     * @return void
     */
    public function indexAction() {
		$user = $this->model("User");
		$u = $user->getOne("uname='cndw'");
		$this->_getPowerMenu();
        $this->display();
    }

    /**
     * 首页
     *
     * @access public
     * @return void
     */
    public function index2Action() {
        $user = $this->model("User");
        $u = $user->getOne("uname='cndw'");
        $this->_getPowerMenu();
        $this->display();
    }
}