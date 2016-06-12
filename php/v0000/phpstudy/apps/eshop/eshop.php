<?php

namespace  eshop;

require '\framework\BaseApp.php';
require '\packages\App\App.php';

class EShop  extends \core\BaseApp { 
    
    public function __construct()
    {        
        parent::__construct();
         echo "EShop App Create";
         echo "<br>";
         
         $apppack = new \packApp\AppPack();         
    }
}