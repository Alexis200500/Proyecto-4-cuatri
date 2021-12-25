@extends('principal')

@section('contenido')
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/tabla.css">


</head>
<br><br><br><br><br><br>

<h1>RENTAS</h1>
  <br>
  <div align='center'>

    <table>
<thead>
      <tr>
        <td>ID</td>
        <td>Cliente</td>
        <td>ID Evento</td>
        <td>Dirección</td>
        <td>Estado</td>
        <td>Fecha de la renta</td>
        <td>Costo</td>
        <td>Cantidad de personas</td>
<td>Opciones</td>

      </tr>
    </thead>
      @foreach($consulta as $re)
      <tr>
        <td>{{$re->idr}}</td>
        <td>{{$re->nombre}}</td>
        <td>{{$re->idev}}</td>
        <td>{{$re->direccion}}</td>
        <td>{{$re->estado}}</td>
        <td>{{$re->fecharentar}}</td>
        <td>{{$re->costo}}</td>
        <td>{{$re->cantpersona}}</td>
<td>
  @if($re->activo=='Si')
  @if(Session::get('sesiontipo')=="Administrador")
  <a href="{{URL::action('rentaController@eliminare',['idr'=>$re->idr])}}">Eliminar</a>
  @endif
  <a href="{{URL::action('rentaController@modificarentas',['idr'=>$re->idr])}}">Modifica</a>
  @else
  <a href="{{URL::action('rentaController@restaurare',['idr'=>$re->idr])}}">Restaurar</a>
  @endif
</td>
        </tr>
      @endforeach
    </table>
  </div>
@stop
