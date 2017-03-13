<?php 
include_once ROOT.'/components/Db.php';
class UserModel{
	private $_db=null;
	public function __construct(){
		$this->_db=Db::getInstance();
	}
	
	public static function addUser($first_name,$last_name,$uid,$photo){

		Db::getInstance();
		
		$sql='INSERT INTO Users (first_name,last_name,uid,photo) VALUE (:first_name,:last_name,:uid,:photo)';
		$result=Db::getInstance()->prepare($sql);
		$result->bindParam(':first_name',$first_name,PDO::PARAM_STR);
		$result->bindParam(':last_name',$last_name,PDO::PARAM_STR);
		$result->bindParam(':uid',$uid,PDO::PARAM_STR);
		$result->bindParam(':photo',$photo,PDO::PARAM_STR);

		return $result->execute();
		
	}
	public static function auth($userName){
		session_start();
		$_SESSION['uid']=$userName;
	}
	

}