@extends('principal')

@section('contenido')
  <head>
    <meta charset="utf-8">
    {{Form::open(['route' => 'Guardaadmins','files'=>true])}}
    {{Form::token()}}
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Modals | jeweler - Material Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="css/modals.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
  </head>


      <h1>ALTA ADMINISTRADORES</h1><br>

    <table align='center'>
      <tr>
        <td>ID:@if($errors->first('idcl'))<p><i> {{ $errors->first('idcl') }}</i></p> @endif</td>
        <td>{{Form::text('idcl',$idsigue,['readonly','class' => 'form-control'])}}</td>
      </tr>
      <tr>
        <td>Nombre: @if($errors->first('nombre'))<p><i> {{ $errors->first('nombre') }} </i></p> @endif</td>
        <td>{{Form::text('nombre', old('nombre'), ['class' => 'form-control','placeholder' => 'Nombre'])}}</td>
      </tr>
      <tr>
        <td>Apellido: @if($errors->first('apellido1'))<p><i> {{ $errors->first('apellido1') }} </i></p>@endif</td>
        <td>{{Form::text('apellido1', old('apellido1'), ['class' => 'form-control','placeholder' => 'Apellido'])}}</td>
      </tr>
      <tr>
        <td>Apellido:@if($errors->first('apellido2'))<p><i> {{ $errors->first('apellido2') }} </i></p> @endif</td>
        <td>{{Form::text('apellido2', old('apellido2'), ['class' => 'form-control','placeholder' => 'Apellido'])}}</td>
      </tr>
      <tr>
        <td>Edad:@if($errors->first('edad'))<p><i> {{ $errors->first('edad') }} </i></p>@endif</td>
        <td>{{Form::text('edad', old('edad'), ['class' => 'form-control','placeholder' => 'Edad'])}}</td>
      </tr>
      <tr>
        <td>Sexo:  @if($errors->first('sexo')) <p><i> {{ $errors->first('sexo') }} </i></p>@endif</td>
        <td>{{Form::radio('sexo', 'M')}}Masculino {{Form::radio('sexo', 'F')}}Femenino </td>
      </tr>
      <tr>
        <td>Telefono:@if($errors->first('telefono')) <p><i> {{ $errors->first('telefono') }} </i></p>@endif</td>
        <td>{{Form::text('telefono', old('telefono'), ['class' => 'form-control','placeholder' => 'Telefono'])}}</td>
      </tr>
      <tr>
        <td>Dirección: @if($errors->first('direccion'))<p><i> {{ $errors->first('direccion') }} </i></p>@endif</td>
        <td>{{Form::text('direccion', old('direccion'), ['class' => 'form-control','placeholder' => 'Direccion'])}}</td>
      </tr>

      <tr>
        <td>Estado:</td>
        <td><select name = 'ide' class="form-control btn btn-primary">
              @foreach($estados as $est)
               <option value = '{{$est->ide}}'>{{$est->estado}}</option>
              @endforeach
            </select></td>
      </tr>

      <tr>
        <td>Puesto:</td>
        <td><select class="form-control btn btn-primary" name = 'idpue'>
          @foreach($puestos as $pues)
          <option value = '{{$pues->idpue}}'>{{$pues->puesto}}</option>
          @endforeach
        </select></td>
      </tr>
      <tr>
        <td>Seleccione foto: @if($errors->first('archivo'))<p><i> {{ $errors->first('archivo') }}</i></p>@endif</td>
        <td>{{Form::file('archivo')}}</td>
      </tr>

      <tr>
        <td>Correo Electronico: @if($errors->first('email'))<p><i> {{ $errors->first('email') }} </i></p>@endif</td>
        <td>{{Form::text('email', old('email'), ['class' => 'form-control','placeholder' => 'Correo'])}}</td>
      </tr>
      <tr>
        <td>Contraseña: @if($errors->first('contraseña')) <p><i> {{ $errors->first('contraseña') }} </i></p>@endif</td>
        <td>{{Form::password('contraseña', ['class' => 'form-control','placeholder' => 'Contraseña'])}}</td>
      </tr>
<br>
<br>
      <tr>
        <td colspan="2" align='center'>{{Form::submit('Guardar',['class' => 'btn btn-info btn-large btn-primary  btn-block'])}}</td>
      </tr>
    </table>

    <!-- jquery
============================================ -->
<script src="js/vendor/jquery-1.11.3.min.js"></script>
<!-- bootstrap JS
============================================ -->
<script src="js/bootstrap.min.js"></script>
<!-- wow JS
============================================ -->
<script src="js/wow.min.js"></script>
<!-- price-slider JS
============================================ -->
<script src="js/jquery-price-slider.js"></script>
<!-- meanmenu JS
============================================ -->
<script src="js/jquery.meanmenu.js"></script>
<!-- owl.carousel JS
============================================ -->
<script src="js/owl.carousel.min.js"></script>
<!-- sticky JS
============================================ -->
<script src="js/jquery.sticky.js"></script>
<!-- scrollUp JS
============================================ -->
<script src="js/jquery.scrollUp.min.js"></script>
<!-- mCustomScrollbar JS
============================================ -->
<script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/scrollbar/mCustomScrollbar-active.js"></script>
<!-- metisMenu JS
============================================ -->
<script src="js/metisMenu/metisMenu.min.js"></script>
<script src="js/metisMenu/metisMenu-active.js"></script>
<!-- morrisjs JS
============================================ -->
<script src="js/sparkline/jquery.sparkline.min.js"></script>
<script src="js/sparkline/jquery.charts-sparkline.js"></script>
<!-- calendar JS
============================================ -->
<script src="js/calendar/moment.min.js"></script>
<script src="js/calendar/fullcalendar.min.js"></script>
<script src="js/calendar/fullcalendar-active.js"></script>
<!-- tab JS
============================================ -->
<script src="js/tab.js"></script>
<!-- plugins JS
============================================ -->
<script src="js/plugins.js"></script>
<!-- main JS
============================================ -->
<script src="js/main.js"></script>



  @stop
