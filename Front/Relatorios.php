
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
        <title></title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <script src="js/Chart.min.js"></script>
        <script src="js/relatorios.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
<!--        <meta content="width=device-width, initial-scale=1" name="viewport">
        -->
        <link href="css/style.css" rel="stylesheet">        
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style2.css" rel="stylesheet">
    </head>

    <body>



        <nav class="light-green lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo"></a><img src ="09.jpg" style = "width:150px;height:60px;">
                <ul class="right hide-on-med-and-down">
                    <li><a href="../Front/index.html"><h5>Home</h5></a></li>
                    <li><a href="../Front/index.html"><h5>Relatorios</h5></a></li>
                    <li><a href="../Front/Inicial.php"><h5>Perfil</h5></a></li>
                    <li><a href="../Front/Inicial.php"><h5>Sair</h5></a></li>
                    <li><a href="#"><h5>Download</h5></a></li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#">Navbar Link</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>

        <header class="header">
            Relatorios

        </header><!-- .header-->

        <div class="middle">
            <div class="container">
                <main class="content">
                    <div class="box-chart">
                        . <canvas id="GraficoBarra" style="width:100%;"></canvas>


                    </div>

                </main><!-- .content -->
            </div><!-- .container-->


            <aside class="right-sidebar" name = "lateral" id="lateral">

                <form id="allforms" name ="allforms" method = post action="?go=gerar">

                    <strong><h6>CATEGORIAS</h6></strong> <!--
                    <input  type="radio"  name="finan" id ="idall" value =0 onclick="allcat()" /><label for="idall">Todas</label> -->
                    <input type="radio"  name="finan"  id ="idrec" value =0 onclick="recCat()"/><label for="idrec">Receita</label><br>
                    <input type="radio"  name="finan"   id ="iddesp" value =1 onclick="desCat()" /><label for="iddesp">Despesa</label>                          
                    <br>

                    <fieldset id="categorias2" name ="categorias2" >
                    </fieldset>

                    <fieldset id="faixas" name ="faixas" ><legend><h5>Faixa Etária</h5></legend>
                        <input type="checkbox" name="faixa1[]" id="faixa2" value=0 > <label for="faixa2">15-</label><br>
                        <input type="checkbox" name="faixa1[]" id="faixa3" value=1> <label for="faixa3">16 a 25 </label><br>
                        <input type="checkbox" name="faixa1[]" id="faixa3" value=2> <label for="faixa3">26 a 35 </label><br>
                        <input type="checkbox" name="faixa1[]" id="faixa3" value=3> <label for="faixa3">36 a 45 </label><br>
                        <input type="checkbox" name="faixa1[]" id="faixa3" value=4> <label for="faixa3">46 a 55 </label><br>
                        <input type="checkbox" name="faixa1[]" id="faixa3" value=5> <label for="faixa3">56+</label><br>
                    </fieldset>
                    <br>
                    <h5>Outros</h5>

                    <fieldset id="_ano" name ="_ano" >
                        <input type="checkbox" name="consAno" id="consAno">
                        <select name="ano" id="ano">
                            <option>ANO</option>"
                        </select>
                    </fieldset>


                    <!-- <fieldset id="_pais" name ="localidade_" > -->
                    <input type="radio" name="localidade" value=0 id="consPais" onchange="paisChange('pais', 'cidade')">
                    <select name="pais" id="pais" disabled>
                        <option>PAÍS</option>
                    </select><br>
                    <input type="radio" name="localidade" value=1 id="consEstado" onchange="paisChange('estado', 'pais')">
                    <select name="estado" id="estado" disabled>
                        <option>ESTADO</option>"
                    </select><br>

                    <!--                    </fieldset>-->


                    <fieldset method ="post" id="tipograf"><legend><h5>Gráfico</h5></legend>
                        <input type="radio" name="graf" id="idgrafp"  value=0 /><label for="idgrafp">Pizza</label>
                        <input type="radio" name="graf" id="idgrafb" checked value=1 /><label for="idgrafb">Barra</label>
                    </fieldset>

                    <br>

                    <input type="submit"  class="btn-large waves-effect waves-light orange submit " value="Gerar"/>


                </form>
                <br>
                <form method = post action="?go=voltar">

                    <input type="submit" class="btn-large waves-effect waves-light orange submit" name="commit" value="Voltar"/>



                </form>





            </aside><!-- .right-sidebar -->


        </div><!-- .middle-->


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
                    Edited by <a class="orange-text text-lighten-3" href="#">Eduardo Lemos, o pró dos TimPleit</a>
                </div>
            </div>
        </footer>

    </body>

</html>

<?php
include '../Back/AdmDB.php';
$query = "SELECT nome FROM pais";
$conn = new AdmDB;
$result = $conn->executeQuery($query);

