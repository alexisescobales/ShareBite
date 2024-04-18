@extends('layout_login_screen')

@section('leftColumn')
<div>
    <form style="margin: 10px" action="{{ action([App\Http\Controllers\ControlerUsuario::class, 'seleccion'], ['eleccion' => 'rider']) }} " method="POST">
        @csrf
        <div class="selection_group">
            <button class="btn_grande" type="submit">RIDER <i class="fa-solid fa-bicycle"></i></button>
        </div>
    </form>
    <form style="margin: 10px" action="{{ action([App\Http\Controllers\ControlerUsuario::class, 'seleccion'], ['eleccion' => 'proveedor']) }}" method="POST">
        @csrf
        <div class="selection_group">
            <button class="btn_grande" type="submit">PROVEEDOR <i class="fa-solid fa-shop"></i></button>
        </div>
    </form>
</div>
   
    
@endsection
