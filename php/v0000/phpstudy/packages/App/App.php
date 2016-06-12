<?php
namespace  packApp;

$modules = array(
    'user' => '用户' //用户模块
);

require '\framework\BasePack.php';

class AppPack extends \core\BasePack {
    
    public function __construct()
    {        
         echo "AppPack Create";
         echo "<br>";        
    }
}
