<!DOCTYPE html>
<html lang="br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Download</title>

        <!-- CSS  -->
        <link href="css/material-icons.css" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link rel="icon" href="09.png" type="image/x-icon" />
        <link rel="shortcut icon" href="09.jpg" type="image/x-icon" />
    </head>
    <body>

        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
                <br><br>
                <div class="row center">
                    <h4 class="col s12 orange-text">Você está prestes a adquirir um software de extrema
                        qualidade desenvolvido pela Kappa Corporation. Parabéns!</h4>
                </div>

                <br>

            </div>
        </div>

    <center><br>
        <a href= "downloads/KappaFinances.tar" onclick="Materialize.toast('Seu dowload será iniciado!', 2600, 'rounded')" class="waves-effect waves-light green btn-large" title="Clique para realizar o download." ><i class="material-icons right">play_for_work</i>Download</a><br>
        Erro no dowload? Clique<a href= "erro.php"> aqui</a>.
    </center>		

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
$log = false;
if (isset($_SESSION['logado'])) {
    $log = true;
//echo "<script>window.location.href='login.php';</script>";    
}
$adm = false;
if (isset($_SESSION['admin'])) {
    $adm = $_SESSION['admin'];
//echo "<script>window.location.href='login.php';</script>";    
}
Temp::template($adm, $log);
