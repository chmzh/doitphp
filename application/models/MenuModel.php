<?php
/**
 * 
 *
 * @author 
 * @copyright Copyright (C)  All rights reserved.
 * @version $Id: MenuModel.php 1.0 2017-01-15 11:26:03Z  $
 * @package Model
 * @since 1.0
 */

class MenuModel extends Model {

	/**
	 * 定义数据表主键
	 *
	 * @access protected
	 * @return array
	 */
	protected function primaryKey() {
		return 'id';
	}

	/**
	 * 定义数据表字段信息
	 *
	 * @access protected
	 * @return array
	 */
	protected function tableFields() {
		return array('id', 'parentid', 'model', 'action', 'name', 'visible', 'ctype');
	}

	/**
	 * 定义数据表名称
	 *
	 * @access protected
	 * @return array
	 */
	protected function tableName() {
		return 'sys_menu';
	}

}