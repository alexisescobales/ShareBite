@extends('layout_main_screen')

@section('navbar')
    <li class="nav-item">
        <a href="{{ route('main') }}"><i class="fa-solid fa-house activo"></i></a>
    </li>
    <li class="nav-item">
        <a href="{{ route('perfilRaider') }}"><i class="fa-solid fa-user"></i></a>
    </li>
@endsection

@section('leftColumn')
    <div class="left-column-container">
        <h3>¿A DONDE QUIERES IR?</h3>
        <div class="left-column-container-buttons">
            <a href="{{ route('proveedores') }}"><button id="btn_entrega">Puntos de Recogida</button></a>
            <a href="{{ route('lista_puntos_entrega') }}"><button id="btn_recogida">Puntos de entrega</button></a>
        </div>
    </div>
@endsection

@section('rightColumn')
    <div class="right-column-container">
        <div id='map' style='width: 1000px; height: 700px;'></div>
    </div>

    <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary flotante">IA</button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <input type="text" placeholder="Write your prompt" id="prompt">
                    <button id="generate">Generate</button>

                    <p id="output"></p>
                    <script src="{{ asset('js/app.js') }}"></script>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
          </div>
        </div>
      </div>
    <div id='map' style='width: 100%; height: 100%;'></div>
@endsection
