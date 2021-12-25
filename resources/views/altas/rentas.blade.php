@extends('principal')

@section('contenido')
<head>
    <meta charset="utf-8">
    {{Form::open(['route' => 'Guardarentas'])}}
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
    <body>
  	<div align='center'>
    <h1><b>Alta Rentas</h1>
      @if($errors->first('idr'))<p><i> {{ $errors->first('idr') }}</i></p>@endif

        <table>

          <tr>
            <td>cliente:</td>
            <td><select name = 'idcl' class="form-control btn btn-primary">
                    @foreach($cl as $cli)
                    <option value = '{{$cli->idcl}}'>{{$cli->nombre}}</option>
                    @endforeach
                  </select></td>
          </tr>

          <tr>
            <td>ID Evento:</td>
            <td><select name = 'idev' class="form-control btn btn-primary">
                    @foreach($eve as $eventos)
                    <option value = '{{$eventos->idev}}'>{{$eventos->idev}}</option>
                    @endforeach
                  </select></td>
          </tr>

          <tr>
            <td>Direccion:</td>
            <td>    @if($errors->first('direccion'))<p><i> {{ $errors->first('direccion') }} </i></p>@endif
         		{{Form::text('direccion', old('direccion'), ['class' => 'form-control','placeholder' => 'Direccion'])}}</td>
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
            <td>Fecha del evento:</td>
            <td>{{Form::date('fecharentar', \Carbon\Carbon::now())}}</td>
          </tr>

          <tr>
            <td>Costo:</td>
            <td>  @if($errors->first('costo'))<p><i> {{ $errors->first('costo') }} </i></p>@endif
        		{{Form::text('costo', old('costo'), ['class' => 'form-control','placeholder' => 'Costo'])}}</td>
          </tr>

          <tr>
            <td>Cantidad de personas:</td>
            <td>@if($errors->first('cantpersona'))<p><i> {{ $errors->first('cantpersona') }} </i></p>@endif
        		{{Form::text('cantpersona', old('cantpersona'), ['class' => 'form-control','placeholder' => 'Personas'])}}</td>
          </tr>

          <tr>
            <td colspan="2"><br>
              {{Form::submit('Guardar',['class' => 'btn btn-info btn-large btn-primary  btn-block'])}}</td>
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
</div>
@stop