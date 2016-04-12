<?php

/*
if (!defined('ROOT_PATH'))
	die('不能访问'); //防止直接访问
*/

define('TESTVAR1', 0.01);

// PHP 索引数组
/*
 * $cars=array("Volvo","BMW","SAAB");
 * $cars[0]="Volvo";
 */

// PHP 关联数组
/*
 * $test_v2 = $test_def1['testvar_2']; 
 * echo $test_v2['testv_2_1'];
 */
$test_def1 = array(
		'testvar_1' => '/user/login.html', //登录页
        'testvar_2' => array(
           'testv_2_1' => 'phone_code_session', //短信验证码keyname
           'testv_2_2' => 600, //保存 单位秒 600表示缓存600秒
    ),
);