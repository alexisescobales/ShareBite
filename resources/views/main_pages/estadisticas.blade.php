@extends('layout_main_screen')

@section('navbar')
    <li class="nav-item">
        <a href=""><i class="fa-solid fa-house activo"></i></a>
    </li>
    <li class="nav-item">
        <button data-bs-toggle="modal" data-bs-target="#exampleModal3"><i class="fa-solid fa-user activo" ></i></button> 
    </li>>
@endsection


@section('leftColumn')
    <div class="left-column-container left-column-estadisticas">
        <div class="divImg">
            <img src="{{ asset('img/tiendas/fornet.jpg') }}" alt="">
            <div><i class="fa-solid fa-pen-to-square"></i></div>
        </div>
        
        <form class="formLocal" action="{{ action([App\Http\Controllers\PerfilProveedorControler::class, 'actualizarTienda']) }}" method="POST">
            @csrf
            <div class="container-header" style="display: flex">
                <h2 class="nombreLocal">{{ $tienda[0]->nombre }}</h2>
                <button id="btnGuardar" type="submit" class="btn_guardar">Guardar</button>
            </div>
            <div class="settings-form">
                <div class="lotesDisp" style="display: flex">
                    <label for="">Lotes disponibles:</label>
                    <p>{{ $tienda[0]->menus }}</p>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                            class="fa-solid fa-pen-to-square"></i></button>
                </div>
                <div class="form-row">
                    <label for="">Nombre tienda</label>
                    <input type="text" value="{{ $tienda[0]->nombre }}">
                </div>
                <div class="form-row">
                    <label for="">Dereccion</label>
                    <input type="text" name="" value="{{ $tienda[0]->direccion }}">
                </div>
                <div class="form-row">
                    <label for="">Telefono de contacto</label>
                    <input type="text" value="{{ $user->telefono }}">
                </div>
            </div>
            <label for="">Nombre tienda</label>
            <input name="nombreTienda" type="text" value="{{ $tienda[0]->nombre }}">
            <label for="">Direccion</label>
            <input name="direccion" type="text" name="" value="{{ $tienda[0]->direccion }}">
            <label for="">Nombre usuario</label>
            <input name="nombreUsuario" type="text" value="{{ $user->nombre }}">
            <label for="">Correo</label>
            <input name="correo" type="text" value="{{ $user->correo }}">
            <label for="">Cambiar contraseña</label>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i class="fa-solid fa-pen-to-square"></i></button>
            <label for="">Telefono de contacto</label>
            <input name="telefono" type="text" value="{{ $user->telefono }}">
        </form>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ action([App\Http\Controllers\PerfilProveedorControler::class, 'actualizarMenu']) }}" method="POST">
                @csrf
                <div class="modal-body">
                    
                        <div style="display: flex">
                            <button id="btnMenosMenu" type="button" class="btn btn-primary">-</button>
                            <h1 id="numeroDeMenus">{{ $tienda[0]->menus }}</h1>
                            <input id="inputMenus" name="inputMenus" type="text" hidden>
                            <button id="btnMasMenu" type="button" class="btn btn-primary">+</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


      <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ action([App\Http\Controllers\PerfilProveedorControler::class, 'actualizarContraseña']) }}" method="POST">
                @csrf
                <div class="modal-body">
                    
                        <div>
                            <label for="">Nueva contraseña</label>
                            <input name="password" type="password">
                            <label for="">Comfirma contraseña</label>
                            <input name="passwordConfirm" type="password">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ action([App\Http\Controllers\ControlerUsuario::class, 'CerrarSesion']) }}" method="GET">
                @csrf
                <div class="modal-body">
                    <h1>Quieres cerrar sesion?</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Salir</button>
                </div>
            </form>
          </div>
        </div>
      </div>

      <script>

        // Obtener referencia a los elementos del DOM
        const h1menus = document.getElementById("numeroDeMenus");
        const btnMenosMenu = document.getElementById("btnMenosMenu");
        const btnMasMenu = document.getElementById("btnMasMenu");

        // Agregar un event listener al botón de restar menú
        btnMenosMenu.addEventListener("click", restarMenu);

        // Definir la función para restar un menú
        function restarMenu() {
      
            let cantidadMenus = parseInt(h1menus.textContent);
         
            if (cantidadMenus > 0) {
                cantidadMenus--;
                h1menus.textContent = cantidadMenus;
                inputMenus.value = cantidadMenus;
            }
        }

        // Agregar un event listener al botón de sumar menú
        btnMasMenu.addEventListener("click", sumarMenu);

        // Definir la función para sumar un menú
        function sumarMenu() {

            let cantidadMenus = parseInt(h1menus.textContent);
            cantidadMenus++;
            h1menus.textContent = cantidadMenus;
            inputMenus.value = cantidadMenus;
        }
    </script>
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
                'width': 500,
                'height': 500,
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
                width: 500,
                height: 500,                
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
