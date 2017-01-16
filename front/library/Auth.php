<?php
class Auth{
    const cookieuname = "uname";
    const cookiesign = "sign";
    
    
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