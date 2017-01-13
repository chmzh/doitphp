<?php
class Auth{
    const cookieuname = "cookie.uname";
    const cookiesign = "cookie.sign";
    public static function isLogin(){
        $cookie = Controller::instance("cookie");
        $uname = $cookie->getCookie(Auth::cookieuname);
        return $uname;
    }
    
    public static function saveLoginInfo($mix){
        
        print_r($mix);
        
        if(is_array($mix)){
            foreach ($mix as $key=>$val){
                $this->setCookie($key, $val);
            }
        }
    }
}