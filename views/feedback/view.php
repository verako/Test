<?php include ROOT.'/views/header.php';//feedback?>
<div class="container" style="height: 100px"></div>
<div class="container">
	<form  method="post" name="addcom" action="">
		<?php 
            Db::getInstance();
           	 		
            //print_r($_SESSION);
             if(isset($_SESSION["uid"])){ 
             	echo "<div class='form-group'>";
             	echo "<input name='id_feed' type='hidden' value='".$data_tmp[0]['id']."'>";
				echo "<label for='first_name'>Name</label>";
				echo "<input type='text' name='first_name' value='".$users[0]['first_name']."' class='form-control'>";
			    echo "</div>";
			    echo "<div class='form-group' hidden>";
				echo "<label for='uid'>Email adres</label>";
				echo "<input type='text' name='uid' value='".$users[0]['uid']."' class='form-control'></div>";
        	}
     		else{
        ?>	
			<div class="form-group">
				<label for="first_name">Name</label>
				<input type="text" name="first_name" class="form-control">
			</div>
								
			<div class="form-group">
				<label for="uid">uid adres</label>
				<input type="uid" name="uid" class="form-control">
			</div>

			 <?php 
			 echo "<input name='id_feed' type='hidden' value='0'>";//".$data_tmp[0]['id']."
     		}
     		
         ?>
			<div class="form-group">
				<label for="message">Comment</label>
				<textarea name="message" style=" width:100% " ></textarea>
			</div>
			<input type="submit" class="btn btn-primary" name="addcomment">
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
					echo "<div class='form-group'>";    
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
						echo "<label for='message1'>Comment</label>";	 		
						echo "<textarea name='message1' style='width:50%'></textarea>";
					echo "</div>";				
					echo "<input type='submit' class='btn btn-primary' name='addanswer' value='Ответить'>";		
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
