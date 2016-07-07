<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Starter Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  
    
    
    <div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
      <h1 class="header center orange-text">Что такое Lorem Ipsum?</h1>
      <div class="row center">
          <h5 class="header col s12 light">Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.<br>Totalmente gratuito!</h5>
      </div>
      <br><br>

    </div>
  </div>

  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-green-text"><i class="material-icons">trending_up</i></h2>
            <h5 class="center">Calculos Financeiros RÃ¡pidos</h5>
            <p class="light">Fazemos todos os calculos e grÃ¡ficos para facilitar sua vida!</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-green-text"><i class="material-icons">group</i></h2>
            <h5 class="center">Baseado nos Softwares Financeiros Pagos</h5>
            <p class="light">NÃ£o sei oque digitar aqui... Inventem algo pfv...  </p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-green-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">FÃ¡cil de usar</h5>

            <p class="light">Ao clicar de um botÃ£o, toda sua informaÃ§Ã£o financeira Ã© atualizada.</div>
        </div>
      </div>

    </div>
    <br><br>

    <div class="section">

    </div>
  </div>

 
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
<?php
include '../Back/AdmDB.php';
include '../Back/html.inc.php';
ob_start();
session_start();
if(!isset($_SESSION['admin'])){
     echo "<script>window.location.href='login.php';</script>";    
} 
Temp::template($_SESSION['admin'],$_SESSION['logado']);