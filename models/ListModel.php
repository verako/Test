<?php 
include_once ROOT.'/components/Db.php';
class ListModel{
	public static function getLists(){
		Db::getInstance();
		// Db::SetParam('localhost','root','123456','bwt_test');
		// $pdo=Db::connect();
		$lists=array();
		$result=Db::getInstance()->query('SELECT name, message, date FROM Feedback');
		$i=0;
		while($row=$result->fetch()){
			$lists[$i]['name']=$row['name'];
			$lists[$i]['message']=$row['message'];
			$lists[$i]['date']=$row['date'];
			$i++;
		}
		return $lists;

	}
}