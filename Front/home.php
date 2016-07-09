<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>HOME</title>
        <meta charset="utf-8" />
        <!-- CSS  -->
        <link href="css/material-icons.css" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <script src="js/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <script src="js/Chart.min.js"></script>
        <script src="js/relatorios.js"></script>
        <link rel="icon" href="09.png" type="image/x-icon" />
        <link rel="shortcut icon" href="09.jpg" type="image/x-icon" />
    </head>
    <body>
        <!--        <div class="section no-pad-bot" id="index-banner">
                    <div class="container">
                        <br><br>
                        <h1 class="header center orange-text">Что такое Lorem Ipsum?</h1>
                        <div class="row center">
                            <h5 class="header col s12 light">Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.<br>Totalmente gratuito!</h5>
                        </div>
                        <br><br>
        
                    </div>
                </div>-->

        <div class="container">
            <div class="section">
                <h1 class="header center orange-text">Relatório Pessoal</h1>
                <canvas id="GraficoBarra" style="width:100%;"></canvas>

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
                            <p class="light">No mundo atual, o comprometimento entre as equipes desafia a capacidade de equalização do orçamento setorial.  </p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center light-green-text"><i class="material-icons">settings</i></h2>
                            <h5 class="center">Fácil de usar</h5>

                            <p class="light">É importante questionar o quanto o consenso sobre a necessidade de qualificação maximiza as possibilidades por conta do orçamento setorial.</div>
                    </div>
                </div>

            </div>
            <br><br>

            <div class="section">

            </div>
        </div>

    </body>

</html>
<?php
include '../Back/AdmDB.php';
include '../Back/html.inc.php';
//ob_start();
session_start();
if (!isset($_SESSION['admin'])) {
    //   echo "<script>window.location.href='login.php';</script>";    
}
//$_SESSION['admin'],$_SESSION['logado']
Temp::template(true, true);

$query = "SELECT SUM(Despesa.valor),CategoriaDespesa.nome FROM Despesa 
                        JOIN CategoriaDespesa on Despesa.idCategoriaDespesa= CategoriaDespesa.idCategoriaDespesa
                        WHERE Despesa.usuario_cpf= " . $_SESSION['CPF']
        . " GROUP by CategoriaDespesa.idCategoriaDespesa";

$conn2 = new AdmDB;
$result = $conn2->executeQuery($query);
$i = 0;
$auxVet = Array();
foreach ($result as $r1) {

    $auxVet[$i] = array($r1["SUM(Despesa.valor)"], $r1["nome"]);

    $i++;
}
$finacas = json_encode($auxVet);

echo "<script>"
 . "var dad= $finacas;"
 . " graphBar(document.getElementById(\"GraficoBarra\"),dad);"
 . "</script>";
