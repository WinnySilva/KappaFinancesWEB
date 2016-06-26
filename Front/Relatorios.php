
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
    var randomnb = function(){ 
                return Math.round(Math.random()*300);
            };
function graphPie(canvas){  
    var options = {
        responsive:true
    };

    var data = [
        {
            value: randomnb(),
            color:"#F7464A",
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

    window.onload = function(){

        var ctx = canvas.getContext("2d");
        var PizzaChart = new Chart(ctx).Pie(data, options);
    };  
};

function graphBar(canvas){
    var options = {
            responsive:true
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

    window.onload = function(){
       
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
                            
                            
                          <fieldset id="tipograf"><legend>Gráfico</legend>
                            <input type="radio" name="graf" id="idgrafp" checked value=2 /><label for="idgrafp">Pizza</label><br/>
                            <input type="radio" name="graf" id="idgrafb" value=1 /><label for="idgrafb">Barra</label>
                        </fieldset>  
                          </div>
                        
                        </main><!-- .content -->
		</div><!-- .container-->

		<aside class="right-sidebar">
                    <strong>Lado</strong> 
                    <form id="financatipo" name ="fin" method="POST"><legend>Tipo de Finança</legend>
                       
                            <input  type="radio" name="finan"    value=1  id ="idall" onclick="submit();"/><label for="idall">Todas</label>
                            <input type="radio"  name="finan"  value=2 id ="idrec" onclick="submit();"/><label for="idrec">Receita</label><br/>
                            <input type="radio"  name="finan"  value=3  id ="iddesp"onclick="submit();" /><label for="iddesp">Despesa</label>                          
                    </form>
                    <script>
                       // document.getElementById("financatipo").submit;
                        </script>
                        
                                  
                    <form method="post" >                       
                        <?php
                        //$value = 
                        $tr = true;
                       if($tr){
                        echo "<script> "
                      
                       //         . "document.fin.submit();"
                               . "</script>";      
                         $tr = false;
                       }
                       echo $_POST['finan']."SSS";
                        include '../Back/AdmDB.php';
                        $conn = new AdmDB();
                      // echo "document.getElementById(\"GraficoBarra\")";
                        $query = (2=== 2)? "SELECT * FROM CategoriaDespesa": "SELECT * FROM CategoriaReceita";
                        $result = $conn->executeQuery($query);
                        $i=0;
                        echo " <fieldset id=\"categorias\" ><legend>Categorias de Finança</legend>";
                        while ($line=$result->fetch(PDO::FETCH_ASSOC)){
                            echo "<input type=\"checkbox\" name=\"categoria\" value="
                           
                            . " > "
                            . $line["nome"]
                                    . "<br>";
                            $i++;
                        }
                        echo "</fieldset>";

                        ?>
                        <select name="nestado" id="idestado">
                                <option>Selecione o Estado</option>
                                <?php
                                    try {
                                        $conexao=new PDO("mysql:host=localhost;dbname=kappadb","root", "");
                                        $conexao->exec("SET CHARACTER SET utf8");
                                    }catch(PDOException $e){
                                        echo $e->getMessage();
                                    }
                                    $resultado=$conexao->prepare("SELECT idestado, nome FROM Estado");
                                    $resultado->execute();
                                    while($linha=$resultado->fetch(PDO::FETCH_ASSOC)){
                                        $estadotabela = $linha['nome'];
                                        $idestadotabela = $linha['idestado'];
                                        echo "<option value='$estadotabela'>$estadotabela</option>";
                                    }
                                ?>
                        </select>   
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
    echo "<script> graphPie(document.getElementById(\"GraficoBarra\"))</script>";
    
    
    //graphBar(document.getElementById("GraficoBarra"));


    