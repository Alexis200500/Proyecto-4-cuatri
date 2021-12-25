<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/tabla.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="http://www.google.com/jsapi?key=CODIGO-PERSONAL"></script>


  </head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
 <div class="collapse navbar-collapse" id="navbarsExampleDefault">
   <ul class="navbar-nav mr-auto">

       <a class="nav-link" href="{{asset('localizacion')}}" >Localización y comentarios</a>
     <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Altas</a>
       <div class="dropdown-menu" aria-labelledby="dropdown01">
         <a class="dropdown-item" href="{{asset('Altaadmins')}}">Administrador</a>
         <a class="dropdown-item" href="{{asset('Altaclientes')}}">Clientes</a>
         <a class="dropdown-item" href="{{asset('Altaeventos')}}">Eventos</a>
         <a class="dropdown-item" href="{{asset('Altarentas')}}">Rentas</a>
         <a class="dropdown-item" href="{{asset('Altaproductos')}}">Productos</a>
         <a class="dropdown-item" href="{{asset('Altacolor')}}">Colores</a>
         <a class="dropdown-item" href="{{asset('Altacategoria')}}">Categorias</a>
         <a class="dropdown-item" href="{{asset('Altamaterial')}}">Material</a>
       </div>
       <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reportes</a>
         <div class="dropdown-menu" aria-labelledby="dropdown02">
           <a class="dropdown-item" href="{{asset('Reporteadmins')}}">Administrador</a>
           <a class="dropdown-item" href="{{asset('Reporteclientes')}}">Clientes</a>
           <a class="dropdown-item" href="{{asset('Reporteeventos')}}">Eventos</a>
           <a class="dropdown-item" href="{{asset('Reporterentas')}}">Rentas</a>
           <a class="dropdown-item" href="{{asset('Reporteproductos')}}">Productos</a>
           <a class="dropdown-item" href="{{asset('Reportecolor')}}">Colores</a>
           <a class="dropdown-item" href="{{asset('Reportecategoria')}}">Categorias</a>
           <a class="dropdown-item" href="{{asset('Reportematerial')}}">Material</a>
         </div>
     </li>
     <li class="nav-item active">
       <a href="{{URL::action('acceso@cerrarsesion')}}"><button type="button" class="btn btn-dark">Cerrar sesion</button></a>
     </li>
   </ul>
 </div>
<p style = "font-family:arial;">
  <img src = "{{asset('archivos/'.Session::get('sesionarchivo'))}}" height =50 width=50>
  {{Session::get('sesionname')}}
</p>
 </nav>
<div class="cuerpo" align="center"><br><br><br><br>
  @yield('contenido')
</div>
  </body>
  </html>
