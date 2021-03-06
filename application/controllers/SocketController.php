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

class SocketController extends Controller {

    /**
     * 首页
     *
     * @access public
     * @return void
     */
    public function indexAction() {
		
        $this->display();
    }
    
    public function runAction(){
        $socket = $this->instance("Socket");
        $socket->init('127.0.0.1',8000);
        $socket->run();
    }

}