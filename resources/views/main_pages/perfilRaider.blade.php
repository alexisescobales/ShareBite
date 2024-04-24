@extends('layout_main_screen')

@section('navbar')
    <li class="nav-item">
        <a href="{{ route('main') }}"><i class="fa-solid fa-house"></i></a>
    </li>
    <li class="nav-item">
        <button data-bs-toggle="modal" data-bs-target="#exampleModal2"><i class="fa-solid fa-user activo" ></i></button> 
    </li>>
@endsection


@section('leftColumn')
    <div class="left-column-container">
        <div class="divImg">
            <img src="{{ asset('img/raiders/persona.jpg') }}" alt="">
            <p><i class="fa-solid fa-pen-to-square"></i></p>
        </div>
        
        <form class="formLocal" action="{{ action([App\Http\Controllers\PerfilRaiderControler::class, 'actualizarUsuario']) }}" method="POST">
            @csrf
            <div class="container-header" style="display: flex">
                 <h2 class="nombreLocal">{{ $user->nombre }}</h2> 
                <button id="btnGuardar" type="submit" class="btn_guardar">Guardar</button>
            </div>
            <label for="">Nombre usuario</label>
            <input name="nombreUsuario" type="text" value="{{ $user->nombre }}">
            <label for="">Correo</label>
            <input name="correo" type="text" value="{{ $user->correo }}">
            <label for="">Cambiar contraseña</label>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-pen-to-square"></i></button>
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
            <form action="{{ action([App\Http\Controllers\PerfilRaiderControler::class, 'actualizarContraseña']) }}" method="POST">
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




      <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
@endsection


@section('rightColumn')
    
@endsection