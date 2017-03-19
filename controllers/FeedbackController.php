<?php
include_once ROOT.'/models/FeedModel.php';
include_once ROOT.'/models/UserModel.php';
class FeedbackController
{


		public function actionView()
		{	
			$cats = FeedModel::getCats(); //из результата выборки получаем массив с категориями
			

			//добавление комментария

			$first_name='';
			$uid='';
			$message='';
			$id_feed='';
			$result=false;
			if (isset($_POST['addcomment'])) {
				$id_feed=$_POST['id_feed'];
				$first_name=$_POST['first_name'];
				$uid=$_POST['uid']; 
				$errors=false;
				$message=$_POST['message'];
				if (!FeedModel::checkMess($message)) {
					$errors[]="Наберите сообщение!";
					
				}
				if ($errors==false) {
					$result=FeedModel::addFeed($id_feed,$first_name,$uid,$message);
					return true;
				}
				
			}
			//добавление ответа
			$id_feed='';
			if (isset($_POST['addanswer'])) {
				$id_feed=$_POST['id_feed'];
				$first_name=$_POST['first_name'];
				$uid=$_POST['uid'];
				$message=$_POST['message1'];
				$indent=$_POST['indent'];
				$errors=false;
				if (!FeedModel::checkMess($message)) {
					$errors[]="Наберите сообщение!";
					
				}
				if ($errors==false) {
					$result=FeedModel::addAnswer($id_feed,$first_name,$uid,$message,$indent);
					return true;
				}
				
			}
			$answer=array();
			$answer=FeedModel::getLists();

			require_once(ROOT.'/views/feedback/view.php');

			return false;
		}

}
