<?php

class WeixinController extends Controller {
    protected final function init() {
        $this->assign(array(
            'baseUrl'  => self::getBaseUrl()
        ));
        return true;
    }
    public function indexAction() {
		
        $this->display();
    }
}