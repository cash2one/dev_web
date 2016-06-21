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
   
   function runindex1() {
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
   echo "file:".__FILE__."<br>";
   echo "dir:".__DIR__."<br>";
   // 这个变量在调试错误的时候，还是比较有作用的，其他的时候，没什么用处
   echo "line:".__LINE__."<br>"; 
   echo "namespace:".__NAMESPACE__."<br>";
   echo "**********************<br>";
   //echo $GLOBALS['HTTP_RAW_POST_DATA']."<br>";
   include $module_file;
   }

   function runindex2() {
     //echo "REQUEST_URI:".$_SERVER['REQUEST_URI']."<br>";
       $curl = curl_init();        //初始化实例
       curl_setopt($curl, CURLOPT_URL, "http://www.hepaidai.com"); //设置URL地址
       curl_setopt($curl, CURLOPT_URL, "http://www.oschina.net/");
       curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);        //5秒连接超时
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);        //设为1返回Http响应结果
     //伪造客户端，最好设一下，有些网站会根据客户端来阻隔请求的
     curl_setopt($curl, CURLOPT_USERAGENT, 'User-Agent: Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0');        
     $response = curl_exec($curl);        //curl执行http请求，响应存到$response变量中
     echo  $response;
     $state = curl_getinfo($curl, CURLINFO_HTTP_CODE);        //可以用这句来获取响应的状态码
     curl_close($curl);        //
   }
   runindex2();
?>
