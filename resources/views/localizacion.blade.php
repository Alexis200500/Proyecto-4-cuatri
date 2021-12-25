@extends('principal')

@section('contenido')
<head>
    <meta charset="utf-8">
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : 'your-app-id',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v5.0'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
</head>
<body>
  <br><br><br><br><br><br>
	
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v5.0"></script>

  <h1>LOCALIZACION</h1>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3765.38322335846!2d-99.57207778561975!3d19.30917014962068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cd8a98e0e6a5dd%3A0x20c90976ab9fa4e!2sFelipe%20Ch%C3%A1vez%2023%2C%20San%20Pedro%20Totoltepec%2C%2050200%20San%20Pedro%20Totoltepec%2C%20M%C3%A9x.!5e0!3m2!1ses-419!2smx!4v1576220546784!5m2!1ses-419!2smx" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

  	<h1>Comentarios</h1>
  	<div class="fb-comment-embed" data-href="https://www.facebook.com/zuck/posts/10102577175875681?comment_id=1193531464007751&amp;reply_comment_id=654912701278942" data-width="560" data-include-parent="false"></div>
</body>
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
@stop
