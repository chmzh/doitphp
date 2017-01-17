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

abstract class FormController extends AuthController {
    
    protected function formlist($model,$listurl){
        $count = $model->count();
        $pageNo = $_GET['page'];
        if(empty($pageNo)){
            $pageNo = 1;
        }
        $num = 20;
        $from = ($pageNo-1)*$num;
    
        $user = $model->order("id asc")->limit($from,$num)->getAll();
    
    
        //创建分页器
        $p = $this->instance('PageView');
        $p->init($count,$num,$pageNo,$listurl);
        //生成页码
        $pageViewString = $p->echoPageAsDiv1();
    
        $this->assign("pagers",$pageViewString);
        $this->assign("datas",$user);
        $this->display();
    }
    
    protected function listAction(){
    
    }
    /**
     * 添加表单
     */
    protected abstract function addForm();
    /**
     * 添加动作
     */
    protected abstract function doAdd();
    /**
     * 编辑表单
     */
    protected abstract function editForm();
    /**
     * 编辑动作
     */
    protected abstract function doEdit();
    /**
     * 删除表单
     */
    protected abstract function delForm();
    /**
     * 删除动作
     */
    protected abstract function doDel();
    
    
    public function addAction(){
        if(!$_POST){
            $this->addForm();
        }else{
            $this->doAdd();
        }
    }
    
    public function editAction(){
        if(!$_POST){
            $this->editForm();
        }else{
            $this->doEdit();
        }
    }
    public function delAction(){
        if(!$_POST){
            $this->delForm();
        }else{
            $this->doDel();
        }
    }
}