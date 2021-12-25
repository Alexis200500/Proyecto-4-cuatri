@extends('principal')

@section('contenido')
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/tabla.css">


</head>
<br><br><br><br><br><br>
<h1>Materiales</h1>
  <br>
  <div align='center'>

    <table>
<thead>
      <tr>
        <td>ID</td>
        <td>Material</td>

<td>Opciones</td>

      </tr>
    </thead>
      @foreach($consulta as $m)
      <tr>
        <td>{{$m->idm}}</td>
        <td>{{$m->material}}</td>
<td>
  @if($m->activo=='Si')
  @if(Session::get('sesiontipo')=="Administrador")
  <a href="{{URL::action('materialController@eliminama',['idm'=>$m->idm])}}">Eliminar</a>
  @endif
  <a href="{{URL::action('materialController@modificarmateriales',['idm'=>$m->idm])}}">Modificar</a>
  @else
  <a href="{{URL::action('materialController@restaurama',['idm'=>$m->idm])}}">Restaurar</a>
  @endif
</td>
        </tr>
      @endforeach
    </table>
  </div>
@stop
