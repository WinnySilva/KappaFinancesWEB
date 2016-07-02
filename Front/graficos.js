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
    document.write("<br>_+_<br>");
    window.onload = function () {
        var ctx = canvas.getContext("2d");
        var PizzaChart = new Chart(ctx).Pie(data1, options);
    };
}
;

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