<?php include ROOT.'/views/header.php';?>
<div class="container" style="height: 100px"></div>
<div class="container">
<h1>Авторизация</h1>
	
<?php  
//авторизация

require_once('config/config.php');
if (empty($_SESSION['token'])) {
	echo "<a href='https://oauth.vk.com/authorize?client_id=".$appid."&display=page&redirect_uri=http://verakor7.beget.tech/user/login&scope=".$scope."&response_type=code&v=5.62'><img src='../template/images/vk_com-iphone.png' alt='' style='width:150px'></a>";
    echo "<img src='../template/images/facebook.png' alt='' style='width:80px'>";
    
}
else{
    echo "<meta http-equiv='refresh' content='0; url=http://verakor7.beget.tech/feedback'>";
	echo "<br><a href='logout.php'><img src='../template/images/exit.png' alt='' style='width:100px'></a>";
	
}
?>
  
</div>
<div style="height: 600px"></div>




<?php include ROOT.'/views/footer.php';?>
