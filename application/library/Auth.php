<?php
class Auth{
    const cookieuname = "cookie.uname";
    const cookiesign = "cookie.sign";
    
    
    public static function isLogin(){
        $cookie = Controller::instance("Cookie");
        $uname = $cookie->get(Auth::cookieuname);
        return $uname;
    }
    
    public static function saveLoginInfo($mix){
        $cookie = Controller::instance("Cookie");
        if(is_array($mix)){
            foreach ($mix as $key=>$val){
                $cookie->set($key, $val);
            }
        }
    }
}