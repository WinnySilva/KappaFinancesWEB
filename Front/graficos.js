"Chart.min.js";
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
        document.write(5 + 63);
        var ctx = canvas.getContext("2d");
        var BarChart = new Chart(ctx).Bar(data, options);
    };           

}