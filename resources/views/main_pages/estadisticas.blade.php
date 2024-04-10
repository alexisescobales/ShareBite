@extends('layout_main_screen')

@section('navbar')
    <li class="nav-item">
        <a href="{{ route('main') }}"><i class="fa-solid fa-house activo"></i></a>
    </li>
    <li class="nav-item">
        <a href="{{ route('main') }}"><i class="fa-solid fa-user"></i></a>
    </li>
@endsection


@section('leftColumn')
    <div class="left-column-container">
        <img src="{{ asset('img/tiendas/fornet.jpg') }}" alt="">
        <form action="">
            <div class="container-header" style="display: flex">
                <h2 class="nombreLocal">ElFornet</h2>
                <button id="btnGuardar" class="btn_guardar">Guardar</button>
            </div>
            <div class="lotesDisp" style="display: flex">
                <label for="">Lotes disponibles:</label>
                <p>3</p>
                <button><i class="fa-solid fa-plus"></i></button>
            </div>
            <label for="">Nombre tienda</label>
            <input type="text">
            <label for="">Dereccion</label>
            <input type="text" name="" id="">
            <label for="">Telefono de contacto</label>
            <input type="number">

        </form>
    </div>
@endsection


@section('rightColumn')
    {{-- poner las estadísticas --}}
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {
            packages: ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Define the chart to be drawn.
            var dataPieChart = new google.visualization.DataTable();
            dataPieChart.addColumn('string', 'Element');
            dataPieChart.addColumn('number', 'Percentage');
            dataPieChart.addRows([
                ['Mercadona', 0.40],
                ['Vivari', 0.30],
                ['365', 0.30]
            ]);

            var optionsPieChart = {
                'legend': 'up',
                'title': 'Lotes de comida salvados',
                'is3D': false
            }

            // Instantiate and draw the chart.
            var pieChart = new google.visualization.PieChart(document.getElementById('myPieChart'));
            pieChart.draw(dataPieChart, optionsPieChart);


            var dataColumnChart = google.visualization.arrayToDataTable([
                ["Element", "Density", {
                    role: "style"
                }],
                ["Lunes", 2, "blue"],
                ["Martes", 10, "blue"],
                ["Miercoles", 19, "blue"],
                ["Jueves", 21, "blue"],
                ["Viernes", 10, "blue"],
                ["Sabado", 19, "blue"],
                ["Domingo", 21, "blue"]
            ]);

            var view = new google.visualization.DataView(dataColumnChart);
            view.setColumns([0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                },
                2
            ]);

            var optionsColumnChart = {
                title: "Paquetes entregados en los ultimos 7 dias",
                bar: {
                    groupWidth: "90%"
                },
                legend: {
                    position: "none"
                },
            };

            // Instantiate and draw the chart.
            var columnChart = new google.visualization.ColumnChart(document.getElementById('myColumnChart'));
            columnChart.draw(view, optionsColumnChart);
        }
    </script>

    <div class="div-estadisticas">
        <div id="myPieChart"></div>
        <div id="myColumnChart"></div>
    </div>
@endsection
