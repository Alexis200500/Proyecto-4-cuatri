@extends('principal')

@section('contenido')
<head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/tabla.css">


</head>
<br><br><br><br><br><br>

<h1>ADMINISTRADORES</h1>
  <br>
  <div align=center >

    <table >
        <thead>
      <tr>
        <th>Foto</th>
        <th>ID</th>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Sexo</th>
        <th>Teléfono</th>
        <th>Dirección</th>
        <th>Estado</th>
        <th>Puesto</th>
        <th>Correo</th>

	<th>Opciones</th>
      </tr>
          </thead>
      @foreach($consulta as $ad)
      <tr>
        <td><img src = "{{asset('archivos/'.$ad->archivo)}}" height =50 width=50></td>
        <td>{{$ad->idad}}</td>
        <td>{{$ad->nombre}} {{$ad->apellido1}} {{$ad->apellido2}}</td>
        <td>{{$ad->edad}}</td>
        <td>{{$ad->sexo}}</td>
        <td>{{$ad->telefono}}</td>
        <td>{{$ad->direccion}}</td>
        <td>{{$ad->estado}}</td>
        <td>{{$ad->puesto}}</td>
        <td>{{$ad->email}}</td>

	       <td>
           @if($ad->activo=='Si')
           @if(Session::get('sesiontipo')=="Administrador")
           <a href="{{URL::action('adminController@eliminaad',['idad'=>$ad->idad])}}">Eliminar</a>
           @endif
           <a href="{{URL::action('adminController@modificaad',['idad'=>$ad->idad])}}">Modifica</a>
           @else
           <a href="{{URL::action('adminController@restauraad',['idad'=>$ad->idad])}}">Restaurar</a>
           @endif
	        </td>
      </tr>
      @endforeach
    </table>
    </div>
@stop
