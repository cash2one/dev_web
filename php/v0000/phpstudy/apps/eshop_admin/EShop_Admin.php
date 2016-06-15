<?php

namespace  eshop_admin;

require '\framework\BaseApp.php';
require '\packages\App\App.php';

class EShop_Admin  extends \core\BaseApp { 
    
    public function __construct()
    {        
        parent::__construct();
         echo "EShopAdmin App Create";
         echo "<br>";
         
         $apppack = new \packApp\AppPack();         
    }
    

    public function run() {
         echo "EShopAdmin App Run";
         echo "<br>";
         // http://phpstudy.com/?action=test&param1=good
         $param = $_SERVER["QUERY_STRING"];
         echo $param."<br>";
         
         include "\html\homepage.html";
    }
}