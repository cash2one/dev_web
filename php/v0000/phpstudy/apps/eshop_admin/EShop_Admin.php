<?php

namespace  eshop_admin;

require '\framework\BaseApp.php';
require '\packages\App\App.php';

class EShop_Admin  extends \core\BaseApp { 
    
    //public  $apppack_internal;
    
    // 定义类常量
    const SESSION_FIELD_USERID = "session_user";
    
    public function __construct()
    {        
        parent::__construct();
        //定义全局常量 LANGUAGE
        //define('LANGUAGE','中国');
        
         echo "EShopAdmin App Create"."<br>";
         echo __FILE__."<br>";
         echo "**********************<br>";         
         //$apppack = new \App\AppPack();    
         //$this->apppack_internal = new \App\AppPack(); 
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
                 if(!empty($_POST["inputuser"])) {  
                     echo "name:".$_POST["inputuser"]."<br>";
                 }
                 if(!empty($_POST["inputpwd"])) {  
                     echo "password:".$_POST["inputpwd"]."<br>";
                 }
                 if (!empty($_SESSION[self::SESSION_FIELD_USERID])) {
                     $userid = $_SESSION[self::SESSION_FIELD_USERID];
                     echo "find session user:".$userid."<br>";
                     $_SESSION[self::SESSION_FIELD_USERID] = $userid + 1;
                 } else {
                    $apppack = new \App\AppPack();
                    $user = $apppack->ModuleUser()->newUser();
                    //$user = $this->apppack_internal->ModuleUser()->newUser();
                     $_SESSION[self::SESSION_FIELD_USERID] = $user->userId;
                     echo "create session user:"."<br>";
                 }
             }
         }
    }
}