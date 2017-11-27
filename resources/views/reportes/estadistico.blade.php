<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Reporte Estadistico</title>

		<script type="text/javascript" src="/js/jquery.js"></script>
		<style type="text/css">
${demo.css}
		</style>
	</head>
	<body>
<script src="/js/code/highcharts.js"></script>
<script src="/js/code/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>



		<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Reporte Estadistico'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [

        @foreach($res as $f)

        {
            name: '{{ $f->email }}',
            y: {{ $f->cant }}
        }, 
        @endforeach

        ]
    }]
});
		</script>
	</body>
</html>
