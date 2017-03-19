<?php 
include_once ROOT.'/components/Db.php';
class FeedModel{
	
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

	
 
}