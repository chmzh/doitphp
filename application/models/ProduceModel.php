<?php
/**
 * 
 *
 * @author 
 * @copyright Copyright (C)  All rights reserved.
 * @version $Id: UserModel.php 1.0 2017-01-13 11:22:51Z  $
 * @package Model
 * @since 1.0
 */

class ProduceModel extends Model {

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
		return array('id', 'name');
	}

	/**
	 * 定义数据表名称
	 *
	 * @access protected
	 * @return array
	 */
	protected function tableName() {
		return 'produce';
	}

}