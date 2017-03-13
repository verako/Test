<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>test</title>
  	<link href='template/css/bootstrap.min.css' rel="stylesheet">
  	<link href="template/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="template/css/jquery-ui.css">
  	<script src="template/js/jquery-3.1.0.min.js"></script>
  	<script src="template/js/bootstrap.min.js"></script>
    <script src="template/js/jquery-ui.js"></script>
    <script src="template/js/script.js"></script>
  </head>

  <body style="background: white">
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- <a class="navbar-brand" href="#"><img src="images/logo.png" alt="logo" width="80" ></a> -->
          </div>
          
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li ><a href="/">Главная</a></li>
              <li ><a href="/feedback">Стена</a></li> 
            </ul>
            <?php 
            Db::getInstance();
            // Db::SetParam('localhost','root','123456','bwt_test');
            // $pdo=Db::connect();
              if(isset($_SESSION["uid"])){
               echo "<h4 id='hello'>Добро пожаловать!<a class='exit' href='logout.php'>Выйти</a></h4>";
              }
          
            ?>
            
          </div><!--/.navbar-collapse -->
        </div>
  </div>
	
