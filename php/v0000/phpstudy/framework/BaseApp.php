<?php

namespace  core;

class BaseApp {    
    
    public function __construct()
    {        
        echo "<br>";
        echo "BaseApp Create"."<br>";
        echo "class:".__CLASS__." | ".get_class($this)."<br>";
        echo "<br>";
        echo "function:".__FUNCTION__."<br>";  
        echo "method:".__METHOD__."<br>";  
        //echo "static:".__STATIC__."<br>";
    }    
}