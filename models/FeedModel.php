<?php 
include_once ROOT.'/components/Db.php';
class FeedModel{
	// public static function getUsers($id){
	// 	Db::getInstance();
	// 	$user=array();
	// 	//$id=$_SESSION["uid"];
	// 	$result=Db::getInstance()->query('SELECT name, email FROM Users WHERE id='.$id);
	// 	$i=0;
	// 	while($row=$result->fetch()){
	// 		$user[$i]['name']=$row['name'];
	// 		$user[$i]['email']=$row['email'];
	// 		$i++;
	// 	}
	// 	return $user;
	// }
	public static function checkLogged(){
		session_start();
		if(isset($_SESSION["uid"])){ 
			return $_SESSION["uid"];
		}
	}
	public static function addFeed($first_name,$uid,$message){
		Db::getInstance();
		
		$sql='INSERT INTO Feedback (first_name,uid,message) VALUE (:first_name,:uid,:message)';
		$result=Db::getInstance()->prepare($sql);
		$result->bindParam(':first_name',$first_name,PDO::PARAM_STR);
		$result->bindParam(':uid',$uid,PDO::PARAM_STR);
		$result->bindParam(':message',$message,PDO::PARAM_STR);

		return $result->execute();
	}
	public static function checkMess($message){
		if(strlen($message)>=2){
			return true;
		}
		return false;

	}
	public static function getLists(){
		Db::getInstance();
		
		$lists=array();
		$result=Db::getInstance()->query('SELECT id, first_name, message, date FROM Feedback');
		$i=0;
		while($row=$result->fetch()){
			$lists[$i]['id']=$row['id'];
			$lists[$i]['first_name']=$row['first_name'];
			$lists[$i]['message']=$row['message'];
			$lists[$i]['date']=$row['date'];
			$i++;
		}
		return $lists;

	}
	public static function addAnswer($id_feed,$first_name,$uid,$message){
		Db::getInstance();
		
		$sql='INSERT INTO Answer (id_feed,first_name,uid,message) VALUE (:id_feed,:first_name,:uid,:message)';
		$result=Db::getInstance()->prepare($sql);
		$result->bindParam(':id_feed',$id_feed,PDO::PARAM_STR);
		$result->bindParam(':first_name',$first_name,PDO::PARAM_STR);
		$result->bindParam(':uid',$uid,PDO::PARAM_STR);
		$result->bindParam(':message',$message,PDO::PARAM_STR);

		return $result->execute();
	}

	public static function getAnswer(){
		Db::getInstance();
		
		$answer=array();
		$result=Db::getInstance()->query('SELECT id, id_feed, first_name, message, date FROM Answer');
		$i=0;
		while($row=$result->fetch()){
			$answer[$i]['id']=$row['id'];
			$answer[$i]['id_feed']=$row['id_feed'];
			$answer[$i]['first_name']=$row['first_name'];
			$answer[$i]['message']=$row['message'];
			$answer[$i]['date']=$row['date'];
			$i++;
		}
		return $answer;

	}
}