@extends('principal')

@section('contenido')
<head>
    <meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/tabla.css">

</head>
<br><br><br><br><br><br>
<h1>EVENTOS</h1>
  <br>
  <div align='center'>

    <table>
        <thead>
      <tr>
        <td>ID</td>
        <td>Cliente</td>
        <td>Tipo evento</td>
        <td>Dirección</td>
        <td>Estado</td>
        <td>Fecha del Evento</td>
        <td>Costo</td>
        <td>Cantidad de personas</td>
        <td>Administrador</td>
	<td>Opciones</td>
      </tr>
            </thead>
      @foreach($consulta as $eve)
      <tr>
        <td>{{$eve->idev}}</td>
        <td>{{$eve->nombre}}</td>
        <td>{{$eve->evento}}</td>
        <td>{{$eve->direccion}}</td>
        <td>{{$eve->estado}}</td>
        <td>{{$eve->fechaevento}}</td>
        <td>{{$eve->costo}}</td>
        <td>{{$eve->cantpersona}}</td>
        <td>{{$eve->nombre1}}</td>
	<td>
    @if($eve->activo=='Si')
    @if(Session::get('sesiontipo')=="Administrador")
    <a href="{{URL::action('eventoController@eliminaev',['idev'=>$eve->idev])}}">Eliminar</a>
    @endif
    <a href="{{URL::action('eventoController@modificaeventos',['idev'=>$eve->idev])}}">Modifica</a>
      @else
    <a href="{{URL::action('eventoController@restauraev',['idev'=>$eve->idev])}}">Restaurar</a>
      @endif
</td>
      </tr>
      @endforeach
    </table>
    </div>
@stop
