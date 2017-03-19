<?php include ROOT.'/views/header.php';?>
<div class="container" style="height: 100px"></div>
<div class="container">
<?php    //авторизация

require_once('config/config.php');
if (empty($_SESSION['token'])) {
    echo "<h1>Авторизация</h1>";
    echo "<a href='https://oauth.vk.com/authorize?client_id=".$appid."&display=page&redirect_uri=http://verakor7.beget.tech/user/login&scope=".$scope."&response_type=code&v=5.62'><img src='../template/images/vk_com-iphone.png' alt='' style='width:150px'></a>";
    echo "<img src='../template/images/facebook.png' alt='' style='width:80px'>";
}
else{
   //echo "<meta http-equiv='refresh' content='0; url=http://verakor7.beget.tech/feedback'>";
	echo " <a href='logout.php'><img src='../template/images/exit.png' alt='' style='width:100px'></a><br><br><br>";

	echo "<img src=".$_SESSION['photo_50']." >";
	echo "<br>".$_SESSION['first_name']." ".$_SESSION['last_name'];

}


?>


	<form  method="post" name="addcom" action="">
		<?php 
            Db::getInstance();
           	 		
            //print_r($_SESSION);
             if(isset($_SESSION["user_id"])){ 
             	echo "<div class='form-group'>";
             	echo "<input name='id_feed' type='hidden' value='0'>";
				echo "<input type='hidden' name='first_name' value='".$_SESSION['first_name']."'>";
				echo "<input type='hidden' name='uid' value='".$_SESSION['user_id']."'>";
				echo "<textarea name='message' style='width:100%' placeholder='Ваш комментарий'></textarea>";
			    echo "</div>";
			    echo '<input type="submit" class="btn btn-primary" name="addcomment" value="Отправить">';
        	}
     		else{
       			echo '<div class="form-group">';
					echo '<textarea name="message" style=" width:100% " readonly>Чтобы оставить комментарий авторизуйтесь!</textarea>';
				echo "</div>";
			
     		}
     		
         ?>
			
			
	</form>
</div>
<!-- комментарии -->
<div class="container" style="height: 100px"></div>
<div class="container">
	
	<?php 
	Db::getInstance();
		 
	 		function getTree($cats){
			
	 		foreach ($cats as $key => $value) {
	 			echo "<h3 style='font-size:17px;padding-left:".$cats[$key]['indent']."px'>".$cats[$key]['first_name'].",".$cats[$key]['date']."<br><span style='font-size:15px;font-style:italic;padding:20px'>".$cats[$key]['message']."</span></h3>";


	 			echo "<form  method='post' name='add' action=''>";
					echo "<div class='form-group' style='padding-left:20px'>";    
						echo "<input name='id_feed' type='hidden' value='".$cats[$key]['id']."'>";
						$indent=0;
						if ($cats[$key]['indent']==0 and $cats[$key]['id_feed']==0) {
							$indent=20;
							echo "<input name='indent' type='hidden' value='".$indent."'>";
						}
						elseif ($cats[$key]['indent']!=0 || $cats[$key]['id_feed']!=0) {
							$indent=$cats[$key]['indent']+20;
							echo "<input name='indent' type='hidden' value='".$indent."'>";
						}
						
						if (empty($_SESSION['token'])) {
						 
						 echo '<textarea name="message1" style="width:50% " readonly>Чтобы оставить комментарий авторизуйтесь!</textarea>';
						 echo "</div>";  
						}
						else{
						 echo "<input type='hidden' name='first_name' value='".$_SESSION['first_name']."'>";
						 echo "<input type='hidden' name='uid' value='".$_SESSION['user_id']."'>";		
					 	 echo "<textarea name='message1' style='width:50%'></textarea>";
					     echo "</div>";				
					     echo "<input type='submit' class='btn btn-primary' name='addanswer' value='Ответить'>";
					    	
					    }
						
					
					
					
				echo "</form>";	
			 
	 			if (!empty($value['children'])) {
	 				getTree($value['children']);
	 			}
	 		}

	 		}
	 		echo "<div id='accordion'>";
	 		echo $tree = getTree($cats);
	 		echo "</div>";
	 		
	 	
	?>

</div>
<?php include ROOT.'/views/footer.php';?>
