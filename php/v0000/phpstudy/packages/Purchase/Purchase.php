<?php

namespace  packPurchase;

if (!defined('APP'))  die('');//防止直接访问

require '\framework\BasePack.php';

class PurchasePack extends \core\BasePack {
    
    public function __construct()
    {        
         echo "PurchasePack Create";
         echo "<br>";        
    }
}
