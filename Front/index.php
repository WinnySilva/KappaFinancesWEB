<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Kappa Finances</title>

        <!-- CSS  -->
        <link href="css/material-icons.css" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link rel="icon" href="09.png" type="image/x-icon" />
        <link rel="shortcut icon" href="09.jpg" type="image/x-icon" />
    </head>
    <body>

        <nav class="light-green lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo"><img src ="09.jpg"  width="150" height="60" alt ="KappaDolar"/></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="../Front/index.php">Home</a></li>
                    <li><a href="../Front/login.php">Login</a></li>
                    <li><a href="../Front/Cadastro.php">Criar Conta</a></li>
                    <li><a href="../Front/download.php">Download</a></li>

                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="../Front/index.php">Home</a></li>
                    <li><a href="../Front/login.php">Login</a></li>
                    <li><a href="../Front/Cadastro.php">Criar Conta</a></li>
                    <li><a href="../Front/download.php">Download</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>

        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
                <br><br>
                <h1 class="header center orange-text">Kappa Finances Web</h1>
                <div class="row center">
                    <h5 class="header col s12 light">Software financeiro totalmente funcional, sem bugs e programado por idiotas!<br>Totalmente gratuito!</h5>
                </div>
                <div class="row center">
                    <!--trocar o link e descrição-->
                    <a href="Cadastro.php" id="download-button" class="btn-large waves-effect waves-light orange">Crie sua conta agora!</a>
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
                            <h5 class="center">Calculos Financeiros Rápidos</h5>
                            <p class="light">Fazemos todos os calculos e gráficos para facilitar sua vida!</p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center light-green-text"><i class="material-icons">group</i></h2>
                            <h5 class="center">Baseado nos Softwares Financeiros Pagos</h5>
                            <p class="light">Não sei oque digitar aqui... Inventem algo pfv...  </p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center light-green-text"><i class="material-icons">settings</i></h2>
                            <h5 class="center">Fácil de usar</h5>

                            <p class="light">Ao clicar de um botão, toda sua informação financeira é atualizada.</div>
                    </div>
                </div>

            </div>
            <br><br>

            <div class="section">

            </div>
        </div>

        <footer class="page-footer orange">
            <div class="container">
                <div class="row">

                    <div class="col l6 s12">
                        <h5 class="white-text">Quem somos</h5>
                        <p class="grey-text text-lighten-4">Estudantes da Universidade Federal de Pelotas que pretendem tirar uma nota razoável no trabalho de Desenvolvimento de Software e se formar no futuro!</p>
                    </div>

                </div>
            </div>

            <div class="footer-copyright">
                <div class="container">
                    Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
                    Copyright (c) 20016 Kappa Finances All Rights Reserved
                </div>
            </div>
        </footer>


        <!--  Scripts-->
        <script src="js/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>

    </body>
</html>
<?php
session_start();
$_SESSION = array();
?>