<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Reportar Erro</title>

  <!-- CSS  -->
  <link href="css/material-icons.css" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
		<div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <div class="row center">
          <h4 class="col s12 orange-text">Obrigado por informar o erro! Em breve entraremos
			em contato com você pelo seu email. A equipe Kappa agradece.</h4>
      </div>
</html>


<html>
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
 
    </div>
    <br><br>

    <div class="section">

    </div>
  </div>

 



  <!--  Scripts-->
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  
</html>
<?php

include '../Back/html.inc.php';
session_start();
if(!isset($_SESSION['admin'])){
     echo "<script>window.location.href='login.php';</script>";    
} 
Temp::template($_SESSION['admin'],$_SESSION['logado']);
 
