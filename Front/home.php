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


	</head>


	<style>
body {	
    background: url("Imagens/background.jpg");
    background-size: 900px 650px;
    background-repeat: no-repeat;
    background-position: center top;
    background-blend-mode: color-dodge;
}


</style>

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

    <body>

<?php
	
	// Desabilita Warnings
    error_reporting(0);

	/* Conectar com o banco de dados da aplicação */
    $link = mysqli_connect('localhost', 'root', '') or die('Erro ao conectar');
    mysqli_select_db($link, 'KappaDB') or die('Erro ao conectar com o banco de dados');
    
	session_start();
	$cpf = $_SESSION["CPF"];
	$query = sprintf("SELECT nome,sexo FROM Usuario WHERE cpf=".$cpf);
    $dados = mysqli_query($link, $query) or die(mysqli_error($link));
    $linha = mysqli_fetch_assoc($dados);
	
	
	if($linha['sexo']=='F')
		echo "<br><br><br><br><center> <font color='orange' size=14>Seja bem vinda ". $linha['nome']. "!</center> </font>";
	else
		echo "<br><br><br><br><center> <font color='orange' size=14>Seja bem vindo ". $linha['nome']. "!</center> </font>";
	
	
?>

    <div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
      <div class="row center">
          <h5 class="header col s12 light">Obrigado por usar o KappaFinances! Usufrua de nossos serviços com responsabilidade. Qualquer dúvida, sugestão ou reclamação é só entrar em contato conosco. 
			Não esqueça que o KappaFinances é totalmente gratuito e sempre será assim! Logo abaixo você pode ser seu gráfico de finanças. Para
			visualizar os dados de outros usuários pesquise em "Relatórios".</h5>
      </div>
      <br><br>
    </div>
  </div>

<br><br><br><br>
        <div class="container">
            <div class="section">
                <h1 class="header center orange-text">Relatório Pessoal de Despesas</h1>
                <canvas id="GraficoBarra" style="width:100%;"></canvas>
            <br><br>
            <div class="section">

            </div>
        </div>

    </body>

</html>
<?php
error_reporting(0); // desativa as mensagens de erro
include '../Back/AdmDB.php';
include '../Back/html.inc.php';

session_start();
if (!isset($_SESSION['admin'])) {
    //   echo "<script>window.location.href='login.php';</script>";    
}
//$_SESSION['admin'],$_SESSION['logado']
Temp::template($_SESSION['admin'], $_SESSION['logado']);

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

