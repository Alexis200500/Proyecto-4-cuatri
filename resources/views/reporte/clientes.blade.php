@extends('principal')

@section('contenido')
<head>
  <link rel="stylesheet" type="text/css" href="css/tabla.css">
    <meta charset="utf-8">


</head>
<br><br><br><br><br><br>
<h1>CLIENTES</h1>
  <br>
  <div align='center'>


    <table>
        <thead>
      <tr>
        <td>Foto:</td>
        <td>ID</td>
        <td>Nombre</td>
        <td>Edad</td>
        <td>Sexo</td>
        <td>Teléfono</td>
        <td>Dirección</td>
        <td>Estado</td>
        <td>Correo</td>
        <td>Contraseña</td>
<td>Opciones</td>
      </tr>
            </thead>
      @foreach($consulta as $cl)
      <tr>
        <td><img src = "{{asset('archivos/'.$cl->archivo)}}" height =50 width=50></td>
        <td>{{$cl->idcl}}</td>
        <td>{{$cl->nombre}} {{$cl->apellido1}} {{$cl->apellido2}}</td>
        <td>{{$cl->edad}}</td>
        <td>{{$cl->sexo}}</td>
        <td>{{$cl->telefono}}</td>
        <td>{{$cl->direccion}}</td>
        <td>{{$cl->estado}}</td>
        <td>{{$cl->email}}</td>
        <td>{{$cl->contraseña}}</td>
<td>
  @if($cl->activo=='Si')
  @if(Session::get('sesiontipo')=="Administrador")
  <a href="{{URL::action('clienteController@eliminacl',['idcl'=>$cl->idcl])}}">Eliminar</a>
  @endif
  <a href="{{URL::action('clienteController@modificacl',['idcl'=>$cl->idcl])}}">Modificar</a>
    @else
  <a href="{{URL::action('clienteController@restauracl',['idcl'=>$cl->idcl])}}">Restaurar</a>
    @endif
</td>
      </tr>
      @endforeach
    </table>
    </div>
@stop
