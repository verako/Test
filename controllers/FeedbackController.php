<?php
include_once ROOT.'/models/FeedModel.php';
include_once ROOT.'/models/UserModel.php';
class FeedbackController
{


		public function actionView()
		{	
			
			$list=array();
			$list=FeedModel::getLists();

			//сортировка по убыванию по ключу id
			$list_id=array();
			//Генерируем "определяющий" массив
			foreach($list as $key=>$arr){
			    $list_id[$key]=$arr['id'];
			}
			 
			for($i=0; $i<100000; $i++){
			    $data_tmp=$list;
			    array_multisort($data_tmp,SORT_DESC,$list_id );
			}

			//добавление комментария

			$first_name='';
			$uid='';
			$message='';
			$result=false;
			if (isset($_POST['addcomment'])) {
				$first_name=$_POST['first_name'];
				$uid=$_POST['uid'];
				$message=$_POST['message'];
				// $errors=false;
				
				// if ($errors==false) {
					$result=FeedModel::addFeed($first_name,$uid,$message);
					return true;
				//}
				
			}
			//добавление ответа
			$id_feed='';
			if (isset($_POST['addanswer'])) {
				$id_feed=$_POST['id_feed'];
				$first_name='Vera';//$_POST['first_name'];
				$uid='1254575';//$_POST['uid'];
				$message=$_POST['message1'];
				// $errors=false;
				
				// if ($errors==false) {
					$result=FeedModel::addAnswer($id_feed,$first_name,$uid,$message);
					return true;
				//}
				
			}
			$answer=array();
			$answer=FeedModel::getAnswer();
			


			require_once(ROOT.'/views/feedback/view.php');

			return false;
		}

}
