<?php
class Db{
	static private $param;
	static function SetParam($host,$user,$pass,$dbname){
		Db::$param=array($host,$user,$pass,$dbname);
		
	}

//подключение к бд MySQL строка подключения
static function connect(){
	$dsn='mysql:host='.Db::$param[0].';dbname='.Db::$param[3].';charset=utf8;';
	//массив параметров для PDO используем ассоциативный массив
	$options=array(
		PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,//сигнализировать о возникновении ошибки сразу
		PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
		PDO::MYSQL_ATTR_INIT_COMMAND=>'set names utf8'
		);
	//непосредственно подключение
	$pdo=new PDO($dsn, Db::$param[1],Db::$param[2],$options);
	return $pdo;
}
}
// class Db
// {

// 		public static function getConnection()
// 		{
// 			$paramsPath = ROOT . '/config/db_params.php';
// 			$params = include($paramsPath);


// 			$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
// 			$db = new PDO($dsn, $params['user'], $params['password']);

// 			return $db;
// 		}
// }