
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
        <title></title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <script src="Chart.min.js"></script>
        <script src="graficos.js"></script>
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <link href="style2.css" rel="stylesheet">

    </head>

    <body>

        <div class="wrapper">

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

                <script type="text/javascript">
                    var desp = ["Vestuario",
                        "Energia",
                        "Agua",
                        "Internet",
                        "Aluguel",
                        "Remedios",
                        "Lazer",
                        "Educacao",
                        "Alimentos",
                        "Produtos Domesticos",
                        "Transporte",
                        "Combustivel",
                        "Bens_Duraveis"];
                    function allcat() {
                        //document.write(0);
                        document.getElementById("categorias2").innerHTML = "<legend><h1>Tipos de Finança</h1></legend>";
                        for (i = 0; i < desp.length; i++) {
                            document.getElementById("categorias2").innerHTML +=
                                    "<input type=\"checkbox\" name=\"categoria[]\" value=" + i
                                    + " > "
                                    + desp[i]
                                    + "<br>";
                        }
                        document.getElementById("categorias2").innerHTML +=
                                "<input type=\"checkbox\" name=\"categoria[]\" value=" + i++
                                + " > "
                                + "Salario"
                                + "<br>";
                        document.getElementById("categorias2").innerHTML +=
                                "<input type=\"checkbox\" name=\"categoria[]\" value=" + i++
                                + " > "
                                + "Renda Alternativa"
                                + "<br>";
                        document.getElementById("categorias2").innerHTML += "<br><br><br>";
                    }
                    function desCat() {
                        document.getElementById("categorias2").innerHTML = "<legend><h1>Tipos de Finança</h1></legend>";
                        for (i = 0; i < desp.length; i++) {
                            document.getElementById("categorias2").innerHTML +=
                                    "<input type=\"checkbox\" name=\"categoria[]\" value="
                                    + (i + 1)
                                    + " > "
                                    + desp[i]
                                    + "<br>";
                        }
                        document.getElementById("categorias2").innerHTML += "<br><br><br><br>";
                    }
                    function recCat() {
                        document.getElementById("categorias2").innerHTML = "<legend><h1>Tipos de Finança</h1></legend>";
                        document.getElementById("categorias2").innerHTML +=
                                "<input type=\"checkbox\" name=\"categoria[]\" value=1"
                                + " > "
                                + "Salario"
                                + "<br>";
                        document.getElementById("categorias2").innerHTML +=
                                "<input type=\"checkbox\" name=\"categoria[]\" value=2"
                                + " > "
                                + "Renda Alternativa"
                                + "";
                    }
                </script>
                <aside class="right-sidebar" name = "lateral" id="lateral">

                    <form id="allforms" name ="allforms" method = post action="?go=gerar">

                        <strong><h6>CATEGORIAS</h6></strong> <!--
                        <input  type="radio"  name="finan" id ="idall" value =0 onclick="allcat()" /><label for="idall">Todas</label> -->
                        <input type="radio"  name="finan"  id ="idrec" value =0 onclick="recCat()"/><label for="idrec">Receita</label><br>
                        <input type="radio"  name="finan"   id ="iddesp" value =1 onclick="desCat()" /><label for="iddesp">Despesa</label>                          
                        <br>

                        <fieldset id="categorias2" name ="categorias2" >
                        </fieldset>

                        <fieldset id="faixas" name ="faixas" ><legend><h1>Faixa Etária</h1></legend>
                            <input type="checkbox" name="faixa1[]" id="faixa2" value=0 > <label for="faixa2">15-</label><br>
                            <input type="checkbox" name="faixa1[]" id="faixa3" value=1> <label for="faixa3">16 a 25 </label><br>
                            <input type="checkbox" name="faixa1[]" id="faixa3" value=2> <label for="faixa3">26 a 35 </label><br>
                            <input type="checkbox" name="faixa1[]" id="faixa3" value=3> <label for="faixa3">36 a 45 </label><br>
                            <input type="checkbox" name="faixa1[]" id="faixa3" value=4> <label for="faixa3">46 a 55 </label><br>
                            <input type="checkbox" name="faixa1[]" id="faixa3" value=5> <label for="faixa3">56+</label><br>
                        </fieldset>
                        <br>
                        <h1>Outros</h1>

                        <fieldset id="_ano" name ="_ano" >
                            <input type="checkbox" name="consAno" id="consAno">
                            <select name="ano" id="ano">
                                <option>ANO</option>"
                            </select>
                        </fieldset>
                        <script>
                            function paisChange(id1, id2, id3) {
                                document.getElementById(id1).disabled = false;
                                document.getElementById(id2).disabled = true;
                                document.getElementById(id3).disabled = true;
                            }
                        </script>
                        
                        <fieldset id="_pais" name ="localidade_" >
                            <input type="radio" name="localidade" value=0 id="consPais" onchange="paisChange('pais', 'estado', 'cidade')">
                            <select name="pais" id="pais" disabled>
                                <option>PAÍS</option>
                            </select><br>
                            <input type="radio" name="localidade" value=1 id="consEstado" onchange="paisChange('estado', 'cidade', 'pais')">
                            <select name="estado" id="estado" disabled>
                                <option>ESTADO</option>"
                            </select><br>
                            <input type="radio" name="localidade" value =2 id="consCidade" onchange= "paisChange('cidade', 'pais', 'estado')">
                            <select name="cidade" id="cidade" disabled>
                                <option>CIDADE</option>"
                            </select><br>
                        </fieldset>
                        

                        <fieldset method ="post" id="tipograf"><legend><h1>Gráfico</h1></legend>
                            <input type="radio" name="graf" id="idgrafp"  value=0 /><label for="idgrafp">Pizza</label>
                            <input type="radio" name="graf" id="idgrafb" checked value=1 /><label for="idgrafb">Barra</label>
                        </fieldset>

                        <br>
                        <p class="submit">
                            <input type="image" src="Imagens/bottoes/gerar.png" height="30px" width="100px"
                                   type="submit" name="commit" value="gerar"
                                   />

                        </p>
                    </form>
                    <form method = post action="?go=voltar">
                        <p class="submit">
                            <input type="image" src="Imagens/bottoes/voltar.png" height="30px" width="100px"
                                   type="submit" name="commit" value="voltar"
                                   />

                        </p>
                    </form>





                </aside><!-- .right-sidebar -->


            </div><!-- .middle-->

            <footer class="footer">
                <strong>Footer:</strong> Mus elit Morbi mus enim lacus at quis Nam eget morbi. Et semper urna urna non at cursus dolor vestibulum neque enim. Tellus interdum at laoreet laoreet lacinia lacinia sed Quisque justo quis. Hendrerit scelerisque lorem elit orci tempor tincidunt enim Phasellus dignissim tincidunt. Nunc vel et Sed nisl Vestibulum odio montes Aliquam volutpat pellentesque. Ut pede sagittis et quis nunc gravida porttitor ligula.
            </footer><!-- .footer -->

        </div><!-- .wrapper -->

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
echo $r4;

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
    echo "pressionado<br>";
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
    if (isset($_POST['faixa'])) {
        //vejo quais faixas foram marcadas
        $faixa = $_POST['faixa'];
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
    echo "voltando";
    $array = [1, 2, 3, 4, 5, 6];
    $text = 4;
    $en = json_encode($array);
    $e = 1;
    echo "---<script>
    var arr = $en;
var x = 2;    
for(i=0;i<arr.length;i++){
    document.write(arr[i]+\"<br>\");
        }
    </script>---";

    $r = "<script> document.write(x)</script>";
    echo $r;
    $b = $r + 1;
    echo "   --  " . $b;
}

    