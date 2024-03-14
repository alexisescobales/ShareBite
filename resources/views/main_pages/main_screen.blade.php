@extends('layout_main_screen')

@section('leftColumn')
    <div class="left-column-container">
        <h3>¿A DONDE QUIERES IR?</h3>
        <div class="left-column-container-buttons">
            <button>Puntos de entrega</button>
            <button>Puntos de recogida</button>
        </div>
    </div>
@endsection

@section('rightColumn')
    <div id='map' style='width: 100%; height: 400px;'>

    </div>
@endsection
