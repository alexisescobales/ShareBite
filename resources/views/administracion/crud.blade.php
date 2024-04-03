@extends('administracion.plantilla')

@section('cap')

@endsection
<script>
    $(document).ready(function() {
        $(".btn-group .btn").click(function() {
            var inputValue = $(this).find("input").val();
            if (inputValue != 'all') {
                var target = $('table tr[data-status="' + inputValue + '"]');
                $("table tbody tr").not(target).hide();
                target.fadeIn();
            } else {
                $("table tbody tr").fadeIn();
            }
        });
        // Changing the class of status label to support Bootstrap 4
        var bs = $.fn.tooltip.Constructor.VERSION;
        var str = bs.split(".");
        if (str[0] == 4) {
            $(".label").each(function() {
                var classStr = $(this).attr("class");
                var newClassStr = classStr.replace(/label/g, "badge");
                $(this).removeAttr("class").addClass(newClassStr);
            });
        }
    });
</script>

@section('contenido')
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Gestionar <b>Riders</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-info active">
                                <input type="radio" name="status" value="all" checked="checked"> All
                            </label>
                            <label class="btn btn-success">
                                <input type="radio" name="status" value="active"> Active
                            </label>
                            <label class="btn btn-warning">
                                <input type="radio" name="status" value="inactive"> Inactive
                            </label>
                            <label class="btn btn-danger">
                                <input type="radio" name="status" value="expired"> Expired
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Contraseña</th>
                        <th>Foto</th>
                        <th>Tipo usuario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id_usuario }}</td>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->correo }}</td>
                        <td>{{ $usuario->password }}</td>
                        <td>{{ $usuario->foto }}</td>
                        <td>{{ $usuario->tipo_usuario->nombre_tipo }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection