<?php include ROOT.'/views/header.php';//feedback?>
<div class="container" style="height: 100px"></div>
<div class="container">
	<form  method="post" name="addcom" action="">
		<?php 
            Db::getInstance();
           	 		
            //print_r($_SESSION);
             if(isset($_SESSION["uid"])){ 
             	echo "<div class='form-group'>";
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
		   //print_r($data_tmp);
		    echo "<div id='accordion'>";   
			foreach ($data_tmp as $key => $value) {
				echo "<h3>".$data_tmp[$key]['first_name'].",".$data_tmp[$key]['date']."<br>".$data_tmp[$key]['message']."</h3>";
				echo "<div>";
					foreach ($answer as $k => $value) {
										
						if ($data_tmp[$key]['id']==$answer[$k]['id_feed']) {
							echo "<h5>".$answer[$k]['first_name'].",".$answer[$k]['date']."<br>".$answer[$k]['message']."</h5>";
						}
						$i++;
						}	
					echo "<form  method='post' name='add' action=''>";
						echo "<div class='form-group'>";    
							echo "<input name='id_feed' type='hidden' value='".$data_tmp[$key]['id']."'>";	 	
							echo "<label for='message1'>Comment</label>";	 		
							echo "<textarea name='message1' style='width:100%'></textarea>";
						echo "</div>";				
						echo "<input type='submit' class='btn btn-primary' name='addanswer' value='Ответить'>";		
					echo "</form>";			
				echo "</div>";	
			
	 		}
	 		echo "</div>";	
		?>

</div>
<?php include ROOT.'/views/footer.php';?>
