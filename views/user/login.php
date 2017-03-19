<?php include ROOT.'/views/header.php';?>
<div class="container" style="height: 100px"></div>
<div class="container">
   
<?php 
require_once( ROOT.'/config/config.php');
if (empty($_GET['code'])) {
	header('location:/');
}
else{
	$token=file_get_contents("https://oauth.vk.com/access_token?client_id=".$appid."&client_secret=".$appkey."&redirect_uri=".$redirect_uri."&code=".$_GET['code']);
	$token=json_decode($token,true);
	$_SESSION['token']=$token['access_token'];
	$_SESSION['user_id']=$token['user_id'];
	$_SESSION['email']=$token['email'];
	$request_params=[
                	'user_ids'=>$_SESSION['user_id'],
                	'fields'=>'photo_50,city,verified',         //implode('.',$user),
                	'name_case'=>'Nom',
                	'access_token'=>$_SESSION['token'],
                	];
                	$url='https://api.vk.com/method/users.get?'.http_build_query($request_params);
                	$result=file_get_contents($url);
                	$result=json_decode($result,true);
	$_SESSION['first_name']=$result['response'][0]['first_name'];
	$_SESSION['last_name']=$result['response'][0]['last_name'];
	$_SESSION['photo_50']=$result['response'][0]['photo_50'];
	echo "<meta http-equiv='refresh' content='0; url=http://verakor7.beget.tech/feedback'>";


}?>
 </div>
<?php include ROOT.'/views/footer.php';?>