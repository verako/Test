<?php include ROOT.'/views/header.php';?>
<div class="container" style="height: 100px"></div>
<div class="container">
	<?php 
	// if (isset($_REQUEST['adduser'])) {
	// 	$login=trim($_REQUEST['login']);
	// 	$pass=trim($_REQUEST['pass']);
	// 	if ($login==""|| $pass=="") {
	// 		echo "Не заполнены поля";
	// 		exit();
	// 	}
		
		
	//}
	//else{
	
	if ($result) {
		echo "<h4>Полователь зарегистирован успешно!!!</h4>";
	}
	if (isset($errors) && is_array($errors)) {
		echo "<ul>";
		foreach ($errors as $error) {
			echo "<li>".$error."</li>";
		}
		echo "</ul>";
	}
	?>
	<form  method="post" name="reg" >
		<div class="form-group">
			<label for="name">Ваше имя</label>
			<input type="text" name="name" placeholder="Имя" value="<?php echo $name;?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="surname">Ваша фамилия</label>
			<input type="text" name="surname"  placeholder="Фамилия" value="<?php echo $surname;?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="pass">Ваш пароль</label>
			<input type="password" name="pass"  placeholder="Пароль" value="<?php echo $pass;?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="pass2">Повторите пароль</label>
			<input type="password" name="pass2"  placeholder="Повторите пароль" value="<?php echo $pass2;?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="email">Ваш Email</label>
			<input type="email" name="email"  placeholder="Эл. почта" value="<?php echo $email;?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="birthday">Выберите дату Вашего рождения</label>
			<input type="date" name="birthday" value="<?php echo $birthday;?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="gender">Выберите ваш пол</label>
			<p>Female<input type="radio" name="genderid" value="2" class="form-control"></p>
			<p>Male<input type="radio" name="genderid" value="1" checked="" class="form-control"></p>
		</div>
		<input type="submit" class="btn btn-primary" name="adduser" value="Зарегистрироваться">
	</form>
	<br>
	<?php 
	//}
	?>
</div>




<?php include ROOT.'/views/footer.php';?>