$i = 0;
$paises = array();
foreach ($result as $r1) {
    $paises[$i] = $r1["nome"];
    $i++;
}
$r = json_encode($paises);
echo "<script>
                                    var pais = $r;
                                    for (i = 0; i < pais.length; i++) {
                            document.getElementById(\"pais\").innerHTML +=\"<option >\"+pais[i]
                                    + \"</option><br>\";
                              
                            }
                           
                        </script> --";

//---------------------------------
$query2 = "SELECT nome FROM estado";

$result2 = $conn->executeQuery($query2);

$i1 = 0;
$estados = array();
foreach ($result2 as $r1) {
    $estados[$i1] = $r1["nome"];
    $i1++;
}
$r1 = json_encode($estados);

echo "<script>
                                    var estados = $r1;
                                    for (i = 0; i < estados.length; i++) {
                            document.getElementById(\"estado\").innerHTML +=\"<option>\"+estados[i]
                                    + \"</option><br>\";
                              
                            }
                            
                        </script> --";
//---------
$query3 = "SELECT nome FROM cidade";

$result3 = $conn->executeQuery($query3);

$i2 = 0;
$cidade = array();
foreach ($result3 as $r1) {

    $cidade[$i2] = $r1["nome"];
    $i2++;
}
$r2 = json_encode($cidade);

echo "<script>
                                var cidade = $r2;
                                for (i = 0; i < cidade.length-1; i++) {
                            document.getElementById(\"cidade\").innerHTML +=\"<option>\"+cidade[i]
                            + \"</option><br>\";
                              
                            }
                            alert(cidades[0]);
                        </script> --";
//----------------------------------
$query4 = "SELECT EXTRACT(YEAR FROM data) FROM `despesa` 
UNION
SELECT EXTRACT(YEAR FROM data) FROM `receita`";

$result4 = $conn->executeQuery($query4);

$i4 = 0;
$anos = array();
foreach ($result4 as $r1) {
    $anos[$i4] = $r1["EXTRACT(YEAR FROM data)"];
    $i4++;
}
$r4 = json_encode($anos);
echo "<script>
                                var ano = $r4;
                                for (i = 0; i < ano.length; i++) {
                            document.getElementById(\"ano\").innerHTML +=\"<option value=\"+ano[i] +\">\"
                            +ano[i]
                            + \"</option><br>\";
                              
                            }
                            alert(cidades[0]);
                            alert(\"LOAD\");
                        </script> --";
//--------------------------------

if (@$_GET['go'] == "gerar") {

    include '../Back/relatorios.php';

    //considero despesas ou receitas
    $tipo = $categorias = $faixa = $ano = $pais = NULL;
    $estado = $cidade = $grafico = NULL;
    if (isset($_POST['finan'])) {
        $tipo = $_POST['finan'];
    } else {
        echo "<script> alert(\"SELECIONE RECEITA OU DESPESA!\")</script>";
        return;
    }
    if (isset($_POST['categoria'])) {
        // vejo as categorias que foram marcadas
        $categorias = $_POST['categoria'];
    }
    if (isset($_POST['faixa1'])) {
        //vejo quais faixas foram marcadas
        $faixa = $_POST['faixa1'];
    }

    if (isset($_POST['pais'])) {
        $ano = $_POST['pais'];
    }
    if (isset($_POST['estado'])) {
        $estado = $_POST['estado'];
    }
    if (isset($_POST['cidade'])) {
        $cidade = $_POST['cidade'];
    }
    if (isset($_POST['consAno'])) {
        $ano = $_POST['ano'];
        echo $ano;
    }

    $res = new relatorios;
    //$tipo, $categorias, $faixa, $ano, $pais, $estado, $cidade, $grafico)
    $dado = $res->getDados($tipo, $categorias, $faixa, $ano, $pais, $estado, $cidade, $grafico);
    if ($dado <= 0) {
        echo "<script> alert(\"A pesquisa não retornou resultado\");</script>";
        return;
    }
    $dados = json_encode($dado);

    if ($_POST['graf'] == 0) {
        echo "<script>"
        . "var dad = $dados;"
        . "graphPie(document.getElementById(\"GraficoBarra\"),dad);</script>";
    } else {
        echo "<script> "
        . "var dad = $dados;"
        . "graphBar(document.getElementById(\"GraficoBarra\"),dad)</script>";
    }
}
if (@$_GET['go'] == "voltar") {
    session_start();
    if (!isset($_SESSION["admin"])) {
        echo "<script> alert(\"VOCÊ PRECISA ESTAR LOGADO NO SISTEMA \");</script>";
        header('Location: Inicial.php');
        return;
    }

    if ($_SESSION["admin"] = true) {
        header('Location: PaginaAdministrador.php');
    } else {
        header('Location: PaginaUsuario.php');
    }
}

    