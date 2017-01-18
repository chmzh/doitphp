<?php

class UploadController extends AuthController {

    
    
    public function indexAction(){
        $this->display();
    }
    
    public function uploadfileAction(){
        $fileObj  = $this->instance('FileUpload');
        $extension = File::get_extension($_FILES['upload']['name']);
        $relativeUrl = DS.'uploads'.DS;
        $fileName = time().rand().'.'.$extension;
        $distFile = APP_ROOT.$relativeUrl.$fileName;
        $result = $fileObj->setLimitType(array('jpg', 'gif', 'png'))
        ->render($_FILES['upload'], $distFile);
        
        //echo (!$result) ? $fileObj->getErrorInfo() : '文件上传成功！';
        $url = "<script type='text/javascript'>window.parent.window.document.getElementById('imgsrc').value='".$relativeUrl.$fileName."';</script>";
        
        echo (!$result) ? $fileObj->getErrorInfo() : $url;
    }
}