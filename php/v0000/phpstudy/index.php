<?php 
   $_DocumentPath = $_SERVER['DOCUMENT_ROOT'];
   //var_dump($_DocumentPath); // "E:/workspace_php/phpstudy"
    
   $_FilePath = __FILE__;
   //var_dump($_FilePath); // "E:\workspace_php\phpstudy\index.php"
   
   //$_RequestUri = $_SERVER['REQUEST_URI'];
   //var_dump($_RequestUri);  // "/"
   
   $_AppPath = str_replace($_DocumentPath, '', $_FilePath);    //==>\router\index.php
   //var_dump($_AppPath); // "E:\workspace_php\phpstudy\index.php"
   
   // 这里就是重定向
   //$module_file = ".\\test\\test1.php";
   $module_file = ".\\test\\router.php";
   include $module_file;
?>
