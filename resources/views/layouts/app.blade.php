<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <title></title>
  </head>
  <body>
        <div class="container">
            @include('inc.header')
            @yield('conteudo')
            
        </div>
    <script src="{{asset('js/app.js')}}"></script>
  </body>
</html>