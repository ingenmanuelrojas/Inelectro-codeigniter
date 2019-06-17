$(function () {

   chart1();
   chart2();
   chart3();
   chart4();
	
})

function chart1(){
    var areaChartCanvas  = $('#barChart').get(0).getContext('2d');
    var areaChart        = new Chart(areaChartCanvas);
    var param_valores = []
    $.post(base_url2+'/sistema/dashboard/chart1', function(data) {
        datos = $.parseJSON(data);

        var param_valores = [datos.e.total_afiliados_mes,datos.f.total_afiliados_mes,datos.m.total_afiliados_mes,datos.a.total_afiliados_mes,datos.ma.total_afiliados_mes,datos.j.total_afiliados_mes,datos.jl.total_afiliados_mes,datos.ag.total_afiliados_mes,datos.s.total_afiliados_mes,datos.o.total_afiliados_mes,datos.n.total_afiliados_mes,datos.d.total_afiliados_mes];

        var areaChartData = {
            labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            datasets: [
                {
                    label                : 'Camisas',
                    fillColor            : 'rgba(191, 63, 65, 0.9)',
                    strokeColor          : 'rgba(0, 0, 0, 0.9)',
                    pointColor           : '#3b8bba',
                    pointStrokeColor     : 'rgba(60,141,188,1)',
                    pointHighlightFill   : '#fff',
                    pointHighlightStroke : 'rgba(60,141,188,1)',
                    data                 : param_valores
                }
            ]
        }
        areaChart.Bar(areaChartData, areaChartOptions);
    });
}

function chart2(){
    var areaChartCanvas2 = $('#barChart2').get(0).getContext('2d')
    var areaChart2       = new Chart(areaChartCanvas2)
    var param_valores2 = [];
    $.post(base_url2+'/sistema/dashboard/chart2', function(data) {
        datos = $.parseJSON(data);
        
        var param_valores2 = [datos.e.total_afiliados_torneos_mes,datos.f.total_afiliados_torneos_mes,datos.m.total_afiliados_torneos_mes,datos.a.total_afiliados_torneos_mes,datos.ma.total_afiliados_torneos_mes,datos.j.total_afiliados_torneos_mes,datos.jl.total_afiliados_torneos_mes,datos.ag.total_afiliados_torneos_mes,datos.s.total_afiliados_torneos_mes,datos.o.total_afiliados_torneos_mes,datos.n.total_afiliados_torneos_mes,datos.d.total_afiliados_torneos_mes];

        var areaChartData2 = {
          labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
          datasets: [
            {
                label                : 'Camisas',
                fillColor            : 'rgba(191, 63, 65, 0.9)',
                strokeColor          : 'rgba(0, 0, 0, 0.9)',
                pointColor           : '#3b8bba',
                pointStrokeColor     : 'rgba(60,141,188,1)',
                pointHighlightFill   : '#fff',
                pointHighlightStroke : 'rgba(60,141,188,1)',
                data                : param_valores2
              }
          ]
        }
        areaChart2.Bar(areaChartData2, areaChartOptions);
        
    });

}

function chart3(){
    var areaChartCanvas2 = $('#barChart3').get(0).getContext('2d')
    var areaChart2       = new Chart(areaChartCanvas2)
    var param_valores3 = [];
    $.post(base_url2+'/sistema/dashboard/chart3', function(data) {
        datos = $.parseJSON(data);

        var param_valores3 = [datos.e.total_pasarela,datos.f.total_pasarela,datos.m.total_pasarela,datos.a.total_pasarela,datos.ma.total_pasarela,datos.j.total_pasarela,datos.jl.total_pasarela,datos.ag.total_pasarela,datos.s.total_pasarela,datos.o.total_pasarela,datos.n.total_pasarela,datos.d.total_pasarela];

        var areaChartData2 = {
          labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
          datasets: [
            {
                label               : 'Camisas',
                fillColor           : 'rgba(245, 207, 70, 0.9)',
                strokeColor         : 'rgba(0, 0, 0, 0.9)',
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : param_valores3,
              }
          ]
        }
        areaChart2.Bar(areaChartData2, areaChartOptions);
        
    });

}

function chart4(){
    var areaChartCanvas2 = $('#barChart4').get(0).getContext('2d')
    var areaChart2       = new Chart(areaChartCanvas2)
    var param_valores4 = [];
    $.post(base_url2+'/sistema/dashboard/chart4', function(data) {
        datos = $.parseJSON(data);

        var param_valores4 = [datos.e.total_ventanilla,datos.f.total_ventanilla,datos.m.total_ventanilla,datos.a.total_ventanilla,datos.ma.total_ventanilla,datos.j.total_ventanilla,datos.jl.total_ventanilla,datos.ag.total_ventanilla,datos.s.total_ventanilla,datos.o.total_ventanilla,datos.n.total_ventanilla,datos.d.total_ventanilla];

        var areaChartData2 = {
          labels  : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
          datasets: [
            {
                label               : 'Camisas',
                fillColor           : 'rgba(245, 207, 70, 0.9)',
                strokeColor         : 'rgba(0, 0, 0, 0.9)',
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : param_valores4,
              }
          ]
        }
        areaChart2.Bar(areaChartData2, areaChartOptions);
        
    });

}

areaChartOptions = {
    //Si debemos mostrar la escala en absoluto
    showScale               : true,
    //Si las líneas de cuadrícula se muestran en el gráfico
    scaleShowGridLines      : false,
    //Color de las líneas de la cuadrícula
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Ancho de las líneas de la cuadrícula
    scaleGridLineWidth      : 1,
    //Si se muestran líneas horizontales (excepto el eje X)
    scaleShowHorizontalLines: true,
    //Si se muestran líneas verticales (excepto el eje Y)
    scaleShowVerticalLines  : true,
    //Si la línea es curva entre puntos
    bezierCurve             : true,
    //Tensión de la curva bezier entre puntos
    bezierCurveTension      : 0.3,
    //Si mostrar un punto para cada punto
    pointDot                : false,
    //Radio de cada punto punto en píxeles
    pointDotRadius          : 4,
    //Ancho de píxel del punto punto de trazo
    pointDotStrokeWidth     : 1,
    //cantidad extra para agregar al radio para la detección de golpes fuera del punto dibujado
    pointHitDetectionRadius : 20,
    //Si mostrar un trazo para conjuntos de datos
    datasetStroke           : true,
    //Ancho de píxel del trazo del conjunto de datos
    datasetStrokeWidth      : 2,
    //Si se debe completar el conjunto de datos con un color
    datasetFill             : true,
    //SUna plantilla de leyenda
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //si mantener la relación de aspecto inicial o no cuando responde, si se establece en falso, ocupará todo el contenedor
    maintainAspectRatio     : true,
    //si hacer que la tabla responda al cambio de tamaño de la ventana
    responsive              : true
}