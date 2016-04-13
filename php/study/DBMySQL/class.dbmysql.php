﻿<?php

if (!defined('ROOT_PATH'))
	die('不能访问'); //防止直接访问

Class mysql{

	var $db_link; //数据库连接信息
	var $db_show_error; //是否记录错误信息到日志
	var $db_display_error; //是否将db错误日志输出到浏览器客户端
	var $db_prefix; //数据库前缀名
	
	/**
	 * 构造函数
	 * */
	
	public function __construct($db_config) {
		$this->db_show_error = false;
		$this->db_display_error =  isset($db_config['db_display_error'])? $db_config['db_display_error']:false;
		$this->db_prefix = $db_config['prefix'];
		$this->db_link = $this->db_connect($db_config);
		$this->mysql_error_path = "data";
		$this->ip = ip_address();
	}
	
	/**
	 * 连接数据库
	 * */
	public function db_connect($db_config) {
		//检查服务器上是否已经安装了连接数据库的此函数
		if (!function_exists('mysql_connect')) {
			$this->db_error_msg('您的数据库还未安装此扩展');
		}
	
		$db_config['host'] = urldecode($db_config['host']);
		$db_config['user'] = urldecode($db_config['user']);
		$db_config['pwd'] = isset($db_config['pwd']) ? urldecode($db_config['pwd']) : '';
		$db_config['name'] = urldecode($db_config['name']);
		$db_config['language'] = urldecode($db_config['language']);
		//是否有端口存在
		if (isset($db_config['port'])) {
			$db_config['host'] = $db_config['host'] . ':' . $db_config['port'];
		}
	
		//连接数据库
		$db_link = @mysql_connect($db_config['host'], $db_config['user'], $db_config['pwd'], TRUE, 2);
		if (!$db_link || !mysql_select_db($db_config['name'], $db_link)) {
			$this->db_error_msg("数据库连接失败：mysql_error:" . mysql_error());
		}
	
		mysql_query('SET NAMES "' . $db_config['language'] . '"', $db_link);
		return $db_link;
	}
	
	/**
	 * sql处理
	 * */
	public function db_sql_pre($sql) {
		while (preg_match('/{([a-zA-Z0-9_-]+)}/', $sql, $regs)) {
			$found = $regs[1];
			$sql = preg_replace("/\{" . $found . "\}/", $this->db_prefix . $found, $sql);
		}
		return $sql;
	}
	
	public function db_query($sql = "", $noreplace = "") {
		if ($noreplace == "") {
			while (preg_match('/{([a-zA-Z0-9_-]+)}/', $sql, $regs)) {
				$found = $regs[1];
				$sql = preg_replace("/\{" . $found . "\}/", $this->db_prefix . $found, $sql);
			}
		}
		$result = mysql_query($sql);
		if (!$result) {
			$this->db_error_msg(mysql_error() . "执行SQL语句错误!" . $sql);
		}
		return $result;
	}
	
	/**
	 * 处理多条sql
	 * */
	public function db_querys($sql = "", $noreplace = "") {
		$_sql = explode(";", $sql);
		foreach ($_sql as $value) {
			$value = trim($value);
			if (!empty($value)) {
				$result = $this->db_query($value . ";", $noreplace);
			}
		}
		if (!$result) {
			$this->db_error_msg(mysql_error() . "执行SQL语句错误!" . $sql);
		}
		return $result;
	}
	
	/**
	 * 处理memcache
	 * */
	public function db_query_memcache($sql, $type = '') {
		global $memcache, $memcachelife;
		$key = md5($sql);
		if (!($query = $memcache->get($key))) {
			$query = $this->query($sql, $type);
			while ($item = $this->fetch_array($query)) {
				$res[] = $item;
			}
			$query = $res;
			$memcache->set($key, $query, 0, $memcachelife);
		}
		return $query;
	}
	
	/**
	 * 执行一个SQL语句,返回前一条记录或仅返回一条记录
	 * */
	public function db_fetch_array($sql) {
		global $memcache, $memcachelife, $memcache_result;
		if ($memcache_result != 0) {
			$key = md5($sql . "one");
			if (!($query = $memcache->get($key))) {
				$result = $this->db_query($sql);
				$res = mysql_fetch_array($result, MYSQL_ASSOC);
				$_res = "";
				if (is_array($res)) {
					foreach ($res as $key => $value) {
						//$_res[$key] = htmlspecialchars($value);//直接转义
						$_res[$key] = $value;
					}
				}
				$memcache->set($key, $_res, 0, $memcachelife);
				$query = $_res;
			}
		} else {
			$result = $this->db_query($sql);
			$res = mysql_fetch_array($result, MYSQL_ASSOC);
			$_res = "";
			if (is_array($res)) {
				foreach ($res as $key => $value) {
					//$_res[$key] = htmlspecialchars($value);//直接转义
					$_res[$key] = $value;
				}
			}
			$query = $_res;
		}
		return $query;
	}
	
	/**
	 * 获取全部的记录
	 * */
	public function db_fetch_arrays($sql) {
		global $memcache, $memcachelife, $memcache_result;
		if ($memcache_result != 0) {
			$key = md5($sql . "more");
			if (!($query = $memcache->get($key))) {
				$result = $this->db_query($sql);
				$i = 0;
				$_res = array();
				while ($res = mysql_fetch_array($result, MYSQL_ASSOC)) {
					foreach ($res as $key => $value) {
						$_res[$i][$key] = $value; //直接转义
					}
					$i++;
				}
				$this->db_free_result($result); //释放资源
				$memcache->set($key, $_res, 0, $memcachelife);
				$query = $_res;
			}
		} else {
			$result = $this->db_query($sql);
			$i = 0;
			$_res = array();
			while ($res = mysql_fetch_array($result, MYSQL_ASSOC)) {
				foreach ($res as $key => $value) {
					$_res[$i][$key] = $value; //直接转义
				}
				$i++;
			}
			$this->db_free_result($result); //释放资源
			$query = $_res;
		}
		return $query;
	}
	
	/**
	 * 释放记录集占用的资源
	 * */
	public function db_free_result($result) {
		if (is_array($result)) {
			foreach ($result as $key => $value) {
				if ($value)
					@mysql_free_result($value);
			}
		}else {
			@mysql_free_result($result);
		}
	}
	
	/**
	 * 获取查询的总记录数
	 * */
	public function db_num_rows($sql, $noreplace = "") {
		$result = $this->db_query($sql, $noreplace);
		$cnt =  mysql_num_rows($result);
		$this->db_free_result($result);
		return $cnt;
	}
	
	/**
	 * 获取修改删除的总记录数
	 * 失败为-1
	 * */
	public function db_affected_rows($sql, $noreplace = "") {
		$result = $this->db_query($sql, $noreplace);
		return mysql_affected_rows();
	}
	
	/**
	 * 获取插入进去的ID
	 * */
	public function db_insert_id() {
		return mysql_insert_id();
	}
	
	/**
	 * 返回服务器中mysql的版本.
	 * */
	public function db_version() {
		list($version) = explode('-', mysql_get_server_info());
		return $version;
	}
	
	/**
	 * 关闭数据库
	 * */
	public function db_close() {
		@mysql_close($this->db_link);
	}
	
	/**
	 * 是否打印错误信息
	 * */
	public function db_show_msg($i = false) {
		$this->db_show_error = $i;
	}
	
	public function db_add($code, $var, $notime = "", $fields = "") {
		$sql = "insert into `{" . $code . "}` set ";
		foreach ($var as $key => $value) {
			$_sql[] = "`$key`='$value'";
		}
		$sql = $sql . join(",", $_sql);
		if ($notime == "") {
			$sql .= ",addtime='" . time() . "',addip='$this->ip'";
		}
		$result = $this->db_query($sql);
		$id = $this->db_insert_id();
		if ($result != false && $fields != "") {
			$this->db_add_fields($code, $id, $fields);
		}
	
		return $result;
	}
	
	public function db_add_fields($code, $id, $fields) {
		$sql = "insert into `{" . $code . "_fields}` set ";
		if (is_array($fields)) {
			foreach ($fields as $key => $value) {
				if ($key != "") {
					$sql .= "`$key`='$value',";
				}
			}
		}
		$sql .= "id=$id";
		$this->db_query($sql);
	}
	
	public function db_select($table, $where = "") {
		$sql = "select * from `{" . $table . "}` ";
		if ($where != "")
			$sql .= " where $where";
			return $this->db_fetch_array($sql);
	}
	
	public function db_show_fields($table) {
		$sql = "SHOW COLUMNS FROM  `{" . $table . "}` ";
		$result = $this->db_fetch_arrays($sql);
		foreach ($result as $key => $value) {
			$_result[] = $value['Field'];
		}
		return $_result;
	}
	
	public function db_selects($table, $where = "", $order = "") {
		$sql = "select * from `{" . $table . "}` ";
		if ($where != "")
			$sql .= " where $where";
			if ($order != "")
				$sql .= " order by $order";
				//p($sql);
				return $this->db_fetch_arrays($sql);
	}
	
	public function db_list($table, $where = "", $page = "", $epage = 10, $order = "") {
		$_sql = "";
		$sql = "select count(*) as num from `{" . $table . "}` ";
		if ($where != "")
			$_sql .= " where $where";
			$_result = $this->db_fetch_array($sql . $_sql);
			if ($page != "") {
				$vpage = ($page - 1) * $epage;
			}
			$sql = "select * from `{" . $table . "}` $_sql order by ";
			if ($order != "")
				$sql .= "$order,";
				$sql .= " addtime desc ";
				if ($page != "")
					$sql .= " limit $vpage,$epage";
					$result = $this->db_fetch_arrays($sql);
					return array("result" => $result, "num" => $_result['num']);
	}
	
	public function db_list_res($sql, $page = "", $epage = 10) {
		if ($page != "") {
			$vpage = ($page - 1) * $epage;
			$sql .= " limit $vpage,$epage";
		}
		return $this->db_fetch_arrays($sql);
	}
	
	public function db_num($sql) {
		$_result = $this->db_fetch_array($sql);
		return $_result['num'];
	}
	
	public function db_count($table, $where = "") {
		$sql = "select count(*) as num from `{" . $table . "}` ";
		if ($where != "")
			$sql .= " where $where";
			$_result = $this->db_fetch_array($sql);
			return $_result['num'];
	}
	
	public function db_update($code, $data, $where, $fields = "") {
	
		if ($fields != "") {
			$sql = "select * from `{" . $code . "_fields}` where $where";
			$result = $this->db_fetch_array($sql);
			if ($result == false) {
				$sql = "insert into `{" . $code . "_fields}` set $where";
				$this->db_query($sql);
			}
			$_sql = array();
			if (is_array($fields)) {
				$sql = "update `{" . $code . "_fields}` set ";
				foreach ($fields as $key => $value) {
					if ($key != "") {
						$_sql[] = "`$key`='$value'";
					}
				}
				$sql .= join(",", $_sql) . " where $where";
				$this->db_query($sql);
			}
		}
	
		$sql = "update `{" . $code . "}` set ";
		$_sql = "";
		foreach ($data as $key => $value) {
			$_sql[] = "`$key`='$value'";
		}
		$sql .= join(",", $_sql) . " where $where";
		return $this->db_query($sql);
	}
	
	public function db_order($table, $order, $where, $type) {
		foreach ($type as $key => $id) {
			$sql = "update `{" . $table . "}` set `order`='" . $order[$key] . "' where `$where`=$id";
			$this->db_query($sql);
		}
		return true;
	}
	
	public function db_delete($table, $where) {
		$sql = "delete from `{" . $table . "}` where $where ";
		return $this->db_query($sql);
	}
	
	/**
	 * 显示数据链接错误信
	 * */
	public function db_error_msg($msg) {
		if ($this->db_show_error) {
			$mysql_dir = $this->mysql_error_path;
			$dtime = date("Y-m-d", time());
			$ip = ip_address();
			$file = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"];
			if (!file_exists($mysql_dir . "/mysql_error")) {
				mkdir($mysql_dir . "/mysql_error", 0777);
			}
			$fp = @fopen($mysql_dir . "/mysql_error/" . $dtime . ".log", "a+");
			$time = date("H:i:s");
			$str = "{visitedtime:$time}\t{visiterip:" . $ip . "}\t{errormsg:" . $msg . "}\t{file:" . $file . "}\t\r\n";
			@fputs($fp, $str);
			@fclose($fp);
		}
		if($this->db_display_error){
			die($msg);
		}
		return false;
	}
	
	}
	
?>