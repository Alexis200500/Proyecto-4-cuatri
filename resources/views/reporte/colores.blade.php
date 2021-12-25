@extends('principal')

@section('contenido')
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/tabla.css">


</head>
<br><br><br><br><br><br>
<h1>Colores</h1>
  <br>
  <div align='center'>

    <table>
        <thead>
      <tr>
        <td>ID</td>
        <td>Color</td>
<td>Opciones</td>

      </tr>
            </thead>
      @foreach($consulta as $co)
      <tr>
        <td>{{$co->idcolor}}</td>
        <td>{{$co->color}}</td>
<td>
  @if($co->activo=='Si')
  @if(Session::get('sesiontipo')=="Administrador")
  <a href="{{URL::action('coloresController@eliminacol',['idcolor'=>$co->idcolor])}}">Eliminar</a>
  @endif
  <a href="{{URL::action('coloresController@modificacolores',['idcolor'=>$co->idcolor])}}">Modificar</a>
    @else
  <a href="{{URL::action('coloresController@restauracol',['idcolor'=>$co->idcolor])}}">Restaurar</a>
  @endif
</td>
        </tr>
      @endforeach
    </table>
  </div>
@stop
