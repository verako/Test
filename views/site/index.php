<?php include ROOT.'/views/header.php';?>
<div class="container" style="height: 100px"></div>
<div class="container">
	
<?php  
//авторизация

require_once('config/config.php');
if (empty($_SESSION['token'])) {
	echo "
		<a href='https://oauth.vk.com/authorize?client_id=".$appid."&display=page&redirect_uri=".$redirect_uri."&scope=".$scope."&response_type=code&v=5.62'>Авторизация</a>

	";
}
else{
	echo " <br> Token:".$_SESSION['token']."<br> ID:".$_SESSION['user_id']."<br><a href='logout.php'>Exit</a>";
	$request_params=[
	'user_ids'=>$_SESSION['user_id'],
	'fields'=>'photo_50,city,verified',         //implode('.',$user),
	'name_case'=>'Nom',
	'access_token'=>$_SESSION['token'],
	];
	$url='https://api.vk.com/method/users.get?'.http_build_query($request_params);
	$result=file_get_contents($url);
	$result=json_decode($result,true);
	print_r($result) ;
	echo "<img src=".$result['response'][0]['photo_50']." >";
}
?>
  
</div>
<div style="height: 600px"></div>


<?php include ROOT.'/views/footer.php';?>
