<?php
include_once ROOT.'/models/UserModel.php';
class UserController
{

		public function actionLogin()
		{
			//добавление user

			$first_name='';
			$last_name='';
			$uid='';
			$photo='';
			$result=false;
			if (isset($_POST['adduser'])) {
				$first_name=$_POST['first_name'];
				$first_name=$_POST['last_name'];
				$uid=$_POST['uid'];
				$photo=$_POST['photo'];
				// $errors=false;
				
				// if ($errors==false) {
					$result=UserModel::addUser($first_name,$last_name,$uid,$photo);
					return true;
				//}
				
			}
			require_once(ROOT.'/views/user/login.php');
			return true;
		}

}