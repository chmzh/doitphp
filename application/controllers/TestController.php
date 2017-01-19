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

class TestController extends Controller {
    protected final function init() {
        $this->assign(array(
            'baseUrl'  => self::getBaseUrl()
        ));
        return true;
    }
    
    public function index2Action(){
        $user = $this->model("User");
        $u = $user->getOne("uname='cndw'");
        $this->_getPowerMenu();
        $this->display();
    }
    
    public function navAction(){
        $this->display();
    }
    public function navleftAction(){
        $this->display();
    }
    
    public function dateAction() {
		
        $this->display();
    }
    public function uploadFormAction(){
        
        $this->display();
    }
    public function uploadAction(){
        $fileObj  = $this->instance('FileUpload');
        $extension = File::get_extension($_FILES['upload']['name']);
        
        $fileName = time().rand().'.'.$extension;
        $distFile = APP_ROOT.DS.'uploads'.DS.$fileName;
        $result = $fileObj->setLimitSize(1024000)
        ->setLimitType(array('jpg', 'gif', 'png'))
        ->render($_FILES['upload'], $distFile);
        
        echo (!$result) ? $fileObj->getErrorInfo() : '文件上传成功！';
    }
    
    public function indexAction(){
        $fileds = "'id', 'categoryid','name','imgsrc','price','des'";
        $arr = explode(',', $fileds);
        foreach ($arr as $k=>$v){
            $v = str_replace("'", "", $v);
            echo '$'.$v.' = '.'$this->post(\''.$v.'\');'.'<br>';
        }
        foreach ($arr as $k=>$v){
            $v = str_replace("'", "", $v);
            echo '$datas['.$v.'] = $'.$v.';<br>';
        }
    }
}