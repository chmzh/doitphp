<?php
/**
 * 
 *
 * @author 
 * @copyright Copyright (C)  All rights reserved.
 * @version $Id: UserPowerModel.php 1.0 2017-01-13 11:25:24Z  $
 * @package Model
 * @since 1.0
 */

class UserPowerModel extends Model {

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
		return array('id', 'userid', 'produceid', 'powers');
	}

	/**
	 * 定义数据表名称
	 *
	 * @access protected
	 * @return array
	 */
	protected function tableName() {
		return 'user_power';
	}

}