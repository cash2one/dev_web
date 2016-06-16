<?php 
   //$_DocumentPath = $_SERVER['DOCUMENT_ROOT'];
   //var_dump($_DocumentPath); // "E:/workspace_php/phpstudy"
   //$_FilePath = __FILE__;
   //var_dump($_FilePath); // "E:\workspace_php\phpstudy\index.php"
   //$_RequestUri = $_SERVER['REQUEST_URI'];
   //var_dump($_RequestUri);  // "/"
   //$_AppPath = str_replace($_DocumentPath, '', $_FilePath);    //==>\router\index.php
   //var_dump($_AppPath); // "E:\workspace_php\phpstudy\index.php"
   // 这里就是重定向
   //$module_file = ".\\test\\test1.php";
   ini_set('session.gc_maxlifetime', '86400');     //设置Session最大超时时间为一天   
   $site = $_SERVER['SERVER_NAME'];
   if ("phpstudy.com" === $site) {
      $module_file = ".\\test\\router.php";
      $module_file = ".\\test\\test1.php";
   } else {
     if ("eshop.com" === $site) {
         $module_file = ".\\apps\\eshop\\index.php";
         define("APP","eshop");
     } else {
         $module_file = ".\\apps\\eshop_admin\\index.php";
         define("APP","eshop");
     }
   }   
   echo "REQUEST_METHOD:".$_SERVER['REQUEST_METHOD']."<br>";
   $httprequest = $_SERVER['REQUEST_METHOD'];
   
   if ("GET" === $httprequest) {
       echo "is get"."<br>";
   } else {
       echo "is not get"."<br>";
   }
   
   echo "REQUEST_URI:".$_SERVER['REQUEST_URI']."<br>";
   echo "PHP_SELF:".$_SERVER["PHP_SELF"]."<br>";
   echo "QUERY_STRING:".$_SERVER["QUERY_STRING"]."<br>";
   echo "SERVER_ADDR:".$_SERVER['SERVER_ADDR']."<br>";
   echo "SERVER_NAME:".$_SERVER['SERVER_NAME']."<br>";
   echo "SERVER_PROTOCOL:".$_SERVER['SERVER_PROTOCOL']."<br>";
   echo __FILE__."<br>";
   echo "**********************<br>";
   //echo $GLOBALS['HTTP_RAW_POST_DATA']."<br>";
   include $module_file;
?>
