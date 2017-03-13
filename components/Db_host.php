<?php
class Db{
	static private $_db=null;

	public static function getInstance(){
		if (self::$_db===null) {
			self::$_db=new PDO('mysql:host=localhost;dbname=verakor7_wall','verakor7_wall','123456');
		}
		return self::$_db;
		
	}
	private function __construct(){ }
	private function __clone()    { }
	private function __wakeup()   { }
}
