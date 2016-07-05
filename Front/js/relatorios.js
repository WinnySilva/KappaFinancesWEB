"Chart.min.js";
var randomnb = function () {
    return Math.round(Math.random() * 300);
};

var cores = ["#FF5A5E", "#5AD3D1", "#FFC870",
    "#DC143C", "#FF8C00", "#D2691E", "#8B4513", "#D8BFD8", "#556B2F",
    "#8FBC8F", "#2F4F4F", "#5F9EA0", "#FF00FF", "#000000"];

function graphPie(canvas, dados) {
    var options = {
        responsive: true
    };
    var data0 =[];
    data0 = dados;
    var data1 = [];
    for (i = 0; i <data0.length; i++) {
        
        val = (dados[i][0]<0)?dados[i][0]*-1:dados[i][0];
        data1.push({
            value: Math.abs(dados[i][0]), //randomnb(),
            color: cores[i],
            highlight:"#FFDAB9",
            label: dados[i][1].replace("_"," ")
        });
           
    }
    
    window.onload = function () {
        var ctx = canvas.getContext("2d");
        var PizzaChart = new Chart(ctx).Pie(data1, options);
    };
}


//<script type="text/javascript">
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
                        document.getElementById("categorias2").innerHTML = "<legend><h5>Tipos de Finança</h5></legend>";
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
                        document.getElementById("categorias2").innerHTML = "<legend><h5>Tipos de Finança</h5></legend>";
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
 //               </script>
 //<script>
                            function paisChange(id1, id2) {
                                document.getElementById(id1).disabled = false;
                                document.getElementById(id2).disabled = true;
//                                document.getElementById(id3).disabled = true;
                            }
   //                     </script>


function graphBar(canvas,dados) {
    var options = {
        responsive: true
    };
    var auxDados = dados;
    var labels = [];
    for(i=0;i<auxDados.length;i++){
        labels.push(dados[i][1].replace("_"," "));
    }
    
    
    var datas = [];
    for(i=0;i<auxDados.length;i++){
        datas.push(Math.abs(dados[i][0]));
    }

    var data = {
        labels: labels,//["Janeiro", "Fevereiro"],
        datasets: [
            /*
            {
                label: "Dados primários",
                fillColor: "rgba(220,220,220,0.5)",
                strokeColor: "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data: datas //[randomnb(), randomnb()]
            },*/
            {
                label: "Dados secundários",
                fillColor: "rgba(151,187,205,0.5)",
                strokeColor: "rgba(151,187,205,0.8)",
                highlightFill: "rgba(151,187,205,0.75)",
                highlightStroke: "rgba(151,187,205,1)",
                data: datas//[28, 48]
            }
        ]
    };

    window.onload = function () {

        var ctx = canvas.getContext("2d");
        var BarChart = new Chart(ctx).Bar(data, options);
    };

}