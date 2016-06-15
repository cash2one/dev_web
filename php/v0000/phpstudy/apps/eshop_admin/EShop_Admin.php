<?php

namespace  eshop_admin;

require '\framework\BaseApp.php';
require '\packages\App\App.php';

class EShop_Admin  extends \core\BaseApp { 
    
    public function __construct()
    {        
        parent::__construct();
         echo "EShopAdmin App Create"."<br>";
         echo __FILE__."<br>";
         echo "**********************<br>";         
         $apppack = new \packApp\AppPack();         
    }    

    public function run() {
         echo "EShopAdmin App Run"."<br>";
         // http://phpstudy.com/?action=test&param1=good
         include "\html\homepage.html";

         if (isset($_POST)) {
             if(!empty($_POST["param"])) {                 
                 $postdata = $_POST["param"];
                 if (!empty($postdata)) {
                     echo "name:".$_POST["inputuser"]."<br>";
                     echo "password:".$postdata[1]."<br>";
                 };                            
             }  else {
                 echo "name:".$_POST["inputuser"]."<br>";
                 echo "password:".$_POST["inputpwd"]."<br>";
             }
         }
    }
}