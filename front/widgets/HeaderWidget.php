<?php 
class HeaderWidget extends Widget{
    public function renderContent($params = null) {
    
        //Widget的视图缓存文件的调用非同于Controller中的
        if($this->cache()) {
            return true;
        }
    

    
        $this->assign(array(

        ));
    
        $this->display();
    }
}