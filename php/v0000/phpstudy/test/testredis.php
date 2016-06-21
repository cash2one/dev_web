<?php
  //连接本地的 Redis 服务
  $redis = new Redis();
  $redis->connect('127.0.0.1', 6379);
  echo "Connection to server sucessfully"."<br>";
  //查看服务是否运行
  try {
      echo "Server is running: " . $redis->ping()."<br>";  //echo phpinfo();
  } catch (Exception $e) {
      print "Server Error:".$e->getMessage()."<br>";
      exit;
  }
  //exit;
  //设置 redis 字符串数据
  $redis->set("tutorial-name", "Redis tutorial");
  // 获取存储的数据并输出
  echo "Stored string in redis:: " . $redis->get("tutorial-name")."<br>";
  $redis->flushdb();
  $redis->expire('name',30);  # 设置生存时间为30秒
  echo 'name:'.$redis->get('name')."<br>";
  echo 'ttl name:'.$redis->ttl('name')."<br>";
  
  #$redis->FLUSHALL();
  $array_mset_keys=array('one'=>'1',
  'two'=>'2',
  'three '=>'3',
  'four'=>'4');
  $redis->mset($array_mset_keys); #用MSET一次储存多个值
  
  $array_mget=array('first_key','second_key','third_key');
  $redis->del($array_mget); #同时删除多个key
  
  
  
  
  
