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
   define("APP","eshop");
   
   $module_file = ".\\test\\router.php";
   $module_file = ".\\apps\\eshop\\index.php";
   include $module_file;
?>
