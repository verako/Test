<?php
include_once ROOT.'/models/UserModel.php';
class UserController
{

		public function actionUser()
		{
			
			require_once(ROOT.'/views/user/login.php');
			
		}

}