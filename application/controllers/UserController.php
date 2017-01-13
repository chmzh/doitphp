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

	/**
	 * 列表
	 *
	 * @access public
	 * @return void
	 */
	public function listAction() {
	    $this->display();
	}

	/**
	 * 添加
	 *
	 * @access public
	 * @return void
	 */
	public function addAction() {
        $this->display();
	}

	/**
	 * 编辑
	 *
	 * @access public
	 * @return void
	 */
	public function editAction() {

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