<?php

namespace  App;

require '\framework\BaseModule.php';
require '\packages\App\objects\User.object.php';

class UserModule extends \core\BaseModule {

    public function __construct()
    {
        echo "UserModule Create"."<br>";
    }
    // 析构函数
    function __destruct(){
         echo "UserModule Destroy"."<br>";
    }
    
    public function login($userObj) {
        
    }
    
    public function newUser() {
        return new user\UserObj();
    }
}
