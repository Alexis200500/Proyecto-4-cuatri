@extends('principal')

@section('contenido')
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/tabla.css">


</head>
<br><br><br><br><br><br>
<h1>PRODUCTOS</h1>

  <br>
  <div align='center'>

  <table>
<thead>
      <tr>
        <td>Foto</td>
        <td>ID</td>
        <td>Producto</td>
        <td>categoria</td>
        <td>Material</td>
        <td>Renta</td>
        <td>Color</td>
        <td>Costo</td>
        <td>Imagen</td>
<td>Opciones</td>
      </tr>
    </thead>
      @foreach($consulta as $pr)
      <tr>
        <td><img src = "{{asset('archivos/'.$pr->archivo)}}" height =50 width=50></td>
        <td>{{$pr->idpr}}</td>
        <td>{{$pr->producto}}</td>
        <td>{{$pr->categoria}}</td>
        <td>{{$pr->material}}</td>
        <td>{{$pr->idr}}</td>
        <td>{{$pr->color}}</td>
        <td>{{$pr->costo}}</td>
        <td>{{$pr->archivo}}</td>
<td>
  @if($pr->activo=='Si')
  @if(Session::get('sesiontipo')=="Administrador")
  <a href="{{URL::action('productosController@eliminapr',['idpr'=>$pr->idpr])}}">Eliminar</a>
  @endif
  <a href="{{URL::action('productosController@modificaproductos',['idpr'=>$pr->idpr])}}">Modificar</a>
  @else
  <a href="{{URL::action('productosController@restaurapr',['idpr'=>$pr->idpr])}}">Restaurar</a>
  @endif
</td>
      </tr>
      @endforeach
    </table>
  </div>
@stop
