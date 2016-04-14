<?php

class NetAction {

	static public function checkLogin() {
    	global $serviceAPI;
    	$serviceApiConf = $serviceAPI;
    	
    	$clientUA = $serviceApiConf['ClientUA'];
    	$clientSignKey = $serviceApiConf['ClientSignKey'];
    	$serviceApiEntry = $serviceApiConf['APIEntryUrl'];
    
    	$args = json_encode($args);
    	$sign = "{$clientUA}{$clientSignKey}{$clientUA}";
    	$sign = md5("{$sign}{$call}{$sign}{$args}{$sign}");
    	$postArgs = "call={$call}&args={$args}&sign={$sign}&ua={$clientUA}";
    
	    $ch = curl_init();
	    //设置请求参数
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_USERAGENT, $clientUA);
	    curl_setopt($ch, CURLOPT_URL, $serviceApiEntry);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $postArgs);

	    //设置其他参数
	    curl_setopt($ch, CURLOPT_FRESH_CONNECT, false);
	    curl_setopt($ch, CURLOPT_FORBID_REUSE, false);
	    curl_setopt($ch, CURLOPT_HEADER, false);
	    curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array());
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	    curl_setopt($ch, CURLOPT_TIMEOUT, $serviceApiConf['ExecuteTimeout']); //设置cURL允许执行的最长秒数
	    //curl_setopt($ch, CURLOPT_TIMEOUT_MS, $serviceApiConf['ExecuteTimeout']*1000); //设置cURL允许执行的最长毫秒数
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $serviceApiConf['ConnectTimeout']);  //在发起连接的超时时间，如果设置为0，则无限等待
	    //curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, $serviceApiConf['ConnectTimeout']*1000);  //在发起连接的超时时间，单位为ms. 如果设置为0，则无限等待

	    //调用接口, 同步等待接受响应数据
	    $response = curl_exec($ch);
	    
	    $httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
	    if($httpCode!=200){
		    $errorMsg = "request api error. http status: {$httpCode};";
		    $errorMsg .= " curl_errno: ".curl_errno($ch)."; curl_error: ".curl_error($ch);
		    curl_close($ch);        //关闭curl, 释放资源
		    return $errorMsg;
	    }

	    if(0!==curl_errno($ch)){
		    $errorMsg = curl_error($ch);
		    curl_close($ch);        //关闭curl, 释放资源
		    return $errorMsg;
	    }
	    curl_close($ch);        //关闭curl, 释放资源

	    return json_decode($response, true);		
	}
}
?>