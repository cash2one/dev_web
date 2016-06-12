<?php

namespace  template;

require 'framework\BaseApp.php';

class AppTemplate  extends \core\BaseApp { 
    
    public function __construct()
    {        
        parent::__construct();
         echo "AppTemplate Create";
    }
}