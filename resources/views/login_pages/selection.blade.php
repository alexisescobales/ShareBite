@extends('layout_login_screen')

@section('leftColumn')
<div>
    <form style="margin: 10px" action="{{ action([App\Http\Controllers\ControlerUsuario::class, 'seleccion']) }} " method="POST">
        @csrf
        <input type="text" hidden value="rider" name="eleccion">
        <div class="selection_group">
            <a href="{{ route('log_in_pages.register') }}"><p>RIDER <i class="fa-solid fa-bicycle"></i></p></a>
        </div>
    </form>
    <form style="margin: 10px" action="{{ action([App\Http\Controllers\ControlerUsuario::class, 'seleccion']) }}">
        @csrf
        <input type="text" hidden value="proveedor">
        <div class="selection_group">
            <a href=""><p><i class="fa-solid fa-shop"></i> PROVEEDOR</p></a>
        </div>
    </form>
</div>
   
    
@endsection
