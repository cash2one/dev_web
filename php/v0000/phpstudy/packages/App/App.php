<?php
namespace  App;

$modules = array(
    'user' => '用户' //用户模块
);

if (!defined('APP'))  {
    //die('no app');//防止直接访问
    die('no app');//防止直接访问
}

require '\framework\BasePack.php';
require '\packages\App\pmUser\UserModule.php';

class AppPack extends \core\BasePack {
    
    public $module_user;
    
    public function __construct()
    {        
         echo "AppPack Create"."<br>";
    }
    // 析构函数
    function __destruct(){
         echo "AppPack Destroy"."<br>";
    }
    
    public function ModuleUser() {
         
        if (empty($module_user)) {
            $module_user = new UserModule();
        }
        return $module_user;
    }
}
