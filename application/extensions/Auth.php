<?php
class Auth extends Base{
    public static function isLogin(){
        $cookie = Controller::instance("cookie");
    }
}