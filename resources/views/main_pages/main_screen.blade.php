@extends('main_pages.main_detail_screen')

@section('leftColumn')
    <div class="left-column-container">
        <h3>¿A DONDE QUIERES IR?</h3>
        <div class="left-column-container-buttons">
            <button id="btn_entrega">Puntos de entrega</button>
            <button id="btn_recogida">Puntos de recogida</button>
        </div>
    </div>
@endsection

@section('rightColumn')
    <div class="right-column-container">
        <div id='map' style='width: 1000px; height: 700px;'></div>
    </div>
@endsection


