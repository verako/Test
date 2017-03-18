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
	public static function addFeed($id_feed,$first_name,$uid,$message){
		Db::getInstance();
		
		$sql='INSERT INTO Feedback (id_feed,first_name,uid,message) VALUE (:id_feed,:first_name,:uid,:message)';
		$result=Db::getInstance()->prepare($sql);
		$result->bindParam(':id_feed',$id_feed,PDO::PARAM_STR);
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
		$result=Db::getInstance()->query('SELECT id,id_feed, first_name, message, date,indent FROM Feedback');
		$i=0;
		while($row=$result->fetch()){
			$lists[$i]['id']=$row['id'];
			$lists[$i]['id_feed']=$row['id_feed'];
			$lists[$i]['first_name']=$row['first_name'];
			$lists[$i]['message']=$row['message'];
			$lists[$i]['date']=$row['date'];
			$lists[$i]['indent']=$row['indent'];
			$i++;
		}
		return $lists;

	}
	public static function addAnswer($id_feed,$first_name,$uid,$message,$indent){
		Db::getInstance();
		
		$sql='INSERT INTO Feedback (id_feed,first_name,uid,message,indent) VALUE (:id_feed,:first_name,:uid,:message,:indent)';
		$result=Db::getInstance()->prepare($sql);
		$result->bindParam(':id_feed',$id_feed,PDO::PARAM_STR);
		$result->bindParam(':first_name',$first_name,PDO::PARAM_STR);
		$result->bindParam(':uid',$uid,PDO::PARAM_STR);
		$result->bindParam(':message',$message,PDO::PARAM_STR);
		$result->bindParam(':indent',$indent,PDO::PARAM_STR);

		return $result->execute();
	}

	// public static function getAnswer(){
	// 	Db::getInstance();
		
	// 	$answer=array();
	// 	$result=Db::getInstance()->query('SELECT id, id_feed, first_name, message, date FROM Feedback');
	// 	$i=0;
	// 	while($row=$result->fetch()){
	// 		$answer[$i]['id']=$row['id'];
	// 		$answer[$i]['id_feed']=$row['id_feed'];
	// 		$answer[$i]['first_name']=$row['first_name'];
	// 		$answer[$i]['message']=$row['message'];
	// 		$answer[$i]['date']=$row['date'];
	// 		$i++;
	// 	}
	// 	return $answer;

	// }

	public static function getCats(){
   
    $levels = array();
    $tree = array();
    $cur = array();
  	$res =Db::getInstance()->query("SELECT * FROM Feedback ORDER BY id DESC");
    while($rows = $res->fetch()){
       
        $cur = &$levels[$rows['id']];
        $cur['id'] = $rows['id'];
        $cur['id_feed'] = $rows['id_feed'];
        $cur['first_name'] = $rows['first_name'];
        $cur['message'] = $rows['message'];
        $cur['date'] = $rows['date'];
        $cur['indent'] = $rows['indent'];
       
        if($rows['id_feed'] == 0){
            $tree[$rows['id']] = &$cur;
        }
        else{
            $levels[$rows['id_feed']]['children'][$rows['id']] = &$cur;
        }
       
    }
    return $tree;
   
	}

	// public static function getTree($arr){
   
 //    $out = '';
   
 //    $out .= '<ul>';
 //    foreach($arr as $k=>$v){
       
 //        $out .= '<li>id='.$k.'comm:'.$v['message'].'</li>';
 //        if(!empty($v['children'])){
 //            $out .= getTree($v['children']);
 //        }
       
 //    }
 //    $out .= '</ul>';
 //    return $out;
   
	// }
 
}