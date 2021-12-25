@extends('principal')

@section('contenido')
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/tabla.css">


</head>
<br><br><br><br><br><br>
<h1>Categorias</h1>
  <br>
  <div align='center'>

    <table>
        <thead>
      <tr>
        <td>ID</td>
        <td>Categoria</td>
        <td>Opciones</td>
      </tr>
        </thead>
      @foreach($consulta as $re)
      <tr>
        <td>{{$re->idca}}</td>
        <td>{{$re->categoria}}</td>
<td>
  @if($re->activo=='Si')
  @if(Session::get('sesiontipo')=="Administrador")
  <a href="{{URL::action('categoriasController@eliminaca',['idca'=>$re->idca])}}">Eliminar</a>
  @endif
  <a href="{{URL::action('categoriasController@modificacategorias',['idca'=>$re->idca])}}">Modifica</a>
  @else
  <a href="{{URL::action('categoriasController@restauraca',['idca'=>$re->idca])}}">Restaurar</a>
  @endif
</td>
@endforeach
        </tr>
    </table>
  </div>
@stop
