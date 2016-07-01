
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
        <title></title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <script src="Chart.min.js"></script>
        <meta content="width=device-width, initial-scale=1" name="viewport">

        <link href="style2.css" rel="stylesheet">

    </head>

    <body>


        <script>
            var randomnb = function () {
                return Math.round(Math.random() * 300);
            };
            function graphPie(canvas) {
                var options = {
                    responsive: true
                };

                var data = [
                    {
                        value: randomnb(),
                        color: "#F7464A",
                        highlight: "#FF5A5E",
                        label: "Vermelho"
                    },
                    {
                        value: randomnb(),
                        color: "#46BFBD",
                        highlight: "#5AD3D1",
                        label: "Verde"
                    },
                    {
                        value: randomnb(),
                        color: "#FDB45C",
                        highlight: "#FFC870",
                        label: "Amarelo"
                    }
                ];

                window.onload = function () {

                    var ctx = canvas.getContext("2d");
                    var PizzaChart = new Chart(ctx).Pie(data, options);
                };
            }
            ;

            function graphBar(canvas) {
                var options = {
                    responsive: true
                };

                var data = {
                    labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
                    datasets: [
                        {
                            label: "Dados primários",
                            fillColor: "rgba(220,220,220,0.5)",
                            strokeColor: "rgba(220,220,220,0.8)",
                            highlightFill: "rgba(220,220,220,0.75)",
                            highlightStroke: "rgba(220,220,220,1)",
                            data: [randomnb(), randomnb(), randomnb(), randomnb(), randomnb(), randomnb(), randomnb(), randomnb(), randomnb(), randomnb(), randomnb(), randomnb()]
                        },
                        {
                            label: "Dados secundários",
                            fillColor: "rgba(151,187,205,0.5)",
                            strokeColor: "rgba(151,187,205,0.8)",
                            highlightFill: "rgba(151,187,205,0.75)",
                            highlightStroke: "rgba(151,187,205,1)",
                            data: [28, 48, 40, 19, 86, 27, 90, randomnb(), randomnb(), randomnb(), randomnb(), randomnb()]
                        }
                    ]
                };

                window.onload = function () {

                    var ctx = canvas.getContext("2d");
                    var BarChart = new Chart(ctx).Bar(data, options);
                };

            }


        </script>




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
                <?php
                include '../Back/AdmDB.php';
                ?>   
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
                                    + i
                                    + " > "
                                    + desp[i]
                                    + "<br>";
                        }
                        document.getElementById("categorias2").innerHTML += "<br><br><br><br>";


                    }
                    function recCat() {
                        document.getElementById("categorias2").innerHTML = "<legend><h1>Tipos de Finança</h1></legend>";

                        document.getElementById("categorias2").innerHTML +=
                                "<input type=\"checkbox\" name=\"categoria[]\" value=0"
                                + " > "
                                + "Salario"
                                + "<br>";

                        document.getElementById("categorias2").innerHTML +=
                                "<input type=\"checkbox\" name=\"categoria[]\" value=1"
                                + " > "
                                + "Renda Alternativa"
                                + "";



                    }
                </script>
                <aside class="right-sidebar" name = "lateral" id="lateral">

                    <form id="allforms" name ="allforms" method = post action="?go=gerar">

                        <strong><h6>CATEGORIAS</h6></strong> <!--
                        <input  type="radio"  name="finan" id ="idall" value =0 onclick="allcat()" /><label for="idall">Todas</label> -->
                        <input type="radio"  name="finan"  id ="idrec" value =1 onclick="recCat()"/><label for="idrec">Receita</label><br>
                        <input type="radio"  name="finan"   id ="iddesp" value =2 onclick="desCat()" /><label for="iddesp">Despesa</label>                          
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
                        <fieldset id="_pais" name ="_pais" >
                            <input type="checkbox" name="consPais" id="consPais">
                            <select name="pais" id="ano">
                                <option>PAÍS</option>"
                            </select>
                        </fieldset>
                        <fieldset id="_estado" name ="_estado" >
                            <input type="checkbox" name="consEstado" id="consEstado">
                            <select name="estado" id="ano">
                                <option>ESTADO</option>"
                            </select>
                        </fieldset>
                        <fieldset id="_cidade" name ="_cidade" >
                            <input type="checkbox" name="consCidade" id="consCidade">
                            <select name="cidade" id="ano">
                                <option>CIDADE</option>"
                            </select>
                        </fieldset>
                        <fieldset method ="post" id="tipograf"><legend><h1>Gráfico</h1></legend>
                            <input type="radio" name="graf" id="idgrafp" checked value=0 /><label for="idgrafp">Pizza</label>
                            <input type="radio" name="graf" id="idgrafb" value=1 /><label for="idgrafb">Barra</label>
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
//graphBar(document.getElementById("GraficoBarra"));
if (@$_GET['go'] == "gerar") {
    echo "pressionado<br>";
    //considero despesas ou receitas
    if (isset($_POST['finan'])) {
        echo $_POST['finan'] . "<br>";
    }

    if (isset($_POST['categoria'])) {
        // vejo as categorias que foram marcadas
        foreach ($_POST['categoria'] as $cat) {
            echo $cat . " ";
        }
        echo"<br>";
    }
    if (isset($_POST['faixa'])) {
        //vejo quais faixas foram marcadas
        foreach ($_POST['faixa1'] as $cat) {
            echo $cat . " ";
        }
        echo"<br>";
    }
    if (isset($_POST['consAno'])) {
        echo "considerar ano<br>";
    }
    if (isset($_POST['consPais'])) {
        echo "considerar pais<br>";
    }
    if (isset($_POST['consEstado'])) {
        echo "considerar ESTADO<br>";
    }
    if (isset($_POST['consCidade'])) {
        echo "considerar Cidade<br>";
    }
    if ($_POST['graf'] == 0) {
        echo "<script> graphPie(document.getElementById(\"GraficoBarra\"))</script>";
        //echo $_POST['graf'];
    } else {
        echo "<script> graphBar(document.getElementById(\"GraficoBarra\"))</script>";
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
    $b = $r+1;
    echo "   --  ".$b;
}

    